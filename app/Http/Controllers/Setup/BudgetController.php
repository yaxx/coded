<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BudgetItemExport;
use App\Imports\BudgetImport;
use App\Models\Setup\BudgetItem;
use App\Models\Setup\Budget;
use App\Models\Approval\ApprovalUsers;
use DB;
use App\Models\Approval\ApprovalRequest;
use Illuminate\Support\Facades\Log;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        try {
            // for budget approval
            $checkBudgetApproval = ApprovalUsers::where(['service_id' => serviceId(), 'approval_name_id' => 1])->first();

            if (!$checkBudgetApproval) {

                $mssg = "Please contact system administrator to setup BUDGET APPROVAL USER(S)";
                error_flash($mssg);
                return back()->with('error', $mssg);
            }
            return view('Setup.Budget.upload_budget');
        } catch (\Exception $e) {
            dd($e);
            \Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'budget_name' => 'required|string|unique:budgets,budget_name',
            'budget_year' => 'required|integer',
            'upload_excel' => 'required|file',

        ]);

        try {
            //$array = Excel::toArray(new BudgetImport, request()->file('upload_excel'));
            // dd('rtyuiuyt');
            $reference_no = uniqid();
            $month = date('F');
            $year = date('Y');
            Excel::import(new BudgetImport($request->budget_name, $request->budget_year, $reference_no), request()->file('upload_excel'));
            //dd("upload was successful");
            // populate the approval users
            $budget_approval_users = ApprovalUsers::where(['service_id' => serviceId(), 'approval_name_id' => 1])->get();
            $approvalRequestArray = array();
            foreach ($budget_approval_users as $budget_approval) {
                $approvalRequestArray[] = [
                    'reference_no' => $reference_no,
                    'user_id' => $budget_approval->user_id,
                    'approval_name_id' => $budget_approval->approval_name_id,
                    'approval_level_id' => $budget_approval->approval_level_id,
                    'month' => $month,
                    'year' => $year,
                    'total_amount' => 0,
                    'total_count' => 0,
                    'can_approve' => ($budget_approval->approval_level_id == 1 ? 1 : 0),
                    'uuid' => uuid(),
                    'service_id' => serviceId(),
                    'enabled' => 1,
                    'deleted' => 0,
                    'created_by' => username(),
                ];
            }

            ApprovalRequest::insert($approvalRequestArray);

            return redirect()->route('budgets.edit', ['id' => $reference_no])->with('success', "Budget Upload was Successful.");
        } catch (\Exception $e) {
            // dd($e);
            \Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $today = date('Ymd');
            return Excel::download(new BudgetItemExport, 'budget_items_per_agency_' . $today . '.xlsx');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd('degdfd');
        try {
            $uploaded_budgets = Budget::where(['service_id' => serviceId(), 'budget_reference_no' => $id])->get();
            return view('Setup.Budget.view_uploaded_budgets', compact('uploaded_budgets'));
        } catch (\Exception $e) {
            // dd($e);
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        
        try {
            $uploaded_budgets = Budget::where(['service_id' => serviceId(),"created_by"=>username()])->get();
            return view('Setup.Budget.view_uploaded_budgets', compact('uploaded_budgets'));
        } catch (\Exception $e) {
            //dd($e);
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}



