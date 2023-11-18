<?php



namespace App\Http\Controllers\Registration;
use App\Models\Setup\State;
use App\Models\Setup\City;
use App\Models\Setup\LGA;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Registration\IndividualRegistration;



class IndividualRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         try{
            $individual = IndividualRegistration::where(['service_id'=>serviceId(),'revenue_payer_type_id'=>'Individual'])->get();

            return view('Registration.view_individual',compact('individual'));
        }
        catch(\Exception $e){
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
       $lgas = LGA::orderby('lga')->get();
        $cities = City::orderby('city')->get();
        $states = State::orderby('name')->get();
        return view('Registration.add_new_individual', compact('lgas', 'cities', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


 try{
 $name = IndividualRegistration::create($request->all());

     return redirect()->route('individual_registration.index')->with('success', "Individual was successfully created.");
  }
  catch (Exception $exception){
   // dd($exception->errorInfo[2]);
    $error_code =  $exception->errorInfo[1];
    if($error_code == 1062){
          return redirect()->back()->with('error', "Details already exist. Try a new User.");
      }
          return redirect()->back()->with('error', "Error. Something went wrong... Try again or contact system administrator");

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
        $individual = IndividualRegistration::where('taxpayer_id',$id)->where('service_id',serviceId())->first();
        if ($individual) {
              $lgas = LGA::orderby('lga')->get();
        $cities = City::orderby('city')->get();
        $states = State::orderby('name')->get();
            return view('Registration.edit_individual',compact('individual','id','lgas','cities','states'));
        }
        else {
             return redirect()->route('individual_registration.index')->with('error',"Error!... Invalid ID");
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
            $individual = IndividualRegistration::find($id);
            $individual->revenue_payer_lname = $request->input('revenue_payer_lname');
            $individual->revenue_payer_fname = $request->input('revenue_payer_fname');
            $individual->revenue_payer_mname = $request->input('revenue_payer_mname');
            $individual->bvn = $request->input('bvn');
            $individual->contactaddress =$request->input('contactaddress');
            $individual->economic_activity =$request->input('economic_activity');
            $individual->mobile_number= $request->input('mobile_number');
            $individual->state_id =$request->input('state_id');
            $individual->lga_id= $request->input('lga');
            $individual->city_id =$request->input('city_id');
               try{

            $individual->service_id = serviceId();
            $individual->update();
            return redirect()->route('individual_registration.index')->with('success', "The individual registration was successfully updated.");
        }
        catch (Exception $exception){
            $error_code =  $exception->errorInfo[1];
            if($error_code == 1062){
                return redirect()->route('individual_registration.edit',['id' => $id])->with('error', "The Record already exist. Try a new registration.");
            }
            return redirect()->route('individual_registration.edit',['id' => $id])->with('error', "Error. Try a new registration.");
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
}
