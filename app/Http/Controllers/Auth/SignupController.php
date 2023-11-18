<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Approval\ClientApproval;

class SignupController extends Controller
{
    public function signup()
    {   

        return view('auth/signup' , compact('client'));

     
     
    }
public function create(Request $request){
  
        $request->validate([
            
            'service_name' => 'required',
            'service_code' => 'required',
            'country_code' => 'required',
            'state_code' => 'required',
            'client_contact_person' => 'required',
            'client_email' => 'required|email',
            'client_phone' => 'required',
            // 'service_logo_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

      try{
        // dd($request);
        $client = ClientApproval::create([
            'service_name' => $request->input('service_name'),
            'service_code' => $request->input('service_code'),
            'country_code' => $request->input('country_code'),
            'state_code' => $request->input('state_code'),
            'client_contact_person' => $request->input('client_contact_person'),
            'client_email' => $request->input('client_email'),
            'client_phone' => $request->input('client_phone'),
            // Add other attributes as needed
        ]);
        
        return redirect()->back()->with(['client' => $client, 'success' => 'Form submitted successfully!']);


        
      }catch (\Exception $e) {
        // dd($e);

    }
   

     
    }
       
}







