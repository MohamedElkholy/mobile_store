<!-- BEGIN HEADER -->
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="{{aurl()}}">
                <img src="{{asset(Storage::url(settings()->logo))}}" alt="Admin Lab" />
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="arrow"></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <div id="top_menu" class="nav notify-row">
                <!-- BEGIN NOTIFICATION -->
                <ul class="nav top-menu">
                    <!-- BEGIN SETTINGS -->

                    <!-- END SETTINGS -->
                    <!-- END INBOX DROPDOWN -->
                </ul>
            </div>
            <!-- END  NOTIFICATION -->
            <div class="top-nav ">
                <ul class="nav pull-left top-menu" >
                    <!-- BEGIN USER LOGIN DROPDOWN -->                 
                    <li class="dropdown">
                        <a class="dropdown-toggle element"  href="{{aurl('moderator/'.moderatorAuth()->user()->id)}}"  style="margin: 5px;"><span> </span>@lang('admincp.change_password')
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle element" href="{{aurl('logout')}}"  style="margin: 5px;"><span> </span>@lang('admincp.log_out')
                        </a>
                    </li>
                    
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->