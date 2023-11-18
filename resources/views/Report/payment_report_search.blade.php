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


                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="/home">Dashboard</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="{{ route('payment_report.index') }}">Payment Report</a>
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
                                    
                                <form method="get" role="form" id="addUser" name="addUser" action="{{ route('general_business_report') }}">
                                        
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                 <div class="row">
                <div class="col-md-6">
            <div class="form-group {{ $errors->has('customer_reference') ? ' has-error' : '' }}">
              <label>Customer Reference </label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control" id="customer_reference" name="customer_reference" value="{{ Request::old('customer_reference') ? : '' }}" placeholder="CUSTOMER REFERENCE" >
              </div>
              @if ($errors->has('customer_reference'))
                  <span class="help-block">{{ $errors->first('customer_reference') }}</span>
              @endif
            </div>
          </div><!-- /.col -->
          <div class="col-md-6">
            <div class="form-group  {{ $errors->has('taxpayer_name') ? ' has-error' : '' }}">
              <label>Tax Payer Name</label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="text" class="form-control" id="taxpayer_name" name="taxpayer_name" value="{{ Request::old('taxpayer_name') ? : '' }}" placeholder="taxpayer_name" >
              </div>
              @if ($errors->has('taxpayer_name'))
                  <span class="help-block">{{ $errors->first('taxpayer_name') }}</span>
              @endif
            </div><!-- /.form-group -->
          </div><!-- /.col -->
        </div>                           
              <div class="row">
                <div class="col-md-6">
            <div class="form-group {{ $errors->has('payment_method') ? ' has-error' : '' }}">
              <label>Payment Method </label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  
             
              <select class="form-control" id="payment_method" name="payment_method" >
                                        <option value="">-- Select Option --</option>
                                     <option value="Cash">Cash</option>
<option value="Bond Bank">Bond Bank</option>
<option value="Diamond Bank Plc">Debit Card</option>
<option value="Internal Transfer">Internal Transfer</option>
<option value="Own Bank Cheque">Own Bank Cheque</option>
<option value="Third Party Cheque">Third Party Cheque</option>
                                    </select>
            
             
              </div>
              @if ($errors->has('payment_method'))
                  <span class="help-block">{{ $errors->first('payment_method') }}</span>
              @endif
            </div>
          </div><!-- /.col -->
          <div class="col-md-6">
            <div class="form-group  {{ $errors->has('BankName') ? ' has-error' : '' }}">
              <label>Bank Name </label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                 
             <select class="form-control" id="BankName" name="BankName" >
                                        <option value="">-- Select Option --</option>
                                     <option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option>
<option value="Bond Bank">Bond Bank</option>
<option value="Diamond Bank Plc">Diamond Bank Plc</option>
<option value="Ecobank Nigeria">Ecobank Nigeria</option>
<option value="Fidelity Bank Plc">Fidelity Bank Plc</option>
<option value="First Bank of Nigeria Plc">First Bank of Nigeria Plc</option>
<option value="First City Monument Bank">First City Monument Bank</option>
<option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option>
<option value="Heritage Bank">Heritage Bank</option>
<option value="Keystone Bank Ltd">Keystone Bank Ltd</option>
<option value="Skye Bank Plc">Skye Bank Plc</option>
<option value="Stanbic IBTC Plc">Stanbic IBTC Plc</option>
<option value="Sterling Bank Plc">Sterling Bank Plc</option>
<option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option>
<option value="United Bank for Africa Plc">United Bank for Africa Plc</option>
<option value="Unity Bank Plc">Unity Bank Plc</option>
<option value="WEMA Bank Plc">WEMA Bank Plc</option>
<option value="Zenith Bank International">Zenith Bank International</option>
                                    </select>
            
            
              </div>
              @if ($errors->has('BankName'))
                  <span class="help-block">{{ $errors->first('BankName') }}</span>
              @endif
            </div><!-- /.form-group -->

            
          </div><!-- /.col -->
        </div>
<div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('agency') ? ' has-error' : '' }}">
                    <label>MDA </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control" id="agency" value="{{ Request::old('agency') ? : '' }}" name="agency" maxlength="11" placeholder="MDA" >
                    </div>
                    @if ($errors->has('agency'))
                        <span class="help-block">{{ $errors->first('agency') }}</span>
                    @endif
                  </div>
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>Item Name </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control" id="item_name" name="item_name" value="{{ Request::old('item_name') ? : '' }}"  placeholder="Item Name" >
                    </div>
                    @if ($errors->has('item_name'))
                        <span class="help-block">{{ $errors->first('item_name') }}</span>
                    @endif
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                </div><!-- /.col -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('assessment_date_from') ? ' has-error' : '' }}">
                    <label for="label">Payment Date From </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="date" class="form-control" id="assessment_date_from" name="assessment_date_from" value="{{ Request::old('assessment_date_from') ? : '' }}" placeholder="Date From " >
                    </div>
                    @if ($errors->has('assessment_date_from'))
                        <span class="help-block">{{ $errors->first('assessment_date_from') }}</span>
                    @endif
                  </div>
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('assessment_date_to') ? ' has-error' : '' }}">
                    <label>Payment Date To
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="date" class="form-control" id="assessment_date_to" name="assessment_date_to" value="{{ Request::old('assessment_date_to') ? : '' }}" placeholder="Payment Date From" >
                    </div>
                    @if ($errors->has('assessment_date_to'))
                        <span class="help-block">{{ $errors->first('assessment_date_to') }}</span>
                    @endif
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
             </div><!-- /.col -->
            

            
                   
           

                                            </tbody>
                                        </table>

                                         
                                           
                                        
                                        <div class="form-actions" align="right" >
                                            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">  
   <input type="hidden" id="service_id" name="service_id" value="{{ serviceId() }}">
                <input type="hidden" id="created_by" name="created_by" value="{{ username() }}">
                                            <button type="submit" name="submits" value="submits" class="btn blue">Submit</button>
                                            <a class="btn red btn-outline" href="{{ route('users.index') }}">Cancel</a>
                                        </div>
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