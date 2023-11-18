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
                                <span class="caption-subject sbold uppercase font-blue">Create Company Profile </span>
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

                            <form method="post" role="form" id="personal-form" name="company-setup"
                                action="{{ route('contractor.companysetup') }}" enctype="multipart/form-data">
                                @csrf
                                <!--Start Tab content -->
                                <div class="tab-content">
                                    <!--start Personal info tab -->
                                    <div class="tab-pane {{ Session::get('next_tab') == '' ? 'active' : 'fade' }}"
                                        id="project_details_tab">

                                        <div class="box-body" style="text-align: center">
                                            <h3>Company Information</h3>
                                        </div>

                                        <hr>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div
                                                    class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                                                    <label>Company Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input type="text" class="form-control"
                                                            value="{{ (Request::old('company_name') ? Request::old('company_name') : session()->has('company_name')) ? session('company_name') : '' }}"
                                                            id="company_name" name="company_name"
                                                            placeholder="Enter name of Company">
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label>Company Email</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input type="email" class="form-control"
                                                            value="{{ (Request::old('email') ? Request::old('email') : session()->has('email')) ? session('email') : '' }}"
                                                            id="email" name="email" placeholder="Enter Company Email">
                                                    </div>

                                                </div>
                                            </div><!-- /.col --><!-- /.form-group -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('tin_number') ? ' has-error' : '' }}">
                                                <label>Tin Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control"
                                                        value="{{ (Request::old('tin_number') ? Request::old('tin_number') : session()->has('tin_number')) ? session('tin_number') : '' }}"
                                                        id="tin_number" name="tin_number"
                                                        placeholder="Enter your Tin Number" minlength="10" maxlength="10"
                                                        pattern="\d{10}">
                                                </div>

                                            </div>
                                        </div><!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label>Phone Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control"
                                                        value="{{ (Request::old('phone') ? Request::old('phone') : session()->has('phone')) ? session('phone') : '' }}"
                                                        id="phone" name="phone" placeholder="Enter your Tin Number"
                                                        minlength="11" maxlength="11" pattern="\d{11}">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('sector') ? ' has-error' : '' }}">
                                                <div
                                                    class="requiredBlock form-group {{ $errors->has('sector') ? ' has-error' : '' }}">
                                                    <label>Sector<span id="sector" class="required">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"></span>
                                                        <select class="form-control" name="sector">
                                                            <option value="1">Agriculture</option>
                                                            <option value="2">Aviation</option>
                                                            <option value="3">Commercial/Retail</option>
                                                            <option value="4">Construction</option>
                                                            <option value="5">Education and Training</option>
                                                            <option value="6">Energy and Power Generation
                                                            </option>
                                                            <option value="7">Fashion</option>
                                                            <option value="8">Financial Services</option>
                                                            <option value="9">FMCG</option>
                                                            <option value="10">Haulage/ Logistics</option>
                                                            <option value="11">Healthcare</option>
                                                            <option value="12">ICT</option>
                                                            <option value="13">Manufacturing</option>
                                                            <option value="14">Media &amp; Entertainment
                                                            </option>
                                                            <option value="15">Oil &amp; Gas</option>
                                                            <option value="16">Professional Services</option>
                                                            <option value="17">Telecommunication</option>
                                                            <option value="18">Tourism/ Hospitality</option>
                                                            <option value="19">Transportation</option>
                                                            <option value="20">Waste Management</option>

                                                        </select>
                                                    </div>
                                                    @if ($errors->has('sector'))
                                                        <span
                                                            class="help-block">{{ $errors->first('sector') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div><!-- /.col -->

                                    </div><!-- /.row -->


                                    <hr>

                                    <div class="box-body pb-3" style="text-align: center">
                                        <h3>Contact Person Information</h3>
                                    </div>
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class=" requiredBlock form-group ">
                                                <label>First Name<span id="first_name" class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control " id="first_name"
                                                        name="first_name" placeholder="First Name" value=""
                                                        required>
                                                </div>

                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class=" requiredBlock form-group ">
                                                <label> Last Name<span id="last_name" class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control " id="last_name"
                                                        name="last_name" placeholder="Last Name" value="" required>
                                                </div>

                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <div
                                                class="requiredBlock form-group  {{ $errors->has('approval_period') ? ' has-error' : '' }}">
                                                <label for="dob" class="control-label"> Date Of Birth
                                                    <span class="required">*</span></label>
                                                <input name="dob" id="dob" type="date"
                                                    class="form-control datepicker"
                                                    value="{{ isset($dob) ? \Carbon\Carbon::parse($dob)->format('Y-m-d') : '' }}"
                                                    required>

                                            </div>
                                            @if ($errors->has('dob'))
                                                <span class="help-block">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="requiredBlock form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                                <label>Gender<span id="gender" class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-venus-mars"></i></span>
                                                    <select class="form-control" id="gender" name="gender" required>
                                                        <option value="male">Male</option>
                                                        <option value="Female">Female</option>


                                                    </select>
                                                </div>
                                                @if ($errors->has('gender'))
                                                    <span class="help-block">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-md-6">
                                            <div class=" requiredBlock form-group ">
                                                <label>Staff Designation <span id="staff_designation"
                                                        class="required">*</span><a href="#" data-toggle="tooltip"
                                                        title="">(i)</a></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <select class="form-control" id="staff_designation"
                                                        name="staff_designation" required>

                                                        <option value="ceo">Chief Executive Officer</option>
                                                        <option value="companysec">Company Secretary</option>
                                                        <option value="cto">Chief Technical Officer</option>
                                                        <option value="po">Procurement Officer</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('staff_designation'))
                                                    <span
                                                        class="help-block">{{ $errors->first('staff_designation') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="box-body pb-3" style="text-align: center">
                                    <h3>Company
                                        Address
                                    </h3>
                                </div>
                                <div>
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class=" requiredBlock form-group ">
                                                <label>Street <span id="street" class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-address-card"></i></span>
                                                    <input type="textarea" class="form-control "
                                                        value="" id="street" name="street" placeholder=""
                                                        required>
                                                </div>
                                                @if ($errors->has('street'))
                                                    <span class="help-block">{{ $errors->first('street') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <!-- /.col -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                class="requiredBlock form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                                <label for="bid_opening_date" class="control-label">City <span
                                                        class="required">*</span></label>
                                                <input name="city" id="city" type="text"
                                                    class="form-control datepicker" value=""
                                                    placeholder="Enter City " required>
                                                @if ($errors->has('city'))
                                                    <span class="help-block">{{ $errors->first('city') }}</span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="requiredBlock form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                                                <label for="state" class="control-label">State <span
                                                        class="required">*</span></label>
                                                <select name="state" id="state" class="form-control" required>
                                                    <option value="">Select a state</option>
                                                    <option value="Abia">Abia</option>
                                                    <option value="Adamawa">Adamawa</option>
                                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                                    <option value="Anambra">Anambra</option>
                                                    <option value="Bauchi">Bauchi</option>
                                                    <option value="Bayelsa">Bayelsa</option>
                                                    <option value="Benue">Benue</option>
                                                    <option value="Borno">Borno</option>
                                                    <option value="Cross River">Cross River</option>
                                                    <option value="Delta">Delta</option>
                                                    <option value="Ebonyi">Ebonyi</option>
                                                    <option value="Edo">Edo</option>
                                                    <option value="Ekiti">Ekiti</option>
                                                    <option value="Enugu">Enugu</option>
                                                    <option value="FCT">Federal Capital Territory (FCT)</option>
                                                    <option value="Gombe">Gombe</option>
                                                    <option value="Imo">Imo</option>
                                                    <option value="Jigawa">Jigawa</option>
                                                    <option value="Kaduna">Kaduna</option>
                                                    <option value="Kano">Kano</option>
                                                    <option value="Katsina">Katsina</option>
                                                    <option value="Kebbi">Kebbi</option>
                                                    <option value="Kogi">Kogi</option>
                                                    <option value="Kwara">Kwara</option>
                                                    <option value="Lagos">Lagos</option>
                                                    <option value="Nasarawa">Nasarawa</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Ogun">Ogun</option>
                                                    <option value="Ondo">Ondo</option>
                                                    <option value="Osun">Osun</option>
                                                    <option value="Oyo">Oyo</option>
                                                    <option value="Plateau">Plateau</option>
                                                    <option value="Rivers">Rivers</option>
                                                    <option value="Sokoto">Sokoto</option>
                                                    <option value="Taraba">Taraba</option>
                                                    <option value="Yobe">Yobe</option>
                                                    <option value="Zamfara">Zamfara</option>
                                                </select>
                                                @if ($errors->has('state'))
                                                    <span class="help-block">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                class="requiredBlock form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label for="country" class="control-label">Country <span
                                                        class="required">*</span></label>
                                                <select name="country" id="country" class="form-control" required>
                                                    <option value="">Select a country</option>
                                                    <option value="Nigeria">Nigeria</option>

                                                </select>
                                                @if ($errors->has('country'))
                                                    <span class="help-block">{{ $errors->first('country') }}</span>
                                                @endif
                                            </div>
                                        </div><!-- /.col -->
                                        <!-- /.col -->

                                    </div>



                                    <div class="row  ">
                                        <div class="col-md-12">



                                            <div class="col-md-12 text-right">
                                                <a href="#" class="btn default"><i class="fa fa-close"></i>
                                                    Cancel</a>
                                                <button class="btn green" name="submit" value="1">Submit
                                                     </button>
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

@stop
