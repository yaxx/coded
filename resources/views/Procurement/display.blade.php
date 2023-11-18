@extends ('layouts.master')

@section('subTitle')
    Dashboard
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



    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        {{-- <div class="page-title">

            <h1>Procurement Plan Details
                <!--  <small>statistics, charts, recent events and reports</small> -->
            </h1> --}}

        <style>
            .uppercase-text {
                text-transform: uppercase;
            }

            .tablecenter {
                justify-content: center;
            }
        </style>

        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-shopping-cart font-blue"></i>
                    <span class="caption-subject sbold uppercase font-blue"> Procurement Plans </span>
                </div>
            </div>

            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row pt-4 pb-3">
                <div class="col-lg-12">
                    <div class="card border-0 h-100 py-2">
                        <div class="card-body">
                            <h3 class="section-header pb-5 ">
                                Procurement Plan Details
                            </h3>

                            <table class="table table-borderless vertical-table ">
                                <tbody class="tablecenter">
                                    {{-- @foreach ($views as $views) --}}
                                    {{-- {{dd($views)}} --}}
                                 
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Project title</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->project_title }}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">budget year</th>
                                        <td class="td uppercase-text">
                                            <strong>{{ $views->budget_year }}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Procurement Officer Number</th>
                                        <td class="td uppercase-text">
                                            <strong>{{ $views->procurement_officer_number }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Project Cost</th>
                                        <td class="td uppercase-text"> <strong>₦{{ number_format(floatVal($views->project_cost ?? 0),2)}}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Project Location</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->project_location }}</strong></td>

                                    </tr>

                                    <tr>
                                        <th scope="row" class="th uppercase-text">Project Status</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->project_status }}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Package Number</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->package_number }}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Lot Number</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->lot_number }}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Available threshold</th>
                                        <td class="td uppercase-text"> <strong>₦{{ number_format(floatVal($views->available_threshold ?? 0),2)}}</strong></td>

                                    </tr>


                                    <tr>
                                        <th scope="row" class="th uppercase-text">Procurement Method</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->procurement_method }}</strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Goods Arrival Period</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->goods_arrival }}weeks</strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Submission of Evaluation Period</th>
                                        <td class="td uppercase-text">
                                            <strong>{{ $views->submission_of_evaluation_period }}weeks</strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Mobilization</th>
                                        <td class="td uppercase-text"> <strong>₦{{ number_format(floatVal($views->mobilization ?? 0),2) }}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Bid Opening Date</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->bid_opening_date }}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Bid Closing Date</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->bid_closing_date }}</strong></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Certifiable Amount</th>
                                        <td class="td uppercase-text"> <strong>₦{{ number_format(floatVal($views->certifiable_amount ?? 0),2) }}</strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Contract Signature</th>
                                        <td class="td uppercase-text">
                                            <strong>{{ $views->contract_signature }}weeks</strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Final Acceptance</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->final_acceptance }}weeks</strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Contract Offer</th>
                                        <td class="td uppercase-text"> <strong>{{ $views->contract_offer }}weeks</strong>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="th uppercase-text">Bill of Quantity</th>
                                    <td>
                                  <div id="pdf-viewer"></div> -
                                            <a href="{{ asset('billofquantity/'.$views->bill_of_quantity)}}" target="_blank" class="btn btn-primary">views Bill Of Quantity</a>

                                        <link href="{{asset('billofquantity/bill_of_quantity')}}" rel="stylesheet" type="text/css" />
                                        </td>


                                    </tr>

                                </tbody>
                               
                            </table>
                            @if(!($views->approval_status =='Approved' || $views->approval_status =='Rejected'))
                            <div class="col-md-12">
                                <div class="text-right">
                                    <a href="{{ route('Director.rejectplan', ['plan_id' => $views->plan_id]) }}" class="btn btn-danger"><i class="fa fa-close"></i>
                                        Reject plan</a>
                                    <a href="{{ route('Director.approveplan', ['plan_id' => $views->plan_id]) }}" class="btn green">Approve Plan
                                     </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
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
             <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.12/pdfobject.min.js"></script>
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
            <script>
                const uri = "{{asset('billofquantity/'.$views->bill_of_quantity )}}";
                PDFObject.embed(uri, "#pdf-viewer");
            </script>
        @stop
