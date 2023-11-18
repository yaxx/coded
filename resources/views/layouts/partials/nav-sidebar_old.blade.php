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
                <input type="search" id="search" name="search" style="margin:0px auto;" type="text" class="form-control input-circle" placeholder="Search menu...">
            </div>
        </div>
        
        @if ( groupid() == 10 )
        <li class="nav-item start active open">
            <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>
        {{-- <li class="heading">
            <form id="search_box">
                <input type="text" id="search" name="" placeholder="search..." style="border-width: 0 0 2px; width: 100%;">
            </form>
        </li> --}}
        <li class="heading">
            <h3 class="uppercase">Self Service</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">My Information</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('userprofile') }}" class="nav-link nav-toggle">
                        <span class="title">My Profile</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('update_history') }}" class="nav-link nav-toggle">
                        <span class="title">Change of Information</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('report') }}" class="nav-link nav-toggle">
                        <span class="title">Reports</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('hod_cash_request_approval') }}" class="nav-link ">
                <i class="fa fa-dollar"></i>
                <span class="title"> HOD Cash Approval</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{ url('request') }}" class="nav-link nav-toggle">
                <i class="icon-action-redo"></i>
                <span class="title">Request Actions</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="{{ url('respond') }}" class="nav-link nav-toggle">
                <i class="icon-action-undo"></i>
                <span class="title">Response Actions</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('expense_cash_request') }}" class="nav-link nav-toggle">
                <i class="fa fa-dollar"></i>
                <span class="title">Request Cash</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-speedometer"></i>
                <span class="title">Performance</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('employee_appraisal') }}" class="nav-link nav-toggle">
                        <span class="title">Self Appraisal</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('supervisor_appraisal') }}" class="nav-link nav-toggle">
                        <span class="title">Supervisor Appraisal</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('second_level_supervisor_list') }}" class="nav-link nav-toggle">
                        <span class="title">2nd Level Supervisor Comment</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-envelope"></i>
                <span class="title">My Messages</span>
                <small>( <span class="text-danger">{{message_count()}} </span>)</small>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('messages.create') }}" class="nav-link nav-toggle">
                        <i class="fa fa-pencil-square-o"></i>
                        <span class="title">Compose</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('messages') }}" class="nav-link nav-toggle">
                        <i class="fa fa-inbox"></i>
                        <span class="title">Inbox</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('sent_messages') }}" class="nav-link nav-toggle">
                        <i class="fa fa-send-o"></i>
                        <span class="title">Sent</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('draft_message')}}" class="nav-link nav-toggle">
                        <i class="fa fa-file-o"></i>
                        <span class="title">Draft</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('trashed_messages')}}" class="nav-link nav-toggle">
                        <i class="fa fa-trash"></i>
                        <span class="title">Trash</span>
                    </a>
                </li>
            </ul>
        </li>

        @if(Auth::user()->hasAnyRole('Standard User'))
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user-follow"></i>
                <span class="title">Registration</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('employee_registeration') }}" class="nav-link ">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Register Employee</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('incomplete_registeration') }}" class="nav-link ">
                        <i class="fa fa-user"></i>
                        <span class="title">Incomplete Registration</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(Auth::user()->hasAnyRole('Accounts Report Viewer'))
        <!-- Expenditure -->
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-support"></i>
                <span class="title">Expenditure</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('vendor') }}" class="nav-link ">
                        <i class="icon-grid"></i>
                        <span class="title">Vendor</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('expenditure_type') }}" class="nav-link ">
                        <i class="icon-wallet"></i>
                        <span class="title">Expenditure Type</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('expenditure_payregister') }}" class="nav-link ">
                        <i class="icon-wallet"></i>
                        <span class="title">Expenditure Pay Register</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('incomplete_expenditure_payment') }}" class="nav-link ">
                        <i class="icon-wallet"></i>
                        <span class="title">Incomplete Expenditure Pay Register</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('view_expenditure_payregister1') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">View Expenditure Pay Register</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('expense_head') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Enter Expense Items/Heads</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('expense_limit') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Set Expense Limit</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('expense_cash_request') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Request Cash</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('approve_cash_request') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Approve Request Cash</span>
                    </a>
                </li>
            </ul>
        </li>

        <!--Report-->
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-bar-chart"></i>
                <span class="title">Reports</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="{{ url('monthly_statutory_report') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Monthly Statutory Report</span></a>
                </li>


                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Salary Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_bank') }}" class="nav-link ">
                                <span class="title">Report By Bank</span></a>
                        </li>

                        @if (client_type_id() == 1)
                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_category') }}" class="nav-link ">
                                <span class="title">Report By {{ CATEGORY() }} </span></a>
                        </li>
                        @endif

                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_ministry') }}" class="nav-link ">
                                <span class="title">Report By {{ MINISTRY() }} </span></a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ url('monthly_salary_summary') }}" class="nav-link ">
                                <span class="title">Monthly Salary Summary</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('monthly_allowance_summary') }}" class="nav-link ">
                                <span class="title">Monthly Allowance Summary</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('monthly_deduction_summary') }}" class="nav-link ">
                                <span class="title">Monthly Deduction Summary</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Variation Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('generate_variation_report') }}" class="nav-link ">
                                <span class="title">Generate Variation Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('variation_report') }}" class="nav-link ">
                                <span class="title">View Variation Report</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('deduction_payment_report') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Deduction Payment</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('deduction_list') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Deduction List</span></a>
                </li>
            </ul>
        </li>
        @endif

        @if(Auth::user()->hasAnyRole('Paysheet Approval'))
        <li class="heading">
            <h3 class="uppercase" style="font-size: 12px;">Salary/Expenditure Approval</h3>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('salary_approval_summary') }}" class="nav-link ">
                <i class="icon-paper-plane"></i>
                <span class="title">Salary Approval </span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('expenditure_approval_summary') }}" class="nav-link ">
                <i class="icon-paper-plane"></i>
                <span class="title">Expenditure Approval</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('view_approved_transactions') }}" class="nav-link ">
                <i class="icon-paper-plane"></i>
                <span class="title">All Approved Transactions</span>
            </a>
        </li>
        @endif

        @if(Auth::user()->hasAnyRole('Managing Director'))
        <li class="heading">
            <h3 class="uppercase">Management Operations</h3>
        </li>
        <li class="nav-item ">
            <a href="{{ url('management_comment_list') }}" class="nav-link ">
                <i class="fa fa-book"></i>
                <span class="title">Appraisal Comment</span></a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('employee_activation_deactivation') }}" class="nav-link ">
                <i class="icon-user-following"></i>
                <span class="title">Approve Employee Activation/Deactivation </span>
            </a>
        </li>
        <!--Report-->
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-bar-chart"></i>
                <span class="title">Reports</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="{{ url('employee_list') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Employee List</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('staff_strength') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Staff Strength</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('monthly_statutory_report') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Monthly Statutory Report</span></a>
                </li>


                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Salary Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_bank') }}" class="nav-link ">
                                <span class="title">Report By Bank</span></a>
                        </li>

                        @if (client_type_id() == 1)
                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_category') }}" class="nav-link ">
                                <span class="title">Report By {{ CATEGORY() }} </span></a>
                        </li>
                        @endif

                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_ministry') }}" class="nav-link ">
                                <span class="title">Report By {{ MINISTRY() }} </span></a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ url('monthly_salary_summary') }}" class="nav-link ">
                                <span class="title">Monthly Salary Summary</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('monthly_allowance_summary') }}" class="nav-link ">
                                <span class="title">Monthly Allowance Summary</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('monthly_deduction_summary') }}" class="nav-link ">
                                <span class="title">Monthly Deduction Summary</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Variation Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('generate_variation_report') }}" class="nav-link ">
                                <span class="title">Generate Variation Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('variation_report') }}" class="nav-link ">
                                <span class="title">View Variation Report</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('deduction_payment_report') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Deduction Payment</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('deduction_list') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Deduction List</span></a>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Performance Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('appraisal_reports') }}" class="nav-link ">
                                <span class="title">Appraisal Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('appraisal_comment_reports') }}" class="nav-link ">
                                <span class="title">Appraisal Comment Report</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Checkin</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('checkin_report_search') }}" class="nav-link ">
                                <span class="title">Checkin Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('checkin_report_summary') }}" class="nav-link ">
                                <span class="title">Checkin Report Summary</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif


        <!-- Procurement officer for private -->
        @if(Auth::user()->hasAnyRole('Procurement Officer'))
        <li class="heading">
            <h3 class="uppercase" style="font-size: 12px;">Procurement Officer</h3>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('vendor') }}" class="nav-link ">
                <i class="icon-user-follow"></i>
                <span class="title"> Enroll New Vendor </span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('procurement_items') }}" class="nav-link ">
                <i class="icon-list"></i>
                <span class="title"> Procurement Items</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('purchase_order') }}" class="nav-link ">
                <i class="fa fa-cc-mastercard"></i>
                <span class="title">Local Purchase Order</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('confirm_lpo_delivery') }}" class="nav-link ">
                <i class="fa fa-check-square-o"></i>
                <span class="title">Confirm LPO Supply</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('lpo_status_report') }}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title">View LPO Status</span>
            </a>
        </li>

        @endif


        @if(Auth::user()->hasAnyRole('Procurement Manager'))
        <li class="heading">
            <h3 class="uppercase" style="font-size: 12px;">Procurement Manager</h3>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('approve_lpo_request') }}" class="nav-link ">
                <i class="icon-user-following"></i>
                <span class="title">Approve LPO </span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('process_lpo_payment') }}" class="nav-link ">
                <i class="fa fa-money"></i>
                <span class="title">Process Vendor Payment</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('vendor') }}" class="nav-link ">
                <i class="fa fa-user"></i>
                <span class="title">Delist Vendor</span>
            </a>
        </li>
        {{-- <li class="nav-item  ">
                    <a href="{{ url('approved_expenditure_payregister') }}" class="nav-link ">
        <i class="icon-wallet"></i>
        <span class="title">Set Contract Limits</span>
        </a>
        </li> --}}
        <li class="nav-item  ">
            <a href="{{ url('lpo_performance_report') }}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title">LPO Performance Report</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('lpo_status_report') }}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title">LPO status Report</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('payment_outstanding_report') }}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title">Payment Outstanding Report</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('vendor_report') }}" class="nav-link ">
                <i class="icon-bar-chart"></i>
                <span class="title">Vendor Report</span>
            </a>
        </li>
        {{-- <li class="nav-item  ">
                    <a href="{{ url('expenditure_payregister') }}" class="nav-link ">
        <i class="icon-bar-chart"></i>
        <span class="title">Schedule Expense</span>
        </a>
        </li> --}}
        {{-- <li class="nav-item  ">
                    <a href="{{ url('view_expenditure_payregister1') }}" class="nav-link ">
        <i class="icon-bar-chart"></i>
        <span class="title">Aprrove Expense</span>
        </a>
        </li> --}}
        @endif
        @if(Auth::user()->hasAnyRole('Customer Service/Sales Officer'))
        <li class="heading">
            <h3 class="uppercase" style="font-size: 12px;">Customer Service</h3>
        </li>
        {{-- <li class="nav-item  ">
                    <a href="{{ url('customer') }}" class="nav-link ">
        <i class="fa fa-user"></i>
        <span class="title">Enter New Customer </span>
        </a>
        </li> --}}
        <li class="nav-item  ">
            <a href="{{ url('sales_products') }}" class="nav-link ">
                <i class="fa fa-cart-plus"></i>
                <span class="title">Add Sales Products</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('sales_items') }}" class="nav-link ">
                <i class="icon-wallet"></i>
                <span class="title">Create Sales Item</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('sales_coupon') }}" class="nav-link ">
                <i class="fa fa-book"></i>
                <span class="title">Create Discount Coupon </span>
            </a>
        </li>
        {{-- <li class="nav-item  ">
                    <a href="{{ url('sales_products') }}" class="nav-link ">
        <i class="icon-user-following"></i>
        <span class="title">Process Sales Transaction </span>
        </a>
        </li> --}}


        {{-- <li class="nav-item  ">
                    <a href="{{ url('customer') }}" class="nav-link ">
        <i class="fa fa-book"></i>
        <span class="title">Issue/Print Receipt </span>
        </a>
        </li> --}}
        <li class="nav-item  ">
            <a href="{{ url('customer') }}" class="nav-link ">
                <i class="fa fa-user"></i>
                <span class="title">View Customer Information</span>
            </a>
        </li>

        @endif
        @if(Auth::user()->hasAnyRole('Shop/Location Manager'))
        <li class="heading">
            <h3 class="uppercase" style="font-size: 12px;">Location Manager</h3>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('sales_coupon') }}" class="nav-link ">
                <i class="fa fa-book"></i>
                <span class="title">Generate Discount Coupon </span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('sales_return') }}" class="nav-link ">
                <i class="icon-paper-plane"></i>
                <span class="title">Receive return orders </span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('fixed_assets') }}" class="nav-link ">
                <i class="fa fa-home"></i>
                <span class="title">fixed Asset </span>
            </a>
        </li>

        @endif
        @if(Auth::user()->hasAnyRole('HR Manager'))
        <!--HR Operations-->
        <li class="heading">
            <h3 class="uppercase">HR Operations</h3>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('user_role') }}" class="nav-link ">
                <i class="icon-user"></i>
                <span class="title">User Role</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user-follow"></i>
                <span class="title">Registration</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('employee_registeration') }}" class="nav-link ">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Register Employee</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('update_reg_info') }}" class="nav-link ">
                        <i class="fa fa-user"></i>
                        <span class="title">Update Registeration</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('incomplete_registeration') }}" class="nav-link ">
                        <i class="fa fa-user"></i>
                        <span class="title">Incomplete Registration</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('activate_employee') }}" class="nav-link ">
                        <i class="fa fa-user"></i>
                        <span class="title">Activate/Deactivate Employee</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-briefcase"></i>
                <span class="title">Leave Management</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="{{ url('leave_types') }}" class="nav-link ">
                        <span class="title">Leave Types</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-speedometer"></i>
                <span class="title">Performance</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <!-- <li class="nav-item ">
                            <a href="{{ url('manage_competency_group') }}" class="nav-link ">
                            <span class="title">Competency Group</span></a>
                        </li> -->
                <li class="nav-item ">
                    <a href="{{ url('appraisal_cycle') }}" class="nav-link ">
                        <i class="fa fa-refresh"></i>
                        <span class="title">Appraisal Cycle</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('appraisal_type') }}" class="nav-link ">
                        <i class="fa fa-tags"></i>
                        <span class="title">Appraisal Type</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('manage_kpi') }}" class="nav-link ">
                        <i class="fa fa-newspaper-o"></i>
                        <span class="title">KPIs</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('kpi_mapping') }}" class="nav-link ">
                        <i class="fa fa-map"></i>
                        <span class="title">KPI Mappings</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('appraisal_assessment') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Appraisal Assessment</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('hr_appraisal_comment_list') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">HR Appraisal Comment</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('lock_appraisal_cycle') }}" class="nav-link ">
                        <i class="fa fa-lock"></i>
                        <span class="title">Lock Appraisal Cycle</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('hr_request') }}" class="nav-link nav-toggle">
                <i class="icon-layers"></i>
                <span class="title">View Requests</span>

            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ url('discipline_action') }}" class="nav-link ">
                <i class="icon-folder-alt"></i>
                <span class="title">Discipline Actions</span></a>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('uploads') }}" class="nav-link ">
                <i class="icon-screen-desktop"></i>
                <span class="title">Upload Dashboard</span>
            </a>
        </li>
        <!-- Checkin -->
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-calendar"></i>
                <span class="title">Checkin Setup</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('checkin_interval') }}" class="nav-link ">
                        <i class="icon-clock"></i>
                        <span class="title">Checkin Interval</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('checkin_calendar') }}" class="nav-link ">
                        <i class="fa fa-calendar"></i>
                        <span class="title">Checkin Calendar</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('checkin_exclusion') }}" class="nav-link ">
                        <i class="fa fa-calendar-times-o"></i>
                        <span class="title">Checkin Exclusion</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('checkin_deduction') }}" class="nav-link ">
                        <i class="fa fa-calendar-minus-o"></i>
                        <span class="title">Set Checkin Deductions</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('generate_checkin_deduction') }}" class="nav-link ">
                        <i class="fa fa-refresh"></i>
                        <span class="title">Generate Checkin Deduction</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- <li class="nav-item ">
                    <a href="{{ url('general_information') }}" class="nav-link ">
                    <i class="icon-pointer"></i>
                    <span class="title">General Information</span></a>
                </li>    -->
        <!--Report-->
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-bar-chart"></i>
                <span class="title">Reports</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="{{ url('employee_list') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Employee List</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('staff_strength') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Staff Strength</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('monthly_statutory_report') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Monthly Statutory Report</span></a>
                </li>


                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Salary Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_bank') }}" class="nav-link ">
                                <span class="title">Report By Bank</span></a>
                        </li>

                        @if (client_type_id() == 1)
                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_category') }}" class="nav-link ">
                                <span class="title">Report By {{ CATEGORY() }} </span></a>
                        </li>
                        @endif

                        <li class="nav-item ">
                            <a href="{{ url('monthly_payroll_report_ministry') }}" class="nav-link ">
                                <span class="title">Report By {{ MINISTRY() }} </span></a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ url('monthly_salary_summary') }}" class="nav-link ">
                                <span class="title">Monthly Salary Summary</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('monthly_allowance_summary') }}" class="nav-link ">
                                <span class="title">Monthly Allowance Summary</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('monthly_deduction_summary') }}" class="nav-link ">
                                <span class="title">Monthly Deduction Summary</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Variation Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('generate_variation_report') }}" class="nav-link ">
                                <span class="title">Generate Variation Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('variation_report') }}" class="nav-link ">
                                <span class="title">View Variation Report</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('deduction_payment_report') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Deduction Payment</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('deduction_list') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Deduction List</span></a>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Performance Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('appraisal_reports') }}" class="nav-link ">
                                <span class="title">Appraisal Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('appraisal_comment_reports') }}" class="nav-link ">
                                <span class="title">Appraisal Comment Report</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Checkin</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('checkin_report_search') }}" class="nav-link ">
                                <span class="title">Checkin Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('checkin_report_summary') }}" class="nav-link ">
                                <span class="title">Checkin Report Summary</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif

        @if(Auth::user()->hasAnyRole(['PayRoll Officer', 'Accounts']))
        @if(client_type_id() == 1)
        <li class="heading">
            <h3 class="uppercase font-blue bold">Account Operations</h3>
        </li>
        @else(client_type_id() == 2)
        <li class="heading">
            <h3 class="uppercase font-blue bold">Payroll Operations</h3>
        </li>
        @endif


        <!-- Salary Menu -->
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-wallet"></i>
                <span class="title">Salary Configurations</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('salary_structure') }}" class="nav-link ">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">Salary Structure</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('salary_grade') }}" class="nav-link ">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">Salary Grade</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('incremental_step') }}" class="nav-link ">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">Incremental Step Setup</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i>
                        <span class="title">Basic Salary Setup</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('basic_salaries') }}" class="nav-link ">
                                <span class="title">Basic Salary</span></a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{ url('basic_salary') }}" class="nav-link ">
                                <span class="title">Update Basic Salary</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i>
                        <span class="title">Allowance</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('allowance_name') }}" class="nav-link ">
                                <span class="title">Allowance Name</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('unit_allowance') }}" class="nav-link ">
                                <span class="title">Unit Allowance</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('allowance_exclusion') }}" class="nav-link ">
                                <span class="title">Allowance Exclusion</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('nontaxable_allowance') }}" class="nav-link ">
                                <span class="title">Nontaxable Allowance</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i>
                        <span class="title">Deduction</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('deduction_name') }}" class="nav-link ">
                                <span class="title">Deduction Name</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('deduction_account') }}" class="nav-link ">
                                <span class="title">Deduction Account</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('unit_deduction') }}" class="nav-link ">
                                <span class="title">Unit Deduction</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('overpayments') }}" class="nav-link ">
                                <span class="title">Overpayments</span></a>
                        </li>
                        <!-- <li class="nav-item ">
                                    <a href="{{ url('universal_deductions') }}" class="nav-link ">
                                    <span class="title">Universal Deduction</span></a>
                                </li> -->
                        <li class="nav-item ">
                            <a href="{{ url('deduction_exclusions') }}" class="nav-link ">
                                <span class="title">Deduction Exclusion</span></a>
                        </li>
                </li>
            </ul>
            <!-- <li class="nav-item  ">
                                <a href="{{ url('percentage_payment') }}" class="nav-link ">
                                    <i class="fa fa-asterisk"></i>
                                    <span class="title">Percentage Payment</span>
                                </a>
                            </li> -->
        </li>
    </ul>
    </li>

    <!--Monthly Payroll-->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-diamond"></i>
            <span class="title">Monthly Payroll</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a class="nav-link ">
                    <i class="fa fa-money"></i>
                    <span class="title">Generate Pay Register</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('generate_bulk_pay_register') }}" class="nav-link ">
                            <span class="title">Bulk Pay Register</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('generate_bulk_payregister_by_period') }}" class="nav-link ">
                            <span class="title">Bulk Pay Register By Period</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('generate_individual_pay_register') }}" class="nav-link ">
                            <span class="title">Individual Pay Register</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="{{ url('payroll_mda_acl') }}" class="nav-link ">
                    <i class="fa fa-money"></i>
                    <span class="title">Payroll {{ MINISTRY() }} Access</span></a>
            </li>
        </ul>

    </li>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-bank"></i>
            <span class="title">Bank Setup</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="{{ url('bank') }}" class="nav-link ">
                    <span class="title">Banks</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('bank_branches') }}" class="nav-link ">
                    <span class="title">Bank Branches</span>
                </a>
            </li>
            <!--   <li class="nav-item  ">
                                    <a href="{{ url('mfb_proxy_account') }}" class="nav-link ">
                                        <span class="title">MFB Proxy Accounts</span>
                                    </a>
                                </li> -->
        </ul>
    </li>
    <li class="nav-item  ">
        <a href="{{ url('uploads') }}" class="nav-link ">
            <i class="icon-screen-desktop"></i>
            <span class="title">Upload Dashboard</span>
        </a>
    </li>

    <!-- Expenditure -->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-support"></i>
            <span class="title">Expenditure</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="{{ url('vendor') }}" class="nav-link ">
                    <i class="icon-grid"></i>
                    <span class="title">Vendor</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('expenditure_type') }}" class="nav-link ">
                    <i class="icon-wallet"></i>
                    <span class="title">Expenditure Type</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('expenditure_payregister') }}" class="nav-link ">
                    <i class="icon-wallet"></i>
                    <span class="title">Expenditure Pay Register</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('incomplete_expenditure_payment') }}" class="nav-link ">
                    <i class="icon-wallet"></i>
                    <span class="title">Incomplete Expenditure Pay Register</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('view_expenditure_payregister1') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">View Expenditure Pay Register</span>
                </a>
            </li>
        </ul>
    </li>

    <!--Report-->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-bar-chart"></i>
            <span class="title">Reports</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item ">
                <a href="{{ url('monthly_statutory_report') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Monthly Statutory Report</span></a>
            </li>


            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Salary Report</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_bank') }}" class="nav-link ">
                            <span class="title">Report By Bank</span></a>
                    </li>

                    @if (client_type_id() == 1)
                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_category') }}" class="nav-link ">
                            <span class="title">Report By {{ CATEGORY() }} </span></a>
                    </li>
                    @endif

                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_ministry') }}" class="nav-link ">
                            <span class="title">Report By {{ MINISTRY() }} </span></a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ url('monthly_salary_summary') }}" class="nav-link ">
                            <span class="title">Monthly Salary Summary</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('monthly_allowance_summary') }}" class="nav-link ">
                            <span class="title">Monthly Allowance Summary</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('monthly_deduction_summary') }}" class="nav-link ">
                            <span class="title">Monthly Deduction Summary</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Variation Report</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('generate_variation_report') }}" class="nav-link ">
                            <span class="title">Generate Variation Report</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('variation_report') }}" class="nav-link ">
                            <span class="title">View Variation Report</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a href="{{ url('deduction_payment_report') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Deduction Payment</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('deduction_list') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Deduction List</span></a>
            </li>
        </ul>
    </li>
    @endif


    <!-- admin -->
    <!-- Note: 1 - Private 2 - Government 3 - Pension -->
    @elseif ( (groupid() == 111111 || groupid() == 2000) && (client_type_id() == 1 || client_type_id() == 2))

    <li class="nav-item start active open">
        <a href="{{ url('/home') }}" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>
    <!-- <li class="heading">
                    <h3 class="uppercase">Setup</h3>
                </li> -->
    <li class="nav-item">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">Control Panel</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">

            <li class="nav-item  ">
                <a href="{{ url('user_role') }}" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">User Role</span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-building"></i>
                    <span class="title">{{ MDA() }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('categories') }}" class="nav-link ">
                            <span class="title">{{ CATEGORY() }}</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('ministries') }}" class="nav-link ">
                            <span class="title">{{ MINISTRY() }}</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('departments') }}" class="nav-link ">
                            <span class="title">Department</span></a>
                    </li>
                </ul>
            </li>


            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bank"></i>
                    <span class="title">Bank Setup</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <!-- <li class="nav-item  ">
                                    <a href="{{ url('bank') }}" class="nav-link ">
                                        <span class="title">Banks</span>
                                    </a>
                                </li> -->
                    <li class="nav-item  ">
                        <a href="{{ url('bank_branches') }}" class="nav-link ">
                            <span class="title">Bank Branches</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item  ">
                                    <a href="{{ url('mfb_proxy_account') }}" class="nav-link ">
                                        <span class="title">MFB Proxy Accounts</span>
                                    </a>
                                </li> -->
                </ul>
            </li>

            <!-- <li class="nav-item  ">
                            <a href="{{ url('cities') }}" class="nav-link ">
                                <i class="glyphicon glyphicon-globe"></i>
                                <span class="title">Cities</span>
                            </a>
                        </li> -->

            <li class="nav-item  ">
                <a href="{{ url('designations') }}" class="nav-link ">
                    <i class="fa fa-star"></i>
                    <span class="title">Designations</span>
                </a>
            </li>
            @if (client_type_id() == 2)
            <li class="nav-item  ">
                <a href="{{ url('establishment') }}" class="nav-link ">
                    <i class="fa fa-folder-open-o"></i>
                    <span class="title">Entry Establishment</span>
                </a>
            </li>
            @endif

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-feed"></i>
                    <span class="title">Administrator</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('nhisadmin') }}" class="nav-link ">
                            <span class="title">NHIS Administrator</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('pfas') }}" class="nav-link ">
                            <span class="title">PFA</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('groupprefixes') }}" class="nav-link ">
                            <span class="title">Group Prefixes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('qualifications') }}" class="nav-link ">
                    <i class="icon-graduation"></i>
                    <span class="title">Qualifications</span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-screen-tablet"></i>
                    <span class="title">Mobile Setup</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('users') }}" class="nav-link ">
                            <span class="title">Admin/Mobile User</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('mobile_assignments') }}" class="nav-link ">
                            <span class="title">Set Assignments</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('authorize_assignments') }}" class="nav-link ">
                            <span class="title">Authorize Assignments</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('authorize_devices') }}" class="nav-link ">
                            <span class="title">Authorize Devices</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('manage_devices') }}" class="nav-link ">
                            <span class="title">Manage Device</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <!-- Salary Menu -->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-wallet"></i>
            <span class="title">Salary Configurations</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="{{ url('salary_structure') }}" class="nav-link ">
                    <i class="fa fa-credit-card"></i>
                    <span class="title">Salary Structure</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('salary_grade') }}" class="nav-link ">
                    <i class="fa fa-credit-card"></i>
                    <span class="title">Salary Grade</span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="{{ url('incremental_step') }}" class="nav-link ">
                    <i class="fa fa-credit-card"></i>
                    <span class="title">Incremental Step Setup</span>
                </a>
            </li>
            @if (client_type_id() == 1 || client_type_id() == 2)
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Basic Salary Setup</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('basic_salaries') }}" class="nav-link ">
                            <span class="title">Basic Salary</span></a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ url('basic_salary') }}" class="nav-link ">
                            <span class="title">Update Basic Salary</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Allowance</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('allowance_name') }}" class="nav-link ">
                            <span class="title">Allowance Name</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('unit_allowance') }}" class="nav-link ">
                            <span class="title">Unit Allowance</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('allowance_exclusion') }}" class="nav-link ">
                            <span class="title">Allowance Exclusion</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('nontaxable_allowance') }}" class="nav-link ">
                            <span class="title">Nontaxable Allowance</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Deduction</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('deduction_name') }}" class="nav-link ">
                            <span class="title">Deduction Name</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('deduction_account') }}" class="nav-link ">
                            <span class="title">Deduction Account</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('unit_deduction') }}" class="nav-link ">
                            <span class="title">Unit Deduction</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('overpayments') }}" class="nav-link ">
                            <span class="title">Overpayments</span></a>
                    </li>
                    <!-- <li class="nav-item ">
                            <a href="{{ url('universal_deductions') }}" class="nav-link ">
                            <span class="title">Universal Deduction</span></a>
                        </li>  -->
                    <!-- <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <span class="title">Fixed Deductions</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="#" class="nav-link ">
                                    <span class="title">NHIS Fixed Deductions</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#" class="nav-link ">
                                    <span class="title">NHF Fixed Deductions</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#" class="nav-link ">
                                    <span class="title">Life Assurance Fixed Deductions</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#" class="nav-link ">
                                    <span class="title">Gratuity Fixed Deductions</span></a>
                                </li>
                            </ul> -->
                    <li class="nav-item ">
                        <a href="{{ url('deduction_exclusions') }}" class="nav-link ">
                            <span class="title">Deduction Exclusion</span></a>
                    </li>
            </li>
        </ul>
        @endif
        <!-- <li class="nav-item  ">
                        <a href="{{ url('percentage_payment') }}" class="nav-link ">
                            <i class="fa fa-asterisk"></i>
                            <span class="title">Percentage Payment</span>
                        </a>
                    </li> -->
    </li>
    </ul>
    </li>
    <!--Monthly Payroll-->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-diamond"></i>
            <span class="title">Monthly Payroll</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a class="nav-link ">
                    <i class="fa fa-money"></i>
                    <span class="title">Generate Pay Register</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('generate_bulk_pay_register') }}" class="nav-link ">
                            <span class="title">Bulk Pay Register</span>
                        </a>
                    </li>
                    @if(client_type_id() == 1)
                    <li class="nav-item  ">
                        <a href="{{ url('generate_bulk_payregister_by_period') }}" class="nav-link ">
                            <span class="title">Bulk Pay Register By Period</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item  ">
                        <a href="{{ url('generate_individual_pay_register') }}" class="nav-link ">
                            <span class="title">Individual Pay Register</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="{{ url('payroll_mda_acl') }}" class="nav-link ">
                    <i class="fa fa-money"></i>
                    <span class="title">Payroll {{ MINISTRY() }} Access</span></a>
            </li>
        </ul>

    </li>
    <!--Registration Operations-->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user-follow"></i>
            <span class="title">Registration</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="{{ url('employee_registeration') }}" class="nav-link ">
                    <i class="fa fa-user-plus"></i>
                    <span class="title">Register Employee</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('update_reg_info') }}" class="nav-link ">
                    <i class="fa fa-user"></i>
                    <span class="title">Search/Resume Registration</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('incomplete_registeration') }}" class="nav-link ">
                    <i class="fa fa-user"></i>
                    <span class="title">Incomplete Registration</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('activate_employee') }}" class="nav-link ">
                    <i class="fa fa-user"></i>
                    <span class="title">Activate/Deactivate Employees</span>
                </a>
            </li>

            <!-- <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-upload"></i>
                        <span class="title">Upload Setup</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('uploads') }}" class="nav-link ">
                            <span class="title">Upload </span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('upload_employee') }}" class="nav-link ">
                            <span class="title">Upload Employee Info</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('upload_basic_salary') }}" class="nav-link ">
                            <span class="title">Upload Basic Salary</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('upload_basic_allowance') }}" class="nav-link ">
                            <span class="title">Upload Basic Allowance</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('upload_basic_deduction') }}" class="nav-link ">
                            <span class="title">Upload Basic Deduction</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('upload_basic_leave_allowance.index') }}" class="nav-link ">
                            <span class="title">Upload Leave Allowance</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('upload_unit_allowance.index') }}" class="nav-link ">
                            <span class="title">Upload Unit Allowance</span></a>
                        </li>
                         <li class="nav-item ">
                            <a href="{{ route('upload_allowance_exclusion.index') }}" class="nav-link ">
                            <span class="title">Upload Allowance Exclusion</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('upload_deduction_exclusion') }}" class="nav-link ">
                            <span class="title">Upload Deduction Exclusion</span></a>
                        </li> -->
            <!--    <li class="nav-item ">
                            <a href="{{ url('upload_la_fixed_deduction') }}" class="nav-link ">
                            <span class="title">Upload Life Assurance Fixed Deduction</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('upload_nhf_fixed_deduction') }}" class="nav-link ">
                            <span class="title">Upload NHF Fixed Deduction</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('upload_nhis_fixed_deduction') }}" class="nav-link ">
                            <span class="title">Upload NHIS Fixed Deduction</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('upload_pension_fixed_deduction') }}" class="nav-link ">
                            <span class="title">Upload Pension Fixed Deduction</span></a>
                        </li> -->
            <!-- </ul>
                </li> -->
        </ul>
    </li>
    <!--Uploads-->
    <li class="nav-item  ">
        <a href="{{ url('uploads') }}" class="nav-link ">
            <i class="icon-screen-desktop"></i>
            <span class="title">Upload Dashboard</span>
        </a>
    </li>

    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-envelope"></i>
            <span class="title">My Messages</span>
            <small>( <span class="text-danger">{{message_count()}} </span>)</small>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="{{ route('messages.create') }}" class="nav-link nav-toggle">
                    <i class="fa fa-pencil-square-o"></i>
                    <span class="title">Compose</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('messages') }}" class="nav-link nav-toggle">
                    <i class="fa fa-inbox"></i>
                    <span class="title">Inbox</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('sent_messages') }}" class="nav-link nav-toggle">
                    <i class="fa fa-send-o"></i>
                    <span class="title">Sent</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('draft_message')}}" class="nav-link nav-toggle">
                    <i class="fa fa-file-o"></i>
                    <span class="title">Draft</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('trashed_messages')}}" class="nav-link nav-toggle">
                    <i class="fa fa-trash"></i>
                    <span class="title">Trash</span>
                </a>
            </li>
        </ul>
    </li>


    <!-- Checkin -->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-calendar"></i>
            <span class="title">Checkin Setup</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="{{ url('checkin_interval') }}" class="nav-link ">
                    <i class="icon-clock"></i>
                    <span class="title">Checkin Interval</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('checkin_calendar') }}" class="nav-link ">
                    <i class="fa fa-calendar"></i>
                    <span class="title">Checkin Calendar</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('checkin_exclusion') }}" class="nav-link ">
                    <i class="fa fa-calendar-times-o"></i>
                    <span class="title">Checkin Exclusion</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('checkin_deduction') }}" class="nav-link ">
                    <i class="fa fa-calendar-minus-o"></i>
                    <span class="title">Set Checkin Deduction</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('generate_checkin_deduction') }}" class="nav-link ">
                    <i class="fa fa-refresh"></i>
                    <span class="title">Generate Checkin Deduction</span>
                </a>
            </li>
        </ul>
    </li>
    <!--service Information-->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-briefcase"></i>
            <span class="title">Service Information</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item ">
                <a href="{{ url('client_service_update') }}" class="nav-link ">
                    <i class="icon-briefcase"></i>
                    <span class="title">View/Update Information</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('client_service_account') }}" class="nav-link ">
                    <i class="icon-wallet"></i>
                    <span class="title">Payment Deduction Account</span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="{{ url('approval_level') }}" class="nav-link ">
                    <i class="icon-paper-plane"></i>
                    <span class="title">Payment Approval Level</span>
                </a>
            </li>
        </ul>
    </li>

    <!--Report-->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-bar-chart"></i>
            <span class="title">Reports</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item ">
                <a href="{{ url('employee_list') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Employee List</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('staff_strength') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Staff Strength</span></a>
            </li>
            <!-- <li class="nav-item ">
                    <a href="{{ url('staff_strength_by_gender') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Staff Strength by Gender</span></a>
                 </li> -->
            <li class="nav-item ">
                <a href="{{ url('monthly_statutory_report') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Monthly Statutory Report</span></a>
            </li>


            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Salary Report</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_bank') }}" class="nav-link ">
                            <span class="title">Report By Bank</span></a>
                    </li>

                    @if (client_type_id() == 1)
                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_category') }}" class="nav-link ">
                            <span class="title">Report By {{ CATEGORY() }} </span></a>
                    </li>
                    @endif

                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_ministry') }}" class="nav-link ">
                            <span class="title">Report By {{ MINISTRY() }} </span></a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ url('monthly_salary_summary') }}" class="nav-link ">
                            <span class="title">Monthly Salary Summary</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('monthly_allowance_summary') }}" class="nav-link ">
                            <span class="title">Monthly Allowance Summary</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('monthly_deduction_summary') }}" class="nav-link ">
                            <span class="title">Monthly Deduction Summary</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Variation Report</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('generate_variation_report') }}" class="nav-link ">
                            <span class="title">Generate Variation Report</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('variation_report') }}" class="nav-link ">
                            <span class="title">View Variation Report</span></a>
                    </li>
                </ul>
            </li>


            <!-- <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Leave Allowance</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('generate_leave_allowance') }}" class="nav-link ">
                            <span class="title">Generate Leave Allowance</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('leave_allowance_report') }}" class="nav-link ">
                            <span class="title">Leave Allowance Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('leave_allowance_report_summary') }}" class="nav-link ">
                            <span class="title">Leave Allowance Report Summary</span></a>
                        </li>
                    </ul>
                </li> -->

            <li class="nav-item ">
                <a href="{{ url('deduction_payment_report') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Deduction Payment</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('deduction_list') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Deduction List</span></a>
            </li>
            <!-- <li class="nav-item ">
                    <a href="{{ url('verified_employees_report') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Verified Employees</span></a>
                 </li> -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Performance Report</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('appraisal_reports') }}" class="nav-link ">
                            <span class="title">Appraisal Report</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('appraisal_comment_reports') }}" class="nav-link ">
                            <span class="title">Appraisal Comment Report</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Checkin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('checkin_report_search') }}" class="nav-link ">
                            <span class="title">Checkin Report</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('checkin_report_summary') }}" class="nav-link ">
                            <span class="title">Checkin Report Summary</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    <!-- Vendor Classification -->
    <!--  <li class="nav-item  ">
                    <a href="{{ url('vendor_classification') }}" class="nav-link ">
                        <i class="icon-user-follow"></i>
                        <span class="title">Vendor Classification</span>
                    </a>
                </li> -->

    <!-- Award Category-->

    <!--    <li class="nav-item">
                    <a href="" class="nav-link nav-toggle">
                    <i class="icon-li icon-ok"></i>
                        <span class="title">Award Category</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item  ">
                            <a href="{{url('setup_award')}}" class="nav-link ">
                                <i class="icon-user"></i>
                                <span class="title">Setup Award</span>
                            </a>
                        </li> -->
    <!-- Vendor Classification -->


    @if(Auth::user()->hasAnyRole('Paysheet Approval'))
    <li class="heading">
        <h3 class="uppercase" style="font-size: 12px;">Salary/Expenditure Approval</h3>
    </li>
    <li class="nav-item  ">
        <a href="{{ url('salary_approval_summary') }}" class="nav-link ">
            <i class="icon-paper-plane"></i>
            <span class="title">Salary Approval </span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="{{ url('expenditure_approval_summary') }}" class="nav-link ">
            <i class="icon-paper-plane"></i>
            <span class="title">Expenditure Approval</span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="{{ url('view_approved_transactions') }}" class="nav-link ">
            <i class="icon-paper-plane"></i>
            <span class="title">All Approved Transactions</span>
        </a>
    </li>
    @endif


    <!--supervisor-->

    @elseif ( groupid() == 222222 && (client_type_id() == 1 || client_type_id() == 2) )
    <li class="nav-item start active open">
        <a href="{{ url('home') }}" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>
    <!--Authorization-->
    <li class="nav-item ">
        <a href="{{ url('authorization_dashboard') }}" class="nav-link ">
            <i class="fa fa-television"></i>
            <span class="title">Authorization Dashboard</span></a>
    </li>
    <!-- <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-bulb"></i>
                        <span class="title">Authorization</span>
                        <span class="arrow"></span>
                    </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="{{ url('authorization_dashboard') }}" class="nav-link ">
                    <i class="fa fa-television"></i>
                    <span class="title">Authorization Dashboard</span></a>
                 </li> -->

    <!-- <li class="nav-item ">
                    <a href="{{ url('authorization_levels') }}" class="nav-link ">
                    <i class="fa fa-level-up"></i>
                    <span class="title">Authorization Levels</span></a>
                </li> -->
    <!-- </ul>
        </li>  -->
    <li class="nav-item  ">
        <a href="{{ url('employee_activation_deactivation') }}" class="nav-link ">
            <i class="icon-user-following"></i>
            <span class="title">Approve Employee Activation/Deactivation </span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="{{ url('authorize_checkin_calender') }}" class="nav-link ">
            <i class="icon-calendar"></i>
            <span class="title">Authorize Checkin Calendar </span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-screen-tablet"></i>
            <span class="title">Mobile Setup</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="{{ url('mobile_assignments') }}" class="nav-link ">
                    <span class="title">Set Assignments</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('authorize_assignments') }}" class="nav-link ">
                    <span class="title">Authorize Assignments</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('authorize_devices') }}" class="nav-link ">
                    <span class="title">Authorize Devices</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('manage_devices') }}" class="nav-link ">
                    <span class="title">Manage Device</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-envelope"></i>
            <span class="title">My Messages</span>
            <small>( <span class="text-danger">{{message_count()}} </span>)</small>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="{{ route('messages.create') }}" class="nav-link nav-toggle">
                    <i class="fa fa-pencil-square-o"></i>
                    <span class="title">Compose</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('messages') }}" class="nav-link nav-toggle">
                    <i class="fa fa-inbox"></i>
                    <span class="title">Inbox</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('sent_messages') }}" class="nav-link nav-toggle">
                    <i class="fa fa-send-o"></i>
                    <span class="title">Sent</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('draft_message')}}" class="nav-link nav-toggle">
                    <i class="fa fa-file-o"></i>
                    <span class="title">Draft</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ url('trashed_messages')}}" class="nav-link nav-toggle">
                    <i class="fa fa-trash"></i>
                    <span class="title">Trash</span>
                </a>
            </li>
        </ul>
    </li>

    <!--Report-->
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-bar-chart"></i>
            <span class="title">Reports</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item ">
                <a href="{{ url('employee_list') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Employee List</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('staff_strength') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Staff Strength</span></a>
            </li>

            <li class="nav-item ">
                <a href="{{ url('monthly_statutory_report') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Monthly Statutory Report</span></a>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Salary Report</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_bank') }}" class="nav-link ">
                            <span class="title">Report By Bank</span></a>
                    </li>

                    @if (client_type_id() == 1)
                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_category') }}" class="nav-link ">
                            <span class="title">Report By {{ CATEGORY() }} </span></a>
                    </li>
                    @endif

                    <li class="nav-item ">
                        <a href="{{ url('monthly_payroll_report_ministry') }}" class="nav-link ">
                            <span class="title">Report By {{ MINISTRY() }}</span></a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ url('monthly_salary_summary') }}" class="nav-link ">
                            <span class="title">Monthly Salary Summary</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('monthly_allowance_summary') }}" class="nav-link ">
                            <span class="title">Monthly Allowance Summary</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('monthly_deduction_summary') }}" class="nav-link ">
                            <span class="title">Monthly Deduction Summary</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Variation Report</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('generate_variation_report') }}" class="nav-link ">
                            <span class="title">Generate Variation Report</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('variation_report') }}" class="nav-link ">
                            <span class="title">View Variation Report</span></a>
                    </li>
                </ul>
            </li>

            <!-- <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Leave Allowance</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('generate_leave_allowance') }}" class="nav-link ">
                            <span class="title">Generate Leave Allowance</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('leave_allowance_report') }}" class="nav-link ">
                            <span class="title">Leave Allowance Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('leave_allowance_report_summary') }}" class="nav-link ">
                            <span class="title">Leave Allowance Report Summary</span></a>
                        </li>
                    </ul>
                </li> -->

            <li class="nav-item ">
                <a href="{{ url('deduction_payment_report') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Deduction Payment</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('deduction_list') }}" class="nav-link ">
                    <i class="fa fa-book"></i>
                    <span class="title">Deduction List</span></a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">Checkin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ url('checkin_report_search') }}" class="nav-link ">
                            <span class="title">Checkin Report</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('checkin_report_summary') }}" class="nav-link ">
                            <span class="title">Checkin Report Summary</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>


    <!-- Note: 1 - Private 2 - Government 3 - Pension -->
    @elseif ( (groupid() == 111111 || groupid() == 222222) || (groupid() >= 3000 && groupid() <= 3999) &&
        client_type_id()==3 ) <!--Pension-->

        <li class="nav-item start active open">
            <a href="{{ url('home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->hasAnyRole('Pension Board Manager Group') || (groupid() == 111111 || groupid() == 222222) )
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">Control Panel</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">User Setup</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('pension_users') }}" class="nav-link ">
                                <span class="title">Users</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('user_role') }}" class="nav-link ">
                                <span class="title">User Role</span></a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item ">
                                <a href="{{ url('manage_pension_biometrics') }}" class="nav-link ">
                                <i class="icon-user-following"></i>
                                <span class="title">Pension Biometrics</span></a>
                            </li> -->
                <li class="nav-item ">
                    <a href="{{ url('manage_pension_zones') }}" class="nav-link ">
                        <i class="icon-map"></i>
                        <span class="title">Pension Zones</span></a>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-building"></i>
                        <span class="title">{{ MDA() }}</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('categories') }}" class="nav-link ">
                                <span class="title">{{ CATEGORY() }}</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('ministries') }}" class="nav-link ">
                                <span class="title">{{ MINISTRY() }}</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('departments') }}" class="nav-link ">
                                <span class="title">Department</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-bank"></i>
                        <span class="title">Bank Setup</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <!-- <li class="nav-item  ">
                                        <a href="{{ url('bank') }}" class="nav-link ">
                                            <span class="title">Banks</span>
                                        </a>
                                    </li> -->
                        <li class="nav-item  ">
                            <a href="{{ url('bank_branches') }}" class="nav-link ">
                                <span class="title">Bank Branches</span>
                            </a>
                        </li>
                        <!--  <li class="nav-item  ">
                                        <a href="{{ url('mfb_proxy_account') }}" class="nav-link ">
                                            <span class="title">MFB Proxy Accounts</span>
                                        </a>
                                    </li> -->
                    </ul>
                </li>

                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-screen-tablet"></i>
                        <span class="title">Mobile Setup</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="{{ url('pension_mobile_assignment') }}" class="nav-link ">
                                <span class="title">Set Assignments</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{ url('authorize_pension_assignments') }}" class="nav-link ">
                                <span class="title">Authorize Assignments</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{ url('manage_devices') }}" class="nav-link ">
                                <span class="title">Manage Device</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user-follow"></i>
                <span class="title">Pension Operation</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="{{ url('pensioneer_registration') }}" class="nav-link ">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Register Pensioner</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('incomplete_pension_registration') }}" class="nav-link ">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Incomplete Registration</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('update_pension_info') }}" class="nav-link ">
                        <i class="fa fa-check-square-o"></i>
                        <span class="title">Update Pensioner Info/ Payment Config</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('update_pensioneer_status') }}" class="nav-link ">
                        <i class="fa fa-check-square-o"></i>
                        <span class="title">Update Pensioner Status</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('manage_pension_payment') }}" class="nav-link ">
                        <i class="fa fa-money"></i>
                        <span class="title">Manage Pension Payment</span></a>
                </li>
                <!-- <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">Move Pension Data</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="{{ url('pensions_move_from_local') }}" class="nav-link ">
                                    <span class="title">From LG Project</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{ url('pensions_move_from_remote') }}" class="nav-link ">
                                    <span class="title">From Remote UBEB Project</span></a>
                                </li>
                            </ul>
                        </li> -->
            </ul>
        </li>
        <!-- Salary Menu -->
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-wallet"></i>
                <span class="title">Salary Configurations</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('salary_structure') }}" class="nav-link ">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">Salary Structure</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('salary_grade') }}" class="nav-link ">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">Salary Grade</span>
                    </a>
                </li>
        </li>
        </ul>
        </li>
        <li class="nav-item  ">
            <a href="{{ url('pension_uploads') }}" class="nav-link ">
                <i class="icon-screen-desktop"></i>
                <span class="title">Upload Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->hasAnyRole('Pension Approver'))
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-paper-plane"></i>
                <span class="title">Approval</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('approval_level') }}" class="nav-link ">
                        <span class="title">Approval Levels</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('salary_approval_summary') }}" class="nav-link ">
                        <span class="title">Salary Approval</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if(Auth::user()->hasAnyRole('Pension Board Manager Group') || (groupid() == 111111 || groupid() == 222222) )
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-diamond"></i>
                <span class="title">Pension Payroll</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i>
                        <span class="title">Generate Pay Register</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('pension_pay_register') }}" class="nav-link ">
                                <span class="title">Bulk Pay Register</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('individual_pension_payregister') }}" class="nav-link ">
                                <span class="title">Individual Pay Register</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i>
                        <span class="title">Gratuity Pay Register</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ url('generate_gratuity') }}" class="nav-link ">
                                <span class="title">Generate Gratuity</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('view_gratuity_payregister') }}" class="nav-link ">
                                <span class="title">View Gratuity Pay Register</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-envelope"></i>
                <span class="title">My Messages</span>
                <small>( <span class="text-danger">{{message_count()}} </span>)</small>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('messages.create') }}" class="nav-link nav-toggle">
                        <i class="fa fa-pencil-square-o"></i>
                        <span class="title">Compose</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('messages') }}" class="nav-link nav-toggle">
                        <i class="fa fa-inbox"></i>
                        <span class="title">Inbox</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('sent_messages') }}" class="nav-link nav-toggle">
                        <i class="fa fa-send-o"></i>
                        <span class="title">Sent</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('draft_message')}}" class="nav-link nav-toggle">
                        <i class="fa fa-file-o"></i>
                        <span class="title">Draft</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('trashed_messages')}}" class="nav-link nav-toggle">
                        <i class="fa fa-trash"></i>
                        <span class="title">Trash</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-bar-chart"></i>
                <span class="title">Reports</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="{{ url('pensioneer_list') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Pensioner List</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('pension_payment_report') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Pension Payment</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('pension_payment_summary') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Pension Payment Summary</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('pension_mfb_schedule') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Pension MFB Schedule</span></a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('gratuity_mfb_schedule') }}" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Gratuity MFB Schedule</span></a>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Variation Report</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('generate_pen_variation_report') }}" class="nav-link ">
                                <span class="title">Generate Variation Report</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('pension_variation_report') }}" class="nav-link ">
                                <span class="title">View Variation Report</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Pension Termination Report</span></a>
                </li>
            </ul>
        </li>

        </ul>


        @endif
        @if ( groupid() == 5000 )

        <!--Setup Users-->
        <li class="nav-item start active open">
            <a href="{{ url('home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{ url('setup_users') }}" class="nav-link ">
                <i class="icon-user"></i>
                <span class="title">Setup User</span></a>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-cogs"></i>
                <span class="title">Permission Setup</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('permissions') }}" class="nav-link ">
                        <span class="title">Permissions</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('permission_roles') }}" class="nav-link ">
                        <span class="title">Permission Roles</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  ">
            <a href="{{ url('roles') }}" class="nav-link ">
                <i class="fa fa-tasks"></i>
                <span class="title">Roles</span>
            </a>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-th-large"></i>
                <span class="title">Modules</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('modules') }}" class="nav-link ">
                        <span class="title">Modules</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('module_roles') }}" class="nav-link ">
                        <span class="title">Module Roles</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  ">
            <a href="{{ url('source_deductions') }}" class="nav-link ">
                <i class="icon-wallet"></i>
                <span class="title">Source Deduction</span>
            </a>
        </li>

        <!--Client Service-->
        <li class="nav-item ">
            <a href="{{ url('client_service') }}" class="nav-link ">
                <i class="icon-briefcase"></i>
                <span class="title">New Client Service</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ url('update_client_service') }}" class="nav-link ">
                <i class="icon-briefcase"></i>
                <span class="title">Approved Client Services</span>
            </a>
        </li>
        @elseif (groupid() == 5100)
        <li class="nav-item start active open">
            <a href="{{ url('home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{ url('setup_users') }}" class="nav-link ">
                <i class="icon-user"></i>
                <span class="title">Setup User</span></a>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-cogs"></i>
                <span class="title">Permission Setup</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('permissions') }}" class="nav-link ">
                        <span class="title">Permissions</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ url('permission_roles') }}" class="nav-link ">
                        <span class="title">Permission Roles</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  ">
            <a href="{{ url('roles') }}" class="nav-link ">
                <i class="fa fa-tasks"></i>
                <span class="title">Roles</span>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{ url('authorize_client_service') }}" class="nav-link ">
                <i class="icon-bulb"></i>
                <span class="title">Authorize Client Services</span>
            </a>
        </li>




        @endif

        </ul>
        <!-- END SIDEBAR MENU -->
        <script type="text/javascript">
            const searchbar = document.getElementById('search');
            searchbar.addEventListener('input', function (e) {
                const input = e.target.value;
                const term = input.toLowerCase();
                console.log(term);
                const items = document.querySelectorAll('.nav-item');
                // const items = list.getElementsByClassName('nav-link');
                Array.from(items).forEach(function (item) {

                    console.log(item.textContent);
                    if (!input) {
                        item.style.display = 'block';
                    }
                    else if (item.textContent.toLowerCase().includes(input)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                })
            })
        </script>
</div>
<!-- END SIDEBAR -->