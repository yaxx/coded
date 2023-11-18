@extends ('layouts.master')

@section ('subTitle')
    Fund Request
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
            <span class="active">Fund Request</span>
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
                        <span class="caption-subject sbold uppercase font-blue">Fund Request</span>
                    </div>
                </div>
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="#" data-target="#new_fund_request" data-toggle="modal" > New Fund Request <i class="fa fa-plus"></i></a>
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
                                <th>S/N</th>
                                <th> Expense Head </th>			
                                <th> Description </th>	
                                <th> Requested Amount </th>	
                                <th> Request Status</th>	
                                {{-- <th> Documents</th>	 --}}
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                        @endphp
                   @foreach($fundrequest as $requests)
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{ $requests->expense_head }}</td>
                             <td>{{ $requests->description}}</td> 
                            <td>{{( $requests->requested_amount ) }}</td>
                            {{-- <td>{{( $requests->status ) }}</td> --}}
                            {{-- <td>{{ $goodsplan->total_count }}</td> --}}
                            <td>
                                <span class="badge badge-{{ $requests->status == 'Approved' ? 'success' : ($requests->status == 'Rejected' ? 'danger' : 'warning') }}">
                                    {{ $requests->status }}
                                </span>
                            </td>
{{--                             
                            <td>
                                @if ($goods->approval_status == 'Approved')
                                <a href="{{ route('procurement.displayplan', ['plan_id' => $goods->plan_id]) }}"><i class="fa fa-search"></i> view</a>
                                    @else
                                    <a href="{{ route('procurement.editGoods', ['plan_id' => $goods->plan_id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{route('procurement.deleteGoods', ['plan_id' => $goods->plan_id])}}" ><i class="fa fa-trash"></i> Delete </a>
                                @endif
                               
                            </td>  --}}
                        </tr>
                        @php
                        $i++;
                    @endphp
                 @endforeach 
 
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>



<!-- BEGIN BUDGET ITEM CATEGORY MODAL -->
<div class="modal fade" id="new_fund_request" role="dialog" style="padding-top: 2%;">
    <div class="modal-dialog">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-blue">
                            <span class="caption-subject bold uppercase">Add New Fund Request</span>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                      <div class="portlet-body form">
                        <form method="post" role="form" id="fundrequest" name="fundrequest"
                            action="{{ route('Director.storerequest')}}" enctype="multipart/form-data">
							@csrf

                            <div class="row">
                                <div class="form-body col-md-12">
                                    <div class="form-group {{ $errors->has('expense_head') ? ' has-error' : '' }} form-md-line-input">
                                        <label class="col-md-4 control-label">Expense Head
                                            <span class="required">*</span> </label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="expense_head" id="expense_head" required>
                                                <option value="refund">Refund</option>
                                                <option value="fundrequest" >Fund Request</option>
                                            </select>
                                         <div class=" form-control-focus"> </div>
										</div>
                                    </div>
                                    @if ($errors->has('expense_head'))
                                    <span class="help-block">{{ $errors->first('expense_head') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-body col-md-12">
                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} form-md-line-input">
                                        <label class="col-md-4 control-label">Description/Title
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="description" id="description" rows="2" required></textarea>
                                            <div class="form-control-focus"></div>
                                        </div>
                                        @if ($errors->has('description'))
                                            <span class="help-block">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                  
                            
                            <div class="row">
                                <div class="form-body col-md-12">
                                    <div class="form-group {{ $errors->has('requested_amount') ? ' has-error' : '' }} form-md-line-input">
                                        <label class="col-md-4 control-label"> Requested Amount
                                            <span class="required">*</span> </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="requested_amount" id="requested_amount"
                                                placeholder="" value="{{ old('budget_item_category')?:''}}"
                                              		 required>
                                         <div class=" form-control-focus"> </div>
										</div>
                                    </div>
                                    @if ($errors->has('requested_amount'))
                                    <span class="help-block">{{ $errors->first('requested_amount') }}</span>
                                    @endif
                                </div>
                            </div>
                  
                            
                            <div class="row">
                                <div class="form-body col-md-12">
                                   
                            <div class="form-group{{ $errors->has('doc') ? ' has-error' : '' }} form-md-line-input">
                                <label class="col-md-4 control-label">Document
                                    <span class="required">*</span> </label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" name="doc" id="doc" >
                                    <div class="form-control-focus"></div>
                                    <span>Supported file types: doc, pdf, docx, png, jpeg, jpg</span>

                                    @if ($errors->has('doc'))
                                    <span class="help-block">{{ $errors->first('doc') }}</span>
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
