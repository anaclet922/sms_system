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
    <br>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url() ?>user/post_login" method="post">
        <?php echo validation_errors(); ?>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?= base_url() ?>user/forgot_password">I forgot my password</a>
      </p>
      <p class="mb-0">
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
