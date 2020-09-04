<!-- BEGIN FOOTER -->
	<div id="footer">
		2018 - 2019  &copy; Mohamed Elkholy
		<div class="span pull-left">
			<span class="go-top"><i class="icon-arrow-up"></i></span>
		</div>
	</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="{{url('/')}}/admin/js/jquery-1.8.3.min.js"></script>
<script src="{{url('/')}}/admin/assets/bootstrap-rtl/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/admin/js/jquery.blockui.js"></script>
<script src="{{url('/')}}/admin/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{{url('/')}}/admin/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{url('/')}}/admin/assets/jquery-knob/js/jquery.knob.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->
<script type="text/javascript" src="{{url('/')}}/admin/assets/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/admin/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{url('/')}}/admin/assets/data-tables/DT_bootstrap.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="{{url('/')}}/admin/js/scripts.js"></script>
<script>
jQuery(document).ready(function() {
// initiate layout and plugins
App.init();
});
</script>
@stack('js')
@stack('css')
</body>
<!-- END BODY -->
</html>