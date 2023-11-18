<div class="page-footer">

    <div class="page-footer-inner"> &copy; <a target="_blank" href="http://techvibesltd.com">Techvibes Int. Ltd </a> - {{date('Y')}} 
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<!-- END FOOTER -->
<!-- BEGIN QUICK NAV -->
<!--<div class="quick-nav-overlay"></div>-->
<!-- END QUICK NAV -->
<!--[if lt IE 9]>
<script src="css/respond.min.js"></script>
<script src="css/excanvas.min.js"></script> 
<script src="css/ie8.fix.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('js/morris/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/morris/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('js/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('js/dashboard.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('js/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/quick-nav.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<!-- End -->

<script type="text/javascript">
    var thehours = new Date().getHours();
	var themessage;
	var morning = ('Good Morning');
	var afternoon = ('Good Afternoon');
	var evening = ('Good Evening');

	if (thehours >= 0 && thehours < 12) {
		themessage = morning; 

	} else if (thehours >= 12 && thehours < 17) {
		themessage = afternoon;

	} else if (thehours >= 17 && thehours < 24) {
		themessage = evening;
	}

    $('.greeting').append(themessage);
</script>