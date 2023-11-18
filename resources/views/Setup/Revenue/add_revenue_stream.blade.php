@extends ('layouts.master')

@section ('subTitle')
    Add Revenue Stream
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
                            <a href="{{ route('agencies.index') }}">Revenue Stream</a>
                            <i class="fa fa-circle"></i>
                        </li>
            
                        <li>
                            <span class="active">Add Revenue Stream</span>
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
                                        <span class="caption-subject sbold uppercase font-blue" >Add Revenue Stream</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="portlet-body">
                                    
                                <form method="post" role="form" id="addStream" name="addStream" action="{{ route('revenue_streams.store') }}">
                                        
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                   <th>Revenue Stream</th>
                                                  
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" name="revenue_stream[]" id="revenue_stream"  value="" placeholder="Enter Revenue Stream" required></td> 
                                            
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
                                            <input type="hidden" id="asset_type" name="asset_type" value="Business"> 
                                            <button type="submit" class="btn blue">Submit</button>
                                            <a class="btn red btn-outline" href="{{ route('revenue_streams.index') }}">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
               



@stop

@section ('quick-sidebar')
    @include ('layouts.partials.quick-sidebar')
@stop

@section ('footer')
    @include ('layouts.partials.footer')
  
        <script type="text/javascript">
        $(document).ready(function(){
            $(".add-row").click(function(){
               var markup = "<tr><td><input type='text' class='form-control' name='revenue_stream[]' id='revenue_stream'  value='' placeholder='Enter Revenue Stream' required></td>  <td><a href='javascript:;' class='btn red btn-outline'  onclick='deleteRow(this)'><i class='fa fa-trash'></i></a></td></tr>";
                $("table tbody").append(markup);
            });

        });    

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("sample_editable_1").deleteRow(i);
        }

       
    </script>
    
@stop