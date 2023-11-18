@extends ('layouts.master')

@section ('subTitle')
    Budget Item Categories
@stop

@section ('header')
    @include ('layouts.partials.header')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('../assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('../assets/global/css/components.min.css" rel="stylesheet" id="style_components')}}" type="text/css" />
    <link href="{{asset('../assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
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

    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="/home">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>

        <li>
            <span class="active">Budget Item Categories</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift font-blue" ></i>
                        <span class="caption-subject sbold uppercase font-blue">Budget Item Categories </span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="#" data-target="#new_item_budget_category" data-toggle="modal" >Add New <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tools"></div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                            <tr>
                                <th> Category </th>			
                                <th> Status </th>	
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                       @foreach( $budget_item_categories as $item_category )
                              <tr>
                                 <td>{{ $item_category->budget_item_category }}</td>
                                 <td>
                                     <span class="badge badge-{{ $item_category->enabled == 1 ? 'success' : 'danger' }}">
                                        {{ $item_category->enabled == 1 ? 'Active' : 'Inactive' }} </span>
                                </td>
                                <td>
                                     <a href="#" ><i class="fa fa-pencil"></i> Edit </a>
                                </td>
                             </tr>
                      @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>



<!-- BEGIN BUDGET ITEM CATEGORY MODAL -->
<div class="modal fade" id="new_item_budget_category" role="dialog" style="padding-top: 2%;">
    <div class="modal-dialog">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-blue">
                            <span class="caption-subject bold uppercase">Add Budget Item Category</span>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                      <div class="portlet-body form">
                        <form method="post" role="form" id="addBudgetItemCategory" name="addBudgetItemCategory"
                            action="{{ route('budget_item_categories.store')}}">
							
						
                            <div class="row">
                                <div class="form-body col-md-12">
                                    <div class="form-group {{ $errors->has('budget_item_category') ? ' has-error' : '' }} form-md-line-input">
                                        <label class="col-md-4 control-label">Budget Item Category
                                            <span class="required">*</span> </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="budget_item_category" id="budget_item_category"
                                                placeholder="Enter Budget Item Category" value="{{ old('budget_item_category')?:''}}"
                                              		 required>
                                         <div class=" form-control-focus"> </div>
										</div>
                                    </div>
                                    @if ($errors->has('budget_item_category'))
                                    <span class="help-block">{{ $errors->first('budget_item_category') }}</span>
                                    @endif
                                </div>
                            </div>
                  

                <div class="form-actions">
                                    <div class="row pull-right">
                                        <div class="col-md-12">
                            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
                            <input type="hidden" id="item_category_row" name="item_category_row" value="">

                            <button type="submit" class="btn blue">Submit </button>
                            <button type="button" class="btn red btn-outline" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </form>
				 </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END BUDGET ITEM CATEGORY -->

@stop



@section ('footer')
    @include ('layouts.partials.footer')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('../assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('../assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('../assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{asset('../assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('../assets/pages/scripts/table-datatables-colreorder.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@stop