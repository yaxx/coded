@extends ('layouts.master')

@section ('subTitle')
    Edit User
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
                            <a href="{{ route('users.index') }}">Users</a>
                            <i class="fa fa-circle"></i>
                        </li>
            
                        <li>
                            <span class="active">Edit User</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-blue" ></i>
                                        <span class="caption-subject sbold uppercase font-blue" >Edit User</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="portlet-body">
                                    
                                <form method="post" role="form" id="editUser" name="ediUser" action="{{ route('users.update', ['id'=>$id]) }}">
                                        
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                 <div class="row">
                <div class="col-md-6">
            <div class="form-group {{ $errors->has('surname') ? ' has-error' : '' }}">
              <label>SurName <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="surname" name="surname" value="{{ Request::old('surname') ?:$user->surname }}" placeholder="SurName" required>
              </div>
              @if ($errors->has('surname'))
                  <span class="help-block">{{ $errors->first('surname') }}</span>
              @endif
            </div>
          </div><!-- /.col -->
          <div class="col-md-6">
            <div class="form-group  {{ $errors->has('firstname') ? ' has-error' : '' }}">
              <label>Firstname <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="firstname" name="firstname" value="{{ Request::old('firstname') ?:$user->firstname }}" placeholder="firstname" required>
              </div>
              @if ($errors->has('firstname'))
                  <span class="help-block">{{ $errors->first('firstname') }}</span>
              @endif
            </div><!-- /.form-group -->
          </div><!-- /.col -->
        </div>                           
              <div class="row">
                <div class="col-md-6">
            <div class="form-group {{ $errors->has('middlename') ? ' has-error' : '' }}">
              <label>Middlename </label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="middlename" name="middlename" value="{{ Request::old('middlename') ?:$user->middlename }}" placeholder="middlename" >
              </div>
              @if ($errors->has('name'))
                  <span class="help-block">{{ $errors->first('middlename') }}</span>
              @endif
            </div>
          </div><!-- /.col -->
          <div class="col-md-6">
            <div class="form-group  {{ $errors->has('username') ? ' has-error' : '' }}">
              <label>Username <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" id="username" name="username" value="{{ Request::old('username') ?:$user->username }}" placeholder="Username" readonly required>
              </div>
              @if ($errors->has('username'))
                  <span class="help-block">{{ $errors->first('username') }}</span>
              @endif
            </div><!-- /.form-group -->

            
          </div><!-- /.col -->
        </div>
<div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('user_phone') ? ' has-error' : '' }}">
                    <label>Phone </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" id="user_phone" name="user_phone" maxlength="11" value="{{ Request::old('user_phone') ?:$user->user_phone }}" placeholder="Phone" >
                    </div>
                    @if ($errors->has('user_phone'))
                        <span class="help-block">{{ $errors->first('user_phone') }}</span>
                    @endif
                  </div>
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>Email <span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Request::old('email') ?:$user->email }}"  placeholder="Email" required>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                </div><!-- /.col -->
          
            

                <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Is Admin</label>
                    <div class="mt-radio-inline">
                        <label class="mt-radio">
                           
                           
                       
                        @if ($user->is_admin==0)
                        
                        @if (Request::old('is_admin')==1)
                        <input type="checkbox" id="is_admin" value="1" name="is_admin" checked >
                        @else
                        <input type="checkbox" id="is_admin" value="1" name="is_admin" >
                        @endif
                        @else
                     @if(old('submits', null) != null)
                        @if (Request::old('is_admin')==1)
                        <input type="checkbox" id="is_admin" value="1" name="is_admin" checked >
                        @else
                        <input type="checkbox" id="is_admin" value="1" name="is_admin" >
                        @endif 
                        @else           
                        <input type="checkbox" id="is_admin" value="1" name="is_admin" checked >
                   @endif
                        @endif     
                           
                           
                            <span></span>
                        </label>
                     
                    </div>
                </div>
            </div><!-- /.col -->
            </div><!-- /.row -->
            
                   
              <div class="row">
               @foreach($roles as $role)
                    <div class="col-md-4">
                        <label>
                        <input type="checkbox" name="CheckBoxList2[]" id="mappingCheckBoxList2" value="{{$role->id}}"> {{ $role->label }}
                           
                        </label>
                    </div>
                @endforeach
              </div><!-- /.row -->

                                            </tbody>
                                        </table>

                                         
                                           
                                        
                                        <div class="form-actions" align="right" >
                                         <input name="_method" type="hidden" value="PUT">
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


@section ('footer')
    @include ('layouts.partials.footer')
  
    
@stop