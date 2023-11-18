<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

        <div class="form-group" style="padding:0px 15px;">
            <div class="input-icon right">
                <i class="fa fa-search"></i>
                <input type="search" id="search" name="search" style="margin:0px auto;" type="text"
                    class="form-control input-circle" placeholder="Search menu...">
            </div>
        </div>
        <!-- begin menu for an employee -->
        <li class="nav-item start ">
            <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>

        {{-- begin menu for procurement officer --}}
        {{-- @if (is_my_role("PROCUREMENT_OFFICER")) --}}

            {{-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Budget</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('budget_item_categories') }}" class="nav-link nav-toggle">
                            <span class="title">Budget Item Category</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('budget_items') }}" class="nav-link nav-toggle">
                            <span class="title">Budget Items</span>
                        </a>
                    </li>

                    <li class="nav-item  ">
                        <a href="{{ url('budget_plan') }}" class="nav-link nav-toggle">
                            <span class="title">Budget Plan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('budget_plan') }}" class="nav-link nav-toggle">
                            <span class="title">Approved Budget</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
            @if (( groupId() == 7))

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Procurement</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('procurement.showgoods.form') }}" class="nav-link nav-toggle">
                            <span class="title"> Create Plan</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item  ">
                        <a href="{{ url('works_create') }}" class="nav-link nav-toggle">
                            <span class="title"> Works</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('services_create') }}" class="nav-link nav-toggle">
                            <span class="title"> Services</span>
                        </a>
                    </li> --}}
                   
                    <li class="nav-item  ">
                        <a href="{{ url('view_plan') }}" class="nav-link nav-toggle">
                            <span class="title">View Plan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Standard Bidding Documents

                    </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('upload_tender') }}" class="nav-link nav-toggle">
                            <span class="title">Upload SIB/STD</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('#') }}" class="nav-link nav-toggle">
                            <span class="title">View SIB/STD</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif







            {{-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Company Profile</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('complete_setup') }}" class="nav-link nav-toggle">
                            <span class="title">Complete Setup</span>
                        </a>
                    </li>

                    <li class="nav-item  ">
                        <a href="{{ url('upload_documents') }}" class="nav-link nav-toggle">
                            <span class="title">Upload Documents</span>
                        </a>
                    </li>

                </ul>
            </li> --}}
            {{-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Contract Bids</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('') }}" class="nav-link nav-toggle">
                            <span class="title">Find lots</span>
                        </a>
                    </li>

                    <li class="nav-item  ">
                        <a href="{{ url('') }}" class="nav-link nav-toggle">
                            <span class="title">Awarded contracts
                            </span>
                        </a>
                    </li>

                </ul>
            </li> --}}

            
            {{-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Bidding Documents

                    </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('#') }}" class="nav-link nav-toggle">
                            <span class="title">Purchased Bids</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('#') }}" class="nav-link nav-toggle">
                            <span class="title">Submitted Bids</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('#') }}" class="nav-link nav-toggle">
                            <span class="title">Bidding Rceipts</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
           
         
  {{-- begin menu for director officer --}}
       
        {{-- <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-money"></i>
                <span class="title">Budget</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
               
                <li class="nav-item  ">
                    <a href="{{ url('budget_items') }}" class="nav-link nav-toggle">
                        <span class="title">Budget Items</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="{{ url('budget_plan') }}" class="nav-link nav-toggle">
                        <span class="title">Budget Plan</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('budget_plan') }}" class="nav-link nav-toggle">
                        <span class="title">Approved Budget</span>
                    </a>
                </li>
            </ul>
        </li> --}}
        @if ((groupId() == 11))
            
        <li class="nav-item  ">
            <a href="{{url('/request') }}" class="nav-link nav-toggle">
                <i class="fa fa-money"></i>
                <span class="title">Requests</span>
                
            </a>

        </li>
            @endif
            @if (( groupId() == 13)|| ( groupId() ==8))
        <li class="nav-item  ">
            <a href="{{url('/find_plan_status') }}" class="nav-link nav-toggle">
            <i class="fa fa-money"></i>
            <span class="title">Find Procurement Plans</span>
          
        </a>
        @endif

    </li>
        @if (( groupId() == 7)|| ( groupId() ==2))
            
      

        <li class="nav-item  ">
                <a href="{{url('/find_plan_status') }}" class="nav-link nav-toggle">
                <i class="fa fa-money"></i>
                <span class="title">Find Procurement Plans</span>
              
            </a>

        </li>
         {{-- <li class="nav-item  ">
            <a href="{{url('/view_mdas') }}" class="nav-link nav-toggle">
                <i class="fa fa-money"></i>
                <span class="title">MDAs</span>
                
            </a>

        </li> 
        <li class="nav-item  ">
            <a href="{{url('/show_imprest') }}" class="nav-link nav-toggle">
                <i class="fa fa-money"></i>
                <span class="title">Pay Imprest</span>.
                
            </a>

        </li> 
        <li class="nav-item  ">
            <a href="{{url('/show_imprest') }}" class="nav-link nav-toggle">
                <i class="fa fa-money"></i>
                <span class="title"></span>.
                
            </a>

        </li>  --}}
       
       
        {{-- <li class="nav-item  ">
            <a href="#" class="nav-link nav-toggle">
                <i class="fa fa-money"></i>
                <span class="title">Contractors</span>
               
            </a>

        </li> --}}
        <li class="nav-item  ">
            <a href="#" class="nav-link nav-toggle">
                <i class="fa fa-money"></i>
                <span class="title">Reports</span>
         
            </a>

        </li>
        @endif
        @if (( groupId() == 10|| (groupId() == 12)))
         <li class="nav-item   ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-object-group"></i>

                    <span class="title">Agency</span>
                    <span class="arrow open"></span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link nav-toggle">
                            <span class="title">Agency Types</span>
                        </a>
                    </li> --}}
                    <li class="nav-item  start active open">
                        <a href="{{ url('agencies') }}" class="nav-link nav-toggle">
                            <span class="title">Agencies</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item  ">
                        <a href="{{ url('revenue_streams') }}" class="nav-link nav-toggle">
                            <span class="title">Revenue Stream</span>
                        </a>
                    </li> --}}

                </ul>
            </li>

    
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Budget </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('budget_item_categories') }}" class="nav-link nav-toggle">
                            <span class="title">Budget Item Group</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('budget_items') }}" class="nav-link nav-toggle">
                            <span class="title">Budget Items</span>
                        </a>
                    </li>
                    @if ( groupId() == 12)

                    <li class="nav-item  ">
                        <a href="{{ url('budgets') }}" class="nav-link nav-toggle">
                            <span class="title">Upload Budgets</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item  ">
                        <a href="{{ url('/budgets_view_uploaded_budget') }}" class="nav-link nav-toggle">
                            <span class="title">Uploaded Budget Item</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('approve_budgets') }}" class="nav-link nav-toggle">
                            <span class="title">Approve Budgets</span>
                        </a>
                    </li>
                           @if ( groupId() == 10)
                    <li class="nav-item  ">
                        <a href="{{ url('budget_plan') }}" class="nav-link nav-toggle">
                            <span class="title">Budget Plan</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item  ">
                        <a href="{{ route('approve_budgets.create') }}" class="nav-link nav-toggle">
                            <span class="title">View Appoved Budgets</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--  -->
           
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Budget Implementation</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('approve_budgets') }}" class="nav-link nav-toggle">
                            <span class="title">Approve Budget</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('budget_implementation') }}" class="nav-link nav-toggle">
                            <span class="title">Implementation Request</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('budget_items') }}" class="nav-link nav-toggle">
                            <span class="title">Implementation Approval</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!--  -->
            {{-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-object-group"></i>
                    <span class="title">Registration</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  ">
                        <a href="{{ url('individual_registration') }}" class="nav-link nav-toggle">
                            <span class="title">Individual Registration</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('company_registration') }}" class="nav-link nav-toggle">
                            <span class="title">Company Registration</span>
                        </a>
                    </li>

                </ul>
            </li> --}}

            <!--  -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-object-group"></i>
                    <span class="title">Report</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  ">
                        <a href="{{ url('payment_report') }}" class="nav-link nav-toggle">
                            <span class="title">Pa</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="#" class="nav-link nav-toggle">
                            <span class="title">Mandate Report</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Users</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('users') }}" class="nav-link nav-toggle">
                            <span class="title">Add User</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('approval_users') }}" class="nav-link nav-toggle">
                            <span class="title">Approval Users</span>
                        </a> 
                    </li>
                </ul>
            </li>
            @endif


         
        </ul>
    <!-- END SIDEBAR MENU -->
    <script type="text/javascript">
        const searchbar = document.getElementById('search');
        searchbar.addEventListener('input', function(e) {
            const input = e.target.value;
            const term = input.toLowerCase();
            console.log(term);
            const items = document.querySelectorAll('.nav-item');
            // const items = list.getElementsByClassName('nav-link');
            Array.from(items).forEach(function(item) {

                console.log(item.textContent);
                if (!input) {
                    item.style.display = 'block';
                } else if (item.textContent.toLowerCase().includes(input)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            })
        })
    </script>
</div>
