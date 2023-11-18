@extends ('layouts.master')

@section ('subTitle')
    Upload Budget
@stop

@section ('header')
    @include ('layouts.partials.header')
       <!-- BEGIN PAGE LEVEL PLUGINS -->
       <link href="{{asset('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
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
                            <span class="active">Upload Budget</span>
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
                                        <i class="fa fa-upload font-blue" ></i>
                                        <span class="caption-subject sbold uppercase font-blue" >Upload Budget</span>
                                    </div>
                                    <div class="btn-group pull-right">
                                           
                                          
                                            <a href="{{ route('budgets.show',['id'=>'download']) }}" class="btn btn-outline green">
                                                <i class="fa fa-arrow-down"></i> Download Sample Excel Template
                                            </a>
                                           
                                        </div>
                                    
                                </div>
                <div class="row">
                         <div class="col-md-2 ">
                        </div>
                        <div class="col-md-6 ">
                                <div class="portlet-body form">


                                <form method="post" role="form" id="uploadBudget" name="uploadBudget" enctype="multipart/form-data" action="{{ route('budgets.store') }}">

                                    <div class="form-body">
                                         <div class="row">
                                           <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('budget_name') ? ' has-error' : '' }}">
                                                    <label>Budget Name <span class="required">*</span></label>
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-pencil"></i>
                                                            </span>
                                                            <input type="text" class="form-control" name="budget_name" id="budget_name"
                                                placeholder="Budget Year" value="{{ old('budget_name')?: 'Budget-'.date('Y')}}"
                                              		 required>
                                                        </div>
                                                        @if ($errors->has('budget_name'))
                                                            <span class="help-block">{{ $errors->first('budget_name') }}</span>
                                                         @endif
                                                </div>
                                              </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('budget_year') ? ' has-error' : '' }}">
                                                    <label>Budget Year <span class="required">*</span></label>
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <input type="text" class="form-control" name="budget_year" id="budget_year"
                                                placeholder="Budget Year" value="{{ old('budget_year')?:date('Y')}}"
                                              		 required>
                                                        </div>
                                                        @if ($errors->has('budget_year'))
                                                            <span class="help-block">{{ $errors->first('budget_year') }}</span>
                                                         @endif
                                                </div>
                                              </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Excel File <span class="required">*</span></label>
                                            <div class="col-md-12">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput" required>
                                                        <div class="input-group input-large">
                                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                            <span class="fileinput-filename"> </span>
                                                        </div>
                                                        <span class="input-group-addon btn default btn-file">
                                                            <span class="fileinput-new"> Select Excel File </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="upload_excel" id="upload_excel" required> </span>
                                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions ">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">      

                                                <button type="submit" class="btn blue">Upload and Continue</button>
                                        
                                            </div>
                                        </div>
                                    </div>

                                    


                                    </form>
   
                                </div>
             </div>


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

           <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    
@stop
