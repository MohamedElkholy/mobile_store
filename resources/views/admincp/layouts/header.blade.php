<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.2
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>{{!empty($title)? $title : trans('admin.adminPanel')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="{{asset(Storage::url(settings()->icon))}}">
    <link href="{{url('/')}}/admin/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admin/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="{{url('/')}}/admin/css/style.css" rel="stylesheet" />
    <link href="{{url('/')}}/admin/css/custom.css" rel="stylesheet" />
    <link href="{{url('/')}}/admin/css/style_responsive.css" rel="stylesheet" />
    <link href="{{url('/')}}/admin/css/style_default.css" rel="stylesheet" id="style_color" />
    <link href="{{url('/')}}/admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/uniform/css/uniform.default.css" />
    <link href="{{url('/')}}/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="{{url('/')}}/admin/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <style type="text/css">
    @font-face {
    font-family: "cairo bold";
    src: url({{url('admin/font/cairo-bold.ttf')}});
    }
    @font-face {
    font-family: "cairo regular";
    src: url({{url('admin/font/cairo-regular.ttf')}});
    }
    @font-face {
    font-family: "cairo light";
    src: url({{url('admin/font/cairo-light.ttf')}});
    }
    @font-face {
    font-family: "cairo extraLight";
    src: url({{url('admin/font/cairo-extraLight.ttf')}});
    }
    @font-face {
    font-family: "cairo black";
    src: url({{url('admin/font/cairo-black.ttf')}});
    }
    @font-face {
    font-family: "cairo simiBold";
    src: url({{url('admin/font/cairo-simiBold.ttf')}});
    }
    @font-face {
    font-family: "cairo regular";
    src: url({{url('admin/font/cairo-regular.ttf')}});
    }
    
    th,td{
    text-align: center !important;
    }
    html,body,h1,h2,h3,h4,h5,h6,a,ul,a,button,form,input,select, .btn{
    font-family: 'Cairo Bold', sans-serif;
    }
    th, td, .widget-title h4, label,input,span,li,p, .span2 div{
    font-family: 'cairo regular', sans-serif;
    }
    .invoice-block *{
    text-align: right;
    }
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">