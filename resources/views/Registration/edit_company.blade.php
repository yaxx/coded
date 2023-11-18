@extends ('layouts.master')

@section ('subTitle')
   Edit Company
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
                            <a href="{{ route('company_registration.index') }}">Company</a>
                            <i class="fa fa-circle"></i>
                        </li>
            
                        <li>
                            <span class="active">Edit Company</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-blue" ></i>
                                        <span class="caption-subject sbold uppercase font-blue" >Edit Company</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="portlet-body">
                                    
                                <form method="post" role="form" id="addUser" name="addUser" action="{{ route('company_registration.update', ['id'=>$id]) }}">
                                        
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                 <div class="row">
                <div class="col-md-6">
            <div class="form-group {{ $errors->has('revenue_payer_lname') ? ' has-error' : '' }}">
              <label>Company Name <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="revenue_payer_name" name="revenue_payer_name"  value="{{ Request::old('revenue_payer_name') ?:$individual->revenue_payer_name }}" placeholder="Company Name" required>
              </div>
              @if ($errors->has('revenue_payer_lname'))
                  <span class="help-block">{{ $errors->first('revenue_payer_lname') }}</span>
              @endif
            </div>
          </div><!-- /.col -->
          <div class="col-md-6">
            <div class="form-group  {{ $errors->has('revenue_payer_fname') ? ' has-error' : '' }}">
              <label>JTB TIN <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="revenue_payer_tin" name="revenue_payer_tin" value="{{ Request::old('revenue_payer_tin') ?:$individual->revenue_payer_tin }}" placeholder="JTB TIN" required>
              </div>
              @if ($errors->has('revenue_payer_fname'))
                  <span class="help-block">{{ $errors->first('revenue_payer_fname') }}</span>
              @endif
            </div><!-- /.form-group -->
          </div><!-- /.col -->
        </div>                           
              <div class="row">
                <div class="col-md-6">
            <div class="form-group {{ $errors->has('revenue_payer_mname') ? ' has-error' : '' }}">
              <label>RCC Number</label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="passwordr" name="passwordr" value="{{ Request::old('passwordr') ?:$individual->passwordr }}" placeholder="RCC Number" >
              </div>
              @if ($errors->has('revenue_payer_mname'))
                  <span class="help-block">{{ $errors->first('middlename') }}</span>
              @endif
            </div>
          </div><!-- /.col -->
          <div class="col-md-6">
            <div class="form-group  {{ $errors->has('bvn') ? ' has-error' : '' }}">
              <label>BVN <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="bvn" name="bvn" value="{{ Request::old('bvn') ?:$individual->bvn }}" placeholder="BVN" required>
              </div>
              @if ($errors->has('bvn'))
                  <span class="help-block">{{ $errors->first('bvn') }}</span>
              @endif
            </div><!-- /.form-group -->

            
          </div><!-- /.col -->
        </div>
<div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                    <label>Phone </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" id="mobile_number" value="{{ Request::old('mobile_number') ?:$individual->mobile_number }}" name="mobile_number" maxlength="11" placeholder="Phone" required>
                    </div>
                    @if ($errors->has('mobile_number'))
                        <span class="help-block">{{ $errors->first('mobile_number') }}</span>
                    @endif
                  </div>
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>Email <span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email_addresss" name="email_addresss" value="{{ Request::old('email_addresss') ?:$individual->email_addresss }}"  placeholder="Email" >
                    </div>
                    @if ($errors->has('email_addresss'))
                        <span class="help-block">{{ $errors->first('email_addresss') }}</span>
                    @endif
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                </div><!-- /.col -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('contactaddress') ? ' has-error' : '' }}">
                    <label for="label">Contact Address <span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control" id="contactaddress" name="contactaddress" value="{{ Request::old('contactaddress') ?:$individual->contactaddress }}" placeholder="contact address" required>
                    </div>
                    @if ($errors->has('contactaddress'))
                        <span class="help-block">{{ $errors->first('contactaddress') }}</span>
                    @endif
                  </div>
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('economic_activity') ? ' has-error' : '' }}">
                    <label>Occupation<span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control" id="economic_activity" name="economic_activity" value="{{ Request::old('economic_activity') ?:$individual->economic_activity }}" placeholder="Economic Activity" required>
                    </div>
                    @if ($errors->has('economic_activity'))
                        <span class="help-block">{{ $errors->first('economic_activity') }}</span>
                    @endif
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
             </div><!-- /.col -->
            
       <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('state_id') ? ' has-error' : '' }}">
                    <label for="label">Residential State<span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                       <select class="form-control" id="state_id" name="state_id" required>
                                        <option value="">-- Select Option --</option>
                                        @foreach($states as $state)
                                            @if(Request::old('state') == $state->name)
                                            <option value="{{ $state->id }}" selected >{{$state->name }}</option> 
                                                @else
                                                <option value="{{ $state->id }}">{{ $state->name}}</option> 
                                            @endif
                                        @endforeach
                                    </select>
                                       </div>
                    @if ($errors->has('state_id'))
                        <span class="help-block">{{ $errors->first('state_id') }}</span>
                    @endif
                  </div>
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('lga_id') ? ' has-error' : '' }}">
                    <label>Residential Local Govtnment<span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                             <select class="form-control" id="lga_id" name="lga_id" required>
                                        <option value="">-- Select Option --</option>
                                        @foreach($lgas as $lga)
                                            @if(Request::old('lga') == $lga->lga)
                                            <option value="{{ $lga->lga_id }}" selected >{{$lga->lga }}</option> 
                                                @else
                                                <option value="{{ $lga->lga_id }}">{{ $lga->lga}}</option> 
                                            @endif
                                        @endforeach
                                    </select>
                    </div>
                    @if ($errors->has('lga_id'))
                        <span class="help-block">{{ $errors->first('lga_id') }}</span>
                    @endif
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
             </div><!-- /.col -->

                <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Residential City</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                     <select class="form-control" id="city_id" name="city_id" >
                                        <option value="">-- Select Option --</option>
                                        @foreach($cities as $city)
                                            @if(Request::old('city_id') == $city->city)
                                            <option value="{{ $city->cities_id }}" selected >{{$city->city }}</option> 
                                                @else
                                                <option value="{{ $city->cities_id }}">{{ $city->city}}</option> 
                                            @endif
                                        @endforeach
                                    </select>
                    </div>
                    @if ($errors->has('city_id'))
                        <span class="help-block">{{ $errors->first('city_id') }}</span>
                    @endif
                    </div>
                </div>
            </div><!-- /.col -->
            </div><!-- /.row -->
            
                   
         

                                            </tbody>
                                        </table>

                                         
                                           
                                        
                                        <div class="form-actions" align="right" >
                                            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">  
   <input type="hidden" id="service_id" name="service_id" value="{{ serviceId() }}">
      <input name="_method" type="hidden" value="PUT">
                <input type="hidden" id="created_by" name="created_by" value="{{ username() }}">
                                            <button type="submit" name="submits" value="submits" class="btn blue">Submit</button>
                                            <a class="btn red btn-outline" href="{{ route('individual_registration.index') }}">Cancel</a>
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