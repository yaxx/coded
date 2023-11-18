<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
     @if (Auth::guest())
        <!-- BEGIN LOGO -->
                    <div class="page-logo">
                    
                    <a href="{{ url('/') }}">
                        <img style="width: 80px; height: auto; " src="{{ get_client_logo() }}" alt="logo" class="logo-default" /> </a>
            
                
            </div>
        <!-- END LOGO -->

     @else
        <!-- BEGIN LOGO -->
        <div class="page-logo">
        
            <a href="{{ url('/home') }}">
                <img style="width: 80px; height: auto; border-radius:40px !important;" src="{{ get_client_logo() }}" alt="logo" class="logo-default" /> </a>
     
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
           
        </div>
        <!-- END LOGO -->
    
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <div class="btn-group">
                <!-- <h3>{{ client() }}</h3> -->
                 {{-- <a href="{{ url('/home') }}" class="btn red-haze" style="border-radius: 25px!important;"> --}}
                    <span>{{ client() }}</span>
                    <!-- <i class="fa fa-angle-down"></i> -->
                </a>
            </div>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
           
            <div class="top-menu">
               			 
                <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>
                             <!-- <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="badge badge-success" style="font-size:18px!important"> </span>
                                </a>
                            </li> -->
				  
                    <!-- <li class="separator hide"> </li> -->
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                    <!-- <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-success"> 0 </span>
                        </a>
                        <ul class="dropdown-menu"> -->
                            <!-- <li class="external">
                                <h3>
                                    <span class="bold">12 pending</span> notifications</h3>
                                <a href="">view all</a>
                            </li> -->
                          
                        <!-- </ul>
                    </li> -->
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- <li class="separator hide"> </li> -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-danger"> 0 </span>
                        </a> 
                         <ul class="dropdown-menu"> 
                            <li class="external">
                                <h3>You have
                                    <span class="bold">0 New</span> Message(s)</h3>
                                <a href="#">View All</a>
                            </li>
                            
                         </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                     <li class="separator hide"> </li> 
                 
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile">
                                @if (username() ) 
                                    {{ username() }} 
                                @endif
                            </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <img alt="" class="img-circle" src="{{ get_profile_pix( photo_url() ) }}" /> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            @if ( groupid() >= 0 && groupid() <= 10 )
                                <li>
                                    <a href="/userprofile">
                                    <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li class="nav-item  ">
                                        <a href="{{ url('update_history') }}" class="nav-link nav-toggle">
                                                <i class="icon-user"></i>
                                            <span class="title">Change of Information</span>
                                            
                                        </a>
                                    </li>
                             @endif 

                            <!-- <li>
                                <a href="app_calendar.html">
                                    <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="app_inbox.html">
                                    <i class="icon-envelope-open"></i> My Inbox
                                    <span class="badge badge-danger"> 0 </span>
                                </a>
                            </li>
                            <li>
                                <a href="app_todo_2.html">
                                    <i class="icon-rocket"></i> My Tasks
                                    <span class="badge badge-success"> 0 </span>
                                </a>
                            </li> -->
                            <li class="divider"> </li>
                            <li>
                                <a href="/change_password">
                                    <i class="icon-lock"></i> Change Password </a>
                            </li>
                            <li>
                            <a href="{{ route('logout') }}">
                                    <i class="icon-key"></i> Log Out </a>
                               <!--  <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i> Log Out </a> -->
                                  <!--   <form id="logout-form" action="{{-- route('logout') --}}" method="POST" style="display: none;">
                                        {{-- csrf_field() --}}
                                    </form> -->
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!--<li class="dropdown dropdown-extended quick-sidebar-toggler">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <i class="icon-logout"></i>
                    </li>-->
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
      
           @endif
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER-->