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
        <div class="page-title">

            <h1>Dashboard
                <!--  <small>statistics, charts, recent events and reports</small> -->
            </h1>


        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">

            <!-- END THEME PANEL -->
            <div class="greeting"></div>

            <?php echo '' . date('l j F, Y g:i A') . '<br>'; ?>

        </div>
        <!-- END PAGE TOOLBAR -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->

    <ul class="page-breadcrumb breadcrumb">
        <li>
            <span class="active">MDAs</span>
        </li>
    </ul>
    <section class="content">
        <div class="box box-default">

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift font-blue"></i>
                                <span class="caption-subject sbold uppercase font-blue">Add Procurement Plan </span>
                            </div>
                        </div>
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <div class="tools"></div>
                                </div>
                            </div>
                        </div>
                        <div id="tabs">

                            <form method="post" role="form" id="personal-form" name="procurement-plan" action="{{ route('procurement.creategoods') }}" enctype="multipart/form-data">
                                @csrf
                                <!--Start Tab content -->
                                <div class="tab-content">
                                    <!--start Personal info tab -->
                                    <div class="tab-pane {{ Session::get('next_tab') == '' ? 'active' : 'fade' }}"
                                        id="project_details_tab">

                                        <div class="box-body" style="text-align: center">
                                            <h3>Contract Description</h3>
                                        </div>

                                        <hr>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div
                                                    class="requiredBlock form-group  {{ $errors->has('budget_plan_reference_no') ? ' has-error' : '' }}">
                                                    <label for="budget_plan_reference_no" class="control-label">Budget year
                                                        <span class="required">*</span></label>
                                                    <select name="budget_plan_reference_no" id="budget_plan_reference_no"
                                                        class="form-control" required>
                                                        <option value="">select year</option>
                                                        @foreach ($budget_plan_reference_no as $x)
                                                            <option
                                                                {{ old('budget_plan_reference_no') == $x->id ? 'selected' : '' }}
                                                                value="{{ $x->id }}">{{ $x->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('budget_plan_reference_no'))
                                                        <span
                                                            class="help-block">{{ $errors->first('budget_plan_reference_no') }}</span>
                                                    @endif
                                                </div>
                                                @if ($errors->has('budget_plan_reference_no'))
                                                    <span
                                                        class="help-block">{{ $errors->first('budget_plan_reference_no') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class=" requiredBlock form-group ">
                                                    <label>Project Title <span id="budget_id" class="required">*</span><a
                                                            href="#" data-toggle="tooltip"
                                                            title="enter title of project ">(i)</a></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <select class="form-control" id="budget_id" name="budget_id">
                                                            <option value="" disabled selected>Select project
                                                                title </option>
                                                        </select>
                                                        {{-- <input type="text" pattern="^[A-Za-z0-9.,_\- ]+$"
                                                                    class="form-control"
                                                                    value="{{ (Request::old('budget_id') ? Request::old('budget_id') : session()->has('budget_id')) ? session('budget_id') : '' }}"
                                                                    id="budget_id" name="budget_id"
                                                                    placeholder="Enter project title" required> --}}
                                                    </div>
                                                    @if ($errors->has('budget_id'))
                                                        <span class="help-block">{{ $errors->first('budget_id') }}</span>
                                                    @endif
                                                </div>
                                            </div><!-- /.col --><!-- /.form-group -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('procurement_officer_number') ? ' has-error' : '' }}">
                                                <label>Phone Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="tel" class="form-control"
                                                        value="{{ (Request::old('procurement_officer_number') ? Request::old('procurement_officer_number') : session()->has('procurement_officer_number')) ? session('procurement_officer_number') : '' }}"
                                                        id="procurement_officer_number" name="procurement_officer_number"
                                                        placeholder="Enter Procurement Officer Phone Number" minlength="11"
                                                        maxlength="11" pattern="\d{11}"
                                                        oninput="this.value = this.value.replace(/\D/g, '')">
                                                </div>

                                            </div>
                                        </div><!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('project_cost') ? 'has-error' : '' }}">
                                                <label>Project Cost</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input readonly type="text" class="form-control comma-format"
                                                        value="" id="project_cost" name="project_cost"
                                                        placeholder="Enter project Cost" pattern="[0-9,]*">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {{ $errors->has('project_location') ? ' has-error' : '' }}">
                                                <label>Project Location</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control"
                                                        value="{{ (Request::old('project_location') ? Request::old('project_location') : session()->has('project_location')) ? session('project_location') : '' }}"
                                                        id="project_location" name="project_location"
                                                        placeholder="Enter Project Location">
                                                </div>

                                            </div>
                                        </div><!-- /.col -->
                                        <div class="col-md-6">
                                            <div
                                                class="requiredBlock form-group {{ $errors->has('project_status') ? ' has-error' : '' }}">
                                                <label>Project Status <span id="project_status"
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-venus-mars"></i></span>
                                                    <select class="form-control" id="project_status"
                                                        name="project_status" required>
                                                        <option value="">-- Select Option --</option>
                                                        <option value="New">New</option>
                                                        {{-- <option value="Continuation">Continuation</option>
                                                        <option value="Renovation">Renovation</option> --}}


                                                    </select>
                                                </div>
                                                @if ($errors->has('project_status'))
                                                    <span class="help-block">{{ $errors->first('project_status') }}</span>
                                                @endif
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->

                                </div>
                                <hr>

                                <div class="box-body pb-3" style="text-align: center">
                                    <h3>Project Description</h3>
                                </div>
                                <hr>
                                <div class="row" ">

                                                                        <div class="col-md-6">
                                                                            <div class=" requiredBlock form-group ">
                                                                                <label>Package Number<span id="package_number" class="required">*</span><a
                                                                                        href="#" data-toggle="tooltip"
                                                                                        title="enter the package number ">(i)</a></label>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                                    <input type="text" class="form-control "
                                                                                        id="package_number" name="package_number"
                                                                                        placeholder="Enter package number" value="" required>
                                                                                </div>
                                                                                       @if ($errors->has('package_number'))
                                    <span class="help-block">{{ $errors->first('package_number') }}</span>
                                    @endif
                                </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Lot Number <span id="lot_number" class="required">*</span><a href="#"
                                        data-toggle="tooltip" title="enter lot number ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="lot_number" name="lot_number"
                                        placeholder="Enter Lot Number" pattern="^[A-Za-z0-9.,_\- ]+$" required>
                                </div>
                                @if ($errors->has('project_number'))
                                    <span class="help-block">{{ $errors->first('project_number') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Available Threshold <span id="budget_available" class="required">*</span><a
                                        href="#" data-toggle="tooltip"
                                        title="enter availabel budget threshold allocated to this MDA ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control comma-format" id="budget_available"
                                        name="budget_available" placeholder="Enter available threshold" required>

                                </div>
                                @if ($errors->has('budget_available'))
                                    <span class="help-block">{{ $errors->first('budget_available') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="requiredBlock form-group {{ $errors->has('procurement_method') ? ' has-error' : '' }}">
                                <label>Procurement Method <span id="procurement_method" class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                    <select class="form-control" id="procurement_method" name="procurement_method"
                                        required>
                                        <option value="">-- Select Option --</option>
                                        <option value="Open Tendering"> Open Tendering</option>
                                        <option value="Restricted Tendering">Restricted Tendering</option>
                                        <option value="Request for Proposals (RFP)">Request for Proposals (RFP)
                                        </option>
                                        <option value="Two Stage Tendering">Two Stage Tendering
                                        </option>
                                        <option value="Request for Quotations">Request for Quotations
                                        </option>
                                        <option value="Single-Source">Single-Source
                                        </option>

                                    </select>
                                </div>
                                @if ($errors->has('procurement_method'))
                                    <span class="help-block">{{ $errors->first('procurement_method') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Goods Arrival Period <span id="goods_arrival" class="required">*</span><a
                                        href="#" data-toggle="tooltip"
                                        title="Enter Arrival period in weeks">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select class="form-control" id="weeks" name="goods_arrival" required>
                                        <option value="">Select weeks</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option {{ old('weeks') == $i ? 'selected' : '' }}
                                                value="{{ $i }}">{{ $i }}
                                                week{{ $i > 1 ? 's' : '' }} </option>
                                        @endfor
                                    </select>
                                </div>
                                @if ($errors->has('goods_arrival'))
                                    <span class="help-block">{{ $errors->first('goods_arrival') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="box-body pb-3" style="text-align: center">
                    <h3>Bidding Period</h3>
                </div>
                <div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Submission of Evaluation Period <span id="submission_of_evaluation_period"
                                        class="required">*</span><a href="#" data-toggle="tooltip"
                                        title="enter in weeks the period of time stipulated for Evaluation of submitted documents  ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select class="form-control" id="weeks" name="submission_of_evaluation_period"
                                        required>
                                        <option value="">Select weeks</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option {{ old('weeks') == $i ? 'selected' : '' }}
                                                value="{{ $i }}">{{ $i }}
                                                week{{ $i > 1 ? 's' : '' }} </option>
                                        @endfor
                                    </select>
                                </div>
                                @if ($errors->has('submission_of_evaluation_period'))
                                    <span
                                        class="help-block">{{ $errors->first('submission_of_evaluation_period') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Mobilzation <span id="mobilization" class="required">*</span><a href="#"
                                        data-toggle="tooltip" title="Enter Mobilization Amount ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control comma-format" value=""
                                        id="mobilization" name="mobilization" placeholder="Enter Mobilization Amount"
                                        required>
                                </div>
                                @if ($errors->has('mobilization'))
                                    <span class="help-block">{{ $errors->first('mobilization') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                    <div class="row">
                        <div class="col-md-6">
                            <div
                                class="requiredBlock form-group {{ $errors->has('bid_opening_date') ? ' has-error' : '' }}">
                                <label for="bid_opening_date" class="control-label">Bid Opening date <span
                                        class="required">*</span></label>
                                <input name="bid_opening_date" id="bid_opening_date" type="date"
                                    class="form-control datepicker"
                                    value="{{ isset($bid_opening_date) ? \Carbon\Carbon::parse($bid_opening_date)->format('Y-m-d') : '' }}"
                                    required>
                                @if ($errors->has('bid_opening_date'))
                                    <span class="help-block">{{ $errors->first('bid_opening_date') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div
                                class="requiredBlock form-group  {{ $errors->has('approval_period') ? ' has-error' : '' }}">
                                <label for="bid_closing_date" class="control-label">Bid Closing
                                    date
                                    <span class="required">*</span></label>
                                <input name="bid_closing_date" id="bid_closing_date" type="date"
                                    class="form-control datepicker"
                                    value="{{ isset($bid_closing_date) ? \Carbon\Carbon::parse($bid_closing_date)->format('Y-m-d') : '' }}"
                                    required>

                            </div>
                            @if ($errors->has('bid_closing_date'))
                                <span class="help-block">{{ $errors->first('bid_closing_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Certifiable Amount<span id="certifiable_amount" class="required">*</span><a
                                        href="#" data-toggle="tooltip"
                                        title="maximum amount of money that can be spent on this contract ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control comma-format" id="certifiable_amount"
                                        name="certifiable_amount" placeholder="Enter Certifiable Amount" required>
                                </div>
                                @if ($errors->has('certifiable_amount'))
                                    <span class="help-block">{{ $errors->first('certifiable_amount') }}</span>
                                @endif
                            </div>
                        </div><!-- /.col -->
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Contract Signature <span id="contract_signature" class="required">*</span><a
                                        href="#" data-toggle="tooltip"
                                        title="amount of time it takes for all parties to sign this contract in weeks ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select class="form-control" id="contract_signature" name="contract_signature"
                                        required>
                                        <option value="">Select weeks</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option {{ old('weeks') == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}
                                                week{{ $i > 1 ? 's' : '' }} </option>
                                        @endfor
                                    </select>

                                </div>
                                @if ($errors->has('contract_signature'))
                                    <span class="help-block">{{ $errors->first('contract_signature') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Final Acceptance<span id="final_acceptance" class="required">*</span><a
                                        href="#" data-toggle="tooltip"
                                        title="amount of time it takes for all parties to sign this contract in weeks ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select class="form-control" id="final_acceptance" name="final_acceptance" required>
                                        <option value="">Select weeks</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option {{ old('weeks') == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}
                                                week{{ $i > 1 ? 's' : '' }} </option>
                                        @endfor
                                    </select>
                                </div>
                                @if ($errors->has('final_acceptance'))
                                    <span class="help-block">{{ $errors->first('final_acceptance') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="requiredBlock form-group ">
                                <label>Bill of quantity <span id="bill_of_quantity" class="required">*</span><a
                                        href="#" data-toggle="tooltip"
                                        title="amount of time it takes for all parties to sign this contract in weeks ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-file"></i></span>
                                    <input type="file" class="form-control" id="bill_of_quantity"
                                        name="bill_of_quantity" required>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class=" requiredBlock form-group ">
                                <label>Contract Offer <span id="contract_offer" class="required">*</span><a
                                        href="#" data-toggle="tooltip"
                                        title="Enter Contract offer in weeks ">(i)</a></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select class="form-control" id="contract_offer" name="contract_offer" required>
                                        <option value="">Select weeks</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option {{ old('weeks') == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ $i }}
                                                week{{ $i > 1 ? 's' : '' }} </option>
                                        @endfor
                                    </select>

                                </div>
                                @if ($errors->has('contract_offer'))
                                    <span class="help-block">{{ $errors->first('contract_offer') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row  ">
                        <div class="col-md-12">



                            <div class="col-md-12 text-right">
                                <a href="#" class="btn default"><i class="fa fa-close"></i>
                                    Cancel</a>
                                <button class="btn green" name="submit" value="1">Submit
                                    for Approval </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>


        </form>




        </div>


        </div>
    </section>









@stop

@section('quick-sidebar')
    @include ('layouts.partials.quick-sidebar')
@stop

@section('footer')
    @include ('layouts.partials.footer')


    <script type="text/javascript">
        $('.tab-trigger').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
            $("ul#myForm li").each(function() {
                $(this).removeClass("active");
            });
            setTimeout(() => {
                $(`.${$(this).data("selection")}`).addClass("active")
            }, 10);
            // project_contact_tab
        })
        $('.previous-button').click(function(e) {
            e.preventDefault();
            var currentTab = $(this).data("target");
            var previousTab = $(this).data("previous");

            $(`[data-selection="${previousTab}"]`).tab('show');
            $(`ul#myForm li`).removeClass("active");
            $(`.${previousTab}`).addClass("active");
        });
    </script>
    <script>
        function updateTextView(_obj) {
            var num = getNumber(_obj.val());
            if (num == 0) {
                _obj.val("");
            } else {
                _obj.val(num.toLocaleString());
            }
        }

        function getNumber(_str) {
            var arr = _str.split("");
            var out = new Array();
            for (var cnt = 0; cnt < arr.length; cnt++) {
                if (isNaN(arr[cnt]) == false) {
                    out.push(arr[cnt]);
                }
            }
            return Number(out.join(""));
        }

        $(document).ready(function() {
            $('[name="budget_plan_reference_no"]').on('change', function() {
                var year = $(this).val();
                var URI = "{{ route('dropdown.product_title', ':refNo') }}";
                URI = URI.replace(":refNo", year);
                $.ajax({
                    type: "get",
                    url: URI,
                    data: {},
                    success: function(data) {
                        $('[name="budget_id"]').html(data);
                    },
                    error: function(err) {
                        alert("An error occurred please try again!");
                    }
                });
            })
            $(".comma-format").on("keyup", function() {
                updateTextView($(this));
            });
            $('[name="budget_id"]').on('change', function() {
                var id = $(this).val();
                var amount = $(this).find(`[value="${id}"]`).data('amount') ?? 0;
                $('[name="project_cost"]').val(`${parseFloat(amount).toFixed(2)}`);
                // &#8358;
                // alert(amount.toFixed(2));
            })
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let openingDateInput = document.getElementById('bid_opening_date');
            let closingDateInput = document.getElementById('bid_closing_date');

            openingDateInput.addEventListener('input', function() {
                closingDateInput.setAttribute('min', this.value);
            });
        });
    </script>

@stop
