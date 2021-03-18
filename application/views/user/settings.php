<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--HEADER-->
<?php
	$this->load->view('user/_nav'); 
?>
<!--HEADER END-->


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Web Settings </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Web settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <div class="row">
          <!-- left column -->


          <div class="col-md-6">
            <!-- general form elements -->


	            <div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Logo</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form class="form" method="post" action="<?= base_url() ?>admin/change_logo" enctype="multipart/form-data">
	                <div class="card-body">
	                  <div class="form-group">
	                    <!-- <label for="customFile">Custom File</label> -->

	                  
	                    <center>
	                    	<img 
	                    	src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" 
	                    	alt=" Logo" 
	                    	class="brand-image image-logo-preview"
       						style="width: auto;height: 100px;">
       					</center>
       					<br>


	                    <div class="custom-file">
	                      <input type="file" name="imgInpLogoChooser" class="custom-file-input" id="imgInpLogoChooser">
	                      <label class="custom-file-label" for="imgInpLogoChooser">Choose file</label>
	                    </div>
	                  </div>
	                 


	                <div class="card-footer">
	                	<center>
	                  			<button type="submit" class="btn btn-primary">
	                  			<i class="fas fa-save"></i> Save</button>
	                  	</center>
	                </div>
	                </div>
	              </form>
	            </div>
		            <!-- /.card -->


		        <div class="card card-danger">
		              <div class="card-header">
		                <h3 class="card-title">Site Info</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_info">
		                <div class="card-body">
		                
		                  
		                  <div class="form-group">
			                    <label for="exampleInputEmail1">Site name</label>
			                    <input type="text" class="form-control" name="site_name" placeholder="Enter site name" value="<?= webSettings()['site_name'] ?>">
		                  </div>

		                  <div class="form-group">
	                        <label>Keywords</label>
	                        <textarea class="form-control" rows="3" name="site_keywords" placeholder="Enter keywords..."><?= webSettings()['site_keywords'] ?></textarea>
	                      </div>

	                      <div class="form-group">
	                        <label>Description</label>
	                        <textarea class="form-control" rows="3" name="site_description" placeholder="Enter description..."><?= webSettings()['site_description'] ?></textarea>
	                      </div>

		                 


		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div>
		              </form>
		        </div>
		            <!-- /.card -->

		        <div class="card card-info">
		              <div class="card-header">
		                <h3 class="card-title">Footer address</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_footer_address" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                
		                  	<div class="form-group">
			                    <label for="exampleInputEmail1">Address & Contacts</label>
			                     <textarea class="textarea text-description" name="address" placeholder="Place some text here, about this stream..."
		                          style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= webSettings()['footer_address'] ?></textarea>
		                  </div>
			                <div class="card-footer">
			                	<center>
			                  			<button type="submit" class="btn btn-primary">
			                  			<i class="fas fa-save"></i> Save</button>
			                  	</center>
			                </div>
		                </div>
		               </div>
		              </form>
		        </div>
		            <!-- /.card -->
		        
		         <div class="card card-danger">
		              <div class="card-header">
		                <h3 class="card-title">Ste email</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_site_email" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                
		                  	<div class="form-group">
			                    <label for="exampleInputEmail1">E-mail</label>
			                     <input type="email" name="email" class="form-control" value="<?= webSettings()['site_email'] ?>" placeholder="Eg: info@example.com...">
		                  </div>
		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div>
		            </div>
		              </form>
		          </div>
		            <!-- /.card -->



		          <div class="card card-primary">
		              <div class="card-header">
		                <h3 class="card-title">Terms and condition</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_terms_condition" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                
		                  	<div class="form-group">
			                    <label for="exampleInputEmail1">Policy</label>
			                     <textarea class="textarea text-description" name="terms" placeholder="Place some text here, about this stream..."
		                          style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= webSettings()['site_terms'] ?></textarea>
		                  </div>
		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div></div>
		              </form>
		          </div>


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">


            
          		 <div class="card card-warning">
		              <div class="card-header">
		                <h3 class="card-title">Favicon</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		               <form class="form" method="post" action="<?= base_url() ?>admin/change_favicon" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                    <!-- <label for="customFile">Custom File</label> -->

		                    <center>
		                    	<img 
		                    	src="<?= base_url() ?>assets/img/<?= webSettings()['favicon'] ?>" 
		                    	alt=" Logo" 
		                    	class="brand-image image-logo-preview1"
           						style="width: auto;height: 100px;">
           					</center>
           					<br>


		                    <div class="custom-file">
		                      <input type="file" name="imgInpLogoChooser" class="custom-file-input" id="imgInpLogoChooser1">
		                      <label class="custom-file-label" for="imgInpLogoChooser">Choose file</label>
		                    </div>
		                  </div>
		                 


		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div>
		              </form>
		         </div>
		            <!-- /.card -->


		         <div class="card card-info" style="display: none;">
		              <div class="card-header">
		                <h3 class="card-title">Currency</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_currency" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                
		                  	<div class="form-group">
			                    <label for="exampleInputEmail1">Currency</label>
			                    <input type="text" class="form-control" name="site_currency" placeholder="Enter site name" value="<?= webSettings()['site_currency'] ?>">
		                  </div>
		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div>
		            </div>
		              </form>
		         </div>
		            <!-- /.card -->

		          <div class="card card-secondary">
		              <div class="card-header">
		                <h3 class="card-title">Footer about</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_footer_about" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                
		                  	<div class="form-group">
			                    <label for="exampleInputEmail1">About</label>
			                     <textarea class="textarea text-description" name="about" placeholder="Place some text here, about this stream..."
		                          style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= webSettings()['footer_about'] ?></textarea>
		                  </div>
		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div> </div>
		              </form>
		          </div>
		            <!-- /.card -->

		          <div class="card card-secondary">
		              <div class="card-header">
		                <h3 class="card-title">Social Media</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_social_media" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                
		                  	<div class="form-group">
			                    <label for="exampleInputEmail1">Facebook</label>
			                     <input type="text" name="facebook" class="form-control" value="<?= webSettings()['footer_facebook'] ?>" placeholder="Facebook URL...">
			                     <label for="exampleInputEmail1">Twitter</label>
			                     <input type="text" name="twitter" class="form-control" value="<?= webSettings()['footer_twitter'] ?>" placeholder="Twitter URL...">
			                     <label for="exampleInputEmail1">Youtube</label>
			                     <input type="text" name="youtube" class="form-control" value="<?= webSettings()['footer_youtube'] ?>" placeholder="Youtube URL...">
			                     <label for="exampleInputEmail1">LinkedIn</label>
			                     <input type="text" name="linkedin" class="form-control" value="<?= webSettings()['footer_linkedin'] ?>" placeholder="LinkedIn URL...">
		                  </div>
		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div> </div>
		              </form>
		          </div>
		            <!-- /.card -->

		          <div class="card card-warning">
		              <div class="card-header">
		                <h3 class="card-title">Privacy policy</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_privacy_policy" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                
		                  	<div class="form-group">
			                    <label for="exampleInputEmail1">Policy</label>
			                     <textarea class="textarea text-description" name="policy" placeholder="Place some text here, about this stream..."
		                          style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= webSettings()['site_privacy'] ?></textarea>
		                  </div>
		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div> </div>
		              </form>
		          </div>
		            <!-- /.card -->

		             <div class="card card-danger">
		              <div class="card-header">
		                <h3 class="card-title">Inbox Mode</h3>
		              </div>
		              <!-- /.card-header -->
		              <!-- form start -->
		              <form class="form" method="post" action="<?= base_url() ?>admin/change_inobx_mode" enctype="multipart/form-data">
		                <div class="card-body">
		                  <div class="form-group">
		                
		                  	<div class="custom-control custom-radio">
	                          <input class="custom-control-input" type="radio" id="customCheckbox1" name="inbox_mode[]" value="shortcode" <?php if(webSettings()['inbox_mode'] == 'shortcode'){echo 'checked';} ?>>
	                          <label for="customCheckbox1" class="custom-control-label">Shortcode for every group</label>
	                        </div>
	                        <div class="custom-control custom-radio">
	                          <input class="custom-control-input" type="radio" id="customCheckbox2" name="inbox_mode[]" value="key" <?php if(webSettings()['inbox_mode'] == 'key'){echo 'checked';} ?>>
	                          <label for="customCheckbox2" class="custom-control-label">First word key</label>
	                        </div>
		                <div class="card-footer">
		                	<center>
		                  			<button type="submit" class="btn btn-primary">
		                  			<i class="fas fa-save"></i> Save</button>
		                  	</center>
		                </div>
		                </div> </div>
		              </form>
		          </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <script type="text/javascript">

  	$(document).ready(function(){

  		<?php if($this->session->flashdata('alert') == 'success'){ ?>
			toastr.success('<?= $this->session->flashdata('msg') ?>')
        <?php } else if($this->session->flashdata('alert') == 'danger'){ ?>
	      toastr.error('<?= $this->session->flashdata('msg') ?>')
		<?php } ?>

  	});
  	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      $('.image-logo-preview').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}	

		$("#imgInpLogoChooser").change(function() {
		  readURL(this);
		});
	function readURL1(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      $('.image-logo-preview1').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}	

		$("#imgInpLogoChooser1").change(function() {
		  readURL1(this);
		});
  </script>