<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.0
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>@lang('admincp.moderators_login')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="{{url('/')}}/admin/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
  <link href="{{url('/')}}/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="{{url('/')}}/admin/css/style.css" rel="stylesheet" />
  <link href="{{url('/')}}/admin/css/style_responsive.css" rel="stylesheet" />
  <link href="{{url('/')}}/admin/css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header" style="padding:15px;">
    <!-- BEGIN LOGO -->
    <div id="logo" class="center">
      <img src="{{url('/')}}/admin/img/logo.png" alt="logo" class="center" />
    </div>
    <!-- END LOGO -->
  </div>
  <!-- BEGIN LOGIN -->
  <div id="login">
    @if(session()->has('error'))
    <div class="alert alert-danger">
      <button data-dismiss="alert" class="close">×</button>
      <h4>{{session('error')}}</h4>
    </div>
    @endif
    @if(count($errors->all())>0)
  <div class="alert alert-danger">
    <button data-dismiss="alert" class="close">×</button>
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

    <!-- BEGIN LOGIN FORM -->
    <form id="loginform" class="form-vertical no-padding no-margin" method="post">
      {{ csrf_field() }}
      <div class="lock">
        <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
        <h4>@lang('admincp.moderators_login')</h4>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span><input name="user_name" id="input-username" type="text" placeholder="@lang('admincp.user_name')" />
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-key"></i></span><input id="input-password" name="password" type="password" placeholder="@lang('admincp.password')" />
            </div>
            <div class="mtop10">
              <div class="block-hint pull-left small">
                <input type="checkbox" name="rememberme" value="1"> @lang('admincp.rememberme')
              </div>
              <div class="block-hint pull-right">
                <a href="javascript:;" class="" id="forget-password">@lang('admincp.forget_password')</a>
              </div>
            </div>
            <div class="clearfix space5"></div>
          </div>
        </div>
      </div>
      <input type="submit" id="login-btn" class="btn btn-block login-btn" value="@lang('admincp.login')" />
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="index.html">
      <p class="center">@lang('admincp.enter_your_email_to_reset_password')</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="@lang('admincp.email')"  />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="button" id="forget-btn" class="btn btn-block login-btn" value="@lang('admincp.reset_password')" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
@include('admincp.layouts.copyrights')
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="{{url('/')}}/admin/js/jquery-1.8.3.min.js"></script>
  <script src="{{url('/')}}/admin/assets/bootstrap-rtl/js/bootstrap.min.js"></script>
  <script src="{{url('/')}}/admin/js/jquery.blockui.js"></script>
  <script src="{{url('/')}}/admin/js/scripts.js"></script>
  <script>
  jQuery(document).ready(function() {
  App.initLogin();
  });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>