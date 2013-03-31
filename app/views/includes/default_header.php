<!doctype html>
<title><?php echo $title; ?> | University of the East</title>
<?php
link_file('favicon', 'icon');
link_file(array('bootstrap','styles', 'responsive'), 'stylesheet');
isset($css) ? link_file($css, 'stylesheet') : null;
?>
<!-- start wrapper -->
<div id="wrapper">
    <div id="top-bar">
        <div class="branding">

            <div class="company-identity left">
                <!-- start company logo -->
                <div class="company-name"><h1><span>EEC</span> APARTMENTS</h1></div>
                <!--<div class="company-logo"><img src="assets/img/company-logo"></div>-->
            <!--- end company logo --->
            </div>

            <!-- start optional app logo -->
            <div class="app-logo">
                <img src="<?php echo asset_url(); ?>img/app-logo.png">
            </div>
            <!--- end optional app logo --->

            <div class="clearfix"></div>
        </div>

        <div id="primary-nav">
            <div id="top-calendar" class="right">
                <a href="<?php echo base_url(); ?>calendar">
                <img src="<?php echo asset_url(); ?>img/calendar-icon.png">
                </a>
            </div>
            <ul id="top-navigation">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <?php if(isset($_SESSION['loggedIn'])) :?>
                <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
                <?php else :?>
                <li><a href="<?php echo base_url(); ?>login">Login</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <!-- start container -->
    <div id="container">
        <div id="notification-bar">
            <div class="message">
                <h1><?php echo $message; ?></h1>
            </div>
            <a href="#" class="close">×</a>
        </div>