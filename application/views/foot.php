<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<!--FOOTER-->
<footer style="">
      <!-- Main content -->
    <section class="content">

      <?php if($this->uri->segment(1) == '' || $this->uri->segment(2) == 'about' || $this->uri->segment(2) == 'contact') { ?>
      <!-- Default box -->
      <div class="card card-solid" style="padding-top: 10px;padding-bottom: 10px;">
        <div class="">  

              <div class="container">
                  <div class="row">
                      <div class="col-md-4 text-center justify-content col-footer" style="font-size: 14px">
                          <img src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" style="opacity: 1;max-height: 60px;">
                          <br>
                          <?= webSettings()['footer_about'] ?>
                          
                      </div>
                      <div class="col-md-4 col-footer"  style="font-size: 14px">
                          <h6 style="font-weight: bold;">ADDRESS & CONTACTS</h6>

                          <?= webSettings()['footer_address'] ?>

                          <!-- <br> -->
                          <h6 style="font-weight: bold;">USEFUL LINKS</h6>
                          <ul class="use-links">
                            <li>
                               <a href="<?= base_url() ?>home/about">About</a>
                            </li>
                             <li>
                               <a href="<?= base_url() ?>home/terms">Terms and Conditions</a>
                            </li>
                             <li>
                               <a href="<?= base_url() ?>home/privacy">Privacy Policy</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>admin">Account</a>
                            </li>
                          </ul>
                          
                      </div>
                      <div class="col-md-4 footer-social justify-content col-footer" style="font-size: 14px">
                          <h6 style="font-weight: bold;">SOCIAL CONNECTION</h6>
                              <table class="justify-content">
                                  <tr>
                                    <?php if(trim(webSettings()['footer_facebook']) != '') { ?>                           
                                    <td class="footer-icon">
                                      <a href="<?= trim(webSettings()['footer_facebook']) ?>">
                                        <i class="fab fa-facebook"></i>
                                      </a>
                                    </td>
                                    <?php } if(trim(webSettings()['footer_twitter']) != ''){ ?>
                                    <td class="footer-icon">
                                      <a href="<?= trim(webSettings()['footer_twitter']) ?>">
                                        <i class="fab fa-twitter"></i>
                                      </a>
                                    </td>
                                    <?php }  if(trim(webSettings()['footer_youtube']) != ''){ ?>
                                    <td class="footer-icon">
                                      <a href="<?= trim(webSettings()['footer_youtube']) ?>">
                                        <i class="fab fa-youtube"></i>
                                      </a>
                                    </td>
                                    <?php }  if(trim(webSettings()['footer_linkedin']) != ''){ ?>
                                    <td class="footer-icon">
                                      <a href="<?= trim(webSettings()['footer_linkedin']) ?>">
                                        <i class="fab fa-linkedin"></i>
                                      </a>
                                    </td>
                                  <?php } ?>
                                   </tr>
                              </table>


                               <form 
                                    class="form-inline justify-content" 
                                    method="post" 
                                    action="<?= base_url() ?>home/subscribe"
                                    style="width: 100%;">
                                    <p class="text-center" style="font-size: 14px;">
                                        Join our subscribers list <b>LIVE STREAM</b> notifications.
                                    </p>
                                    <div class="input-group input-group-sm" style="width: 100%;">
                                        <input class="form-control form-control-navbar" type="email" name="email" placeholder="Enter your e-mail">
                                        <div class="input-group-append">
                                          <button class="btn btn-primary" type="submit">
                                            Submit
                                          </button>
                                        </div>
                                      </div>
                                </form>
                         
                      </div>
                  </div>
              </div> 

          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    <?php } ?>

      <p class="text-center" style="font-size: 14px;">
          &copy; <?= date("Y") . " <b>" . webSettings()['site_name'] ?></b> - All right reserved.
      </p>

    </section>
    <!-- /.content -->
</footer>
<!--FOOTER END-->

 