<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $seo_data['title'] ?> :: Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!--  FAVICON  ICONS -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?=webSettings()['favicon'] ?>"/>
    <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?=webSettings()['favicon'] ?>"/>
  <!-- jQuery -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">


  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  </head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
