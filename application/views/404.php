<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--HEADER-->
<?php
	$this->load->view('nav'); 
?>
<!--HEADER END-->


<div class="container">

	<!-- Content Header (Page header) -->
	<section class="breadcrumb-container" style="background-color: transparent;">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
		    <li class="breadcrumb-item active">404</li>
		  </ol>
	</section>

	<div class="row">
		<div class="col-md-12">
			<!-- Main content -->
			    <section class="content">
			      <div class="error-page">
			        <h2 class="headline text-warning"> 404</h2>

			        <div class="error-content">
			          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

			          <p>
			            We could not find the page you were looking for.
			            Meanwhile, you may return to <a href="<?= base_url() ?>">HOMEPAGE</a>.
			          </p>

			        </div>
			        <!-- /.error-content -->
			      </div>
			      <!-- /.error-page -->
			    </section>
			    <!-- /.content -->
		</div>
	</div>


   <br><br><br>
</div>


<!--FOOTER-->
<?php
	$this->load->view('foot'); 
?>
<!--FOOTER END-->
