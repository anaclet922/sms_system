<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

      <?php if($this->session->flashdata('alert') == 'success'){ ?>
      toastr.success('<?= $this->session->flashdata('msg') . ' ' . validation_errors()  ?>')
        <?php } else if($this->session->flashdata('alert') == 'danger'){ ?>
        toastr.error('<?= $this->session->flashdata('msg') . ' ' . validation_errors() ?>')
    <?php } ?>

    });

    // document.addEventListener('contextmenu', event => event.preventDefault());
</script>



</body>
</html>
