<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Agency;
use App\Month;

use DB;

class BudgetImplementationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     try{
           
            $budget_plans = BudgetPlan::with(['agency'])->where(['service_id'=>serviceId(), 'deleted' => 0,'enabled' => 0])->get();

            return view('Setup.Budget.budget_plans',compact('budget_plans'));
        }
        catch(\Exception $e){
           // dd($e);
            return back()->with('error','Something went wrong... Try again or contact system administrator');
        }    
   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             try{
            $agencies = Agency::where(['service_id'=>serviceId(),'deleted' => 0])->orderBy('agency_name')->get();
            $months = Month::orderBy('month')->get();
           

            return view('Setup.Budget.budget_implementation_request',compact('agencies','months'));
        }
        catch(\Exception $e){
            //dd($e);
            return back()->with('error','Something went wrong... Try again or contact system administrator');
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
        //
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
}
