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
            <h1>Members</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Members</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


          	<div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Group: <b><?= $group[0]->group_name ?></b></h3>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-members">Upload list</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?= base_url() . $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) ?>" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><i class="fas fa-refresh"></i> Refresh list</a>
              </div>
		           <div class="card-body">
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Names</th>
                              <th>Phone</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                $o = 1;
                                 foreach ($members as $member) { ?>
                               <tr id="tr-id-t-<?= $member->phone . $o ?>">
                                  <td><?= $o ?></td>
                                  <td><?= $member->names ?></td>
                                  <td><?= $member->phone ?></td>
                                  <td>
                                    <a href="#" onclick="removefromgroup('<?= $member->group_id ?>','<?= $member->phone ?>','tr-id-t-<?= $member->phone . $o  ?>')" class="text-danger"><i class="fas fa-times-circle"></i> Remove</a>
                                  </td>
                               </tr>
                              <?php $o++;} ?>

                           </tbody>
                        <tfoot>
                         <tr>
                              <th>#</th>
                              <th>Names</th>
                              <th>Phone</th>
                              <th>Action</th>
                          </tr>
                        </tfoot>
                    </table>
              

                     
                    </div>
                    <div class="col-md-1">
                    </div>

              <!-- /.row -->

                </div>
               </div>
	     </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <div class="modal fade" id="modal-new-members">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
         
          <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         
          <div class="modal-body">
               <form method="post" action="<?= base_url() ?>admin/uploadListFile" class="form" style="width: 100%;" enctype="multipart/form-data" id="file-upload-form">
                  <div class="row">
                     <div class="col-md-8">
                        <input type="file" name="file_" class="form-control">
                        <input type="hidden" name="group_id" value="<?= $group[0]->id ?>">
                     </div>
                     <div class="col-md-4">
                        <button class="btn btn-primary btn-block">Upload list</button>
                     </div>
                  </div>
              </form>
              <hr>


              <!-- <form class="form" method="post" action=""> -->
                   <div class="row">
                     <div class="col-md-12">


                        <table class="table table-striped" style="max-height: 20vh;overflow-y: scroll;">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Names</th>
                              <th>Phone</th>
                              <th style="width: 40px">Action</th>
                            </tr>
                          </thead>
                          <tbody id="table-body">

                          </tbody>
                        </table>
                  

                  <input type="hidden" name="group_id" value="<?= $group[0]->id ?>">
                  <input type="hidden" name="list" id="list-input" value="">
                  <hr>
                  
                </div>
              </div>
              <!-- </form>  -->


          </div>
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
   

    $(document).ready(function(){
  
   $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
        $('#file-upload-form').on('submit', function(e){
            e.preventDefault();

            var d = new FormData($('#file-upload-form')[0])
           $.ajax({
              url: '<?= base_url() ?>admin/uploadListFile',
              type: 'post',
              data: d,
              processData: false,
              contentType: false,
              success:function(data){
                response = JSON.parse(data);
                // console.log(data);
                $('#list-input').val(data);   
                $('#table-body').html(response.table);          
              },
              error: function(data){
                  console.log(data);
              }
           });

        });

    });

    function removefromgroup(group_id, phone, tr_id){
       $.ajax({
              url: '<?= base_url() ?>admin/removefromgroup',
              type: 'post',
              data: {
                group_id:group_id,
                phone:phone
              },
              success:function(data){
               console.log(data);
                response = JSON.parse(data);
               
                if(response.status == 'yes'){
                    $('#' + tr_id).remove();
                }         
              },
              error: function(data){
                  console.log(data);
              }
           });
    }
</script>