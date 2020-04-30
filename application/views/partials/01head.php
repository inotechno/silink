<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets'); ?>/assets/images/logoicon.png">
    <title>SILINK - Sistem Informasi Lingkungan</title>

    <!-- Custom CSS -->
    <link href="<?= base_url('assets'); ?>/assets/extra-libs/c3/c3.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets'); ?>/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets') ?>/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url('assets'); ?>/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <style type="text/css">
        #alert-success {
            display: none;
            text-align: center;
            position: fixed;
            bottom: 50px;
            right: 0;
            z-index: 999;
        }
    </style>
</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="alert bg-success text-white p-1" id="alert-success">
        <strong>Sukses </strong> <p class="mt-1" id="alert-success-text"></p>
    </div>