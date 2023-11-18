<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login($service_code = "")
    {
        session(['initial_username' => ""]);
        session(['initial_service_id' => ""]);
        session(['initial_password' => ""]);
        session(['client_type_id' => ""]);
        session(['client_name' => ""]);
        session(['client_city' => ""]);
        session(['client_country' => ""]);
        session(['client_address' => ""]);
        session(['photo_url' => ""]);
        session(['service_logo_url' => ""]);

        return view('auth.login', compact('service_code'));
    }

    public function store()
    {
        $username = request('username');
        $password = request('password');
        $remember_me = request('remember_me') ? true : false;

        /*              $myUser = User::where(function($query) use($username){
                                  $query->where('username', $username)->orwhere('email',$username);
                          })->where('password','=',DB::raw('pwd("'.$password.'")'))->first();

                      //if myUser is not null, that means the user has not change his password from the defualt
                          if($myUser){
                                 if($myUser->first_use == 1){                           
                                        session(['initial_username' => $myUser->username ]);
                                        session(['initial_service_id' => $myUser->service_id]);
                                        session(['initial_password' => $password ]);
        
                                        return redirect()->route('change_initial_password.index');
                                    }                      
                          }
           */
        // attempt login for the user
        if (auth()->attempt((['username' => $username, 'password' => $password, 'inactive' => 0])) || auth()->attempt((['email' => $username, 'password' => $password, 'inactive' => 0]))) {
            // dd(auth()->user()->id);
            $roles = DB::table('role_user')->where("user_id",auth()->user()->id)->select(["role_id",DB::raw("(select name from roles as r where r.id = role_id limit 1) as name")])->get()->toArray();
            // dd($roles);
            // dd($roles);
            @session(["roles"=>$roles]);
            if (serviceCode() <> "SETUP" && username() <> "administrator") {
                $client_info = DB::table('client_services')->where(['service_id' => serviceId(), 'service_status' => 1])->first();
                if ($client_info) {
                    @session(['client_type_id' => $client_info->client_type_id]);
                    @session(['client_name' => $client_info->client]);
                    @session(['client_city' => $client_info->city]);
                    @session(['client_country' => $client_info->country]);
                    @session(['client_address' => $client_info->client_address]);
                    // @session(['is_procurement_officer' => $client_info->is_procurement_officer]);
                    // sets the service logo
                    @set_service_logo_url($client_info->service_logo_url);

                    return redirect()->intended('home');
                    // return redirect()->route('home');  
                } else {
                    $mssg = 'Sorry ' . name() . '! your service is currently not active.';
                    return $this->logout($mssg);
                }
            }

            return redirect()->intended('home');



        }


        // redirect back to the login page 
        return back()->withErrors([
            'message' => 'Login failed. Username or Password is Incorrect!'
        ]);

    }


    public function destory($id)
    {
        //  
    }

    public function logout($mssg = "")
    {
        $service_code = serviceCode();
        auth()->logout();
        if ($mssg) {
            return redirect('/login/' . $service_code)->with('error', $mssg);
        } else {
            return redirect('/login/' . $service_code);
        }
    }



}