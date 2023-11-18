@extends ('layouts.master')

@section ('subTitle')
    Budget Items
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
            <span class="active">Unapproved Budget Plans</span>
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
                        <span class="caption-subject sbold uppercase font-blue">Unapproved Budget Plans</span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="{{route('budget_plan.create')}}">Add New <i class="fa fa-plus"></i></a>
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
                                <th> Budget Plan </th>
                                <th> Agency </th>
                                <th> Month/Year </th>	
                                <th> Total Amount (&#8358;) </th>
                                <th> Count </th>		
                                <th> Status </th>	
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                       @foreach($budget_plans as $plan)
                              <tr>
                                <td>{{ $plan->budget_plan_name }}</td>
                                <td>{{ $plan->agency ? $plan->agency->agency_name : '' }}</td>
                                <td>{{ $plan->plan_month.'/'.$plan->plan_year }}</td>
                                <td>{{  number_format( $plan->total_amount,2 ) }}</td>
                                <td>{{ $plan->total_count }}</td>
                                <td>
                                     <span class="badge badge-{{ $plan->enabled == 1 ? 'success' : 'danger' }}">
                                        {{ $plan->enabled == 1 ? 'Active' : 'Inactive' }} </span>
                                </td>
                                <td>
                                     
                           
                                    <div class="dropup btn-group">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="approvalDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="approvalDropdown">
                                            <li>
                                                <a class="dropdown-item change-approval-status" data-id="{{ $plan->id }}" data-status="Approved" href="{{ route('budget.enableplan', ['budget_plan_id' => $plan->budget_plan_id]) }}">
                                                    <i class="badge badge-{{ $plan->enabled == 'Approved' ? 'success' : 'secondary' }}"></i> Enable
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-pencil"></i> Edit</a>
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