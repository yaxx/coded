@extends ('layouts.master')

@section('subTitle')
    Budget Items
@stop

@section('header')
    @include ('layouts.partials.header')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('../assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('../assets/global/css/components.min.css" rel="stylesheet" id="style_components') }}"
        type="text/css" />
    <link href="{{ asset('../assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
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

    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="/home">Fund Requests</a>
            <i class="fa fa-circle"></i>
        </li>

        <li>
            <span class="active"></span>
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
                        <i class="fa fa-gift font-blue"></i>
                        <span class="caption-subject sbold uppercase font-blue">Fund Requests</span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        {{-- <div class="col-md-6">
                            <div class="tools"></div>
                        </div> --}}
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th> Expense Head </th>
                                <th> Description </th>
                                <th> Requested Amount </th>
                                <th> Request Status</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($fundrequest as $requests)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $requests->expense_head }}</td>
                                    <td>{{ $requests->description }}</td>
                                    <td>{{ $requests->requested_amount }}</td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $requests->status == 'Approved' ? 'success' : ($requests->status == 'Rejected' ? 'danger' : 'warning') }}">
                                            {{ $requests->status }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="dropup btn-group">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="approvalDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="approvalDropdown">
                                                <ul>
                                                    <li>


                                                        <a class="dropdown-item"
                                                            href="{{ route('Director.approverequest', ['request_id' => $requests->request_id]) }}">
                                                            <i
                                                                class="badge badge-{{ $requests->status == 'Approved' ? 'success' : 'secondary' }}"></i>
                                                            Approve
                                                        </a>
                                                    </li>
                                                    <li>


                                                        <a class="dropdown-item "
                                                            href="{{ route('Director.rejectplan', ['plan_id' => $requests->plan_id]) }}">


                                                            <a class="dropdown-item change-approval-status"
                                                                data-id="{{ $requests->service_id }}"
                                                                data-status="Rejected">
                                                                <i
                                                                    class="badge badge-{{ $requests->approval_status == 'Approved' ? 'danger' : 'secondary' }}"></i>
                                                                Reject

                                                            </a>
                                                        </a>
                                                        {{-- <li>

                                            <a href="{{ route('procurement.displayplan', ['plan_id' => $requests->plan_id]) }}"><i class="fa fa-search"></i> view</a>
                                        </li> --}}
                                                    </li>

                                                </ul>


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



@section('footer')
    @include ('layouts.partials.footer')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('../assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('../assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}"
        type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('../assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('../assets/pages/scripts/table-datatables-colreorder.min.js') }}" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        const projectCostInput = document.getElementById('project_cost');

        // Add an event listener to format the input as the user types
        projectCostInput.addEventListener('input', function(event) {
            const value = event.target.value.replace(/,/g, ''); // Remove existing commas
            const formattedValue = formatNumberWithCommas(value);
            event.target.value = formattedValue;
        });

        // Function to format a number with commas
        function formatNumberWithCommas(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }
    </script>
@stop
