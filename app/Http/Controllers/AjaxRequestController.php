<?php

namespace App\Http\Controllers;

use App\Models\Setup\Budget;

use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    ///////////////// FOR ALL AJAX CALLS ///////////////////

    /////////////// returns budgets per agency //////////////////

    public function getBudgetsPerAgency(Request $request)
    {

        try {
            // if($request->ajax()){

            $agency_name = $request->agency_name;
            // dd($agency_name);
            $budgets = Budget::where(['service_id' => serviceId(), 'agency_name' => $agency_name,'budget_reference_no'=>$request->budget_reference_no])->get();
            // \Log::info(username());

            return response()->json(['status' => true, 'mssg' => "success", 'budgets' => $budgets]);
            // }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'mssg' => "Something went wrong", "budgets" => ""]);
        }

    }

    ///////////////// end budgets call per agency ///////////////// /////////////// returns budgets per agency //////////////////

    public function getBudgetYear(Request $request)
    {

        try {
            // if($request->ajax()){

            $agency_name = $request->agency_name;
            // dd($agency_name);
            $budgets = Budget::where(['service_id' => serviceId(), 'agency_name' => $agency_name])->get(['budget_name','budget_reference_no']);
            // \Log::info(username());

            return response()->json(['status' => true, 'mssg' => "success", 'budgets' => $budgets]);
            // }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'mssg' => "Something went wrong", "budgets" => ""]);
        }

    }

    ///////////////// end budgets call per agency /////////////////




}
