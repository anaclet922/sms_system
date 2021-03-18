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
            <h1>Edit group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit group</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


       
          <!-- left column -->
          <form class="form" method="post" action="<?= base_url() ?>admin/post_update_group" enctype="multipart/form-data">

          	<div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Group info</h3>
              </div>
		           <div class="row">
			          <div class="col-md-2"></div>
			          <div class="col-md-8">
						  
						  <div class="form-group">
			                    <label for="exampleInputEmail1">Group name:</label>
			                    <input type="text" class="form-control" name="name" placeholder="Enter name..."  required value="<?= $group[0]->group_name ?>">
		                  </div>

		                  <div class="form-group">
			                    <label>Description:</label>
			                    <textarea class="textarea text-description" name="description" placeholder="Place some text here, about this group..."
		                          style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $group[0]->group_description ?></textarea>
		                  </div>
							
						<center>
							 <img src="<?= base_url() ?>assets/img/<?= $group[0]->group_icon ?>" id="thumbnail-preview" class="img-responsive" style="width: 50%">
						</center>
						 <div class="custom-file">
		                  <input type="file" name="imgChooser" class="custom-file-input" id="imgChooser">
		                  <label class="custom-file-label" for="imgChooser">Choose Group Icon</label>
		                 </div>
		                 <br><br>
		              
		                 <input type="hidden" name="group_id" value="<?= $group[0]->id ?>">
		               
			          </div>
			          <div class="col-md-2">
		              </div>

		                 <br>
		                 <br>

		          		


		                 

			          <div class="col-md-1"></div>
			          </div>

		        <!-- /.row -->

		        <div class="card-footer">
		        	<div class="row">
		        		<div class="col-md-4">
		        			<a href="<?= base_url() ?>admin" type="submit" name="publish" class="btn btn-danger btn-block">
			                  	<i class="fas fa-times-circle"></i> Cancel
			                </a>
		        		</div>
		        		<div class="col-md-4"></div>
		        		<div class="col-md-4">
		        			<button type="submit" name="publish" class="btn btn-primary btn-block">
			                  	<i class="fas fa-save"></i> Save
			                </button>
		        		</div>
		        	</div>
		        </div>
		     </div>
	      </form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<style type="text/css">
	.img-responsive{
	  width: 100%;
	  margin: 10px;
	}

</style>


  <script type="text/javascript">
  	
  	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      $('#thumbnail-preview').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}	

		$("#imgChooser").change(function() {
		  readURL(this);
		});

	
</script>