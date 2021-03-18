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
            <h1>Profile info </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
          <div class="col-md-3"></div>
          <div class="col-md-6">
				
				<!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="post" action="<?= base_url() ?>user/change_info" enctype="multipart/form-data">
                 
                 <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->

                    <center>
                    	<br>
                    	<img 
                    	src="<?= base_url() ?>assets/img/<?= $this->session->user[0]->profile_pic != '' ? $this->session->user[0]->profile_pic : 'avatar.png' ?>" 
                    	alt="Avatar" 
                    	class="brand-image img-circle image-logo-preview"
   						style="width: auto;height: 100px;">
   						<br><br>
   					</center>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="imgInpLogoChooser" id="imgInpLogoChooser">
                      <label class="custom-file-label" for="imgInpLogoChooser">Choose file</label>
                    </div>
                  </div>

                  <div class="form-group">
	                    <label for="exampleInputEmail1">First name</label>
	                    <input type="text" class="form-control" name="first_name" placeholder="Enter site name" value="<?= $this->session->user[0]->first_name ?>" required>
                  </div>

                  <div class="form-group">
	                    <label for="exampleInputEmail1">Last name</label>
	                    <input type="text" class="form-control" name="last_name" placeholder="Enter site name" value="<?= $this->session->user[0]->last_name ?>" required>
                  </div>

                  <div class="form-group">
	                    <label for="exampleInputEmail1">Email</label>
	                   <input type="email" class="form-control" name="email" placeholder="Enter site  name" value="<?= $this->session->user[0]->email ?>" required>
                  </div>

                   <div class="form-group alert alert-info">
                      <label for="exampleInputEmail1">SMS Username</label>
                     <input type="email" class="form-control" name="sms_username" placeholder="Enter SMS username" value="<?= $this->session->user[0]->sms_username ?>" required>
                  </div>

                  	<div class="card-footer">
	                	<center>
	                  			<button type="submit" class="btn btn-primary">
	                  			<i class="fas fa-save"></i> Save</button>
	                  	</center>
	                  	<br>
	                  	<br>

                  <div class="form-group">
	                    <a href="#" data-toggle="modal" data-target="#modal-password"><i class="fas fa-lock"></i> Change password</a>
                  </div>

	                </div>
                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <div class="col-md-3"></div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="modal fade" id="modal-password">
    <div class="modal-dialog">
      <div class="modal-content">
      	<form method="post" action="<?= base_url() ?>user/change_user_password" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Change password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          	<div class="form-group">
                <label>Old password</label>
                <input type="password" class="form-control" name="old_password" placeholder="Enter old password...">
          </div>
          <div class="form-group">
                <label>New password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter new password...">
          </div>
              <div class="form-group">
                <label>Confirm password</label>
                <input type="password" class="form-control" name="passconf" placeholder="Enter new password...">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->




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
</script>