@extends ('layouts.master')

@section ('subTitle')
   Dashboard
@stop

@section ('header')
    @include ('layouts.partials.header')
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
    
    <?php echo "". date("l j F, Y g:i A") . "<br>"; ?>

</div>
<!-- END PAGE TOOLBAR -->
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BREADCRUMB -->

<ul class="page-breadcrumb breadcrumb">
<li>
    <span class="active">Contractor</span>
</li>

    <div class="row">
        <div class="col-md-3">
            <div class="number">
                <h3 class="font-blue-sharp">
                    <small>Upload Bids </small>  <span data-counter="counterup" data-value="0">0</span>
                </h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="number">
                <h3 class="font-red-haze">
                    <small>Download Project Tender</small>  <span data-counter="counterup"  data-value="0">0</span>
                </h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="number">
                <h3 class="font-green-sharp">
                    <small>Procurement Manual  </small>  <span data-counter="counterup" data-value="0">0</span>
                </h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="number">
                <h3 class="font-purple-soft">
                    <small>No of Contract Bids:</small> <span data-counter="counterup" data-value="0">0</span>
                </h3>
            </div>
        </div>
    </div>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->

      <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ url('employee_registeration') }}">
                            <div class="visual">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <!-- <span style="font-size: 20px;" >Generate Bulk Pay Register</span> -->
                                </div>
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Registered Contractors </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 red" href="{{ url('update_reg_info') }}" >
                            <div class="visual">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <!-- <span data-counter="counterup" data-value="12,5">0</span>M$ --> </div>
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Accepted Plans</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 green" href="{{ url('employee_list') }}">
                            <div class="visual">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <!-- <span data-counter="counterup" data-value="549">0</span> -->
                                </div>
                                <div class="desc" style="font-size: 18px; padding-top: 15%;"> Rejected Plans </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ url('uploads') }}">
                            <div class="visual">
                                <i class="fa fa-upload"></i>
                            </div>
                            <div class="details">
                                <div class="number"> 
                                   <!--  <span data-counter="counterup" data-value="89"></span>% --> </div>
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Create Plan </div>
                            </div>
                        </a>
                    </div>
                </div>


@stop

@section ('quick-sidebar')
    @include ('layouts.partials.quick-sidebar')
@stop

@section ('footer')
    @include ('layouts.partials.footer')
@stop