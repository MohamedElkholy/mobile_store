@include('admincp.layouts.header')
@include('admincp.layouts.navbar')
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
    @include('admincp.layouts.sidebar')
    <!-- BEGIN PAGE -->
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 style="font-weight: regular;">
                    {{settings()->store_name}}
                    <small>{{settings()->store_logo}}</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{aurl()}}"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                        </li>
                        <li><a href="#">{{$title}}</a><span class="divider-last">&nbsp;</span></li>
                        <li class="pull-right search-wrap">
                            <form class="hidden-phone" method="get" action="{{route('searchforproduct')}}">
                                <div class="search-input-area">
                                    <input name="search_text" class="search-query" type="text" placeholder="@lang('admincp.search_products')">
                                    <i class="icon-search"></i>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div id="page" class="dashboard">
                @include('admincp.layouts.message')
                @yield('content')
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
@include('admincp.layouts.datatableFooter')