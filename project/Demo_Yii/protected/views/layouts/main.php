<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<!-- <link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/main.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/my_custome.css">
		

	  	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes.css">
        <script type="text/javascript">
            if (typeof jQuery == 'undefined') {
                document.write('<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-2.2.4.min.js">"></' + 'script>');
            }
        </script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

 	
 	 <div id="page-wrapper" class="page-loading">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader">
                <div class="inner">
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                'sidebar-light'                                 for a light main sidebar (You can add it along with any other class)

                'sidebar-visible-lg-mini'                       main sidebar condensed - Mini Navigation (> 991px)
                'sidebar-visible-lg-full'                       main sidebar full - Full Navigation (> 991px)

                'sidebar-alt-visible-lg'                        alternative sidebar visible by default (> 991px) (You can add it along with any other class)

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'fixed-width'                                   for a fixed width layout (can only be used with a static header/main sidebar layout)

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links (You can add it along with any other class)
            -->
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
                <!-- Alternative Sidebar -->
              
                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="" class="sidebar-title">
                            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide">am<strong>codr</strong></span>
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->

                            <?php

                            $arr1 = array();
                            $li_dashboard=$li_imagepage='';                                
                            $action = strtolower(Yii::app()->controller->action->id);
                            $controller = strtolower(Yii::app()->controller->id);
                            
                            if($controller=='site'){
                                $li_dashboard="active";
                            }
                            elseif($controller=='imageupload'){
                                $li_imagepage="active";
                            }
                             
                            ?>

                            <ul class="sidebar-nav">
                                <li>
                                   <!--  <a href=""><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a> -->
                                   <?php echo CHtml::link('<i class="gi gi-home sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">Home</span>', array("site/home"), array('class' => $li_dashboard)) ?>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
                                 <!-- <li>
                                	
                                    <a href="<?php //echo Yii::app()->createUrl('site/home');?>" class=""><i class="fa fa-home sidebar-nav-icon"></i>Home</a>
                                   
                                </li> -->

                                <li>
                                    <!-- <a href="" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-more_items sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Image Page</span></a> -->
                                     <?php echo CHtml::link('<i class="gi gi-picture sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">Images</span>', array("imageupload/admin"), array('class' => $li_imagepage))?>
                                    <!-- <ul>
                                        <li>
                                            <a href="<?php //echo Yii::app()->createUrl('imageUpload/create');?>">Create Images</a>
                                        </li>
                                        <li>
                                            <a href="<?php //echo Yii::app()->createUrl('imageUpload/admin');?>">Manage Images</a>
                                        </li>
                                    </ul> -->
                                </li>
                            </ul>

                            <!-- END Sidebar Navigation -->

                            <!-- Color Themes -->
                            <!-- Preview a theme on a page functionality can be found in js/app.js - colorThemePreview() -->
                          
                            <!-- END Color Themes -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                			 <?php 
                                 $modal = Yii::app()->user->getState('modal');
                              ?>
                </div>	
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-inverse navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Header Link -->
                            <li class="hidden-xs animation-fadeInQuick">
                                <a href=""><strong>WELCOME</strong></a>
                            </li>
                            <!-- END Header Link -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- Search Form -->
                          

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- <img src="<?php //echo Yii::app()->request->baseUrl; ?>/img/placeholders/avatars/avatar9.jpg" alt="avatar"> -->
                                    <?php
                                   	 if(!Yii::app()->user->isGuest){
							
                                   		echo $modal->name; 
								    }
								    /*else
								    {
								    	$this->redirect(array('site/login'));
								    	 
									}*/

                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        <strong>ADMINISTRATOR</strong>
                                    </li>
                                  <!-- <li>
                                        <a href="<?php //echo Yii::app()->createUrl('site/index');?>">
                                            <i class="fa fa-inbox fa-fw pull-right"></i>
                                            Home
                                        </a>
                                    </li> -->
                                    <li>
                                    	 <?php echo CHtml::link('<i class="fa fa-pencil fa-fw pull-right"></i> Profile', array('user/update', 'id' => Yii::app()->user->id));  ?>
                                        <!-- <a href="<?php //echo Yii::app()->createUrl('user/update');?>">
                                            <i class="fa fa-pencil-square fa-fw pull-right"></i>
                                            Profile
                                        </a> -->
                                    </li>

                                     <li>
                                    	 <?php echo CHtml::link('<i class="fa fa-lock fa-fw pull-right"></i> Change Password', array('user/changepass', 'id' => Yii::app()->user->id));  ?>
                                        <!-- <a href="<?php //echo Yii::app()->createUrl('user/update');?>">
                                            <i class="fa fa-pencil-square fa-fw pull-right"></i>
                                            Profile
                                        </a> -->
                                    </li>
                                   <!--  <li>
                                        <a href="<?php //echo Yii::app()->createUrl('user/admin');?>">
                                            <i class="fa fa-picture-o fa-fw pull-right"></i>
                                            User Manager
                                        </a>
                                    </li> -->
                                    
                                    
                                    <li>
                                            <?php echo CHtml::link('<i class="fa fa-power-off fa-fw pull-right"></i> Log out', array('site/logout')); ?>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
   						<!-- 	<div id="header">
								<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
							</div> -->
							<!-- header -->

								<!-- <div id="mainmenu"> -->
									<?php /*$this->widget('zii.widgets.CMenu',array(
										'items'=>array(
											array('label'=>'Home', 'url'=>array('/site/index')),
											array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
											array('label'=>'Contact', 'url'=>array('/site/contact')),
											array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
											array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
										),
									));*/ ?>
							<!-- 	</div> -->
								<!-- mainmenu -->
								

								<?php echo $content; ?>

								<div class="clear"></div>

								<!-- <div id="footer">
									Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
									All Rights Reserved.<br/>
									<?php echo Yii::powered(); ?>
								</div> -->
								<!-- footer -->

                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>


  		<!-- <script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-2.2.4.min.js"></script> -->

  		
        
  		<!-- <script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-2.2.4.min.js"></script> -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr-3.3.1.min.js"></script>
  		
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <!-- <script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/pages/readyDashboard.js"></script> -->
        

</body>
</html>
