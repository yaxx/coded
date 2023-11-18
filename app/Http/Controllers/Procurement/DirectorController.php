<?php

namespace App\Http\Controllers\procurement;

use App\Models\Imprest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Setup\Agency;
use App\Models\Setup\Budget;
use Illuminate\Http\Request;
use App\Models\Setup\BudgetItem;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Procurement\GoodsPlan;
use App\Models\Approval\FundRequestModel;

use PhpParser\Node\Stmt\TryCatch;


class DirectorController extends Controller
{

    public function countPlan()
    {
        try {
            $countPlansByAgency = DB::table('procurement_plan as p')
                ->join('budget_plan_items as i', 'i.budget_plan_item_id', '=', 'p.budget_id')
                ->join('agencies', 'agencies.agency_id', '=', 'i.agency_id')
                ->select(
                    'agencies.agency_name',
                    DB::raw('COUNT(p.plan_id) as plan_count')

                )->groupBy('agencies.agency_name')->get();
                // dd($countPlansByAgency);

            return view('Directors.procurement_plans', compact('countPlansByAgency'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
        }


        // try {
        //     // $groupId = groupId();

        //     $countPlan= Agency:: DB::raw("(select agency_name from agencies where agency_id = i.agency_id limit 1) as agency_name");
        //     return view('Setup.Agency.agencies', compact('agencies'));
        // } 
    }
    public function findplan($plan_id = null)
    {

        try {
            // fetch user id from session variable 
            // check user role 
            // if user is chaimam, select all plans
            //else if user role is director, select from plan where aproval status = 'active, approved or rejected'

            $role = (groupId());
            // dd($role);
            $goodsplan = 0;
            if (groupId() === 13 | groupId() == 8) {
                $directorApproval = ['Rejected', 'Approved'];
                $goodsplan = GoodsPlan::from('procurement_plan as p')
                    ->join('budget_plan_items as i', 'i.budget_plan_item_id', 'p.budget_id', 'i.agency_id')
                    ->join('budgets_plans as b', 'b.budget_plan_reference_no', 'p.budget_plan_reference_no')
                    ->select('p.plan_id', 'p.budget_id', 'i.budget_plan_item_description as project_title', "p.project_cost", "i.agency_id", "p.approval_status", "p.created_at", DB::raw("(select agency_name from agencies where agency_id = i.agency_id limit 1) as agency_name"))->whereIn("p.approval_status", $directorApproval)
                    ->get();

                // dd($goodsplan);
            }
            // $goodsplan = GoodsPlan::from('procurement_plan as p')
            // ->join('budget_plan_items as i', 'i.budget_plan_item_id', 'p.budget_id','i.agency_id')
            // ->join('budgets_plans as b', 'b.budget_plan_reference_no', 'p.budget_plan_reference_no')
            // ->select('p.plan_id', 'p.budget_id', 'i.budget_plan_item_description as project_title', "p.project_cost", "i.agency_id", "p.approval_status", "p.created_at", DB::raw("(select agency_name from agencies where agency_id = i.agency_id limit 1) as agency_name"))
            // ->get();
            // dd($goodsplan);
            // $goodsplan = GoodsPlan::select(["plan_id", "budget_id", DB::raw("(select budget_item from budgets as b where b.budget_id = procurement_plan.budget_id limit 1) as project_title"), DB::raw("(select budget_plan_name from budgets_plans as b where b.budget_plan_reference_no = procurement_plan.budget_plan_reference_no limit 1) as budget_year"), "project_cost", "approval_status", "created_at"])->get();
            return view('Directors.view_status', compact('goodsplan', 'plan_id', ));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with('error', 'Something Went Wrong... error logged!!!');
        }
    }

    public function approvePlan($plan_id = null)
    {
        // dd($plan_id);
        if ($plan_id > 0) {
            $result = GoodsPlan::where('plan_id', $plan_id)->update(['approval_status' => 'Approved']);
            // dd($result);
            if ($result) {
                return redirect()->back()->with('success', 'plan approved successfully');
            }
            return redirect()->back()->with('error', 'failed to approve plan ');

        }
        return redirect()->back()->with('warning', 'plan not found ');

    }
    public function rejectPlan($plan_id = null)
    {
        // dd($plan_id);
        if ($plan_id > 0) {

            try {
                DB::beginTransaction();
                $result = GoodsPlan::where('plan_id', $plan_id)->update(['approval_status' => 'Rejected']);
                if ($result) {
                    $plan = GoodsPlan::from('procurement_plan as p')->join('budget_plan_items as b', 'b.budget_plan_item_id', 'p.budget_id')->select('b.budget_id', 'b.amount')->where('plan_id', $plan_id)->first();
                    $budget = Budget::where(['budget_id' => $plan->budget_id])->first(['budget_id', 'total_amount']);
                    // $amount = $budget->total_amount;
                    $budget->total_amount = $budget->total_amount + $plan->amount;
                    $result = $budget->save();

                    if ($result) {
                        DB::commit();
                        return redirect()->back()->with('success', 'plan rejected successfully');
                    }
                }
                DB::rollBack();
                return redirect()->back()->with('error', 'failed to reject plan ');
            } catch (\Throwable $e) {
                DB::rollBack();
                \Log::error($e);
                return redirect()->back()->with('error', 'Something Went Wrong... error logged!!!');
            }

        }
        return redirect()->back()->with('warning', 'plan not found ');

    }

    public function request()
    {

        $fundrequest = FundRequestModel::all();
        //   dd($fundrequest); 

        return view('Ministry.fund_request', compact('fundrequest'));
    }


    public function storerequest(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'expense_head' => 'required',
            'description' => 'required',
            'requested_amount' => 'required|numeric',
            // 'doc' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/png,image/jpeg|max:2048',
        ]);

        // Process the form data

        $fundrequest = new FundRequestModel;
        $fundrequest->expense_head = $request->input('expense_head');
        $fundrequest->description = $request->input('description');
        $fundrequest->requested_amount = $request->input('requested_amount');

        // // Upload the file
        // $file = $request->file('doc');
        // $fileName = time() . '_' . $file->getClientOriginalName();
        // $file->move(public_path('fundrequest'), $fileName);

        // $fundrequest->doc = $fileName;

        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path("fundrequest"), $filename);
            $fundrequest['doc'] = $filename;
        } else {
            // dd("Uou are fucked");
        }

        // Save the record
        $fundrequest->save();

        // Redirect back with success message
        return redirect()->route('Director.request', compact('fundrequest'))->with('success', 'Fund Request Submitted successfully');
    }
    public function fundrequest()
    {
        $fundrequest = FundRequestModel::all();

        return view('Ministry.approval_fund_request', compact('fundrequest'));

    }
    public function approverequest($request_id = null)
    {
        // dd($request_id);
        if ($request_id > 0) {
            $approval = FundRequestModel::where('request_id', $request_id)->update(['status' => 'Approved']);
            // dd($result);
            if ($approval) {
                return redirect()->back()->with('success', 'Fund Request approved successfully');
            }
            return redirect()->back()->with('error', 'failed to approve Request ');

        }
        return redirect()->back()->with('warning', 'Request not found ');

    }

    // Step 1: Authentication
    public function sendBulkPayment($paymentApproval, $batchName, $source_account)
    {
        try {

            // dd(date('Y'));
            $terminalId = '3TIL0001';
            // $uuid = Str::uuid();
            $batchName = uuid();

            // $monthly_pay = Agency::all([
            //     'account_no',
            //     'account_type',
            //     'amount',
            //     'bank_name',
            //     'description'
            // ]);

            $allAcct = '';
            $totalAmount = 0;
            foreach ($monthly_pay as $item) {
                $allAcct .= $item->account_no;
                $totalAmount += (float) $item->amount;
            }
            // dd();
            $session_id = strtotime(date('d-m-y h:i:s')) . '_' . uniqid();
            $body = [
                // 'amount' => $paymentApproval->total_amount,
                'amount' => round($totalAmount, 2),
                'batchName' => $batchName,
                'isBulkRemittance' => 'Y',
                'isConsolidated' => 'Y',
                'isOffline' => 'N',
                'mac' => hash('sha512', $terminalId . $allAcct . (($totalAmount * 100) / 2)),
                'organizationShortName' => 'TECHVIBES',
                'paymentsBatch' => [],
                "sessionId" => $session_id,
                "sourceAccount" => 2179132895,
                // "1012960881",
                "terminalId" => $terminalId,
                "tranCount" => count($monthly_pay)
            ];
            // $transaction = [
            //     'session_id' => $session_id,
            //     'batch_name' => $batchName,
            //     'amount' => round($totalAmount, 2),
            //     'created_by' => username(),

            // ];
            // AutopayTransaction::create($transaction);
            $i = 1;
            foreach ($monthly_pay as $item) {
                $randomString = $this->generateRandomString();
                array_push($body['paymentsBatch'], (object) [
                    "accountNumber" => $item->account_number,
                    "accountType" => 10,
                    "amount" => $item->amount,
                    "bankCBNCode" => substr($item->cbn_bank_code, 0, 3),
                    "beneficiaryCode" => $item->account_number,
                    "beneficiaryName" => $item->name,
                    // "createdAt" => "2023-03-27T12:48:49.508Z",
                    "currencyCode" => "NGN",
                    // "deletedAt" => "2023-03-27T12:48:49.508Z",
                    // "id" => $i,
                    "narration" => $item->narration,
                    // "narration" => "Do not approve",
                    "paymentRef" => $randomString,
                    "paymentType" => "DC",
                    // "updatedAt" => "2023-03-27T12:48:49.508Z",
                    "uuid" => uniqid()
                ]);
                $i++;
            }
            ;
            dd($body);
            $authBody = [
                "password" => "Admin*01",
                "rememberMe" => true,
                "username" => "ComFundMe"
            ];
            $response = Http::post('https://middleware.techvibesltd.com/api/v1/auth', $authBody);

            if ($response->successful()) {
                // dd('success', json_decode($response->body())->token);
                $token = json_decode($response->body())->token;
                $responsePay = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])
                    ->post('https://middleware.techvibesltd.com/api/v1/thirdparty/autopay/bulkPayment', $body);
                if ($responsePay->successful()) {
                    return json_decode($responsePay->body());
                } elseif ($responsePay->failed()) {
                    return ['error' => 'something went wrong sending payment'];
                }
            } elseif ($response->failed()) {
                return ['error' => 'something went wrong'];
            }
        } catch (\Throwable $e) {
            $log = [
                'log' => json_encode($e),
                'created_by' => username()
            ];
            dd($e);
            // ExecptionLog::create($log);
        }
    }
    public function generateRandomString($length = 15)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
    public function imprestShow()
    {
        $imprestPayments = DB::table("agencies as a")
            ->select('a.agency_id', "a.agency_name")
            ->whereNotNull("account_no")
            ->get();
        // dd($imprestPayments);
        return view('Directors.imprest_pay', compact('imprestPayments'));

    }
    public function imprestPay(Request $request)
    {
        $this->validate($request, [
            'agency_id.*' => 'required',
            'amount.*' => 'required',
            'month.*' => 'required',

        ]);

        $agencyIds = $request->input('agency_id');
        $amounts = $request->input('amount');
        $months = $request->input('month');

        foreach ($agencyIds as $index => $agencyId) {
            $currentAgencyId = $agencyId;
            $currentAmount = $amounts[$index];
            $currentMonth = $months[$index];
        }




        //    dd($request->all());
        // Save the record
        // $imprestrequest->save();

        // Redirect back with success message
        return redirect()->route('Director.payimprest', compact('imprestrequest'))->with('success', 'Imprest  Submitted successfully');
    }


}