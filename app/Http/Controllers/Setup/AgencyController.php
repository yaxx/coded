<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Agency;
use App\Models\Setup\AgencyType;
use App\Models\TenderUploads;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $groupId = groupId();

            $agencies = Agency::with(['agency_type'])->where(['service_id' => serviceId(), 'deleted' => 0])->get();

            return view('Setup.Agency.agencies', compact('agencies', 'groupId'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $agency_types = AgencyType::where(['deleted' => 0])->orderBy('agency_type')->get();

            return view('Setup.Agency.add_agency', compact('agency_types'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong... Try again or contact system administrator');
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
            'agency_name.*' => 'required|string',
            'bank_name.*' => 'required|string',
            'account_name.*' => 'required|string',
            'agency_type_id.*' => 'required|integer',
            'account_no.*' => 'required|integer',
        ]);

        try {

            $agency_name = $request->agency_name;
            $account_no = $request->account_no;
            $account_name = $request->account_name;
            $bank_name = $request->bank_name;
            $agency_type_id = $request->agency_type_id;

            if ($request->ajax()) {
                $agencyArray = [
                    'agency_name' => $agency_name,
                    'agency_type_id' => $agency_type_id,
                    'uuid' => uuid(),
                    'bank_name' => $bank_name(),
                    'account_no' => $account_no(),
                    'account_name' => $account_name(),
                    'service_id' => serviceId(),
                    'created_by' => username(),
                    'enabled' => 1,
                    'deleted' => 0,
                ];
                $agency = Agency::create($agencyArray);
                $agency = $agency->fresh();
                return response()->json(['status' => true, 'mssg' => 'success', 'data' => $agency]);
            } else {
                $agencyArray = array();
                $errors = [];
                $n = $i = 0;
                if (is_array($agency_name)) {
                    foreach ($agency_name as $name) {
                        // $a_type_id = $agency_type_id[$i];
                        $dup = Agency::where(['service_id' => serviceId(), 'agency_name' => $name])->first();
                        if(!$dup){
                            $agencyArray[] = [
                                'agency_name' => $name,
                                // 'agency_type_id' => $a_type_id,
                                'bank_name' => $bank_name,
                                'account_no' => $account_no,
                                'account_name' => is_array($account_name) ?$account_name[0] : $account_name,
                                'uuid' => uuid(),
                                'service_id' => serviceId(),
                                'created_by' => username(),
                                'enabled' => 1,
                                'deleted' => 0,
                            ];
                            $n++;
                        }else{
                            $errors[] = $name;
                        }
                        
                        $i++;
                    }
                }

                // dd($agencyArray);
                $agency = Agency::insert($agencyArray);
            }
            $msg = '';
            if ($errors) {
                foreach($errors as $error){
                    $msg .= $error. ' not inserted because it already exists. <br>';
                }
            }else{
                $msg = $n.' agency Created Successfully!';
            }
            return redirect()->route('agencies.index')->with('success', $msg);
        } catch (\Exception $e) {
            dd($e);        
            $mssg = $e->getMessage();
            if ($request->ajax()) {
                return response()->json(['status' => false, 'mssg' => 'Something went wrong... Try again or contact system administrator. ' . $mssg, 'mssg_type' => 'error', 'mssg_title' => 'Unable to add agency']);
            }

            return back()->with('error', "Something went wrong... unable to create this Agency");
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

    public function upload(){
        $tender = TenderUploads::all();
        //   dd($fundrequest); 

        return view('Ministry.tender_board_upload', compact('tender'));
    }
}
 

    // public function storerequest(Request $request)
    // {
    //     // Validate the form data
    //     $this->validate($request, [
    //         'minute_id' => 'required',
    //         'date' => 'required',
    //         'requested_amount' => 'required|numeric',
   
           
          
    //     ]);

    //     // Process the form data

    //     $fundrequest = new FundRequestModel;
    //     $fundrequest->expense_head = $request->input('expense_head');
    //     $fundrequest->description = $request->input('description');
    //     $fundrequest->requested_amount = $request->input('requested_amount');

      

    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path("fundrequest"), $filename);
    //         $fundrequest['file'] = $filename;
    //     } else {
    //         // dd("Uou are fucked");
    //     }

    //     // Save the record
    //     $fundrequest->save();

    //     // Redirect back with success message
    //     return redirect()->route('Director.request', compact('fundrequest'))->with('success', 'Fund Request Submitted successfully');
    // }