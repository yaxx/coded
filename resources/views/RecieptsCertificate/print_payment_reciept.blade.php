@extends ('layouts.master')

@section ('subTitle')
 Payment Report
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
                            <a href="{{ route('payment_report.index') }}">Payment Report</a>
                            <i class="fa fa-circle"></i>
                        </li>
            
                        <li>
                            <span class="active">Payment Report</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-blue" ></i>
                                        <span class="caption-subject sbold uppercase font-blue" >PAYMENT REPORT</span>
                                    </div>
                                    
                                    
                                </div>
                                <div class="portlet-body">
                                    
                               
<div id="page-wrap">
  <br/><br/><br/><br/><br/><br/><br/>
     
  <h2 id="myheader" style="background-color:#008629">GENERAL RECEIPT</h2>
 
  <!-- BEGIN Grid courses_assessment -->
  <div class="row">
 
	  <div class="col-md-4">
		 <table id="meta" style="position: relative; left: 0px; float: left; border: none !important" width="40%">
		    <tr >
			    <td>{show_qrcode}	</td>
		   </tr> 
		 </table>  
	 </div>
	    
   <div col="col-md-6">
	    <table id="meta" style="position: relative; left: 0px; float: right; border: none !important" width="60%">
	     <tr>
	        <td class="meta-head"><font size="3">Invoice Number:</font></td> 
	        <td colspan="3"><font size="3">{invoice_number}</font></td> 
	      </tr>
	 
	      <tr>
	        <td class="meta-head"><font size="3">Payment Ref:</font></td> 
	        <td colspan="3"><font size="3">{payment_ref}</font></td> 
	      </tr>
	      
	      <tr>
		  <td class="meta-head"><font size="3">Bank Name:</font></td> 
		  <td><font size="3">{bank}</font></td> 
		</tr>

	    </table>
  </div>
 
</div>
  <!--<img class="watermark" src="image/bariga_watermark.png" alt="Bariga LCDA Logo" height="150px" width="70%" align="center" border="0">-->
  <table id="meta" border="1px" style="position: relative; left: 0px;" width="100%">
  
    <!-- BEGIN Row -->
    <tr {courses_assessment:rowStyle}>
      <td class="meta-head"><font size="3">Received From</font></td> 
      <td><font size="3">{depositors_name}</font></td> 
   
      <td class="meta-head"><font size="3">Taxpayer Name:</font></td> 
      <td><font size="3">{taxpayer}</font></td> 
    </tr>
  
    <tr>
      <td class="meta-head"><font size="3">Revenue Amount</font></td> 
      <td><font size="3">{revenue_amount}&nbsp;</font></td> 
 
      <td class="meta-head">A<font size="3">mount Paid</font></td> 
      <td><font size="3">{amount_paid}&nbsp;</font></td> 
    </tr>
 
    <tr>
      <td class="meta-head"><font size="3">Outstanding Balance</font></td> 
      <td><font size="3">{outstanding_balance}&nbsp;</font></td> 
  
      <td class="meta-head"><font size="3">Being payment for</font></td> 
      <td><font size="3">{description}&nbsp;</font></td> 
    </tr>
 
  </tr>
 <!-- END Row -->
  <table style="float: left;" border="0">
    <tr style="background-color: #eee">
      <th colspan="2">BANK DETAILS:</th>
 
    </tr>

    <tr>
      <td>Date</td> 
      <td>{payment_date}</td> 
    </tr>
    <tr>
      <td>Expiry Date</td> 
      <td>31/12/2019</td> 
    </tr>
 
  </table>
 
  <table style="float: right;">
  <tr style="background-color: #eee">
      <th colspan="2">Cashier's Signature:</th>
 
    </tr>

    <tr>
      <td colspan="2">
        <div align="center">
       <img src="image/bariga_signature.jpeg">
        </div>
 </td> 
    </tr>
  </table>
 
  <!-- BEGIN NoRecords -->
  <tr>
    <td colspan="5">No records</td> 
  </tr>
 <!-- END NoRecords -->
</table>
 <!-- END Grid courses_assessment -->
</div>



<!-- Second Print Out-->
<div id="page-wrap">
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <h2 id="myheader" style="background-color:#008629">GENERAL RECEIPT</h2>
 
  <!-- BEGIN Grid courses_assessment1 -->
  <div class="row">
    <div>
      <table id="meta" style="position: relative; left: 0px; float: right; border: none !important" width="60%">
        <tr>
          <td class="meta-head"><font size="3">Invoice Number:</font></td> 
          <td colspan="3"><font size="3">{invoice_number}</font></td> 
        </tr>
 
        <tr>
          <td class="meta-head"><font size="3">Payment Ref:</font></td> 
          <td colspan="3"><font size="3">{payment_ref}</font></td> 
        </tr>
 
        <tr>
          <td class="meta-head"><font size="3">Bank Name:</font></td> 
          <td><font size="3">{bank}</font></td> 
        </tr>
 
      </table>
 
    </div>
 
  </div>
 
  <!--<img class="watermark" src="image/bariga_watermark.png" alt="Bariga LCDA Logo" height="150px" width="70%" align="center" border="0">-->
  <table id="meta" border="1px" style="position: relative; left: 0px;" width="100%">
    <!-- BEGIN Row -->
    <tr {courses_assessment1:rowStyle}>
      <td class="meta-head"><font size="3">Received From</font></td> 
      <td><font size="3">{depositors_name}</font></td> 
      <td class="meta-head"><font size="3">Taxpayer Name:</font></td> 
      <td><font size="3">{taxpayer}</font></td> 
    </tr>
 
    <tr>
      <td class="meta-head"><font size="3">Revenue Amount</font></td> 
      <td><font size="3">{revenue_amount}&nbsp;</font></td> 
      <td class="meta-head">A<font size="3">mount Paid</font></td> 
      <td><font size="3">{amount_paid}&nbsp;</font></td> 
    </tr>
 
    <tr>
      <td class="meta-head"><font size="3">Outstanding Balance</font></td> 
      <td><font size="3">{outstanding_balance}&nbsp;</font></td> 
      <td class="meta-head"><font size="3">Being payment for</font></td> 
      <td><font size="3">{description}&nbsp;</font></td> 
    </tr>
 
  </tr>
 <!-- END Row -->
  <table style="float: left;" border="0">
    <tr style="background-color: #eee">
      <th colspan="2">BANK DETAILS:</th>
 
    </tr>
 
    <tr>
      <td>Date</td> 
      <td>{payment_date}</td> 
    </tr>
 
    <tr>
      <td>Expiry Date</td> 
      <td>31/12/2019</td> 
    </tr>
 
  </table>
 
  <table style="float: right;">
    <tr style="background-color: #eee">
      <th colspan="2">Cashier's Signature:</th>
 
    </tr>
 
    <tr>
      <td colspan="2">
        <div align="center">
          <img src="image/bariga_signature.jpeg">
        </div>
 </td> 
    </tr>
 
  </table>
 
  <!-- BEGIN NoRecords -->
  <tr>
    <td colspan="5">No records</td> 
  </tr>
 <!-- END NoRecords -->
</table>
 <!-- END Grid courses_assessment1 -->
</div>


<!-- Third Print Out-->
<div id="page-wrap">
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <h2 id="myheader" style="background-color:#008629">GENERAL RECEIPT</h2>
 
  <!-- BEGIN Grid courses_assessment2 -->
  <div class="row">
    <div>
      <table id="meta" style="position: relative; left: 0px; float: right; border: none !important" width="60%">
        <tr>
          <td class="meta-head"><font size="3">Invoice Number:</font></td> 
          <td colspan="3"><font size="3">{invoice_number}</font></td> 
        </tr>
 
        <tr>
          <td class="meta-head"><font size="3">Payment Ref:</font></td> 
          <td colspan="3"><font size="3">{payment_ref}</font></td> 
        </tr>
 
        <tr>
          <td class="meta-head"><font size="3">Bank Name:</font></td> 
          <td><font size="3">{bank}</font></td> 
        </tr>
 
      </table>
 
    </div>
 
  </div>
 
  <!--<img class="watermark" src="image/bariga_watermark.png" alt="Bariga LCDA Logo" height="150px" width="70%" align="center" border="0">-->
  <table id="meta" border="1px" style="position: relative; left: 0px;" width="100%">
    <!-- BEGIN Row -->
    <tr {courses_assessment2:rowStyle}>
      <td class="meta-head"><font size="3">Received From</font></td> 
      <td><font size="3">{depositors_name}</font></td> 
      <td class="meta-head"><font size="3">Taxpayer Name:</font></td> 
      <td><font size="3">{taxpayer}</font></td> 
    </tr>
 
    <tr>
      <td class="meta-head"><font size="3">Revenue Amount</font></td> 
      <td><font size="3">{revenue_amount}&nbsp;</font></td> 
      <td class="meta-head">A<font size="3">mount Paid</font></td> 
      <td><font size="3">{amount_paid}&nbsp;</font></td> 
    </tr>
 
    <tr>
      <td class="meta-head"><font size="3">Outstanding Balance</font></td> 
      <td><font size="3">{outstanding_balance}&nbsp;</font></td> 
      <td class="meta-head"><font size="3">Being payment for</font></td> 
      <td><font size="3">{description}&nbsp;</font></td> 
    </tr>
 
  </tr>
 <!-- END Row -->
  <table style="float: left;" border="0">
    <tr style="background-color: #eee">
      <th colspan="2">BANK DETAILS:</th>
 
    </tr>
 
    <tr>
      <td>Date</td> 
      <td>{payment_date}</td> 
    </tr>
 
    <tr>
      <td>Expiry Date</td> 
      <td>31/12/2019</td> 
    </tr>
 
  </table>
 
  <table style="float: right;">
    <tr style="background-color: #eee">
      <th colspan="2">Cashier's Signature:</th>
 
    </tr>
 
    <tr>
      <td colspan="2">
        <div align="center">
          <img src="image/bariga_signature.jpeg">
        </div>
 </td> 
    </tr>
 
  </table>

</table>
 <!-- END Grid courses_assessment2 -->
</div>




</div>


</body>











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
  
    
@stop