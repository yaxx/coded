@extends ('layouts.master')

@section ('subTitle')
 Payment Report
@stop

@section ('header')
    @include ('layouts.partials.header')
    
@stop

@section ('bodyClasses')
    page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo
@stop

@section ('nav-topbar')
   @include ('layouts.partials.nav-topbar')
@stop

@section ('nav-sidebar')
    @include ('layouts.partials.nav-sidebar')
@stop

@section('alerts')
  @include('layouts.partials.alerts')
@stop

@section ('contents')

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script>
	$(document).ready(function() {
		$('.nav-tabs > li > a').click(function(event){
		event.preventDefault();//stop browser to take action for clicked anchor
					
		//get displaying tab content jQuery selector
		var active_tab_selector = $('.nav-tabs > li.active > a').attr('href');					
					
		//find actived navigation and remove 'active' css
		var actived_nav = $('.nav-tabs > li.active');
		actived_nav.removeClass('active');
					
		//add 'active' css into clicked navigation
		$(this).parents('li').addClass('active');
					
		//hide displaying tab content
		$(active_tab_selector).removeClass('active');
		$(active_tab_selector).addClass('hide');
					
		//show target tab content
		var target_tab_selector = $(this).attr('href');
		$(target_tab_selector).removeClass('hide');
		$(target_tab_selector).addClass('active');
	     });
	  });
	</script>
		<style>
			/** Start: to style navigation tab **/
			.nav {
			  margin-bottom: 18px;
			  margin-left: 0;
			  list-style: none;
			}

			.nav > li > a {
			  display: block;
			}
			
			.nav-tabs{
			  *zoom: 1;
			}

			.nav-tabs:before,
			.nav-tabs:after {
			  display: table;
			  content: "";
			}

			.nav-tabs:after {
			  clear: both;
			}

			.nav-tabs > li {
			  float: left;
			}

			.nav-tabs > li > a {
			  padding-right: 12px;
			  padding-left: 12px;
			  margin-right: 2px;
			  line-height: 14px;
			}

			.nav-tabs {
			  border-bottom: 1px solid #ddd;
			}

			.nav-tabs > li {
			  margin-bottom: -1px;
			}

			.nav-tabs > li > a {
			  padding-top: 8px;
			  padding-bottom: 8px;
			  line-height: 18px;
			  border: 1px solid transparent;
			  -webkit-border-radius: 4px 4px 0 0;
				 -moz-border-radius: 4px 4px 0 0;
					  border-radius: 4px 4px 0 0;
			}

			.nav-tabs > li > a:hover {
			  border-color: #eeeeee #eeeeee #dddddd;
			}

			.nav-tabs > .active > a,
			.nav-tabs > .active > a:hover {
			  color: #555555;
			  cursor: default;
			  background-color: #ffffff;
			  border: 1px solid #ddd;
			  border-bottom-color: transparent;
			}
			
			li {
			  line-height: 18px;
			}
			
			.tab-content.active{
				display: block;
			}
			
			.tab-content.hide{
				display: none;
			}
			
			
			/** End: to style navigation tab **/
		</style>
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="/home">Dashboard</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}">Payment Report</a>
                            <i class="fa fa-circle"></i>
                        </li>
            
                        <li>
                            <span class="active">Payment Report</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-blue" ></i>
                                        <span class="caption-subject sbold uppercase font-blue" >PAYMENT REPORT</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="portlet-body">
                                    
                                <form method="post" role="form" id="addUser" name="addUser" action="{{ route('users.store') }}">
                                        
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                 
                      <div class="alert alert-success hide"></div>
             <section class="content">
            <!--Start Tab content -->
         <h5><b>Total Records:  {{ number_format($search_resultcount[0]->total_business) }}</b></h5>
           <h5><b>Total Amount:  {{ number_format($search_resultcount[0]->total_apartments) }}</b></h5>                 
        
			
                <div  id="business_report" class="tab-content hide">
                    <fieldset>
                      <div class="row">
                        <div class="col-xs-12">
                    
                          <div class="box">
                            <div class="box-header row">
                               
                            </div><!-- /.box-header -->
                            <div class="row">
                                    <div class="col-md-12">
                                        <div id="chartContainer_business" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3" style="padding:25px 20px 10px 20px;">
                                            <div class="form-group">
                                            <label for="chart_type"><strong>Chart Type</strong></label>
                                            <select class="form-control" id="chartType_business" name="Chart Type">
                                                <option>Select Chart Type</option>
                                                <option value="pie">Pie</option>
                                                <option value="bar">Bar</option>
                                                <option value="column">Column</option>
                                                <option value="line">Line</option>
                                                <option value="scatter">Scatter</option>
                                                <option value="area">Area</option>
                                                <option value="spline">Spline</option>
                                            </select>
                                            </div>
                                    </div>
                                </div>
                            <div class="box-body">
                                
                          <div style="overflow-x:auto;" >
                                <table id="example1" class="table table-bordered table-striped">
                                  
                                    <thead>
                                    <tr>
                                                      <tr class="Caption">
                <th scope="col"></th>
 
                <th scope="col">
               <a href="#">Name</a>&nbsp; </th>
 
                <th scope="col">
              <a href="#">TaxID</a>&nbsp; </th>
 
                <th scope="col">
              <a href="#">Amount</a>&nbsp; </th>
 
                <th scope="col">
               <a href="#">PaymentMethod</a>&nbsp; </th>
 
 
             
 
                <th scope="col">
              <a href="#">PaymentDate</a>&nbsp; </th>
 
        
 
                <th scope="col">
              <a href="#">BankName</a>&nbsp; </th>
 
         
 
                <th scope="col">
                <a href="#">ReceiptNo</a>&nbsp; </th>
 
         
 
                <th scope="col">
               <a href="#">ItemName</a></span>&nbsp; </th>
 
          
 
           
 
           
 
                <th scope="col">
          <a href="#">DepositSlipNo</a></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($search_result as $business)
                                            <tr>
                                         

<td >     	<a href="{Link1_Src}" id="api_payments_revenue_invoDetailLink1_{Detail:rowNumber}" target="_blank" data-toggle="tooltip" title="Print Payment Receipt"><i class="fa fa-print"></i></a></td> 
                <td>{{$business->CustomerName}} </td> 
                <td>{{$business->CustReference}} </td> 
                <td >{{number_format($business->Amount)}}</td> 
                <td>{{$business->PaymentMethod}} </td> 
          
    
                <td>{{$business->PaymentDate}} </td> 
     
                <td>{{$business->BankName}} </td> 
        
                <td>{{$business->ReceiptNo}} </td> 
        
                <td>{{$business->ItemName}} </td> 
           
                <td>{{$business->DepositSlipNumber}} </td> 
              

                                            </tr>
                                    @endforeach 
                                    </tbody>
                                </table>
                            
                                     <div class="portlet light">
                                    <div class="portlet-title">
                                            
                                                                <div class="caption"></a></div>
                                                                <div  class="form-group text-right row">
                                                                    <div class="col-sm-5"></div>
                                                                    
                                                                    <div class="col-sm-5">
                                                                            {{ $search_result->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
                                                                        </div>
                                                            </div>
                                                        </div> 
                        
                        </div>>
                          </div><!-- /.box -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                      </div>
				  </div>
                    </fieldset>
                   
                
				    </div>
				
                <!--End Bussiness tab -->

                                            </tbody>
                                        </table>

                                         
                                           
                                        
                                  
                                    </form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
               



@stop

@section ('quick-sidebar')
    @include ('layouts.partials.quick-sidebar')
@stop

@section ('footer')
    @include ('layouts.partials.footer')
  
    
@stop