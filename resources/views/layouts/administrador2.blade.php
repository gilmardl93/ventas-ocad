<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>SISTEMA DE CALIFICACION MANUAL DEL EXAMEN VOCACIONAL</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
        {!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
        {!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!! Html::style('assets/global/css/components.min.css') !!}
        {!! Html::style('assets/global/css/plugins.min.css') !!}
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        {!! Html::style('assets/layouts/layout/css/layout.min.css') !!}
        {!! Html::style('assets/layouts/layout/css/themes/darkblue.min.css') !!}
        {!! Html::style('assets/layouts/layout/css/custom.min.css') !!}
        {!! Html::style('assets/global/plugins/ladda/ladda-themeless.min.css') !!}
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{!! url('admin') !!}">
                            <img src="{!! url('assets/layouts/layout/img/logo.png') !!}" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{!! url('assets/layouts/layout/img/avatar3_small.jpg') !!}" />
                                    <span class="username username-hide-on-mobile"> </span>
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
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                         
                            <li class="nav-item active open">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">MANTENIMIENTO</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item start">
                                        <a href="{!! url('usuarios') !!}" class="nav-link ">
                                            <i class="icon-bulb"></i>
                                            <span class="title">USUARIOS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('docentes') !!}" class="nav-link ">
                                            <i class="icon-bulb"></i>
                                            <span class="title">DOCENTES</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('examenes') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">EXAMENES</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('asignar') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">ASIGNAR USUARIO</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('descargar-reporte') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">DESCARGAR REPORTE</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>   
                         
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <li class="nav-item  active open">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">REGISTROS</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  start">
                                        <a href="{!! url('nota') !!}" class="nav-link ">
                                            <i class="icon-bulb"></i>
                                            <span class="title">NOTAS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  start">
                                        <a href="{!! url('reporte') !!}" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">REPORTE</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>   
                          
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        
                        <!-- END THEME PANEL -->

                        @yield('content')
                        
            <div class="page-footer">
                <div class="page-footer-inner"> <?php echo date('Y'); ?> Todos los derechos reservados
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->

        {!! Html::script('assets/global/plugins/ladda/spin.min.js') !!}
        {!! Html::script('assets/global/plugins/ladda/ladda.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('assets/global/plugins/js.cookie.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery.blockui.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
        {!! Html::script('assets/global/scripts/datatable.js') !!}
        {!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
        {!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
        {!! Html::script('assets/global/scripts/app.min.js') !!}
        {!! Html::script('assets/pages/scripts/table-datatables-buttons.min.js') !!}
        {!! Html::script('assets/layouts/layout/scripts/layout.min.js') !!}
        {!! Html::script('assets/layouts/layout/scripts/demo.min.js') !!}
        {!! Html::script('assets/layouts/global/scripts/quick-sidebar.min.js') !!}
    </body>