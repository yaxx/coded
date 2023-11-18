<?php

namespace App\Http\Controllers\procurement;

use App\Models\Setup\Agency;
use App\Models\Setup\Mda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Procurement\GoodsPlan;
use Illuminate\Support\Facades\DB;

class ProcurementOfficerController extends Controller
{
    public function index()
    {

        return view('Procurement.index');

    }
    public function showgoods(Request $request)
    {
        //  dd($plan_id) ; 
        // dd($request->all()); 
        $mdas = Mda::orderBy('name')->get();
        $goodsplan = GoodsPlan::paginate();
        // $goodsplan = null;
        return view('Procurement.view_plan', compact('goodsplan', 'mdas'));

    }
    public function showgoodsform()
    {
        try {
            // dd(auth()->user()["mdas"]);
            // where->auth()-user()["mdas"];

            $mdas = Agency::orderBy('agency_id')->get();
            // Create an empty instance
            $budget_plan_reference_no = DB::table("budgets_plans as b")
                ->selectRaw("budget_plan_reference_no as id,CONCAT(budget_plan_name, '-',(select agency_name from agencies as a where a.agency_id = b.agency_id LIMIT 1)) as name")->orderByDesc("plan_year")->where("enabled", 1)->where("agency_id", auth()->user()["procurement_entity"])->get(); //->dd(); //agency_name
            return view('Procurement.goods_plan', compact('mdas', 'budget_plan_reference_no'));
        } catch (\Exception $e) {
            // \log::error($e);
            dd($e);
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function creategoods(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'budget_id' => 'required',
            'budget_plan_reference_no' => 'required',
            'procurement_officer_number' => 'required',
            'project_location' => 'required',
            'project_cost' => 'required',
            'project_status' => 'required',
            'package_number' => 'required',
            'lot_number' => 'required',
            'bid_opening_date' => 'required|date_format:Y-m-d',
            'submission_of_evaluation_period' => 'required',
            'bid_closing_date' => 'required|date_format:Y-m-d',
            'certifiable_amount' => 'required',
            'contract_signature' => 'required',
            'contract_offer' => 'required',
            'mobilization' => 'required',
            'goods_arrival' => 'required',
            'final_acceptance' => 'required',
            'procurement_method' => 'required',
            'budget_available' => 'required',
            // 'bill_of_quantity' => 'required'
        ]);
        // dd("I have been fucked here 123456789");
        try {

            $validatedData['project_cost'] = str_replace(',', '', $validatedData['project_cost']);
            $validatedData['certifiable_amount'] = str_replace(',', '', $validatedData['certifiable_amount']);
            $validatedData['mobilization'] = str_replace(',', '', $validatedData['mobilization']);
            // $validatedData['budget_available'] = str_replace(',', '', $validatedData['budget_available']);
            // unset($validatedData['bill_of_quantity']);

            if ($request->hasFile('bill_of_quantity')) {
                $file = $request->file('bill_of_quantity');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path("billofquantity"), $filename);
                $validatedData['bill_of_quantity'] = $filename;
            } else {
                // dd("Uou are fucked");
            }


            $goodsplan = GoodsPlan::create($validatedData);
            // dd($goodsplan);

            return redirect()->route('procurement.viewplan', ['plan_id' => $goodsplan->plan_id]);

        } catch (\Exception $e) {
            dd($e->getMessage());

        }
        // return response()->json(['message' => 'Goods record created successfully']);


        // return view('Procurement.goods_plan');
    }

    public function editGoods($plan_id)
    {

        try {
            $mdas = Agency::orderBy('agency_id')->get();

            $goodsplan = GoodsPlan::where("plan_id", $plan_id)->select(["plan_id", "budget_id", DB::raw("(select budget_item from budgets as b where b.budget_id = procurement_plan.budget_id limit 1) as project_title"), DB::raw("(select budget_plan_name from budgets_plans as b where b.budget_plan_reference_no = procurement_plan.budget_plan_reference_no limit 1) as budget_year"), "project_cost", "approval_status", "created_at", "project_location", "procurement_officer_number", "project_status", "package_number", "lot_number", "bid_opening_date", "submission_of_evaluation_period", "certifiable_amount", "contract_signature", "contract_offer", "procurement_method", "final_acceptance", "goods_arrival", "mobilization", "bid_closing_date", "budget_available", "bill_of_quantity"])->get();


            $budget_plan_reference_no = DB::table("budgets_plans as b")
                ->selectRaw("budget_plan_reference_no as id,CONCAT(budget_plan_name, '-',(select agency_name from agencies as a where a.agency_id = b.agency_id LIMIT 1)) as name")->orderByDesc("plan_year")->where("enabled", 1)->where("agency_id", auth()->user()["procurement_entity"])->get();


            $goodsplan = GoodsPlan::findOrFail($plan_id);
            return view('Procurement.edit_goods', compact('goodsplan', 'budget_plan_reference_no'));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function updateGoods(Request $request, $plan_id)
    {

        $validatedData = $request->validate([
            'budget_id' => 'required',
            'budget_plan_reference_no' => 'required',
            'procurement_officer_number' => 'required',
            'project_location' => 'required',
            'project_cost' => 'required',
            'project_status' => 'required',
            'package_number' => 'required',
            'lot_number' => 'required',
            'bid_opening_date' => 'required',
            'submission_of_evaluation_period' => 'required',
            'bid_closing_date' => 'required',
            'certifiable_amount' => 'required',
            'contract_signature' => 'required',
            'contract_offer' => 'required',
            'mobilization' => 'required',
            'goods_arrival' => 'required',
            // 'final_acceptance' => '',
            // 'bill_of_quantity' => '',
            'budget_available' => 'required',
            'procurement_method' => 'required'

        ]);


        try {
            $goodsplan = GoodsPlan::findOrFail($plan_id);
            $goodsplan->update($validatedData);
            $routeParameters = ['plan_id' => $plan_id];
            $url = route('procurement.viewplan', $routeParameters);

            return redirect()->route('procurement.viewplan', $routeParameters)
                ->with(compact('goodsplan'))
                ->with('success', 'Goods plan updated successfully.');
        } catch (\Exception $e) {
            dd($e);
            \Log::error($e);
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function deleteGoods($plan_id = null)
    {
        // dd($plan_id);
        if ($plan_id > 0) {
            try {
                $goodsplan = GoodsPlan::findOrFail($plan_id);

                $goodsplan->delete();
                return redirect()->route('Procurement.viewplan')->with('success', 'Goods plan deleted successfully.');
            } catch (\Exception $e) {
                \Log::error($e);
                return redirect()->back()->with('error', 'An error occurred.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid plan_id.');
        }
    }

    public function createworks()
    {


        return view('Procurement.works_plan');
    }
    public function viewplan(Request $requestd)
    // 
    {
        try {
            $goodsplan = GoodsPlan::from('procurement_plan as p')
                ->join('budget_plan_items as i', 'i.budget_plan_item_id', 'p.budget_id')
                ->join('budgets_plans as b', 'b.budget_plan_reference_no', 'p.budget_plan_reference_no')
                ->select('p.plan_id', 'p.budget_id', 'i.budget_plan_item_description as project_title', "p.project_cost", "p.approval_status", "p.created_at")
                ->get(); //->dd();
            // $goodsplan = GoodsPlan::select(['plan_id','budget_id',
            //                 DB::raw('(select budget_plan_item_description from budget_plan_items as p where p.budget_plan_item_id = procurement_plan.budget_id limit 1) as project_title') , 
            //                 DB::raw("(select budget_plan_name from budgets_plans as b where b.budget_plan_reference_no = procurement_plan.budget_plan_reference_no limit 1) as budget_year") , 
            //                 "project_cost", "approval_status", "created_at"])->get();//->dd();

            // $goodsplan = GoodsPlan::select(['plan_id','budget_id',
            //                 DB::raw('(select budget_plan_item_description from budget_plan_items as p where p.budget_plan_item_id = procurement_plan.budget_id limit 1) as project_title') , 
            //                 DB::raw("(select budget_plan_name from budgets_plans as b where b.budget_plan_reference_no = procurement_plan.budget_plan_reference_no limit 1) as budget_year") , 
            //                 "project_cost", "approval_status", "created_at"])->dd();
            // $goodsplan = GoodsPlan::select(["plan_id", "budget_id", DB::raw("(select budget_item from budgets as b where b.budget_id = procurement_plan.budget_id limit 1) as project_title"), DB::raw("(select budget_plan_name from budgets_plans as b where b.budget_plan_reference_no = procurement_plan.budget_plan_reference_no limit 1) as budget_year"), "project_cost", "approval_status", "created_at"])->get();
            // dd($goodsplan);
            //  $title = DB::table("budgets_plans as b")->selectRaw("budget_plan_reference_no as id,CONCAT(budget_plan_name, '-',(select agency_name from agencies as a where a.agency_id = b.agency_id LIMIT 1)) as name")->orderByDesc("plan_year")->where("enabled", 1)->get(); //agency_name

            return view('Procurement.view_plan', compact('goodsplan'));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with('error', 'Something Went wrong... error logged');
        }
    }


    public function createservice()
    {


        return view('Procurement.service_plan');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plan_id' => 'required',
            'budget_id' => 'required',
            'budget_plan_reference_no' => 'required',
            'procurement_officer_number' => 'required',
            'project_location' => 'required',
            'project_cost' => 'required',
            'project_status' => 'required',
            'package_number' => 'required',
            'lot_number' => 'required',
            'bid_opening' => 'required',
            'bid_invitation_date' => 'required',
            'bid_opening_date' => 'required',
            'submission_evaluation_period' => 'required',
            'bid_closing_date' => 'required',
            'certiable_amount' => 'required',
            'contract_signature' => 'required',
            'contract_offer' => 'required',
            'mobilization' => 'required',
            'arrival_goods' => 'required',
            'final_aceptance' => 'required',
            'bill_of_quantity' => 'required|mimes:pdf|max:20000',
            'budget_available' => 'required',
            'procurement_method' => 'required'


        ]);

        GoodsPlan::create($validatedData);

        return redirect()->route('procurement.index')->with('success', 'Project created successfully.');
    }

    public function uploadtender()
    {

        return view('Procurement.upload_tender');
    }

    public function uploads()
    {

        return view('Procurement.upload');
    }
    public function displayplan($plan_id = null)
    {

        if ($plan_id > 0) {


            $views = GoodsPlan::where("plan_id", $plan_id)
                ->select([
                    "plan_id",
                    "budget_id",
                    DB::raw("(select budget_item from budgets as b where b.budget_id = procurement_plan.budget_id limit 1) as project_title"),
                    DB::raw("(select budget_plan_name from budgets_plans as b where b.budget_plan_reference_no = procurement_plan.budget_plan_reference_no limit 1) as budget_year"),
                    "project_cost",
                    "approval_status",
                    "created_at",
                    "project_location",
                    "procurement_officer_number",
                    "project_status",
                    "package_number",
                    "lot_number",
                    "bid_opening_date",
                    "submission_of_evaluation_period",
                    "certifiable_amount",
                    "contract_signature",
                    "contract_offer",
                    "procurement_method",
                    "final_acceptance",
                    "goods_arrival",
                    "mobilization",
                    "bid_closing_date",
                    "budget_available",
                    "bill_of_quantity"
                ])->first();

            // dd($view->project_title);

            // $goodsplan = GoodsPlan::get();
            return view('Procurement.display', compact('views'));


        }
    }


}