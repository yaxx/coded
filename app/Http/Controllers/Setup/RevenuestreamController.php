<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Models\Setup\Revenuestream;
use App\Http\Controllers\Controller;


class RevenuestreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              try{
         $asset_types = 'Bussiness';
         $revenue_streams = Revenuestream::where('service_id',serviceId())->orderBy('revenue_stream')->get();
        //return $revenue_streams;
        
        return view('Setup.Revenue.revenue_stream', compact('asset_types','revenue_streams'));
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
       try{
           $asset_types = 'Bussiness';
            

            return view('Setup.Revenue.add_revenue_stream',compact('asset_types'));
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
        // dd($request->all());
               $this->validate($request, [
                        'revenue_stream.*' => 'required|string',
                   
                ]); 
       try{
                    
                            $revenue_stream = $request->revenue_stream;
                          
                            $revenue_streamArray = array();
                            $i = 0;
                        foreach($revenue_stream as $name){
                          
                            $revenue_streamArray[] = [
                                'revenue_stream' => $name,
                           
                                'uuid' => uuid(),
                                'service_id' => serviceId(),
                                'created_by' => username(),
                                'enabled' => 1,
                                'deleted' => 0,
                            ];
                            $i++;
                        }
                        
                        $revenue_streams = Revenuestream::insert($revenue_streamArray);
                
                    if($request->ajax()){
                        $revenue_streams = $revenue_streams->fresh();
                        return response()->json(['status'=>true, 'mssg'=>'success', 'data'=>$revenue_streams]);   
                    }

                    return redirect()->route('revenue_streams.index')->with('success', "Revenue Stream Created Successfully!");
                }
                catch(\Exception $e){
                    // dd($e);        
                    $mssg = $e->getMessage();
                    if($request->ajax()){
                        return response()->json(['status'=>false, 'mssg'=>'Something went wrong... Try again or contact system administrator.', 'mssg_type'=>'error', 'mssg_title'=>'Unable to add agency']);   
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
}
