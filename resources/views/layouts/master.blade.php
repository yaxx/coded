<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
<head>
        <meta charset="utf-8" />
        <title>{{ env('APP_NAME') }} | @yield ('subTitle')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        @yield ('header')

          <style type="text/css">
              /*        body {
                display: none;
                }*/
                /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
            .mymodal {
                        display:    none;
                        position:   fixed;
                        z-index:    1000;
                        top:        0;
                        left:       0;
                        height:     100%;
                        width:      100%;
                        background: rgba( 255, 255, 255, .8 ) 
                                    url("{{ asset('img/loading-spinner-grey.gif') }}") 
                                    50% 50% 
                                    no-repeat;
            }
                     /* When the body has the loading class, we turn
                the scrollbar off with overflow:hidden */
                body.loading {
                    overflow: hidden;   
                }

                /* Anytime the body has the loading class, our
                mymodal element will be visible */
                body.loading .mymodal {
                    display: block;
                }
                .my_loading{
                        z-index:    1000;
                        background-color: #ffffff !important;
                        background: rgba( 255, 255, 255, .8 ) 
                                    url("{{ asset('img/loading-spinner-grey.gif') }}") 
                                    50% 50% 
                                    no-repeat;
                    }

                    .show_text_disabled{
                        color: #94A0B2 !important;
                    }

                     /*Start loading style */
  #loading-bar-spinner.spinner {
                position: fixed;
                z-index: 31000 !important;
                /* animation: loading-bar-spinner 400ms linear infinite; */
                display: none;
                width: 100%;
                height: 100%;
                background-color: #00000080;
            }

            #loading-bar-spinner.spinner .spinner-icon {
                width: 40px;
                height: 40px;
                border:  solid 4px transparent;
                border-top-color:  #00C8B1 !important;
                border-left-color: #00C8B1 !important;
                animation: loading-bar-spinner 400ms linear infinite;
                border-radius: 50%;
                /* position:absolute; */
                /* top: 50%;
                height: 50%; */
                margin: 50vh auto;
            }

            @keyframes loading-bar-spinner {
            0%   { transform: rotate(0deg);   transform: rotate(0deg); }
            100% { transform: rotate(360deg); transform: rotate(360deg); }
            }
            /* End loading style */
                    
        </style>
    </head>
    <!-- END HEAD -->

    <body class="@yield('bodyClasses')">
    <div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>
        @yield ('nav-topbar')
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        @if ($flash = session('message'))
            <div id="flash-out" class="alert alert-success flash-message" role="alert">
                {{ $flash }}
            </div>
        @endif
        @if ($flash = session('error_message'))
            <div id="flash-out" class="alert alert-danger flash-message" role="alert">
                {{ $flash }}
            </div>
        @endif
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN MY CUSTOM FLASH -->
        <div id="flash_out_custom" class="alert alert-success flash-message" role="alert" style="display:none; position:fixed; bottom: 0;right: 0;">     
        </div> 
        <!-- END MY CUSTOM FLASH -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                @yield ('nav-sidebar')
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    @yield('alerts')
                    @yield ('contents')
                 </div>
            </div>
            
            @yield ('quick-sidebar')
        </div>
        <!-- END CONTAINER -->
          
        <!-- BEGIN FOOTER -->
        @yield ('footer')
       
        <script type="text/javascript">
        
         $body = $("body");

            $().ready(function () {

                $("#flash-out").fadeTo(7000, 0).slideDown(500, 'swing', function(){
                    $(this).remove();
                });
        
              
            });
        </script>
         <div class="mymodal"><!-- Place at bottom of page --></div>
</body>

</html>