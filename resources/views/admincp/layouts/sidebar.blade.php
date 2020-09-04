<!--BEGIN SIDEBAR -->
<div id="sidebar" class="nav-collapse collapse">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler hidden-phone"></div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
            <input type="text" class="search-query" placeholder="Search" />
        </form>
    </div>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="sidebar-menu">
        <li class="has-sub {{active_menu('dashboard')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-dashboard"></i></span> @lang('admincp.admincp')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li class=""><a class="" href="{{aurl()}}">@lang('admincp.home')</a></li>
                <li class=""><a class="" href="{{aurl('settings')}}">@lang('admincp.settings')</a></li>
            </ul>
        </li>


        <li class="has-sub {{active_menu('category')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"><i class="icon-sitemap"></i></span>@lang('admincp.categories')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{aurl('category/create')}}">@lang('admincp.add_new_category')</a></li>
                <li><a class="" href="{{aurl('category')}}">@lang('admincp.view_categories')</a></li>
            </ul>
        </li>
        <li class="has-sub {{active_menu('brand')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"><i class="icon-fire"></i></span>@lang('admincp.brands')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{aurl('brand/create')}}">@lang('admincp.add_new_brand')</a></li>
                <li><a class="" href="{{aurl('brand')}}">@lang('admincp.view_brands')</a></li>
            </ul>
        </li>
        <li class="has-sub {{active_menu('product')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"><i class="icon-barcode"></i></span>@lang('admincp.products')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{aurl('product/create')}}">@lang('admincp.add_new_product')</a></li>
{{--                 <li><a class="" href="{{aurl('product')}}">@lang('admincp.view_products')</a></li> --}}
                <li><a class="" href="{{aurl('product/show/table')}}">@lang('admincp.view_products')</a></li>
            </ul>
        </li>                
        <li class="has-sub {{active_menu('dashboard')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-shopping-cart"></i></span> @lang('admincp.daily_transactions')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li class=""><a class="" href="{{aurl('operation')}}">@lang('admincp.view_operations')</a></li>
                <li class=""><a class="" href="{{aurl('operation/sale')}}">@lang('admincp.sales_operations')</a></li>
                <li class=""><a class="" href="{{aurl('operation/newService')}}">@lang('admincp.do_services')</a></li>
                <li class=""><a class="" href="#">@lang('admincp.replacement_operations')</a></li>
                <li class=""><a class="" href="#">@lang('admincp.retrieval_operations')</a></li>
            </ul>
        </li>
        <li class="has-sub {{active_menu('report')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-bar-chart"></i></span> @lang('admincp.reports')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li class=""><a class="" href="#">@lang('admincp.reports')</a></li>
                <li class=""><a class="" href="#">@lang('admincp.statistics')</a></li>
            </ul>
        </li>
        <li class="has-sub {{active_menu('invoice')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-bar-chart"></i></span> @lang('admincp.invoices')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li class=""><a class="" href="{{aurl('invoice')}}">@lang('admincp.invoices_view')</a></li>
            </ul>
        </li>
        <li class="has-sub {{active_menu('client')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-bar-chart"></i></span> @lang('admincp.clients')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li class=""><a class="" href="{{aurl('client')}}">@lang('admincp.view_clients')</a></li>
            </ul>
        </li>        
        <li class="has-sub {{active_menu('notification')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-bar-chart"></i></span> @lang('admincp.notifications')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li class=""><a class="" href="#">@lang('admincp.notifications_view')</a></li>
            </ul>
        </li>                
        <li class="has-sub {{active_menu('moderator')}}">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-user"></i></span>@lang('admincp.moderators_accounts')
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="{{aurl('moderator/create')}}">@lang('admincp.add_new_moderator')</a></li>
                <li><a class="" href="{{aurl('moderator')}}">@lang('admincp.view_moderators')</a></li>
            </ul>
        </li>

    </ul>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR