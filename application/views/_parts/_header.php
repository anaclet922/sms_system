<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- The above 3 meta tags *must* come first in the head -->

    <!-- SITE TITLE -->
    <title><?= $seo_data['title'] ?> :: <?= webSettings()['site_name'] ?></title>
    <meta name="description" content="<?= webSettings()['site_description'] ?>"/>
    <meta name="keywords" content="<?= webSettings()['site_keywords'] ?>"/>
    <meta name="author" content="anaclet.online"/>

    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="<?= $seo_data['title'] ?>"/>
    <meta name="twitter:site" content="<?= webSettings()['site_name'] ?>"/>
    <meta name="twitter:creator" content="<?= webSettings()['site_name'] ?>"/>
    <meta name="twitter:url" content="<?= base_url() ?>"/>
    <meta name="twitter:title" content="<?= $seo_data['title'] ?>"/>
    <!-- maximum 140 char -->
    <meta name="twitter:description" content="<?= webSettings()['site_description'] ?>"/>
    <!-- maximum 140 char -->
    <meta name="twitter:image" content="<?= base_url() ?>assets/img/<?= isset($seo_data['image']) != FALSE ? $seo_data['image'] : webSettings()['logo'] ?>"/>
    <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends from here -->

    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="<?= $seo_data['title'] ?>"/>
    <meta property="og:url" content="<?= base_url() ?>"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="<?= webSettings()['site_name'] ?>"/>
    <!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="<?= base_url() ?>assets/img/<?= isset($seo_data['image']) != FALSE ? $seo_data['image'] : webSettings()['logo'] ?>"/>
    <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends from here -->



    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

    <!--  FAVICON  ICONS -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?=webSettings()['favicon'] ?>"/>
    <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?=webSettings()['favicon'] ?>"/>

	<!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
  
    <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">
</head>


