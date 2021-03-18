<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" 
        style="margin-left: 0;border-bottom: 0;">
    <div class="container-fluid">
      <a href="<?= base_url() ?>" class="navbar-brand">
        <img src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" alt="logo" class="brand-image "
             style="opacity: 1;max-height:60px;">
        <span class="brand-text font-weight-light"></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
         
        </ul>

      <ul class="navbar-nav mr-auto">
      </ul>
      
      <ul class="navbar-nav">
        <!-- Messages Dropdown Menu -->
         <li class="nav-item <?php if($this->uri->segment(2) == ''){echo 'active';} ?>">
            <a href="<?= base_url() ?>" class="nav-link"><i class="fa fa-home"></i> Home</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2) == 'contact'){echo 'active';} ?>">
            <a href="<?= base_url() ?>home/contact" class="nav-link"><i class="fa fa-phone-alt"></i> Contact us</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2) == 'about'){echo 'active';} ?>">
            <a href="<?= base_url() ?>home/about" class="nav-link"><i class="fa fa-info-circle"></i> About us</a>
          </li>
         
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->