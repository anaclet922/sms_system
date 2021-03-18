<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>" class="">
      <img src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" alt="AdminLTE Logo" class="brand-image"
           style="opacity: 1;max-height:60px;">
      <!-- <span class="brand-text font-weight-light"></span> -->
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="<?= base_url() ?>user/forgot" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">
            	<i class="fas fa-lock"></i>
            		Request new password
        	</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?= base_url() ?>user/login"><i class="fas fa-sign-in-alt"></i> Login</a>
      </p>
      <p class="mb-0">
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->