<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Approval\ApprovalUsers;
use App\Models\Approval\ApprovalName;
use App\Models\Approval\ApprovalLevel;
use App\User;

use DB;

class ApprovalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $approval_users = ApprovalUsers::where('service_id',serviceId())->orderBy('approval_name_id')->get();

            return view('Setup.Approval.approval_users',compact('approval_users'));
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
                $approval_levels = ApprovalLevel::all();

                $approval_names = ApprovalName::orderBy('approval_name')->get();

                $emp_users = User::where('service_id',serviceId())->where('username','<>','administrator')->orderBy('name')->get();

                return view('Setup.Approval.add_approval_user',compact('approval_levels','approval_names','emp_users'));
         }
        catch(\Exception $e){
            // dd($e);
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
         // dd($request->all());
          $this->validate($request, [
            'approval_name_id.*' => 'required|integer',
            'approval_level_id.*' => 'required|integer',
            'user_id.*' => 'required|integer',
         ]); 

            try{
                   $approval_name_id = $request->approval_name_id;
                   $approval_level_id = $request->approval_level_id;
                   $user_id = $request->user_id;
                   $approvalUserArray = array();
                   $i = 0;

                   foreach($approval_name_id as $a_name_id){
                        $approvalUserArray[] = [
                            'approval_name_id' => $a_name_id,
                            'approval_level_id' => $approval_level_id[$i],
                            'user_id' => $user_id[$i],
                            'service_id' => serviceId(),
                            'created_by' => username(),
                            'uuid' => uuid(),
                            'enabled' => 1,
                            'deleted' => 0
                        ];

                        $i++;
                   } 
                   $budget_item_category = ApprovalUsers::insert($approvalUserArray);
              
              return redirect()->route('approval_users.index')->with('success', count($approvalUserArray)." Approval User(s) Created Successfully!");
       
         }
        catch(\Exception $e){
               dd($e);      
               $mssg = $e->getMessage();
               return back()->with('error', "Something went wrong... unable to create approval user");
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
