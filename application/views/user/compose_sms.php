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
            <h1>New SMS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">New SMS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


       
          <!-- left column -->
          <form class="form" method="post" action="<?= base_url() ?>admin/post_new_sms" enctype="multipart/form-data">

          	<div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Group info</h3>
              </div>
		           <div class="row">
			          <div class="col-md-2"></div>
			          <div class="col-md-8">
						<br>
		                 <br>
		                  <div class="form-group">
			                    <label>Message (<span id="charNum">160</span> Remaining characters):</label>
			                    <textarea class="form-control" name="message" placeholder="Message content..." maxlength="160" onkeyup="countChar(this)"></textarea>
		                  </div>
						<div class="form-group">
			                    <label>Target group:</label>
			                    <select class="form-control" name="group_id">
			                    	<?php foreach ($groups as $group) { ?>
			                    	<option value="<?= $group->id ?>"><?= $group->group_name ?></option>
			                    	<?php } ?>
			                    </select>
		                  </div>

		                  <br>

		                  <center>
		                  	 <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Send</button>
		                  </center>
		               <br>
		                 <br>
			          </div>
			          <div class="col-md-2">
		              </div>
		        <!-- /.row -->

		     </div>
	      </form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 160) {
          val.value = val.value.substring(0, 160);
        } else {
          $('#charNum').text(160 - len);
        }
      };
    </script>