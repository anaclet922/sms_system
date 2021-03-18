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
            <h1>Users </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Users</li>
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
		                <h3 class="card-title">List of all Users</h3>
		                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-user">Add new</a>
		              </div>
		              <!-- /.card-header -->
		              <div class="card-body">
		                <table id="example2" class="table table-bordered table-hover">
		                  <thead>
			                  <tr>
                          <th>Profile</th>
			                    <th>Names</th>
			                    <th>E-mail</th>
			                    <th>Role</th>
			                    <th>Action</th>
			                  </tr>
		                  </thead>
		                  <tbody>

                        <?php 

                          foreach ($users as $user) {
                      ?>

                        <tr>
                           <td>
                               <center>
                                   <img src="<?= base_url() ?>assets/img/<?= $user->profile_pic ?>" alt="Profile" class="brand-image" style="opacity: .8;height: auto;width: 2.1rem;">
                               </center>
                           </td>
                           <td><?= $user->first_name . ' ' . $user->last_name ?></td>
                           <td><?= $user->email ?></td>
                           <td class="<?php if($user->role == 'admin'){echo 'text-danger';}else{echo 'text-success';} ?>"><?= $user->role ?></td>
                           <td class="dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                   <i class="fas fa-sliders-h"></i>
                                </a>
                                <div class="dropdown-menu">
                                  <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit<?= $user->id ?>"><i class="fas fa-edit"></i> Edit</a>
                                  <?php if($this->session->user[0]->id != $user->id){ ?>
                                    <a class="dropdown-item"  data-toggle="modal" data-target="#modal-delete<?= $user->id ?>" tabindex="-1" href="#"><i class="fas fa-trash"></i> Delete</a>
                                  <?php } ?>
                                </div>
                           </td>
                        </tr>

                         <div class="modal fade" id="modal-delete<?= $user->id ?>">
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
                                  <a href="<?= base_url() ?>admin/delete_user/<?= $user->id ?>" class="btn btn-danger"><i class="fas fa-check"></i> Yes</a>
                                </div>
                                
                              </div>
                              <!-- /.modal-content -->
                            </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->


                        <div class="modal fade" id="modal-edit<?= $user->id ?>">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                               
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form method="post" action="<?= base_url() ?>admin/update_user_data">
                                <div class="modal-body">
                                    <label>First name</label>
                                    <input type="text" name="first_name" class="form-control" value="<?= $user->first_name ?>" required>
                                    <label>Last name</label>
                                    <input type="text" name="last_name" class="form-control" value="<?= $user->last_name ?>" required>
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control" value="<?= $user->email ?>" required>
                                    <label>Role</label>
                                    <select class="form-control" name="role" required>
                                       <option value="member" <?php if($user->role == 'member'){echo 'selected';} ?>>Member</option>
                                       <option value="admin" <?php if($user->role == 'admin'){echo 'selected';} ?>>Admin</option>
                                    </select>
                                    <br>
                                    <input type="hidden" name="id" value="<?= $user->id ?>">
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <a href="#" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> No</a>
                                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                                </div>
                                </form>
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
                          <th>Profile</th>
			                    <th>Names</th>
			                    <th>E-mail</th>
			                    <th>Role</th>
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



  <div class="modal fade" id="modal-new-user">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
         
          <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?= base_url() ?>admin/add_new_user">
          <div class="modal-body">
              <label>First name</label>
              <input type="text" name="first_name" class="form-control" required>
              <label>Last name</label>
              <input type="text" name="last_name" class="form-control" required>
              <label>E-mail</label>
              <input type="email" name="email" class="form-control" required>
              <label>Role</label>
              <select class="form-control" name="role" required>
                 <option value="member">Member</option>
                 <option value="admin">Admin</option>
              </select>
              <br>
              <input type="hidden" name="id" value="<?= $user->id ?>">
          </div>
          <div class="modal-footer justify-content-between">
            <a href="#" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> No</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
  <!-- /.modal-dialog -->
</div>

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