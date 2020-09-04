	<!-- BEGIN FOOTER -->
@include('admincp.layouts.copyrights')
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script src="{{url('/')}}/admin/js/jquery-1.8.3.min.js"></script>
        <script src="{{url('/')}}/admin/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="{{url('/')}}/admin/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="{{url('/')}}/admin/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="{{url('/')}}/admin/assets/bootstrap-rtl/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/admin/js/jquery.blockui.js"></script>
        <script src="{{url('/')}}/admin/js/jquery.cookie.js"></script>
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
        <script src="{{url('/')}}/admin/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="{{url('/')}}/admin/assets/flot/jquery.flot.js"></script>
        <script src="{{url('/')}}/admin/assets/flot/jquery.flot.resize.js"></script>

        <script src="{{url('/')}}/admin/assets/flot/jquery.flot.pie.js"></script>
        <script src="{{url('/')}}/admin/assets/flot/jquery.flot.stack.js"></script>
        <script src="{{url('/')}}/admin/assets/flot/jquery.flot.crosshair.js"></script>

        <script src="{{url('/')}}/admin/js/jquery.peity.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/admin/assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/admin/assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="{{url('/')}}/admin/assets/data-tables/DT_bootstrap.js"></script>

        <script src="{{url('/')}}/admin/js/scripts.js"></script>
        <script src="{{url('/')}}/admin/js/myFunctions.js"></script>

        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.setMainPage(true);
                App.init();
            });
        </script>
        @stack('js')
        @stack('css')
        <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>