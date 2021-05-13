<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--HEADER-->
<?php
	$this->load->view('user/_nav'); 
?>
<!--HEADER END-->
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sent SMS </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Sent SMS</li>
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

          	 <div class="col-md-12">
            <!-- general form elements -->

              <div class="card">
		              <div class="card-header">
		                <h3 class="card-title">List of all SMS</h3>
		                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <a href="<?= base_url() ?>admin/compose_sms" class="btn btn-primary">Compose SMS</a>
		              </div>
		              <!-- /.card-header -->
		              <div class="card-body">
		                <table id="example2" class="table table-bordered table-hover">
		                  <thead>
			                  <tr>
                          <th>#</th>
			                    <th>Message</th>
			                    <th>Group</th>
                          <th>Status</th>
			                  </tr>
		                  </thead>
		                  <tbody>

                        <?php 
                          $i = 1;
                          foreach ($sms as $smss) {
                      ?>

                        <tr>
                           <td><?= $i ?></td>
                           <td><?= $smss->sms ?></td>
                           <td>
                              <?php if(isset($groups[$smss->group_id])){ ?>
                                <a href="<?= base_url() ?>admin/members/<?= $smss->group_id ?>"><?= $groups[$smss->group_id] ?></a>
                              <?php }else{ ?> <span class="text-danger">Delted Group</span> <?php } ?>
                            </td>
                           <td style="color: #<?= $smss->status == 'Fail' ? 'F63C41' : '3CF641' ?>;"><?= $smss->status ?></td>
                        </tr>

                      <?php
                          $i++;}
                      ?>
		                  		
		                  </tbody>
		                  <tfoot>
		                   <tr>
                          <th>#</th>
                          <th>Message</th>
                          <th>Group</th>
                          <th>Status</th>
			                  </tr>
		                  </tfoot>
		                </table>
		              </div>
		              <!-- /.card-body -->
		            </div>
		            <!-- /.card -->
		          <!--/.col (left) -->
		          <!-- right column -->
		         
		        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 

<script>
  $(function () {
   
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>