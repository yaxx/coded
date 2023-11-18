@extends ('layouts.master')

@section ('subTitle')
    Budget Implementation Request
@stop

@section ('header')
    @include ('layouts.partials.header')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('../assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('../assets/global/css/components.min.css" rel="stylesheet" id="style_components')}}" type="text/css" />
    <link href="{{asset('../assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
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

    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="/home">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Budget Implementation Request</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift font-blue" ></i>
                        <span class="caption-subject sbold uppercase font-blue">Budget Implementation Request </span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                         <!--    <div class="btn-group">
                                <a class="btn green" href="{{--route('budget_items.create')--}}">Add New <i class="fa fa-plus"></i></a>
                            </div> -->
                        </div>
                        <div class="col-md-6">
                            <div class="tools"></div>
                        </div>
                    </div>
                </div>
         <div class="portlet-body">
            
             <form method="post" action="{{ route('budget_implementation.store') }}" name="addBudgetImplementation" id="addBudgetImplementation">
                    <div class="row">
                        <div class="col-md-6 form-group {{ $errors->has('agency_id') ? ' has-error' : '' }}">
                            <label for="agency_id" class="control-label">Agency <span class="required">*</span></label>
                           <!--  <div class="input-group"> -->
                                <select name="agency_id" id="agency_id" class="form-control">
                                   <option value="">-- Select an Agency --</options>
                                    @foreach($agencies as $agency)
                                    <option value="{{ $agency->agency_id }}" agency="{{ $agency->agency_name }}">
                                        {{ $agency->agency_name }}</option>
                                    @endforeach
                                </select>
                              <!--   <span class="input-group-addon btn default btn-outline" data-target="#new_agency" data-toggle="modal">
                                    <i class="fa fa-plus"></i>
                                </span>
                            </div> -->
                            @if ($errors->has('agency_id'))
                            <span class="help-block">{{ $errors->first('agency_id') }}</span>
                            @endif
                        </div>
                     </div>
                    <div class="row">
                        <div class="col-md-6 form-group {{ $errors->has('plan_month') ? ' has-error' : '' }}">
                            <label for="plan_month" class="control-label">Month <span class="required">*</span></label>
                         
                                <select name="plan_month" id="plan_month" class="form-control">
                                    @foreach($months as $month)
                                    <option value="{{ $month->month_name }}">
                                        {{ $month->month_name }}</option>
                                    @endforeach
                                </select>

                            @if ($errors->has('plan_month'))
                            <span class="help-block">{{ $errors->first('plan_month') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group {{ $errors->has('plan_year') ? ' has-error' : '' }}">
                            <label for="plan_year" class="control-label">Year <span class="required">*</span></label>
                            <input name="plan_year" id="plan_year" type="number" class="form-control"
                                value="{{ date('Y') }}"
                                required>
                            @if ($errors->has('plan_year'))
                            <span class="help-block">{{ $errors->first('plan_year') }}</span>
                            @endif
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <label for="reference" class="control-label">Items<span class="required">*</span></label>
                            <div class="table-responsive">
                                <table class="table table-stripped table-bordered" id="invoice">
                                    <thead>
                                            <th> Item Name </th>
                                            <th> Budget Name </th>
                                            <th> Total Amount (&#8358;)</th>		
                                            <th> Request Amount </th>	
                                            <th> Action </th>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-6 form-group ">
                           
                        </div>
                        <div class="col-md-6 form-group">
                           <div class="clearfix"></div>
                            <div class="form-group form-md-line-input has-success col-md-10 col-xs-12 pull-right {{ $errors->has('grand_total') ? ' has-error' : '' }}"
                                style="margin-bottom:15px; padding-top:3px;">
                                <label for="grand_total" class="col-md-4 text-right" style="margin-top:12px;"><b>Total
                                        :</b></label>
                                <div class="col-md-8 input-icon">
                                    <input name="grand_total" id="grand_total" type="text" class="form-control" placeholder="0.00"
                                        {{ Request::old('grand_total') ?: '' }} readonly>
                                    <i>&#8358;</i>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                               
                                <a href="{{ route('budget_implementation.index') }}" class="btn default" ><i
                                        class="fa fa-close"></i> Cancel</a>
                                <button class="btn green" name="save_and_approve" value="1">Submit for Approval </button>
                            </div>
                        </div>
                    </div>
                </form>







                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>



@stop



@section ('footer')
    @include ('layouts.partials.footer')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('../assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('../assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('../assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{asset('../assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('../assets/pages/scripts/table-datatables-colreorder.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">

            $(document).ready(function() {

                populateBudgets();
                $("select[name='agency_id']").on("change",function(){
                   
                    populateBudgets();
                });

                function populateBudgets(){
                   
                    let agency_name = $("select[name='agency_id'] option:selected").text();
                    let agency_id = $("select[name='agency_id']").val();
                    let _token = $("input[name='_token']").val();
                    //alert(agency_name);
                    if(agency_id){
                        $("table tbody").html("<div class='row' align='center'><em>Loading...</em></div>");
                                let data = {"agency_name": agency_name, '_token': _token };

                                $('#loading-bar-spinner').show();
                                $.ajax({
                                    method: "POST",
                                    url: "<?php echo route('get_budgets_per_agency') ?>",
                                    data: data,
                                    success: function(data) {
                                        let status = data.status;
                                        let mssg = data.mssg;
                                    // console.log(data);
                                            if (status) { 
                                            // carry out success operation here
                                                $("table tbody").html("");
                                                let budgets = data.budgets;
                                                //console.log(budgets);
                                                    if(budgets.length > 0){
                                                        $.each(budgets, function(i, budget) {
                                                        let rows = Math.floor(1000 + Math.random() * 9000);
                                                            // console.log(rows);
                                                            let markup = "<tr class='itemRows' row='"+ rows +"'><td>"+budget.budget_item+"</td><td>"+budget.budget_name+"</td><td>"+budget.total_amount+"</td><td><input name='amount_requested[]' id='amount_requested_"+rows+"' type='text' row='"+rows+"' class='form-control' onkeyup='return calculateGrandTotal()' value='0.00' required></td><td><button type='button' onclick=' return deleteRow(this)' class='btn red btn-outline' style='width:100%;'><i class='fa fa-trash'></i></button></td></tr>";
                                                            $("table tbody").append(markup);
                                                        });
                                                    }
                                                    else{
                                                        $("table tbody").html("<div class='row' align='center'><em>No Record Found...</em></div>");
                                                    }
                                                

                                                } else {
                                                    console.log(mssg);
                                                    alert("Something went wrong... Unknow Error from the Server");
                                                }

                                            },
                                            error: function(err) {
                                                console.log(err);
                                            
                                                    //swal("Error!","Something went wrong... Try again or contact system administrator.", "error");
                                                    alert("Something went wrong... Try again or contact system administrator");
                                            },
                                            complete: function() {
                                                $('#loading-bar-spinner').hide();
                                            }

                                    });
                    }
                   
                }
        
        
        });

    </script> 

@stop