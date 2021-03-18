<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!--HEADER-->
<?php
	$this->load->view('user/_nav'); 
?>
<!--HEADER END-->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">



 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Home</li>
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

          <div class="col-sm-6 col-md-6">
              <div class="small-box bg-info" style="height: 30vh;">
                <div class="inner">
                  <h1><?= $groups ?></h1>
                  <p>Groups</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-6">
              <div class="small-box bg-warning" style="height: 30vh;">
              <div class="inner">
                <h1><?= $sent_sms ?></h1>
                <p>Sent Messages</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
          </div>
          </div>
          

        </div>
        <!-- /.row -->

        <div class="row">
             

          <div class="col-sm-6 col-md-6">
              <div class="small-box bg-danger" style="height: 30vh;">
                <div class="inner">
                  <h1><?= $incoming_sms ?></h1>
                  <p>Received Messages</p>
                </div>
                <div class="icon">
                  <i class="fas fa-inbox"></i>
                </div>
            </div>
          </div>

           <div class="col-sm-6 col-md-6">
              <div class="small-box bg-success" style="height: 30vh;">
                <div class="inner">
                  <h1><?= $users ?></h1>
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
            </div>
          </div>
        </div>
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

     $('#example3').DataTable({
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