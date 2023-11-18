<?php

namespace App\Http\Controllers\Approval;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Approval\ApprovalRequest;
use App\Models\Approval\ApprovalUsers;
use App\Models\Setup\Budget;

use DB;

class ApproveBudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $budget_approvals = ApprovalRequest::with(['approval_level','first_budget','budgets'])->where(['service_id'=>serviceId(),'approved' => 0, 'approval_name_id'=>1,'enabled'=>1,'deleted'=>0,'user_id'=>userId()])->get();
            $countLevels = ApprovalUsers::where(['service_id'=>serviceId(), 'approval_name_id'=>1])->count();
                // dd($countLevels);
            return view('Approval.approve_budgets',compact('budget_approvals','countLevels'));
        }
        catch(\Exception $e){
           dd($e);
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

            $budget_approvals = ApprovalRequest::with(['approval_level','first_budget','budgets'])->where(['service_id'=>serviceId(),'approved' => 1, 'approval_name_id'=>1,'enabled'=>1,'deleted'=>0,/*'user_id'=>userId()*/])->get();
            
            return view('Approval.approved_budgets',compact('budget_approvals'));
        }
        catch(\Exception $e){
           dd($e);
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
    //    dd($request->all());

            try{
                
                $res =  DB::transaction(function() use ($request) {
                    //$payment_approval_user_id = $request->payment_approval_user_id;     
                    $approved = $request->approved;
                    $updated_by = username();
                    $count = array();
                    for($i=0;$i<count($approved);$i++){ 

                                  $id = filter_var($approved[$i] , FILTER_SANITIZE_NUMBER_INT) ;
                               // $level_id = Input::get("approval_level_id".$id);
                               // $reference_no =  Input::get("reference_no".$id);
                        
                                $payment_approval = ApprovalRequest::findOrFail($id);
                               

                                $payment_approval->approved = 1;
                                $payment_approval->updated_by = $updated_by;  

                                $level_id = $payment_approval->approval_level_id;
                                $reference_no =  $payment_approval->reference_no;  
                                // dd($id,$payment_approval,$request->countLevels,$level_id);
                                //if there are more people that can carry out the approval
                             if( $request->countLevels != $level_id ){
                                    $next_approver_info = ApprovalRequest::where('approval_level_id','>',$level_id)->where('reference_no',$reference_no)->first();
                                    if($next_approver_info){
                                        $email = $next_approver_info->email;
                                    
                                        $next_approver_info->can_approve = 1;
                                        $next_approver_info->save();
                                    }
                                    
                                }
                                elseif( $request->countLevels == $level_id ){
                                    //enable the budget if this user is the last user on the authorization 
                                    $budget_res = Budget::whereIn('budget_reference_no',array($reference_no))->update(['enabled' => 1, 'deleted' => 0, 'updated_by' => $updated_by]);
               
                                }

                                $payment_approval->save();
                            
                                $count[] = $i;

                        } 
                            return compact('count');
            
                });

                $count = $res ? $res['count'] : array();

                return redirect()->back()->with('success', count($count)." Record(s) Approved Successfully.");

            }
            catch (\Exception $e){ 
                 dd($e);
                return redirect()->back()->with('error', "Error. Unable to Approve Record(s).");
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
        dd(4);
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
