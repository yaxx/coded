<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PaymentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
              $revenue_stream="";
            return view('Report.payment_report_search',compact('revenue_stream'));
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
        //
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


public function general_business_report( Request $request){

     // dd($request->input('ward'));

//$getbussinessname=$_GET['business_name'];

       // $business_name = $request->business_name ? $request->business_name : '%%';
        $customer_reference = $_GET['customer_reference'];
        $taxpayer_name =$_GET['taxpayer_name'];
        $payment_method =$_GET['payment_method'];
        $BankName =$_GET['BankName'];
        
        $agency =$_GET['agency'];
        $item_name =$_GET['item_name'];
        $registered_on =$_GET['assessment_date_from'];
        $registered_to = $_GET['assessment_date_to'] ? $request->registered_to: date('Y-m-d');
        $serviceids=serviceId();
    
  //dd($business_name);
        $search_result = DB::table('api_payments')
            ->select(
            'api_payments.*'
                 )
            ->when(!empty($customer_reference) , function ($query) use($customer_reference){
             return $query->where('CustReference', 'like', '%' . $customer_reference. '%');
                })

                   ->when(!empty($taxpayer_name) , function ($query) use($taxpayer_name){
             return $query->Where('CustomerName', 'like', '%' . $taxpayer_name . '%');
                })
            ->when(!empty($payment_method) , function ($query) use($payment_method){
             return $query->Where('PaymentMethod', 'like', '%' .$payment_method . '%');
                })

           ->when(!empty($BankName) , function ($query) use($BankName){
             return $query->Where('BankName', 'like', '%' .$BankName. '%');
                })   

                 ->when(!empty($agency) , function ($query) use($agency){
             return $query->Where('ItemCode', 'like','%' . $agency. '%');
                })      
             ->when(!empty($item_name) , function ($query) use($item_name){
             return $query->Where('ItemName', 'like','%' . $agency. '%');
                })  
    

->when(!empty($registered_on) , function ($query) use($registered_on){
             return $query->WhereBetween('PaymentDate', [$registered_on,$registered_to]);
                }) 
            ->paginate(25);
        //   dd($search_result);
     $search_resultcount = DB::table('api_payments')
            ->select(
          
            DB::raw('count(CustReference) as total_business,sum(Amount) as total_apartments,
                COUNT(DISTINCT(PaymentMethod)) as total_buildings,COUNT(DISTINCT(ItemName)) as total_wards')
            )
         
            
          //->where('businesses.service_id', $serviceids)
          ->when(!empty($customer_reference) , function ($query) use($customer_reference){
             return $query->where('CustReference', 'like', '%' . $customer_reference. '%');
                })

                   ->when(!empty($taxpayer_name) , function ($query) use($taxpayer_name){
             return $query->Where('CustomerName', 'like', '%' . $taxpayer_name . '%');
                })
            ->when(!empty($payment_method) , function ($query) use($payment_method){
             return $query->Where('PaymentMethod', 'like', '%' .$payment_method . '%');
                })

           ->when(!empty($BankName) , function ($query) use($BankName){
             return $query->Where('BankName', 'like', '%' .$BankName. '%');
                })   

                 ->when(!empty($agency) , function ($query) use($agency){
             return $query->Where('ItemCode', 'like','%' . $agency. '%');
                })      
             ->when(!empty($item_name) , function ($query) use($item_name){
             return $query->Where('ItemName', 'like','%' . $agency. '%');
                }) 
                ->when(!empty($registered_on) , function ($query) use($registered_on){
             return $query->WhereBetween('PaymentDate', [$registered_on,$registered_to]);
                })  
            ->get();


        
          // dd($search_resultcount); 
           if(count($search_result) == 0) {
  

            return back()->with('info', 'No search record found. Kindly try again !');
        }
    
         return view('Report.payment_report_dashboard',compact('search_result','search_resultcount','customer_reference','taxpayer_name','payment_method',
        'BankName','agency','item_name','registered_on','registered_to'));
        
    }

}
