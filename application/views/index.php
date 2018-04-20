<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aplikasi Inventory SMK</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('public/assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?= base_url('public/assets/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('public/assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= base_url('public/assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="<?= base_url('public/assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-default" id="navbar-no-margin-bottom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Aplikasi Inventory SMK</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= site_url('/register'); ?>"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    <li><a href="<?= site_url('/login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron" id="hero">
        <div id="hero-content">
            <h1> Aplikasi Inventory SMK </h1>
            <p> Register untuk membuat akun atau Login untuk masuk kedalam aplikasi </p>
            <a href="<?= site_url('/register'); ?>" class="btn btn-primary btn-lg">Register</a>
            <a href="<?= site_url('/login'); ?>"  class="btn btn-success btn-lg">Login</a>        
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('public/assets/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('public/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('public/assets/metisMenu/metisMenu.min.js'); ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('public/assets/js/sb-admin-2.js'); ?>"></script>

</body>

</html>