<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic | User Login 1</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
        {!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}

        {!! Html::style('assets/global/css/components.min.css') !!}
        {!! Html::style('assets/global/css/plugins.min.css') !!}

        {!! Html::style('assets/pages/css/login.min.css') !!}
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="{!! url('assets/pages/img/logo-big.png') !!}" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            {!! Form::open(['class' => 'login-form']) !!}
                <h3 class="form-title font-green">IDENTIFICATE</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Ingrese su usuario y su contraseña. </span>
                </div>
                <div  id="error"> </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">INGRESAR</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
                </div>
                {!! Form::close()   !!}
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright"> <?php echo date("Y"); ?> ADMISION UNI | gmoreno@admisionuni.edu.pe</div>

        {!! Html::script('assets/global/plugins/jquery.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('assets/global/plugins/js.cookie.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery.blockui.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js') !!}
        {!! Html::script('assets/global/scripts/app.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
        <script type="text/javascript">
            $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                    var data = $(".login-form").serialize();
                    $.ajax({
                        type    : "post",
                        url         : "iniciar-sesion",
                        data    : data,
                        cache : false,
                        success : function(echo)
                        {
                            if(echo  == 1)
                            {
                                $("#error").hide();
                                location.href="dashboard";
                            }else if(echo == 0)
                            {
                                $("#error").html("Usuario y clave ingresado son incorrectos");
                            }
                        }
                    });
            }
        });
        </script>
    </body>

</html>