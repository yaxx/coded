<?php

namespace App\Http\Controllers\procurement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contractor\ContractorSetup;

class ContractorController extends Controller
{
    public function index()
    {

        return view('contractor.contractor_dashboard');


    }
    public function setup()
    {

         return view('contractor.company_setup');

    }
    public function companysetup(Request $request)
    {

        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:contractors,email',
            'tin_number' => 'required|digits:10|unique:contractors,tin_number',
            'phone' => 'required|digits:11|unique:contractors,phone',
            'sector' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'staff_designation' => 'required',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required',
            'country' => 'required',

        ]);
        // dd("I have been fucked here 123456789");
        try {




            $setup = ContractorSetup::create($validatedData);
            // dd($goodsplan);

            return redirect()->route('procurement.viewplan', ['contractor_id' => $setup->contractor_id]);

        } catch (\Exception $e) {
            dd($e->getMessage());

        }
        // return response()->json(['message' => 'Goods record created successfully']);


        // return view('Procurement.goods_plan');

    }
    public function upload()
    {

        return view('contractor.upload');

    }


    public function uploadcac(Request $request){
        
        $validatedData = $request->validate([
            'cac_certificate' 
           
        ]);

       
        try {

            // dd("efnenfwenfef");
           
            if ($request->hasFile('cac_certificate')) {
                $file = $request->file('cac_certificate');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path("ContractorDocuments"), $filename);
                $validatedData['cac_certificate'] = $filename;
            }else{
                // dd("Uou are fucked");
            }

            $cac = ContractorSetup::update ($validatedData);
            dd($cac);

            return view('contractor.upload', ['contractor_id' => $cac->contractor_id]);

        } catch (\Exception $e) {
            dd($e->getMessage());

        }
    }
    
}