@extends ('layouts.master')

@section ('subTitle')
    Users
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
            <span class="active">Individuals</span>
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
                        <span class="caption-subject sbold uppercase font-blue" >Individuals </span>
                    </div>
                    @csrf
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="{{ route('individual_registration.create') }}">Add New <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tools"></div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                      <tr>
                        <th>Payers ID(TIN)</th>
						<th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                     
                        <th>ContactAddress</th>
					  <th class="action-th">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($individual as $user)
					<tr>
                        <td>{{$user->revenue_payer_rin}}</td>
						<td>{{$user->revenue_payer_lname}} {{$user->revenue_payer_fname}}</td>
                        <td>{{$user->mobile_number}}</td>
                        <td>{{$user->email_addresss}}</td>
					
				
                        <td>{{$user->contactaddress}} </td>
                        <td>
						<div class="btn-group">
								<button type="button" class="btn btn-theme btn-xs md-skip dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Action <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li>
									  <a href="{{route('individual_registration.edit',['id' => $user->taxpayer_id])}}">Edit</a>
									</li>
								</ul>
						</div>
						</td>
					</tr>
					@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

</div>

@stop

@section ('quick-sidebar')
    @include ('layouts.partials.quick-sidebar')
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
@stop