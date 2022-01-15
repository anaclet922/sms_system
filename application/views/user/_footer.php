<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url() ?>"><?= webSettings()['site_name'] ?></a>.</strong>
    All rights reserved.
    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- <script src="<?= base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script> -->
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<!-- <script src="<?= base_url() ?>assets/dist/js/pages/dashboard2.js"></script> -->
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>


<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>



<script>
  $(function () {
    // Summernote
    $('.text-description').summernote({
        placeholder: 'Description...',
        height: 220,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']],
          ['view', ['fullscreen', 'codeview']]
        ]
      });

     //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'Y-MM-DD'
    });

      //Date range picker
    $('#voddatepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    });
  })

  
</script>
<script type="text/javascript">

    $(document).ready(function(){

      <?php if($this->session->flashdata('alert') == 'success'){ ?>
      toastr.success('<?= $this->session->flashdata('msg') ?>')
        <?php } else if($this->session->flashdata('alert') == 'danger'){ ?>
        toastr.error('<?= $this->session->flashdata('msg') ?>')
    <?php } ?>

    });

    // document.addEventListener('contextmenu', event => event.preventDefault());
</script>





<input type="hidden" name="last_id" id="last_id" value="<?= isset($last_id) == true ? $last_id : '' ?>">
<script type="text/javascript">
    $(document).ready(function(){

        var last_id =  $('#last_id').val();

        get_new_sms();
        
    });

    function get_new_sms(){
        $.ajax({
            url: "<?php echo base_url(); ?>admin/check_new_sms",
            type: 'post',
            data: {
               last_id:$('#last_id').val()
            },
            success:function(data){
              console.log(data);
              var data = JSON.parse(data);
                if(data.status == 'new'){
                   $('#table-body-sms').prepend(data.rows);
                   $('#last_id').val(data.last_id);
                   $('.badge-sms-new').html(data.count);
                   $('.badge-sms-new').show();
                }
                 timing(last_id);
            },
            error: function(data){
                console.log(data);
            }
         });
    }
    function timing(){
      setTimeout(function(){get_new_sms()}, 5000);
    }
</script>

</body>
</html>
