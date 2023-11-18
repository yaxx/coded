@extends ('layouts.master')

@section ('subTitle')
    Add Approval User
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
                            <a href="{{ route('approval_users.index') }}">Approval Users</a>
                            <i class="fa fa-circle"></i>
                        </li>
            
                        <li>
                            <span class="active">Add Approval User</span>
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
                                        <i class="fa fa-user-plus font-blue" ></i>
                                        <span class="caption-subject sbold uppercase font-blue" >Add Approval User</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="portlet-body">
                                    
                                    <form method="post" role="form" id="addApprovalUser" name="addApprovalUser" action="{{ route('approval_users.store') }}">
                                        
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                   <th> Approval Name </th>
                                                    <th> Approval Level </th>
                                                    <th> User </th>
                                                    <th> Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                
                                                <td>
                                                      <select class="form-control" name="approval_name_id[]" id="approval_name_id" required>
                                                           <option value="">-- Select Option --</option>
                                                             @foreach($approval_names as $ap_name)
                                                        
                                                                 <option value="{{ $ap_name->approval_name_id }}"  >{{ $ap_name->approval_name }}</option> 
                                                        
                                                             @endforeach

                                                    </select>
                                                </td> 
                                                <td>
                                                     <select class="form-control" name="approval_level_id[]" id="approval_level_id" required>
                                                        <option value="">-- Select Option --</option>
                                                        @foreach($approval_levels as $level)
                                                           
                                                                <option value="{{ $level->approval_level_id }}"  >{{ $level->approval_level }}</option> 
                                                           
                                                           @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                      <select class="form-control" name="user_id[]" id="user_id" required>
                                                        <option value="">-- Select Option --</option>
                                                            @foreach($emp_users as $user)
                                                           
                                                                <option value="{{ $user->id }}"  >{{ $user->name."::".$user->email }}</option> 
                                                           
                                                           @endforeach
                                                    </select>
                                                </td>
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
                                            <a class="btn red btn-outline" href="{{ route('approval_users.index') }}">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
     


@stop


@section ('footer')
    @include ('layouts.partials.footer')

        <script type="text/javascript">
            

            $(document).ready(function(){
                $(".add-row").click(function(){
                    var approval_category = $("#approval_category").val();
                    var approval_level = $("#approval_level").val();
                    var markup = "<tr><td><select class='form-control' name='approval_name_id[]' id='approval_name_id' required><option value=''>-- Select Option --</option>@foreach($approval_names as $ap_name)<option value='{{ $ap_name->approval_name_id }}' {{ Request::old('approval_name_id') == $ap_name->approval_name_id? 'selected' : '' }} >{{ $ap_name->approval_name }}</option>@endforeach</select></td> <td><select class='form-control' name='approval_level_id[]' id='approval_level_id' required><option value=''>-- Select Option --</option>@foreach($approval_levels as $level) <option value='{{ $level->approval_level_id }}' {{ Request::old('approval_level_id') == $level->approval_level_id? 'selected' : '' }} >{{ $level->approval_level }}</option> @endforeach </select> </td> <td><select class='form-control' name='user_id[]' id='user_id' required><option value=''>-- Select Option --</option>@foreach($emp_users as $user)<option value='{{ $user->id }}' {{ Request::old('user_id') == $user->id ? 'selected' : '' }} >{{ $user->name.'::'.$user->email }}</option>@endforeach</select> </td> <td><a href='javascript:;' class='btn red btn-outline'  onclick='deleteRow(this)'><i class='fa fa-trash'></i></a></td></tr>";
                    $("table tbody").append(markup);
                });

            });    

            function deleteRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("sample_editable_1").deleteRow(i);
            }

        </script>
    
@stop
