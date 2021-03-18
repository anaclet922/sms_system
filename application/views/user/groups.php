<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--HEADER-->
<?php
	$this->load->view('user/_nav'); 
?>
<!--HEADER END-->
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Groups </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Groups</li>
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
		                <h3 class="card-title">List of all groups</h3>
		                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <a href="<?= base_url() ?>admin/add_group" class="btn btn-primary">Add new</a>
		              </div>
		              <!-- /.card-header -->
		              <div class="card-body">
		                <table id="example2" class="table table-bordered table-hover">
		                  <thead>
			                  <tr>
                          <th>Icon</th>
			                    <th>Name</th>
			                    <th>Members</th>
			                    <th>Action</th>
			                  </tr>
		                  </thead>
		                  <tbody>

                        <?php 

                          foreach ($groups as $group) {
                      ?>

                        <tr>
                           <td>
                               <center>
                                   <img src="<?= base_url() ?>assets/img/<?= $group['group']->group_icon ?>" alt="Profile" class="brand-image" style="opacity: .8;height: auto;width: 2.1rem;">
                               </center>
                           </td>
                           <td><?= $group['group']->group_name ?></td>
                           <td><?= $group['count'] ?></td>
                           <td class="dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                   <i class="fas fa-sliders-h"></i>
                                </a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="<?= base_url() ?>admin/members/<?= $group['group']->id ?>"><i class="fas fa-users"></i> Members</a>
                                  <a href="<?= base_url() ?>admin/edit_group/<?= $group['group']->id ?>" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                    <a class="dropdown-item"  data-toggle="modal" data-target="#modal-delete<?= $group['group']->id ?>" tabindex="-1" href="#"><i class="fas fa-trash"></i> Delete</a>
                                </div>
                           </td>
                        </tr>

                         <div class="modal fade" id="modal-delete<?= $group['group']->id ?>">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                               
                                <div class="modal-header">
                                  <h4 class="modal-title">Confirm action</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <h3>
                                       Are you sure to delete?
                                    </h3>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <a href="#" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> No</a>
                                  <a href="<?= base_url() ?>admin/delete_group/<?= $group['group']->id ?>" class="btn btn-danger"><i class="fas fa-check"></i> Yes</a>
                                </div>
                                
                              </div>
                              <!-- /.modal-content -->
                            </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                      <?php
                          }
                      ?>
		                  		
		                  </tbody>
		                  <tfoot>
		                   <tr>
                          <th>Icon</th>
                          <th>Name</th>
                          <th>Members</th>
                          <th>Action</th>
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
<script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 

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