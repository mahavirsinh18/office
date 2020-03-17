<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Login | Page</title>

        <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <style type="text/css">
        .email_err{
            color: red;
            margin: 0 0 0 230px;
        }
      
        .animation-slideUp{
            margin-top: 8px;
            color: #de815c !important; 
            font-weight: 400;
            font-style: italic;
        }
        .required span{
             color: red;
        }
    </style>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr-3.3.1.min.js"></script>
    </head>
    <body>
        <!-- Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/placeholders/layout/login2_full_bg.jpg" alt="Full Background" class="full-bg animation-pulseSlow">
        <!-- END Full Background -->

        <!-- Login Container -->
            <?php echo $content; ?>
        
            
        
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
      <!--   <script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-2.2.4.min.js"></script> -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pages/readyLogin.js"></script>
        <script>$(function(){ ReadyLogin.init(); });</script>
    </body>
</html>