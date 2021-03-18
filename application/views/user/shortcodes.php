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
            <h1>Shortcodes </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Shortcodes</li>
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
		                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-shortcode">Add new</a>
		              </div>
		              <!-- /.card-header -->
		              <div class="card-body">

                    

		                <table id="example2" class="table table-bordered table-hover">
		                  <thead>
			                  <tr>
                          <th>#</th>
			                    <th>Shortcode</th>
			                    <th>User</th>
                          <th>Action</th>
			                  </tr>
		                  </thead>
		                  <tbody>

                        <?php
                          $j = 1; 
                          //echo '<pre>';print_r($shortcodes);
                          foreach ($shortcodes as $shortcode) {
                        ?>

                          <tr>
                             <td><?= $j ?></td>
                             <td><?= $shortcode['shortcode']->short_code ?></td>
                             <td><?= $shortcode['user'][0]->first_name . ' ' . $shortcode['user'][0]->last_name ?></td>
                              <td class="dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                   <i class="fas fa-sliders-h"></i>
                                </a>
                                <div class="dropdown-menu">
                                  <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-edit<?= $shortcode['shortcode']->id ?>"><i class="fas fa-edit"></i> Edit</a>

                                    <a class="dropdown-item"  data-toggle="modal" data-target="#modal-delete<?= $shortcode['shortcode']->id ?>" tabindex="-1" href="#"><i class="fas fa-trash"></i> Delete</a>
                                 
                                </div>
                           </td>
                          </tr>



                         <div class="modal fade" id="modal-delete<?= $shortcode['shortcode']->id ?>">
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
                                  <a href="<?= base_url() ?>admin/delete_shortcode/<?= $shortcode['shortcode']->id ?>" class="btn btn-danger"><i class="fas fa-check"></i> Yes</a>
                                </div>
                                
                              </div>
                              <!-- /.modal-content -->
                            </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                      <div class="modal fade" id="modal-edit<?= $shortcode['shortcode']->id ?>">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                               
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                 <form method="post" action="<?= base_url() ?>admin/update_shortcode">
                                    <div class="modal-body">
                                        <label>Shortcode</label>
                                        <input type="text" name="shortcode" class="form-control" required value="<?= $shortcode['shortcode']->short_code ?>">
                                        <label>User</label>
                                        <select class="form-control" name="user_id" required>
                                           <option value="" <?= $shortcode['shortcode']->user_id == '' ? 'selected' : '' ?>>Select user</option>
                                           <?php foreach ($users as $user) { ?>
                                            <option <?= $shortcode['shortcode']->user_id == $user->id ? 'selected' : '' ?> value="<?= $user->id ?>"><?=  $user->first_name . ' ' . $user->last_name ?></option>
                                          <?php } ?>
                                        </select>
                                        <br>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <a href="#" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancel</a>
                                      <button type="submit" class="btn btn-primary"><i></i> Add</button>
                                    </div>
                                    <input type="hidden" name="shortcode_id" value="<?= $shortcode['shortcode']->id ?>">
                                    </form>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                        <!-- /.modal-dialog -->
                      </div>
                        <?php
                          }
                         ?>
                          
		                  		
		                  </tbody>
		                  <tfoot>
		                   <tr>
                          <tr>
                          <th>#</th>
                          <th>Shortcode</th>
                          <th>User</th>
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

 <div class="modal fade" id="modal-new-shortcode">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
         
          <div class="modal-header">
            <h4 class="modal-title">New Shortcode</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?= base_url() ?>admin/add_new_shortcode">
          <div class="modal-body">
              <label>Shortcode</label>
              <input type="text" name="shortcode" class="form-control" required>
              <label>User</label>
              <select class="form-control" name="user_id" required>
                 <option value="" selected>Select user</option>
                 <?php foreach ($users as $user) { ?>
                  <option value="<?= $user->id ?>"><?=  $user->first_name . ' ' . $user->last_name ?></option>
                <?php } ?>
              </select>
              <br>
          </div>
          <div class="modal-footer justify-content-between">
            <a href="#" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancel</a>
            <button type="submit" class="btn btn-primary"><i></i> Add</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
  <!-- /.modal-dialog -->
</div>