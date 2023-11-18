<?php

namespace App\Http\Controllers\Setup;

use App\Models\Setup\Agency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Setup\Role;
use App\Models\Setup\RoleUser;
use App\Models\Setup\Mda;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $users = User::where('service_id', serviceId())->where('username', '<>', 'administrator')->orderBy('surname')->get();

    return view('Setup.User.view_user', compact('users'));


  }
  // function groupId()
// {
// 	// return auth()->user() ? auth()->user()->group_id : "";
// }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::orderBy('name')->get();
    // dd($roles->all());
    $mdas = Agency::orderBy('agency_id')->get();
    return view('Setup.User.add_new_user', compact('roles', 'mdas'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //dd($request->all());
    $this->validate($request, [
      'username' => 'required|min:3|unique:users,username',
      'surname' => 'required|string',
      'firstname' => 'required|string',
      'email' => 'required|string|email|unique:users,email',
      'user_phone' => 'nullable|string|max:11',
      'password' => 'required|string|min:7|confirmed',
      'password_confirmation' => 'required|min:7',
      'procurement_entity' => 'string',
      'group_id' => 'string',

      //'role_id' => 'required'
    
    ]);
    $uuid = date("Ymdhis");

    try {
      $request['password'] = bcrypt($request['password']);
      $request['uuid'] = $uuid;
      $request['service_code'] = serviceCode();

      $allRecords = $request->all();
      // dd($allRecords);

      $users = User::create($allRecords);
      // if (!empty($_POST['CheckBoxList2'])) {

        // foreach ($_POST['CheckBoxList2'] as $selected) {
         // $iduser = User::where('username', $allRecords["username"])->value('id');
          // $RoleUser = RoleUser::create(['role_id' => $selected, 'user_id' => $iduser, 'created_by' => username(), 'service_id' => serviceId()]);
        // }
      
      return redirect()->route('users.index')->with('success', "The user was successfully created.");
    } 
    catch (Exception $exception) {
      // dd($exception);
      $error_code = $exception->errorInfo[1];

      return redirect()->route('users.index')->with('error', "Error. Try a new user.");

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

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::where('id', $id)->where('service_id', serviceId())->first();
    if ($user) {
      $user_roles = RoleUser::where('service_id', serviceId())->where('user_id', $id)->pluck('role_id');

      $roles = Role::orderBy('name')->get();
      return view('Setup.User.edit_user', compact('user', 'roles', 'id', 'user_roles'));
    } else {
      return redirect()->route('users.index')->with('error', "Error!... Invalid ID");
    }
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
    $this->validate($request, [
      'surname' => 'required|string',
      'firstname' => 'required|string',
      'email' => 'required|string|email',


    ]);

    try {

      $updated_by = $request->updated_by;

      $user_update = User::find($id);
      $user_update->surname = $request->surname;
      $user_update->user_phone = $request->user_phone;
      $user_update->email = $request->email;
      $user_update->middlename = $request->middlename;
      $user_update->firstname = $request->firstname;
      $user_update->updated_by = $request->created_by;
      $user_update->save();
      return redirect()->route('users.index')->with('success', "The user was successfully Edited.");
    } catch (Exception $exception) {
      // dd($exception);
      $error_code = $exception->errorInfo[1];

      return redirect()->route('users.index')->with('error', "Error. Try a new user.");

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
  public function showmda(){
    $mdas = User::where('service_id', serviceId())
    ->where('username', '<>', 'administrator')
    ->whereNotNull('bank_name')
    ->orderBy('surname')
    ->get();

    return view('Ministry.mda_bankdetails', compact('mdas'));
  }
}