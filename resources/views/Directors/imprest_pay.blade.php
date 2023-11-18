@extends ('layouts.master')

@section ('subTitle')
    Add Agency
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


                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="/home">Dashboard</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="{{ route('agencies.index') }}">Imprest </a>
                            <i class="fa fa-circle"></i>
                        </li>
            
                        <li>
                            <span class="active">Pay imprest</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-blue" ></i>
                                        <span class="caption-subject sbold uppercase font-blue" >Imprest</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="portlet-body">
                                    
                                <form method="post" role="form" id="addAgency" name="addAgency" action="{{ route('Director.payimprest') }}">
                                        
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                   <th> Agency Name </th>
                                                   <th> Month </th>
                                                    <th>Amount</th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($imprestPayments as $imprest)
                                            <tr>
                                                <td>
                                                    
                                                    <select id="agencyDropdown" class="form-control" name="agency_id[]" >
                                                        <option value="">select agency</option>
                                                       <option value="{{$imprest->agency_id}}">{{$imprest->agency_name}}</option>
                                                    </select>
                                                            
                                                      
                                                 </td>
                                          
                                                 <td>
                                                    <select class="form-control" id="month" name="month[]" required>
                                                        <option value="" disabled selected>Select Month</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </td>
                                            
                                             <td>  <input type="text" class="form-control" id="amount" name="amount[]"
                                                value="{{ Request::old('amount') ?: '' }}" placeholder="Enter Amount"
                                                
                                                required></td> 
                                                 @endforeach
                                                <td>
                                                    <a href="javascript:;" class="btn red btn-outline"  onclick="deleteRow(this)"><i class='fa fa-trash'></i></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                            <a href="javascript:;" class="btn btn-success add-row">
                                            <i class="fa fa-plus"></i> Add New</a>
                                        
                                        <div class="form-actions" align="right" >
                                            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">  

                                            <button type="submit" class="btn blue">Submit</button>
                                            <a class="btn red btn-outline" href="{{ route('agencies.index') }}">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
               



@stop



@section ('footer')
    @include ('layouts.partials.footer')
  
        <script type="text/javascript">
        $(document).ready(function(){
            $(".add-row").click(function(){
                var markup = "<tr><td><input type='text' class='form-control' name='account_name[]' id='account_name' value='' placeholder='Enter Agency Name' required></td><td><input type='text' class='form-control' name='agency_name[]' id='agency_name' value='' placeholder='Enter Agency Account Name' required></td><td><input type='text' class='form-control' id='account_no' name='account_no[]' value='' placeholder='Enter Ministry Account Number' pattern='[0-9]{10,12}' title='Please enter a valid 11 or 12-digit bank account number' minlength='10' maxlength='12' required></td><td><select id='agencyDropdown' class='form-control' name='bank_name[]' required><option value='Access Bank'>Access Bank</option></select></td><td><a href='javascript:;' class='btn red btn-outline' onclick='deleteRow(this)'><i class='fa fa-trash'></i></a></td></tr>";

                $("table tbody").append(markup);
            });

        });    

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("sample_editable_1").deleteRow(i);
        }

       
    </script>
    
@stop
