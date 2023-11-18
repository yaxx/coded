<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\BudgetItemCategory;

class BudgetItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $budget_item_categories = BudgetItemCategory::where(['service_id'=>serviceId(), 'deleted' => 0,'created_by'=>username()])->get();

            return view('Setup.Budget.budget_item_categories', compact('budget_item_categories') );
        }
        catch(\Exception $e){
            //dd($e);
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
        //  dd($request->all());
         $this->validate($request, [
            'budget_item_category' => 'required|string',
         ]); 

            try{
                   $request['service_id'] = serviceId();
                   $request['created_by'] = username();
                   $request['uuid'] = uuid();
                   $request['enabled'] = 1;
                   $request['deleted'] = 0;

               $budget_item_category = BudgetItemCategory::create($request->all());
              

               if($request->ajax()){
                   $budget_item_category = $budget_item_category->fresh();
                   return response()->json(['status'=>true, 'mssg'=>'success', 'data'=>$budget_item_category]);   
               }

              return redirect()->route('budget_item_categories.index')->with('success', "Budget Item Category Created Successfully!");
        }
        catch(\Exception $e){
              // dd($e);
              //$error_mssg =  $e->getMessage();        
               $mssg = $e->getMessage();
               
              if($request->ajax()){
                   return response()->json(['status'=>false, 'mssg'=>'Something went wrong... Try again or contact system administrator.', 'mssg_type'=>'error', 'mssg_title'=>'Unable to add budget item category']);   
               }
               return back()->with('error', "Something went wrong... unable to create this Budget Item Category");
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
}
