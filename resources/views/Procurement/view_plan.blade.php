@extends ('layouts.master')

@section ('subTitle')
Procurement plans 
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
                        <span class="caption-subject sbold uppercase font-blue">Procurement Plans</span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="{{route('procurement.showgoods.form')}}">Add New <i class="fa fa-plus"></i></a>
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
                              <th>S/N</th>
                                <th>Project title</th>
                                <th>Procurement entity(MDAs) </th>
                                <th> Month/Year </th>	
                                <th> Total Amount (&#8358;) </th>
                                {{-- <th> Count </th>		 --}}
                             <th> Status </th>	 
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                       @foreach($goodsplan as $goods)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{ $goods->project_title }}</td>
                                <td>{{$goods->procurement_entity}}</td>
                                 <td>{{ $goods->budget_year}}</td> 
                                <td>{{( number_format($goods->project_cost,2) ) }}</td>
                                {{-- <td>{{ $goodsplan->total_count }}</td> --}}
                                <td>
                                    <span class="badge badge-{{ $goods->approval_status == 'Approved' ? 'success' : ($goods->approval_status == 'Rejected' ? 'danger' : 'warning') }}">
                                        {{ $goods->approval_status }}
                                    </span>
                                </td>
                                
                                <td>
                                    @if ($goods->approval_status == 'Approved')
                                    <a href="{{ route('procurement.displayplan', ['plan_id' => $goods->plan_id]) }}"><i class="fa fa-search"></i> view</a>
                                        @else
                                        <a href="{{ route('procurement.editGoods', ['plan_id' => $goods->plan_id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="{{route('procurement.deleteGoods', ['plan_id' => $goods->plan_id])}}" ><i class="fa fa-trash"></i> Delete </a>
                                    @endif
                                   
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
    <script>
        const projectCostInput = document.getElementById('project_cost');
    
        // Add an event listener to format the input as the user types
        projectCostInput.addEventListener('input', function (event) {
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