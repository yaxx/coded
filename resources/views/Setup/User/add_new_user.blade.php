@extends ('layouts.master')

@section('subTitle')
    Add User
@stop

@section('header')
    @include ('layouts.partials.header')

@stop

@section('bodyClasses')
    page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo
@stop

@section('nav-topbar')
    @include ('layouts.partials.nav-topbar')
@stop

@section('nav-sidebar')
    @include ('layouts.partials.nav-sidebar')
@stop

@section('alerts')
    @include('layouts.partials.alerts')
@stop

@section('contents')


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
            <span class="active">Add User</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->

    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-blue"></i>
                <span class="caption-subject sbold uppercase font-blue">Add User</span>
            </div>


        </div>
        <div class="portlet-body">

            <form method="post" role="form" id="addUser" name="addUser" action="{{ route('users.store') }}">

                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('surname') ? ' has-error' : '' }}">
                                <label>SurName <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                        value="{{ Request::old('surname') ?: '' }}" placeholder="SurName" required>
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
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        value="{{ Request::old('firstname') ?: '' }}" placeholder="firstname" required>
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
                                    <input type="text" class="form-control" id="middlename" name="middlename"
                                        value="{{ Request::old('middlename') ?: '' }}" placeholder="middlename">
                                </div>
                                @if ($errors->has('middlename'))
                                    <span class="help-block">{{ $errors->first('middlename') }}</span>
                                @endif
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group  {{ $errors->has('username') ? ' has-error' : '' }}">
                                <label>Username <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ Request::old('username') ?: '' }}" placeholder="Username" required>
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
                                    <input type="text" class="form-control" id="user_phone"
                                        value="{{ Request::old('user_phone') ?: '' }}" name="user_phone" maxlength="11"
                                        placeholder="Phone">
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
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Request::old('email') ?: '' }}" placeholder="Email" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                    </div><!-- /.col -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="label">Password <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{ Request::old('password') ?: '' }}" placeholder="Password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label>Confirm Password <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation"
                                        value="{{ Request::old('password_confirmation') ?: '' }}"
                                        placeholder="Confirm Password" required>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('procurement_entity') ? ' has-error' : '' }}">
                                <label>Select Mda</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select id="entityDropdown" class="form-control" name="procurement_entity" >
                                        @foreach ($mdas as $mda)
                                            <option value="{{ $mda->agency_id }}  ">{{ $mda->agency_name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div><!-- /.col -->

                    </div>
                   
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Is Admin</label>
                                <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                        @if (old('submits', null) != null)
                                            @if (Request::old('is_admin') == '1')
                                                <input type="checkbox" id="is_admin" value="1" name="is_admin"
                                                    checked>
                                            @else
                                                <input type="checkbox" id="is_admin" value="1" name="is_admin">
                                            @endif
                                        @else
                                            <input type="checkbox" id="is_admin" value="1" name="is_admin">
                                        @endif
                                        <span></span>
                                    </label>

                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->


                    <div class="row">
                        <div class="col-md-6">
                                <div class="">
                                    <label>Select role for new User</label>

                                    <select id="entityDropdown" class="form-control" name="group_id" id="mappingCheckBoxList2" required>
                                        <option value="">Select user role</option>
                                        @foreach ($roles as $role)
                                        
                                            <option   value="{{ $role->id }}"> {{ $role->label }} </option>
                                            @endforeach
                                    </select>
                                </div>
                                {{-- <label>
                                    <input type="checkbox" name="CheckBoxList2[]" id="mappingCheckBoxList2"
                                        value="{{ $role->id }}"> {{ $role->label }}

                                </label> --}}
                                {{--  <div class="input-group">
                                    <select id="entityDropdown" class="form-control" name="procurement_entity" required>
                                        @foreach ($mdas as $mda)
                                            <option value="{{ $mda->name }}  ">{{ $mda->name }} </option>
                                        @endforeach
                                    </select>
                                </div> --}}
                            </div>


                    </div>
                    </tbody>
                </table>

                <div class="form-actions" align="right">
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
@section('footer')
    @include ('layouts.partials.footer')

    <script>
        const entityDropdown = document.getElementById('entityDropdown');
        const entityLabel = document.getElementById('entityLabel');

        entityLabel.addEventListener('click', function() {
            if (entityDropdown.style.display === 'none') {
                entityDropdown.style.display = 'block';
            } else {
                entityDropdown.style.display = 'none';
            }
        });
    </script>
@stop
