@extends ('layouts.master')

@section ('subTitle')
    Add Budget Item
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
                            <a href="{{ route('agencies.index') }}">Agencies</a>
                            <i class="fa fa-circle"></i>
                        </li>
            
                        <li>
                            <span class="active">Add Budget Item</span>
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
                                        <span class="caption-subject sbold uppercase font-blue" >Add Budget Item</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="portlet-body">
                                    
                        <form method="post" role="form" id="addBudgetItem" name="addBudgetItem" action="{{ route('budget_items.store') }}">
                                 <div class="row">
                                       <div class="col-md-8 form-group {{ $errors->has('agency_id') ? ' has-error' : '' }}">
                                            <label for="agency_id" class="control-label">Agency <span class="required">*</span></label>
                                            <div class="input-group">
                                                <select name="agency_id" id="agency_id" class="form-control">
                                                    @foreach($agencies as $agency)
                                                    <option value="{{ $agency->agency_id }}">
                                                        {{ $agency->agency_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="input-group-addon btn default btn-outline" data-target="#new_agency" data-toggle="modal">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                            </div>
                                            @if ($errors->has('agency_id'))
                                            <span class="help-block">{{ $errors->first('agency_id') }}</span>
                                            @endif
                                        </div>
                                   </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="reference" class="control-label">Budget Items<span class="required">*</span></label>
                            <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th> Item Name <span class="required">*</span> </th>
                                                    <th> Category <span class="required">*</span> </th>	
                                                    <th> Reference No. </th>
                                                    <th> Description </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="itemRows" row="0">
                                                <td><input type="text" class="form-control" name="budget_item[]"  value="" placeholder="Enter item name" required></td> 
                                                <td>
                                                    <div class="input-group">
                                                        <select class="form-control" name="budget_item_category_id[]" id="budget_item_category_id_0" row="0" required>
                                                            @foreach($budget_item_categories as $data)
                                                            <option value="{{ $data->budget_item_category_Id }}">{{ $data->budget_item_category }}</option>
                                                            @endforeach
                                                        </select>
                                                            <span class="input-group-addon btn default btn-outline" data-target="#new_item_budget_category" data-toggle="modal" row="0" onclick='setCategory(this)'>
                                                                <i class="fa fa-plus"></i>
                                                           </span>
                                                   </div>
                                                </td>
                                                <td><input type="text" class="form-control" name="reference_no[]" value="" placeholder="Reference number" ></td> 
                                                <td><input type="text" class="form-control" name="budget_item_description[]"  value="" placeholder="Description" ></td> 
                                               
                                                <td>
                                                    <a href="javascript:;" class="btn red btn-outline"  onclick="deleteRow(this)"><i class='fa fa-trash'></i></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                             </div>
                        </div>
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


<!-- BEGIN AGENCY -->
<div class="modal fade" id="new_agency" role="dialog" style="padding-top: 2%;">
    <div class="modal-dialog">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-blue">
                            <span class="caption-subject bold uppercase">Add Agency</span>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                      <div class="portlet-body form">
                        <form method="post" role="form" id="addAgency" name="addAgency"
                            action="{{ route('agencies.store')}}">
							
						
                            <div class="row">
                                <div class="form-body col-md-12">
                                    <div class="form-group {{ $errors->has('agency_name') ? ' has-error' : '' }} form-md-line-input">
                                        <label class="col-md-3 control-label">Agency Name
                                            <span class="required">*</span> </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="agency_name" id="agency_name"
                                                placeholder="Enter Agency Name" value="{{ old('agency_name')?:''}}"
                                              		 required>
                                         <div class=" form-control-focus"> </div>
										</div>
                                    </div>
                                    @if ($errors->has('agency_name'))
                                    <span class="help-block">{{ $errors->first('agency_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                        <div class="form-body col-md-12">
                                            <div
                                                class="form-group {{ $errors->has('agency_type_id') ? ' has-error' : '' }} form-md-line-input">
                                                <label class="col-md-3 control-label">Category/Type
                                                <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                        <select class="form-control" id="agency_type_id" name="agency_type_id">
                                                            @foreach($agency_types as $agency_type)
                                                              <option value="{{ $agency_type->agency_type_id }}" {{ old('agency_type_id') == $agency_type->agency_type_id ? "selected" : ""  }} >{{ $agency_type->agency_type }}</option>
                                                              
                                                            @endforeach
                                                        </select>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                                @if ($errors->has('agency_type_id'))
                                                <span class="help-block">{{ $errors->first('agency_type_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                       
                             </div>
                  

                <div class="form-actions">
                                    <div class="row pull-right">
                                        <div class="col-md-12">
                            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

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
<!-- END AGENCY -->



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
  
        <script type="text/javascript">
        $(document).ready(function(){
            $(".add-row").click(function(){
                let rows = +($('table tbody tr.itemRows').length) + Math.floor(1000 + Math.random() * 9000);
                var markup = "<tr class='itemRows' row='"+ rows +"'><td><input type='text' class='form-control' name='budget_item[]' id='budget_item'  value='' placeholder='Enter item name' required></td> <td><div class='input-group'><select class='form-control' name='budget_item_category_id[]' id='budget_item_category_id' id='budget_item_category_id_"+rows+"' row='"+rows+"' required>@foreach($budget_item_categories as $data)<option value='{{ $data->budget_item_category_Id }}'>{{ $data->budget_item_category }}</option>@endforeach </select><span class='input-group-addon btn default btn-outline' data-target='#new_item_budget_category' data-toggle='modal' row='"+ rows +"' onclick='setCategory(this)' ><i class='fa fa-plus'></i></span> </div></td><td><input type='text' class='form-control' name='reference_no[]' value='' placeholder='Reference number' ></td><td><input type='text' class='form-control' name='budget_item_description[]' value='' placeholder='Description' ></td> <td><a href='javascript:;' class='btn red btn-outline'  onclick='deleteRow(this)'><i class='fa fa-trash'></i></a></td></tr>";
                $("table tbody").append(markup);
            });

    
    ///////////// ADDING AGENCY ////////////////
    $("form#addAgency").submit(function(e) {
        e.preventDefault();
        let agency_name = $('#agency_name').val();
        let agency_type_id = $('#agency_type_id').val();

        if (agency_name == "" || agency_name == null) {
           alert("Please kindly Enter Agency Name");
            return false;
        }

        if (agency_type_id == "" || agency_type_id == null) {
           alert("Please kindly Select the Agency Type");
            return false;
        }

        let data = $("form#addAgency").serialize();

        $('#loading-bar-spinner').show();
        $.ajax({
            method: "POST",
            url: "<?php echo route('agencies.store') ?>",
            data: data,
            success: function(data) {
                let status = data.status;
                let mssg = data.mssg;
               // console.log(data);
                if (status) {
                    // carry out success operation here
                    let agency = data.data;
                            let x = document.getElementById("agency_id");
                             let option = document.createElement("option");
                              option.text = agency.agency_name;
                              option.value = agency.agency_id;
                              option.selected = 'selected';
                              
                               x.add(option);
                     

                    // hide the modal and reset the form
                    $('#new_agency').modal('hide');
                    document.getElementById("addAgency").reset();
                } else {
                    let mssg_type = data.mssg_type;
                    let mssg_title = data.mssg_title;
                    console.log(mssg);
                    //alert(mssg); // show response from the php script.
                    //swal(mssg_title, mssg, mssg_type);
                    //swal("Error!", "Something went wrong... Unknow Error from the Server","error");
                    alert("Something went wrong... Unknow Error from the Server");
                }

            },
            error: function(err) {
                console.log(err);
                if (err.status === 422) {
                    let val_error = "";
                    var errors = $.parseJSON(err.responseText);
                    $.each(errors.errors, function(key, val) {
                        // $("#" + key + "_error").text(val[0]);
                        $("#" + key + "_error").addClass('has-error');
                      val_error += val[0] + "\n";
                    });
                      // swal("Validation Error!", val_error, "error");
                      alert("Validation Error!!!\n"+val_error);
                    // return false;
                } else {
    //swal("Error!","Something went wrong... Try again or contact system administrator.", "error");
                    alert("Something went wrong... Try again or contact system administrator");
                }

            },
            complete: function() {
                $('#loading-bar-spinner').hide();
            }
        });

     });
     ///////////// END CREATE AGENCY ///////////


///////////// ADDING BUDGET ITEM CATEGORY ////////////////
    $("form#addBudgetItemCategory").submit(function(e) {
        e.preventDefault();
        let budget_item_category = $('#budget_item_category').val();
        let row = $('#item_category_row').val();

        if (budget_item_category == "" || budget_item_category == null) {
           alert("Please kindly Enter a Budget Item Category");
            return false;
        }

        let data = $("form#addBudgetItemCategory").serialize();

        $('#loading-bar-spinner').show();
        $.ajax({
            method: "POST",
            url: "<?php echo route('budget_item_categories.store') ?>",
            data: data,
            success: function(data) {
                let status = data.status;
                let mssg = data.mssg;
               // console.log(data);
                if (status) {
                    // carry out success operation here
                    let item_category = data.data;
                     
                    $("select[name='budget_item_category_id[]']").each(function(){
                          let current_row = this.getAttribute('row');
                             let option = document.createElement("option");
                              option.text = item_category.budget_item_category;
                              option.value = item_category.budget_item_category_Id;
                              if(current_row == row){
                                option.selected = 'selected';
                              }
                               //x.add(option);
                               this.add(option);
                       });

                    // hide the modal and reset the form
                    $('#new_item_budget_category').modal('hide');
                    document.getElementById("addBudgetItemCategory").reset();
                } else {
                    let mssg_type = data.mssg_type;
                    let mssg_title = data.mssg_title;
                    console.log(mssg);
                    //alert(mssg); // show response from the php script.
                    //swal(mssg_title, mssg, mssg_type);
                    //swal("Error!", "Something went wrong... Unknow Error from the Server","error");
                    alert("Something went wrong... Unknow Error from the Server");
                }

            },
            error: function(err) {
                console.log(err);
                if (err.status === 422) {
                    let val_error = "";
                    var errors = $.parseJSON(err.responseText);
                    $.each(errors.errors, function(key, val) {
                        // $("#" + key + "_error").text(val[0]);
                        $("#" + key + "_error").addClass('has-error');
                      val_error += val[0] + "\n";
                    });
                      // swal("Validation Error!", val_error, "error");
                      alert("Validation Error!!!\n"+val_error);
                    // return false;
                } else {
    //swal("Error!","Something went wrong... Try again or contact system administrator.", "error");
                    alert("Something went wrong... Try again or contact system administrator");
                }

            },
            complete: function() {
                $('#loading-bar-spinner').hide();
            }
        });

     });
     ///////////// END CREATE BUDGET ITEM CATEGORY ///////////

        });    

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("sample_editable_1").deleteRow(i);
        }

        ////////////// when you click to add category///////////////
      function setCategory(element){
            let row = element.getAttribute('row');
            document.getElementById('item_category_row').value = row;
       }

       
    </script>
    
@stop