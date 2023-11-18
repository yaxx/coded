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
                                        <!--    <div class="btn-group">
                                        <a class="btn green" href="{{-- route('budget_items.create') --}}">Add New <i class="fa fa-plus"></i></a>
                                    </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tools"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="tabs">
                                <ul class=" nav nav-tabs" id="myForm">
                                    <li class="project_details_tab {{ Session::get('next_tab') == '' ? 'active' : '' }}"><a
                                            class="tab-trigger" href="#project_details_tab">Contract Description</a></li>
                                    <li class="{{ Session::get('next_tab') == 'contact_info' ? 'active' : '' }}"
                                        id="contact-li"><a class="tab-trigger" href="#contact_tab">Basic Data</a></li>
                                    <li class="{{ Session::get('next_tab') == 'image_capture' ? 'active' : '' }}"
                                        id="image-li"><a class="tab-trigger"' : '' !!} href="#image_tab">Bidding Period</a>
                                    </li>
                                </ul>
                                <form method="post" role="form" id="personal-form" name="projectdetails-form"
                                    action="" enctype="multipart/form-data">
                                    @csrf
                                    <!--Start Tab content -->
                                    <div class="tab-content">
                                        <!--start Personal info tab -->
                                        <div class="tab-pane {{ Session::get('next_tab') == '' ? 'active' : 'fade' }}"
                                            id="project_details_tab">
                                   
                                                <div class="box-body">
                                                    <h3>Contract Description</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class=" requiredBlock form-group ">
                                                                <label>Project Title <span id="project_title"
                                                                        class="required">*</span><a href="#"
                                                                        data-toggle="tooltip"
                                                                        title="enter title of project ">(i)</a></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-user"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ (Request::old('project_title') ? Request::old('project_title') : session()->has('project_title')) ? session('project_title') : '' }}"
                                                                        id="project_title" name="project_title"
                                                                        placeholder="Enter project project" required>
                                                                </div>
                                                                @if ($errors->has('project_title'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('project_title') }}</span>
                                                                @endif
                                                            </div>
                                                        </div><!-- /.col -->
                                                        <div class="col-md-6">
                                                            <div
                                                                class="requiredBlock form-group  {{ $errors->has('budget_year') ? ' has-error' : '' }}">
                                                                <label for="budget_year" class="control-label">Budget year
                                                                    <span class="required">*</span></label>
                                                                <input name="budget_year" id="budget_year" type="text"
                                                                    class="form-control"
                                                                    value="{{ old('budget_year') ?: 'PLAN' . '-' . date('Y') . '-' . date('F') }}"
                                                                    required>
                                                                @if ($errors->has('budget_year'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('budget_year') }}</span>
                                                                @endif
                                                            </div>
                                                            @if ($errors->has('budget_year'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('budget_year') }}</span>
                                                            @endif
                                                        </div><!-- /.form-group -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div
                                                            class="form-group {{ $errors->has('procurement_officer_number') ? ' has-error' : '' }}">
                                                            <label>Procurement Officer</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    value="{{ (Request::old('procurement_officer_number') ? Request::old('procurement_officer_number') : session()->has('procurement_officer_number')) ? session('procurement_officer_number') : '' }}"
                                                                    id="procurement_officer_number"
                                                                    name="procurement_officer_number"
                                                                    placeholder="Enter Procurement Officer Number">
                                                            </div>

                                                        </div>
                                                    </div><!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div
                                                            class="form-group {{ $errors->has('project_cost') ? ' has-error' : '' }}">
                                                            <label>Project Cost </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="number" class="form-control" value=""
                                                                    id="project_cost" name="project_cost"
                                                                    placeholder="Enter Procurement Cost">
                                                            </div>

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div
                                                            class="form-group {{ $errors->has('project_location') ? ' has-error' : '' }}">
                                                            <label>Project Location</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    value="{{ (Request::old('project_location') ? Request::old('project_location') : session()->has('project_location')) ? session('project_location') : '' }}"
                                                                    id="project_location" name="project_location"
                                                                    placeholder="Enter Procurement Officer Number">
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
                                                                    <option value="">New</option>
                                                                    <option value="">Continuation</option>
                                                                    <option value="">Renovation</option>
                                                                    <option value="">Initiation</option>
                                                                    <option value="">Completed</option>

                                                                </select>
                                                            </div>
                                                            @if ($errors->has('project_status'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('project_status') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->

                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button class=" tab-trigger btn green {{ Session::get('next_tab') == '' ? 'active' : '' }} " data-toggle="tab" data-target="#contact_tab">
                                                            Next </button>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        {{-- <button type="submit">Next</button> --}}
                                        <div class="tab-pane {{ Session::get('next_tab') == 'contact_info' ? 'active' : 'fade' }}"
                                            id="contact_tab">
                                            <!-- Contact Info -->
                                        
                                                <div class="box-body">
                                                    <h3>Project Description</h3>
                                                </div>
                                                <form method="post"
                                                    action="{{ url('individual_registration/contact') }}">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Package Number <span id="project_number"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter package number ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    value="{{ (Request::old('project_number') ? Request::old('project_number') : session()->has('project_number')) ? session('project_number') : '' }}"
                                                                    id="project_number" name="project_number"
                                                                    placeholder="Enter package Number" required>
                                                            </div>
                                                            @if ($errors->has('project_number'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('project_number') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.col -->
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Lot Number <span id="lot_number"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter lot number ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="number" class="form-control"
                                                                    id="lot_number" name="lot_number"
                                                                    placeholder="Enter Lot Number" required>
                                                            </div>
                                                            @if ($errors->has('project_number'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('project_number') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Bid Opening <span id="bid_opening"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter package number ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="number" class="form-control" value=""
                                                                    id="bid_opening" name="bid_opening"
                                                                    placeholder="Enter Opening bid" required>
                                                            </div>
                                                            @if ($errors->has('project_number'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('project_number') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.col -->
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div
                                                            class="requiredBlock form-group  {{ $errors->has('bid_opening_date') ? ' has-error' : '' }}">
                                                            <label for="bid_opening_date" class="control-label">Bid
                                                                Opening date
                                                                <span class="required">*</span></label>
                                                            <input name="bid_opening_date" id="bid_opening_date"
                                                                type="text" class="form-control"
                                                                value="{{ old('bid_opening_date') ?: 'opening' . '-' . date('Y') . '-' . date('F') }}"
                                                                required>
                                                            @if ($errors->has('bid_opening_date'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('bid_opening_date') }}</span>
                                                            @endif
                                                        </div>
                                                        @if ($errors->has('bid_opening_date'))
                                                            <span
                                                                class="help-block">{{ $errors->first('bid_opening_date') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Budget Available<span id="budget_available"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter available Budget ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    id="budget_available" name="budget_available"
                                                                    placeholder="Enter package Number" required>
                                                            </div>
                                                            @if ($errors->has('project_number'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('budget_available') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.col -->
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Available Threshold <span id="available_threshold"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter budget threshold for this project">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    id="available_threshold" name="available_threshold"
                                                                    placeholder="Enter available threshold" required>

                                                            </div>
                                                            @if ($errors->has('available_threshold'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('available_threshold') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div
                                                            class="requiredBlock form-group {{ $errors->has('procurement_method') ? ' has-error' : '' }}">
                                                            <label>Procurement Method <span id="procurement_method"
                                                                    class="required">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-venus-mars"></i></span>
                                                                <select class="form-control" id="procurement_method"
                                                                    name="procurement_method" required>
                                                                    <option value="">-- Select Option --</option>
                                                                    <option value=""> Open Tendering</option>
                                                                    <option value="">Restricted Tendering.</option>
                                                                    <option value="">Request for Proposals (RFP)
                                                                    </option>
                                                                    <option value="">Two Stage Tendering.
                                                                    </option>
                                                                    <option value="">Request for Quotations.
                                                                    </option>
                                                                    <option value="">Single-Source.
                                                                    </option>

                                                                </select>
                                                            </div>
                                                            @if ($errors->has('procurement_method'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('procurement_method') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.col -->
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Available Threshold <span id="available_threshold"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter threshold for this project">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="number" class="form-control"
                                                                    id="available_threshold" name="available_threshold"
                                                                    placeholder="Enter available threshold" required>
                                                            </div>
                                                            @if ($errors->has('available_threshold'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('available_threshold') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>                                                
                                               
                                        </div>

                                        {{-- billing period --}}
                                        <div class="tab-pane  {{ Session::get('next_tab') == 'image_capture' ? 'active' : 'fade' }}"
                                            id="image_tab">
                                            <!-- bidding period -->
                                 
                                                <div class="box-body">
                                                    <h3>Bidding Period</h3>
                                                </div>
                                                <form method="post"
                                                    action="{{ url('individual_registration/contact') }}">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Package Number <span id="project_number"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter package number ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    value="{{ (Request::old('project_number') ? Request::old('project_number') : session()->has('project_number')) ? session('project_number') : '' }}"
                                                                    id="project_number" name="project_number"
                                                                    placeholder="Enter package Number" required>
                                                            </div>
                                                            @if ($errors->has('project_number'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('project_number') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.col -->
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Lot Number <span id="lot_number"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter lot number ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="number" class="form-control"
                                                                    id="lot_number" name="lot_number"
                                                                    placeholder="Enter Lot Number" required>
                                                            </div>
                                                            @if ($errors->has('project_number'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('project_number') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Submission of Evaluation <span
                                                                    id="submission_of_evaluation"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="enter package number ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="number" class="form-control" value=""
                                                                    id="submission_of_evaluation"
                                                                    name="submission_of_evaluation"
                                                                    placeholder="Enter Submission in weeks" required>
                                                            </div>
                                                            @if ($errors->has('submission_of_evaluation'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('submission_of_evaluation') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.col -->
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div
                                                            class="requiredBlock form-group  {{ $errors->has('bid_opening_date') ? ' has-error' : '' }}">
                                                            <label for="bid_opening_date" class="control-label">Bid
                                                                Opening date
                                                                <span class="required">*</span></label>
                                                            <input name="bid_opening_date" id="bid_opening_date"
                                                                type="text" class="form-control"
                                                                value="{{ old('bid_opening_date') ?: 'opening' . '-' . date('Y') . '-' . date('F') }}"
                                                                required>
                                                            @if ($errors->has('bid_opening_date'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('bid_opening_date') }}</span>
                                                            @endif
                                                        </div>
                                                        @if ($errors->has('bid_opening_date'))
                                                            <span
                                                                class="help-block">{{ $errors->first('bid_opening_date') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Certifiable Amount<span id="certifiable_amount"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="maximum amount of money that can be spent on this contract ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    id="certifiable_amount" name="certifiable_amount"
                                                                    placeholder="Enter Certiable Amount" required>
                                                            </div>
                                                            @if ($errors->has('project_number'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('budget_available') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.col -->
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div class=" requiredBlock form-group ">
                                                            <label>Contract Signature <span id="contract_signature"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="amount of time it takes for all parties to sign this contract in weeks ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    id="contract_signature" name="contract_signature"
                                                                    placeholder="Enter in weeks " required>

                                                            </div>
                                                            @if ($errors->has('contract_signature'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('contract_signature') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="requiredBlock form-group ">
                                                            <label>Bill of quantity <span id="bill_of_quantity"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="amount of time it takes for all parties to sign this contract in weeks ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-file"></i></span>
                                                                <input type="file" class="form-control"
                                                                    id="bill_of_quantity" name="bill_of_quantity"
                                                                    required>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <div class="requiredBlock form-group ">
                                                            <label>Contract Offer <span id="contract_offer"
                                                                    class="required">*</span><a href="#"
                                                                    data-toggle="tooltip"
                                                                    title="amount of time it takes for all parties to sign this contract in weeks ">(i)</a></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-file"></i></span>
                                                                <input type="file" class="form-control"
                                                                    id="contract_offer" name="contract_offer" required>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                <input type="hidden" name="agency" id="agency" value="">

                                                <a href="#" class="btn default"><i
                                                        class="fa fa-close"></i> Cancel</a>
                                                <button class="btn green" name="submit" value="1">Submit
                                                    for Approval </button>
                                            </div>
                                        </div>
                                    </div>
                                        

                                </form>


                    

                            </div>

                          
                        </div>
                    </div>
                </div>






















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
                    })
                </script>
            @stop
