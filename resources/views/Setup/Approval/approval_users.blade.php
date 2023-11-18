@extends ('layouts.master')

@section ('subTitle')
    Approval Users
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
                            <span class="active">Approval Users</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-users font-blue" ></i>
                                        <span class="caption-subject sbold uppercase font-blue" >Approval Users</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                 <a class="btn green" href="{{ route('approval_users.create') }}"> Add New

                                                        <i class="fa fa-plus"></i></a>


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="tools"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th> Approval Name </th>
                                                <th> Approval Level </th>
                                                <th> User </th>
                                                 <th> Status</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($approval_users as $ap_user)
                                            <tr>
                                                <td> {{ $ap_user->approval_name ? $ap_user->approval_name->approval_name : '' }} </td>
                                                <td> {{ $ap_user->approval_level ? $ap_user->approval_level->approval_level : '' }}</td>
                                                <td>{{ $ap_user->user_info ? ($ap_user->user_info->name.'::'.$ap_user->user_info->email) : '' }}</td>
                                                <td>
                                                    <span class="badge badge-{{$ap_user->mark_delete==0?"success":"danger"}}">{{$ap_user->mark_delete==0?"Active":"Inactive"}} </span>
                                                </td>
                                                 <td><a href="#"><i class="fa fa-pencil"></i> Edit </a></td>
                                            </tr>
                                      @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

@stop


@section ('footer')
    @include ('layouts.partials.footer')
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{asset('../assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('../assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('../assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('../assets/pages/scripts/table-datatables-colreorder.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
@stop