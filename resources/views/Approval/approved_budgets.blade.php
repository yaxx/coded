@extends ('layouts.master')

@section ('subTitle')
    Approve Budgets
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
            <a href="{{ route('budgets.index') }}">Upload Budget</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Approved Budgets</span>
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
                        <span class="caption-subject sbold uppercase font-blue">Approved Budgets </span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                         <!--    <div class="btn-group">
                                <a class="btn green" href="{{--route('budget_items.create')--}}">Add New <i class="fa fa-plus"></i></a>
                            </div> -->
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
                                <th>Budget Name </th>
                                <th>Budget Name </th>
                                {{-- <th>Approval Level </th> --}}
                                <th>Month/Year </th>
                                <th>No. of Items</th>
                                <th>Total Amount (&#8358;)</th>
                                <th>Date Generated</th>
                                {{-- <th></th> --}}
                               
                            </tr>
                        </thead>
                        <tbody>
                       @foreach($budget_approvals as $budget)
                       {{-- {{dd($budget->budgets)}} --}}
                            <tr>
                                <td>{{ $budget->first_budget ? $budget->first_budget->budget_name : '' }}</td>
                                <td>{{ $budget->first_budget ? $budget->first_budget->budget_name : '' }}</td>
                                {{-- <td>{{ $budget->approval_level ? $budget->approval_level->approval_level : '0' }} out of </td> --}}
                                <td>{{ $budget->month.'/'.$budget->year }}</td>
                                <td>{{ $budget->budgets->count() }}</td>
                                <td>{{ number_format( $budget->budgets->sum('total_amount'),2 ) }}</td>
                                <td>{{ $budget->created_at }}</td>
                                {{-- <td>
                                     <a href="{{ route('approve_budgets.show',[ 'id'=>$budget->reference_no ]) }}" title="View Details" ><i class="fa fa-eye"></i> </a>
                                </td> --}}
                                
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

    <script src="{{asset('assets/pages/scripts/sweetalert.min.js')}}" type="text/javascript"></script>


    <script type="text/javascript">
        $().ready(function(){
            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

        $("#approveBudget44").submit(function(e){
                e.preventDefault();
              var sss =   swal("Are you sure?", {
                        buttons: {
                            cancel: "cancel!",
                            catch: {
                            text: "yes am sure!",
                            value: "catch",
                            },
                        },
                        })
                        .then((value) => {
                        switch (value) {                        
                            case "catch":
                            //swal("Gotcha!", "Pikachu was caught!", "success");
                            return true;
                            break;
                        
                            default:
                           // swal("Got away safely!");
                           return false;
                        }
                        });
                    console.log(sss);

             });

        });

     
       

    </script>
@stop