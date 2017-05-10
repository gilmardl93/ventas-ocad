<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>SISTEMA DE VENTAS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
        {!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}

        {!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
        {!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}

        {!! Html::style('assets/global/css/components.min.css') !!}
        {!! Html::style('assets/global/css/plugins.min.css') !!}

        {!! Html::style('assets/layouts/layout/css/layout.min.css') !!}
        {!! Html::style('assets/layouts/layout/css/themes/darkblue.min.css') !!}
        {!! Html::style('assets/layouts/layout/css/custom.min.css') !!}
        {!! Html::style('assets/global/plugins/ladda/ladda-themeless.min.css') !!}
        <link rel="shortcut icon" href="favicon.ico" /> </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <div class="page-header navbar navbar-fixed-top">
                <div class="page-header-inner ">
                    <div class="page-logo">
                        <a href="{!! url('admin') !!}">
                            <img src="{!! url('assets/layouts/layout/img/logo.png') !!}" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{!! url('assets/layouts/layout/img/avatar3_small.jpg') !!}" />
                                    <span class="username username-hide-on-mobile"> {!! Auth::user()->username !!}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Cerrar Sesion </a>
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            @include('layouts.partials.section')       
                        </ul>                        
                    </div>
                </div>

                <div class="page-content-wrapper">

                    <div class="page-content">

                        @yield('content')
                        </div>
              
            <div class="page-footer">
                <div class="page-footer-inner"> <?php echo date('Y'); ?> Todos los derechos reservados
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>

        </div>


        {!! Html::script('assets/global/plugins/ladda/spin.min.js') !!}
        {!! Html::script('assets/global/plugins/ladda/ladda.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('assets/global/plugins/js.cookie.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery.blockui.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
        {!! Html::script('assets/global/scripts/app.min.js') !!}
        {!! Html::script('assets/layouts/layout/scripts/layout.min.js') !!}
        {!! Html::script('assets/layouts/layout/scripts/demo.min.js') !!}
        {!! Html::script('assets/layouts/global/scripts/quick-sidebar.min.js') !!}
    </body>