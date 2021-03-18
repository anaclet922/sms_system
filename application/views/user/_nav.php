<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>admin" class="nav-link"><i class="fas fa-home"></i> Home</a>
      </li>
     <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>" target="_blank" class="nav-link"><i class="fas fa-globe"></i> View Site</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
<!--    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">

        <?php if(webSettings()['inbox_mode'] == 'shortcode') { ?>
          <input class="form-control form-control-navbar" type="text" disabled value="<?= $this->session->user[0]->sms_username ?>">
        <?php }else{ ?>
          <input class="form-control form-control-navbar" type="text" disabled value="<?= $this->session->user[0]->sms_username ?>">
        <?php } ?>

        <div class="input-group-append">
          <button class="btn btn-navbar" type="button" disabled>
             SMS Username
          </button>
        </div>
      </div>
    </form> -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>user/logout" role="button"><i
            class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>admin" class="brand-link">
      <img src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" alt="Profile" class="brand-image"
           style="opacity: .8">
      <!-- <span class="brand-text font-weight-light"></span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/img/<?= $this->session->user[0]->profile_pic != '' ? $this->session->user[0]->profile_pic : 'avatar.png' ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          	 <?= $this->session->user[0]->first_name . ' ' . $this->session->user[0]->last_name ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Home</li>

          <li class="nav-item">
            <a href="<?= base_url() ?>admin" class="nav-link <?php if($this->uri->segment(2) == ''){echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

           <li class="nav-header">SMS</li>

             <li class="nav-item">
              <a href="<?= base_url() ?>admin/compose_sms" class="nav-link <?php if($this->uri->segment(2) == 'compose_sms'){echo 'active';} ?>">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Compose SMS
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url() ?>admin/sent_sms" class="nav-link <?php if($this->uri->segment(2) == 'sent_sms'){echo 'active';} ?>">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  Sent SMS
                </p>
              </a>
            </li>

              <li class="nav-item">
              <a href="<?= base_url() ?>admin/incoming_sms" class="nav-link <?php if($this->uri->segment(2) == 'incoming_sms'){echo 'active';} ?>">
                <i class="nav-icon fas fa-inbox"></i>
                <p>
                  Incoming SMS <span class="badge badge-danger badge-sms-new" style="display: none;">0</span>
                </p>
              </a>
            </li>

           <li class="nav-header">Groups</li>

            <li class="nav-item">
              <a href="<?= base_url() ?>admin/add_group" class="nav-link <?php if($this->uri->segment(2) == 'add_group'){echo 'active';} ?>">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                  Add group
                </p>
              </a>
            </li>

              <li class="nav-item">
              <a href="<?= base_url() ?>admin/groups" class="nav-link <?php if($this->uri->segment(2) == 'groups'){echo 'active';} ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Groups
                </p>
              </a>
            </li>
          

          <li class="nav-header">Settings</li>

          <li class="nav-item">
            <a href="<?= base_url() ?>admin/profile" class="nav-link <?php if($this->uri->segment(2) == 'profile'){echo 'active';} ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
        
        <?php if($this->session->user[0]->role == 'admin') { ?>

           <li class="nav-item">
            <a href="<?= base_url() ?>admin/settings" class="nav-link <?php if($this->uri->segment(2) == 'settings'){echo 'active';} ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= base_url() ?>admin/users" class="nav-link <?php if($this->uri->segment(2) == 'users'){echo 'active';} ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

       <!--      <li class="nav-item">
            <a href="<?= base_url() ?>admin/shortcodes" class="nav-link <?php if($this->uri->segment(2) == 'shortcodes'){echo 'active';} ?>">
              <i class="nav-icon fas fa-code"></i>
              <p>
                Shortcodes
              </p>
            </a>
          </li> -->
          
        <?php } ?>

         <li class="nav-header"></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>