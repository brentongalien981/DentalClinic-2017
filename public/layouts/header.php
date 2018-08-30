<?php require_once("/Applications/XAMPP/xamppfiles/htdocs/BucadJavier/Dental/private/includes/initializations.php"); ?>
<?php //require_once("/home/ball721/private/includes/initializations.php"); ?>

<!doctype html>
<html lang="en">
<head>

    <link rel="apple-touch-icon" sizes="76x76" href="<?= LOCAL . "public/img/apple-icon.png"; ?>">
    <link rel="icon" type="image/png" href="<?= LOCAL . "public/img/favicon.png"; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Dawes Dental Place</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!--    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>-->
    <!--    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>


    <!-- CSS Files -->
    <link href="<?= LOCAL . "public/css/bootstrap.min.css"; ?>" rel="stylesheet">
    <link href="<?= LOCAL . "public/css/material-kit.css"; ?>" rel="stylesheet"/>
    <link href="<?= LOCAL . "public/css/slide-animation.css"; ?>" rel="stylesheet">


    <!--   Core JS Files   -->
    <!--    <script src="--><? //= LOCAL . "private/external_lib/jquery-3.2.1.js"; ?><!--"></script>-->
    <script src="<?= LOCAL . "public/js/jquery.min.js"; ?>" type="text/javascript"></script>
    <script src="<?= LOCAL . "public/js/bootstrap.min.js"; ?>" type="text/javascript"></script>
    <script src="<?= LOCAL . "public/js/material.min.js"; ?>"></script>


    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <!--    <script src="--><? //=LOCAL . "public/nouislider.min.js";?><!--" type="text/javascript"></script>-->


    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="<?= LOCAL . "public/js/bootstrap-datepicker.js"; ?>" type="text/javascript"></script>


    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="<?= LOCAL . "public/js/material-kit.js"; ?>" type="text/javascript"></script>


    <script src="<?= LOCAL . "public/js/slide-animation.js"; ?>" type="text/javascript"></script>


    <!--    My Shits-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= LOCAL . "public/css/animate.css"; ?>">
    <link href="<?= LOCAL . "public/css/layouts/header.css"; ?>" rel="stylesheet">



    <?php require_once(PUBLIC_PATH . "js/my-main-helper.php"); ?>
    <script src="<?= LOCAL . "public/js/my-main-script.js"; ?>"></script>
    <script src="<?= LOCAL . "public/js/my-main-script2.js"; ?>"></script>

    <script src="<?= LOCAL . "public/js/layouts/event_listeners.js"; ?>"></script>

    <?php if ($session->is_logged_in()) { ?>
    <?php require_once(PUBLIC_PATH . "view/session/index.php"); ?>
    <?php } ?>


</head>


<!---->
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div id="random-placeholder"></div>


<!---->
<?php require_once(PUBLIC_PATH . "layouts/navigation.php"); ?>


<!---->
<div id="my-wrapper">