
@extends ('layouts.master')

@section('subTitle')
    Dashboard
@stop

@section('header')
    @include ('layouts.partials.header')
@stop

@section('bodyClasses')
    page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo
@stop

@section('nav-topbar')
    @include ('layouts.partials.nav-topbar')
@stop

@section('nav-sidebar')
    @include ('layouts.partials.nav-sidebar')
@stop

@section('alerts')
    @include('layouts.partials.alerts')
@stop

@section('contents')



    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">

            <h1>Dashboard
                <!--  <small>statistics, charts, recent events and reports</small> -->
            </h1>


        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">

            <!-- END THEME PANEL -->
            <div class="greeting"></div>

            <?php echo '' . date('l j F, Y g:i A') . '<br>'; ?>

        </div>
        <!-- END PAGE TOOLBAR -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->

    <ul class="page-breadcrumb breadcrumb">
        <li>
            <span class="active">MDAs</span>
        </li>

        <section class="content">
            <div class="box box-default">


                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift font-blue"></i>
                                    <span class="caption-subject sbold uppercase font-blue">Upload Documents </span>
                                </div>
                            </div>
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--    <div class="btn-group">
                                                <a class="btn green" href="{{-- route('budget_items.create') --}}">Add New <i class="fa fa-plus"></i></a>
                                            </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tools"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-scrollable">
                              <table class="table table-striped table-hover" id="sample_11">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Document Name </th>
                                      <th>File Name </th>
                                      <th>Size</th>
                                      <th>Status </th>
                                      <th>[Actions] </th>
                                  </tr>
                                  </thead>
                                  <tbody>

                                   <form role="form" method="post" action="{{ route('contractor.uploadcac') }}" name="cac_certificate" id="cac_certificate" class="horizontal-form" enctype="multipart/form-data">
                                    @csrf

                                                                                                      <tr>
                                          <td> 1 </td>
                                          <td> 
                                              <div class="form-group">
                                                  <label class="control-label">CAC Certificate  <span class="required">*</span></label>
                                                  <input type="file" name="cac_certificate"> 
                                              </div>
                                          </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> Not Uploaded</td>
                                          <td> <button  name="submit" class="btn blue start"><i class="fa fa-upload"></i><span> Upload </span></button> &nbsp;&nbsp;
                                              <input type="hidden" name="filetype" value="cac">
                                              <a href="" class="btn warning cancel" title="View document"><i class="fa fa-search"></i><span> View </span></a> &nbsp;&nbsp;
                                              <a href="completesetup2.php?cdoc&amp;del=" class="btn red delete" title="Delete Plan"><i class="fa fa-trash"></i><span> Delete </span></a>
                                          </td>
                                      </tr>
                                    </form>
                                   
                                   <form role="form" method="post" action="" enctype="multipart/form-data" id="tcc_certificate"></form>   
                                                                                                      <tr>
                                          <td> 2 </td>
                                          <td>
                                              <div class="form-group">
                                                  <label class="control-label">TCC Certificate  <span class="required">*</span></label>
                                                  <input type="file" name="file" id="cac_file"> 
                                              </div> 
                                          </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> Not Uploaded</td>
                                          <td> 
                                              <button type="submit" name="ok4" class="btn blue start"><i class="fa fa-upload"></i><span> Upload </span></button> &nbsp;&nbsp;
                                              <input type="hidden" name="filetype" value="tcc">
                                              <a href="" class="btn warning cancel" title="View document"><i class="fa fa-search"></i><span> View </span></a> &nbsp;&nbsp;
                                              <a href="completesetup2.php?cdoc&amp;del=" class="btn red delete" title="Delete Plan"><i class="fa fa-trash"></i><span> Delete </span></a>
                                          </td>
                                      </tr>
                                   
                                   <form method="post" enctype="multipart/form-data"></form>   
                                                                                                      <tr>
                                          <td> 3 </td>
                                          <td> TIN Certificate * <br> <input type="file" name="file"> </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> Not Uploaded</td>
                                          <td> <button type="submit" name="ok4" class="btn blue start"><i class="fa fa-upload"></i><span> Upload </span></button> &nbsp;&nbsp;
                                              <input type="hidden" name="filetype" value="tin">
                                              <a href="" class="btn warning cancel" title="View document"><i class="fa fa-search"></i><span> View </span></a> &nbsp;&nbsp;
                                              <a href="completesetup2.php?cdoc&amp;del=" class="btn red delete" title="Delete Plan"><i class="fa fa-trash"></i><span> Delete </span></a>
                                          </td>
                                      </tr>
                                   
                                   <form method="post" enctype="multipart/form-data"></form>   
                                                                                                      <tr>
                                          <td> 4 </td>
                                          <td> PenCom Certificate * <br> <input type="file" name="file"> </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> Not Uploaded</td>
                                          <td> <button type="submit" name="ok4" class="btn blue start"><i class="fa fa-upload"></i><span> Upload </span></button> &nbsp;&nbsp;
                                              <input type="hidden" name="filetype" value="pencom">
                                              <a href="" class="btn warning cancel" title="View document"><i class="fa fa-search"></i><span> View </span></a> &nbsp;&nbsp;
                                              <a href="completesetup2.php?cdoc&amp;del=" class="btn red delete" title="Delete Plan"><i class="fa fa-trash"></i><span> Delete </span></a>
                                          </td>
                                      </tr>
                                   
                                   <form method="post" enctype="multipart/form-data"></form>   
                                                                                                      <tr>
                                          <td> 5 </td>
                                          <td> ITF Certificate * <br> <input type="file" name="file"> </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> Not Uploaded</td>
                                          <td> <button type="submit" name="ok4" class="btn blue start"><i class="fa fa-upload"></i><span> Upload </span></button> &nbsp;&nbsp;
                                              <input type="hidden" name="filetype" value="itf">
                                              <a href="" class="btn warning cancel" title="View document"><i class="fa fa-search"></i><span> View </span></a> &nbsp;&nbsp;
                                              <a href="completesetup2.php?cdoc&amp;del=" class="btn red delete" title="Delete Plan"><i class="fa fa-trash"></i><span> Delete </span></a>
                                          </td>
                                      </tr>
                                   
                                   <form method="post" enctype="multipart/form-data"></form>   
                                                                                                      <tr>
                                          <td> 6 </td>
                                          <td> 3 Years Audited Account * <br> <input type="file" name="file"> </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> Not Uploaded</td>
                                          <td> <button type="submit" name="ok4" class="btn blue start"><i class="fa fa-upload"></i><span> Upload </span></button> &nbsp;&nbsp;
                                              <input type="hidden" name="filetype" value="audit_acccount">
                                              <a href="" class="btn warning cancel" title="View document"><i class="fa fa-search"></i><span> View </span></a> &nbsp;&nbsp;
                                              <a href="completesetup2.php?cdoc&amp;del=" class="btn red delete" title="Delete Plan"><i class="fa fa-trash"></i><span> Delete </span></a>
                                          </td>
                                      </tr>
                                   
                                   <form method="post" enctype="multipart/form-data"></form>   
                                                                                                      <tr>
                                          <td> 7 </td>
                                          <td> Sworn Affidavit * <br> <input type="file" name="file"> </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> Not Uploaded</td>
                                          <td> <button type="submit" name="ok4" class="btn blue start"><i class="fa fa-upload"></i><span> Upload </span></button> &nbsp;&nbsp;
                                              <input type="hidden" name="filetype" value="affidavit">
                                              <a href="" class="btn warning cancel" title="View document"><i class="fa fa-search"></i><span> View </span></a> &nbsp;&nbsp;
                                              <a href="completesetup2.php?cdoc&amp;del=" class="btn red delete" title="Delete Plan"><i class="fa fa-trash"></i><span> Delete </span></a>
                                          </td>
                                      </tr>
                                   
                                   <form method="post" enctype="multipart/form-data"></form>   
                                                                                                      <tr>
                                          <td> 8 </td>
                                          <td> LG/ State Registration * <br> <input type="file" name="file"> </td>
                                          <td> </td>
                                          <td> </td>
                                          <td> Not Uploaded</td>
                                          <td> <button type="submit" name="ok4" class="btn blue start"><i class="fa fa-upload"></i><span> Upload </span></button> &nbsp;&nbsp;
                                              <input type="hidden" name="filetype" value="l/s_registration">
                                              <a href="" class="btn warning cancel" title="View document"><i class="fa fa-search"></i><span> View </span></a> &nbsp;&nbsp;
                                              <a href="completesetup2.php?cdoc&amp;del=" class="btn red delete" title="Delete Plan"><i class="fa fa-trash"></i><span> Delete </span></a>
                                          </td>
                                      </tr>
                                   

                                  </tbody>
                              </table>
                          </div>


                        </div>
                    </div>
                </div>






















            @stop

            @section('quick-sidebar')
                @include ('layouts.partials.quick-sidebar')
            @stop

            @section('footer')
                @include ('layouts.partials.footer')


                <script type="text/javascript">
                    $('.tab-trigger').click(function(e) {
                        e.preventDefault();
                        $(this).tab('show');
                        $("ul#myForm li").each(function() {
                            $(this).removeClass("active");
                        });
                        setTimeout(() => {
                            $(`.${$(this).data("selection")}`).addClass("active")
                        }, 10);
                        // project_contact_tab
                    })
                    $('.previous-button').click(function(e) {
                        e.preventDefault();
                        var currentTab = $(this).data("target");
                        var previousTab = $(this).data("previous");

                        $(`[data-selection="${previousTab}"]`).tab('show');
                        $(`ul#myForm li`).removeClass("active");
                        $(`.${previousTab}`).addClass("active");
                    });
                </script>
            @stop
