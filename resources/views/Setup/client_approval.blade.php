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
            <span class="active">Procurement Plans</span>
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
                        <span class="caption-subject sbold uppercase font-blue">Client Service</span>
                    </div>
                </div>
                {{-- <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="{{route('procurement.creategoods')}}">Add New <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tools"></div>
                        </div>
                    </div>
                </div> --}}
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                            <tr>
                              <th>S/N</th>
                                <th>Organization Name</th>
                                <th>Organization Code </th>
                                <th>State</th>	
                                <th>Contact Person</th>	
                                <th> Status </th>
                                {{-- <th> Count </th>		 --}}
                             <th> Status </th>	 
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                       @foreach($client as $clients)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{ $clients->service_name }}</td>
                                <td>{{$clients->service_code}}</td>
                                 <td>{{ $clients->state_code}}</td> 
                                <td>{{( $clients->service_contact_person) }}</td>
                                <td>
                                    <span class="badge badge-{{ $clients->service_status == 'Approved' ? 'success' : ($clients->service_status == 'Rejected' ? 'danger' : 'warning') }}">
                                        {{ $clients->approval_status }}
                                    </span>
                                </td>
                                
                                <td>
                                  <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle" type="button" id="approvalDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Actions
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="approvalDropdown">
                                         

                                          <a class="dropdown-item" href="#">

                                         
                                                {{-- <button class="dropdown-item change-approval-status" data-id="{{ $client->id_services }}" data-status="Approved">
                                                    <i class="badge badge-{{ $client->service_status == 'Approved' ? 'success' : 'secondary' }}"></i> Approve
                                        
                                                </button> --}}
                                            </a>
                                            <br>
                                            &nbsp;
                                            {{-- <a class="dropdown-item " href="{{ route('Director.rejectplan', ['plan_id' => $client->service_id]) }}">

                                         
                                                <button class="dropdown-item change-approval-status" data-id="{{ $client->id }}" data-status="Rejected">
                                                    <i class="badge badge-{{ $client->service_status == 'Approved' ? 'danger' : 'secondary' }}"></i> Reject
                                         --}}
                                                </button>
                                            </a>
                                       
                                      </div>
                                  </div>
                              </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
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