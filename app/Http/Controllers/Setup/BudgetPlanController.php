<?php

namespace App\Http\Controllers\Setup;

use App\Month;
use App\Models\Setup\Agency;
use App\Models\Setup\Budget;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Setup\BudgetPlan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Setup\BudgetPlanItem;

class BudgetPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $budget_plans = BudgetPlan::with(['agency'])->where(['service_id' => serviceId(), 'deleted' => 0, 'enabled' => 0, 'created_by' => username()])->get();

            return view('Setup.Budget.budget_plans', compact('budget_plans'));
        } catch (\Exception $e) {
            // dd($e);
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
        // dd(auth()->user()->procurement_entity);


        try {
            if (auth()->user()["group_id"] == 12) {

                $agencies = Agency::where(['service_id' => serviceId(), 'deleted' => 0, 'agency_id' => auth()->user()->procurement_entity])->orderBy('agency_name')->get();

            } else {
                $agency_name = DB::table("agencies")->where("agency_id","=",auth()->user()->procurement_entity)->select(["agency_name"])->value("agency_name");
                $agencies = Agency::where(['service_id' => serviceId(), 'deleted' => 0, 'agency_name' =>$agency_name])->orderBy('agency_name')->get();

                // auth()->user()["procurement_entity"];// 
            }
            $months = Month::orderBy('month')->get();


            return view('Setup.Budget.add_budget_plan', compact('agencies', 'months'));
        } catch (\Exception $e) {
            dd($e);
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'agency_id' => 'required|integer',
            'budget_plan_name' => 'required|string',
            'plan_month' => 'required|string',
            'plan_year' => 'required|digits:4|integer',
            'amount_requested.*' => 'required|numeric',
        ]);

        try {
            $agency = $request->agency;

            DB::transaction(function () use ($request) {
                $amount_requested = $request->amount_requested ?: array();
                $agency_id = $request->agency_id;
                $reference_no = uniqid();
                $service_id = serviceId();
                $created_by = username();

                $total_amount = str_replace(',', '', $request->grand_total);

                $budgetPlanItemArray = array();

                $budgetPlanArray = [
                    'budget_plan_reference_no' => $reference_no,
                    'budget_plan_name' => $request->budget_plan_name,
                    'agency_id' => $agency_id,
                    'plan_year' => $request->plan_year,
                    'plan_month' => $request->plan_month,
                    'total_amount' => $total_amount,
                    'total_count' => count($amount_requested),
                    'prev_total_amount' => $total_amount,
                    'service_id' => $service_id,
                    'created_by' => $created_by,
                    'uuid' => uuid(),
                    'enabled' => 0,
                    'deleted' => 0,
                ];

                $budget_plan = BudgetPlan::create($budgetPlanArray);
                $i = 0;
                for ($j = 0; $j < count($amount_requested); $j++) {
                    $ref = $request->budget_id[$j];

                    if ($amount_requested[$j] > 0) {
                        $budget = Budget::where(['budget_id' => $ref])->first(['budget_id', 'total_amount']);

                        $amount = $budget->total_amount;
                        $budget->total_amount = $amount - $amount_requested[$j];
                        $budget->save();
                        //    dd($s,$budget);
                    }

                    $budgetPlanItemArray[] = [
                        'budget_reference_no' => $request->budget_reference_no[$j],
                        'budget_plan_reference_no' => $reference_no,
                        'budget_plan_item_description' => $request->budget_plan_item_description[$j],
                        'agency_id' => $agency_id,
                        'service_id' => $service_id,
                        'created_by' => $created_by,
                        'uuid' => uuid(),
                        'enabled' => 0,
                        'deleted' => 0,
                        'budget_id' => $request->budget_id[$j],
                        'amount' => $amount_requested[$j],
                    ];


                }
                // foreach($amount_requested as $amount){

                //     $budgetPlanItemArray[] = [
                //         'budget_reference_no' => $request->budget_reference_no[$i],
                //         'budget_plan_reference_no' => $reference_no,
                //         'budget_plan_item_description' => $request->budget_plan_item_description[$i],
                //         'agency_id' => $agency_id,
                //         'service_id' => $service_id,
                //         'created_by' => $created_by,
                //         'uuid' => uuid(),
                //         'enabled' => 0,
                //         'deleted' => 0,
                //     ];   

                //     $i++;
                // }

                $budget_plan_items = BudgetPlanItem::insert($budgetPlanItemArray);

            });



            return redirect()->route('budget_plan.index')->with('success', "Budget Plan Created Successfully for <strong>" . $agency . "</strong>");

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            // $mssg = $e->getMessage();
            return back()->with('error', "Something went wrong... unable to create Budget Plan");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function Enableplan($budget_plan_id = null)
    {
        // dd($plan_id);
        if ($budget_plan_id > 0) {
            $budget_plan = BudgetPlan::where('budget_plan_id', $budget_plan_id)->update(['enabled' => '1']);
            // dd($result);
            if ($budget_plan) {
                return redirect()->back()->with('success', 'budget plan enabled successfully');
            }
            return redirect()->back()->with('error', 'failed to enable plan ');

        }
        return redirect()->back()->with('warning', 'budget not found ');
    }
}
