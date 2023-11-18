<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\BudgetItem;
use App\Models\Setup\BudgetItemCategory;
use App\Models\Setup\Agency;
use App\Models\Setup\AgencyType;

class BudgetItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $budget_items = BudgetItem::with(['budget_category','agency'])->where(['service_id'=>serviceId(), 'deleted' => 0,'created_by'=>username()])->get();

            return view('Setup.Budget.budget_items',compact('budget_items'));
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
       try{
            $budget_item_categories = BudgetItemCategory::where(['service_id'=>serviceId(),'deleted' => 0])->orderBy('budget_item_category')->get();
            
            $agencies = Agency::where(['service_id'=>serviceId(),'deleted' => 0])->orderBy('agency_name')->get();
            $agency_types = AgencyType::where(['deleted' => 0])->orderBy('agency_type')->get();

            return view('Setup.Budget.add_budget_item',compact('budget_item_categories','agencies','agency_types'));
        }
        catch(\Exception $e){
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
                //  dd($request->all());
                $this->validate($request, [
                    'agency_id' => 'required|integer',
                    'budget_item.*' => 'required|string',
                    'budget_item_category_id.*' => 'required|integer',
                ]); 

                    try{
                        $agency_id = $request->agency_id;
                        $budget_item = $request->budget_item;
                        $budget_item_category_id = $request->budget_item_category_id;
                        $reference_no = $request->reference_no;
                        $budget_item_description = $request->budget_item_description;

                        $budgetItemArray = array();
                        $i = 0;
                        foreach($budget_item as $item){
                            $budgetItemArray[] = [
                                'agency_id' => $agency_id,
                                'budget_item' => $item,
                                'budget_item_category_id' => $budget_item_category_id[$i],
                                'reference_no' => $reference_no[$i],
                                'budget_item_description' => $budget_item_description[$i],
                                'service_id' => serviceId(),
                                'created_by' => username(),
                                'uuid' => uuid(),
                                'enabled' => 1,
                                'deleted' => 0,
                            ];
                            $i++;
                        }
                     $budget_item = BudgetItem::insert($budgetItemArray);
                    
                     return redirect()->route('budget_items.index')->with('success', "Budget Item Created Successfully!");
                 }
                catch(\Exception $e){
                    // dd($e);      
                    //$mssg = $e->getMessage();
                   
                    return back()->with('error', "Something went wrong... unable to create this Budget Item");
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
        // dd($id);
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
