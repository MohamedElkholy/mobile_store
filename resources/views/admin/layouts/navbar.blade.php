<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    @include('admin.layouts.menu')
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{url('/')}}/design/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{admin()->user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i><span>{{trans('admin.online')}}</span> </a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">{{trans('admin.mainNavigation')}}</li>
{{--       <li>
        <a href="{{aurl()}}">
          <i class="fa fa-dashboard"></i> <span>{{trans('admin.dashboard')}}</span>
        </a>
      </li>
      <li>
        <a href="{{aurl('settings')}}">
          <i class="fa fa-dashboard"></i> <span>{{trans('admin.settings')}}</span>
        </a>
      </li> --}}
      <li class="treeview {{active_menu('admin')[0]}}">
        <a href="#">
          <i class="fa fa-home"></i> <span>{{trans('admin.home')}}</span>
          {{--           <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span> --}}
        </a>
        <ul class="treeview-menu" style="{{active_menu('admin')[1]}}">
          <li class=""><a href="{{aurl()}}"><i class="fa fa-home"></i>@lang('admin.home')</a></li>
          <li class=""><a href="{{aurl('settings')}}"><i class="fa fa-cog"></i>@lang('admin.settings')</a>
        </li>
      </ul>
    </li>
    <li class="treeview {{active_menu('admin')[0]}}">
      <a href="#">
        <i class="fa fa-user"></i> <span>{{trans('admin.admin_account')}}</span>
        {{--           <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span> --}}
      </a>
      <ul class="treeview-menu" style="{{active_menu('admin')[1]}}">
        <li class=""><a href="{{aurl('admin')}}"><i class="fa fa-circle-o"></i>@lang('admin.admin_account')</a></li>
        <li class=""><a href="{{aurl('admin/create')}}"><i class="fa fa-user-plus"></i>@lang('admin.add_new_admin')</a>
      </li>
    </ul>
  </li>
  <li class="treeview {{active_menu('users')[0]}}">
    <a href="#">
      <i class="fa fa-user"></i> <span>{{trans('admin.users_accounts')}}</span>
      {{--           <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span> --}}
    </a>
    <ul class="treeview-menu" style="{{active_menu('users')[1]}}">
      <li class=""><a href="{{aurl('users/create')}}"><i class="fa fa-user-plus"></i>@lang('admin.add_new_user')</a>
      <li class=""><a href="{{aurl('users')}}"><i class="fa fa-circle-o"></i>@lang('admin.all_accounts')</a>
      <li class=""><a href="{{aurl('users')}}?level=user"><i class="fa fa-circle-o"></i>@lang('admin.users_accounts')</a>
      <li class=""><a href="{{aurl('users')}}?level=vendor"><i class="fa fa-circle-o"></i>@lang('admin.vendors_accounts')</a>
      <li class=""><a href="{{aurl('users')}}?level=company"><i class="fa fa-circle-o"></i>@lang('admin.companies_accounts')</a>
    </li>
  </ul>
</li>
</ul>
</section>
<!-- /.sidebar -->
</aside>