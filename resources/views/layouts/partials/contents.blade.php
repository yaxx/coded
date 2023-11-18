
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
<!-- BEGIN PAGE TITLE -->
<div class="page-title">

     @if ( groupid() == 111111 ) 
    <h1>Admin Dashboard
       <!--  <small>statistics, charts, recent events and reports</small> -->
    </h1>

    @elseif ( groupid() >= 2000 && groupid() <= 2999 )
    <h1>Manager/Admin Dashboard
       <!--  <small>statistics, charts, recent events and reports</small> -->
    </h1>

  @elseif  (groupid() == 111111 && is_my_role("PROCUREMENT_OFFICER"))

    <h1>Procurement Officer Dashboard
       <!--  <small>statistics, charts, recent events and reports</small> -->
    </h1>

    @elseif ( groupid() == 222222 || groupid() == 1500)
    <h1>Supervisor Dashboard
       <!--  <small>statistics, charts, recent events and reports</small> -->
    </h1>
    
    @endif
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
    <span class="active">Dashboard</span>
</li>

    <div class="row">
        <div class="col-md-3">
            <div class="number">
                <h3 class="font-blue-sharp">
                    <small> Number of Users:</small>  <span data-counter="counterup" data-value="{{ $adminCount }}">0</span>
                </h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="number">
                <h3 class="font-red-haze">
                    <small>Budget of the year:</small>  <span data-counter="counterup"  data-value="{{ $employeeCount }}">0</span>
                </h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="number">
                <h3 class="font-green-sharp">
                    <small>{{ MINISTRY() }}:</small>  <span data-counter="counterup" data-value="{{ $ministryCount }}">0</span>
                </h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="number">
                <h3 class="font-purple-soft">
                    <small>Departments:</small> <span data-counter="counterup" data-value="{{ $departmentCount }}">0</span>
                </h3>
            </div>
        </div>
    </div>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
@if ( groupid() == 111111 || groupid() >= 2000 && groupid() <= 2999 )
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
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Employee Registration </div>
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
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Update Registration </div>
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
                                <div class="desc" style="font-size: 18px; padding-top: 15%;"> Employee List </div>
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
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Upload Dashboard </div>
                            </div>
                        </a>
                    </div>
                </div>
                
@elseif ( groupid() == 222222 || groupid() == 1500 )
<div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ url('authorize_basic_salary') }}">
                            <div class="visual">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <!-- <span style="font-size: 20px;" >Generate Bulk Pay Register</span> -->
                                </div>
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Basic Salary </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 red" href="{{ url('authorize_allowance_exclusion') }}" >
                            <div class="visual">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <!-- <span data-counter="counterup" data-value="12,5">0</span>M$ --> </div>
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Allowance Exclusion </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 green" href="{{ url('authorize_basic_deduction') }}">
                            <div class="visual">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <!-- <span data-counter="counterup" data-value="549">0</span> -->
                                </div>
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Basic Deduction </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ url('authorize_deduction_account') }}">
                            <div class="visual">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="details">
                                <div class="number"> 
                                   <!--  <span data-counter="counterup" data-value="89"></span>% --> </div>
                                <div class="desc" style="font-size: 18px; padding-top: 10%;"> Deduction Account </div>
                            </div>
                        </a>
                    </div>
                </div>
@endif
<div class="row">
<div class="col-lg-6 col-xs-12 col-sm-12">
<!-- BEGIN PORTLET-->
<div class="portlet light bordered">
<div class="portlet-title tabbable-line">
    <div class="caption">
        <i class="icon-globe font-dark hide"></i>
        <span class="caption-subject font-dark bold uppercase">Feeds</span>
    </div>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab_1_1" class="active" data-toggle="tab"> General </a>
        </li>
        <li>
            <a href="#tab_1_2" data-toggle="tab"> Personal </a>
        </li>
    </ul>
</div>
<div class="portlet-body">
    <!--BEGIN TABS-->
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
            <div class="scroller" style="height: auto;" data-always-visible="1" data-rail-visible="0">
                <ul class="feeds">
                    <div class="mt-comment">No Feed at the moment.</div>
                    <!-- <li>
                    
                    </li> -->
                    
                   
                   <!-- <li>
                    </li> -->
                    
                </ul>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_2">
            <div class="scroller" style="height: auto;" data-always-visible="1" data-rail-visible1="1">
                <ul class="feeds">
                    <div class="mt-comment">No Feed at the moment.</div>
                    <!-- <li>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <!--END TABS-->
</div>
</div>
<!-- END PORTLET-->
</div>
<div class="col-lg-6 col-xs-12 col-sm-12">
    <div class="portlet light bordered">
        <div class="portlet-title tabbable-line">
            <div class="caption">
                <i class=" icon-social-twitter font-dark hide"></i>
                <span class="caption-subject font-dark bold uppercase">Quick Actions</span>
            </div>
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_actions_pending" data-toggle="tab"> Unauthorized Devices </a>
                </li>
                <!-- <li>
                    <a href="#tab_actions_completed" data-toggle="tab"> Authorized Devices </a>
                </li> -->
            </ul>
        </div>
        <div class="portlet-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_actions_pending">
                    <!-- BEGIN: Actions -->
                    <div class="mt-actions">
                        <div class="mt-action">
                            <div class="mt-action-body">
                            @foreach($device_authorization_request as $device)
                            @if ( $device->authorization_status == 0)
                                <div class="mt-action-row">
                                    <div class="mt-action-info ">
                                        <div class="mt-action-details ">
                                            <span class="mt-action-author">{{ $device->device_name }}</span>
                                            <p class="mt-action-desc">{{ $device->email }} </p>
                                        </div>
                                    </div>
                                    <div class="mt-action-datetime ">
                                        <span class="mt-action-date">{{ date('jS F Y', strtotime($device->request_date)) }}</span>
                                        
                                    </div>
                                    <div class="mt-action-buttons ">
                                        <a class="btn blue" href="{{ url('authorize_devices') }}">View</a>
                                    </div>
                                </div>
                                @elseif ( $device->authorization_status == 1)
                                <div class="mt-comment">No Pending Request at the moment.</div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- END: Actions -->
                </div>
                <!-- <div class="tab-pane" id="tab_actions_completed"> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
                    @if(Auth::user()->hasAnyRole('Paysheet Approval'))
                       
                        <div class="col-md-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Salary Approval <!-- <span class="badge badge-danger"> 0 </span> --></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light">
                                            <thead>
                                                <tr class="uppercase">
                                                    <th > <span class="bold theme-font">Approval Level </span> </th>
                                                    <th> Month/Year</th>
                                                    <th> Action</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php
                                      $my_approval_level = 0;
                                      $my_count_levels = 0;
                                       ?>
                                    @foreach($salaryApprover as $sal_info)
                                     <?php
                                      $my_approval_level = filter_var($sal_info->approval_level , FILTER_SANITIZE_NUMBER_INT);
                                      $my_count_levels = filter_var($sal_info->countLevels , FILTER_SANITIZE_NUMBER_INT);
                                       ?>
                              @if($sal_info->can_approve == 1 || $sal_info->approval_level == "1st" )
                                        <tr>
                                            <td>{{ $sal_info->approval_level . ' of '. $sal_info->countLevels }}</td>
                                            <td>{{ $sal_info->month.', '.$sal_info->year }}</td>
                                            <td>
                                                    <!--  MONTHLY PAY  -->
                                                    @if($sal_info->approval_name_id == 1)
                                                        <a  href="{{ route('view_salary_approval_details', [ $sal_info->batch_no, $sal_info->month, $sal_info->year ]) }}" target="_blank"><i class="fa fa-eye"></i> View Details </a>
                                                    <!--   EXPENDITURE PAY -->
                                                    @elseif($sal_info->approval_name_id == 3)
                                                        <a  href="{{ route('view_expenditure_approval_details', [ $sal_info->batch_no, $sal_info->month, $sal_info->year ]) }}" target="_blank" ><i class="fa fa-eye"></i> View Details </a>
                                            
                                                    @endif
                                            </td>
                                            <td>
                                              <!--  MONTHLY PAY  -->
                                              @if($sal_info->approval_name_id == 1)

                                                        <!-- if the record has not been approved and the user is not the last approver then show it -->
                                                        @if( $sal_info->approved == 0 && $sal_info->countLevels <> $my_approval_level )
                                                            <a type="button" data-target=""  
                                                                    href="{{ route('salary_approval_summary.index') }}"
                                                                    class="btn dark btn-sm btn-outline sbold uppercase" > 
                                                                         View Approval 
                                                            </a>
                                                        <!-- if the user is the last authorizer and he has not approved -->
                                                        @elseif($sal_info->approved == 0 && $sal_info->countLevels == $my_approval_level )
                                                            
                                                             <a  href="{{ route('final_payment_approval', ['id' => $sal_info->payment_approval_user_id, 'batch_no' => base64_encode($sal_info->batch_no), base64_encode($sal_info->month), base64_encode($sal_info->year) ]) }}" class="btn dark btn-sm btn-outline sbold uppercase"> Approve/Reject  </a>
                                                
                                                        @endif

                                             <!--   EXPENDITURE PAY -->
                                             @elseif($sal_info->approval_name_id == 3)
                                                            <!-- if the record has not been approved and the user is not the last approver then show it -->
                                                            @if( $sal_info->approved == 0 && $sal_info->countLevels <> $my_approval_level )
                                                                     <a type="button" data-target=""  
                                                                        href="{{ route('expenditure_approval_summary.index') }}"
                                                                        class="btn dark btn-sm btn-outline sbold uppercase"> 
                                                                                 View Approval 
                                                                     </a>
                                                            <!-- if the user is the last authorizer and he has not approved -->
                                                            @elseif($sal_info->approved == 0 && $sal_info->countLevels == $my_approval_level )
                                                                
                                                               <a  href="{{ route('final_expenditure_approval', ['id' => $sal_info->payment_approval_user_id, 'batch_name' => base64_encode($sal_info->batch_no) ]) }}" class="btn dark btn-sm btn-outline sbold uppercase" > Approve/Reject  </a>
                                               
                                                            @endif

                                                @endif

                                          
                                         </td>
                              
                                        </tr>  
                                     @endif
                                    @endforeach 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endif
                     </div> 
</div>