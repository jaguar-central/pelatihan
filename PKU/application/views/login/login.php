<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/pnm-favicon.png">
<!-- Title Page-->    
<title>Aplikasi Pelatihan - Login</title>
<link href="<?php echo base_url() ?>assets/css/material-dashboard.css" rel="stylesheet" media="all">
<link href="<?php echo base_url() ?>assets/css/font.css" rel="stylesheet" media="all">

<div id="loginModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title">Sistem Manajemen Pelatihan Usaha</h4>                   
                    </div>
                </div>       


            <?php if ($this->session->flashdata('message_success')){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:3%;">
                <?php echo $this->session->flashdata('message_success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
                  
                                              
                <form class="form" method="post" action="<?php base_url() ?>user/process_login">
                    <div class="modal-body"></div>
                    <p class="description text-center">Login</p>
                        <div class="card-body">

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">face</i></div>
                                    </div>
                                    <input type="text" class="form-control" name="username" placeholder="User Name..." required>
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                    </div>
                                    <input type="password" name="password" placeholder="Password..." class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-round btn-success" type="submit" >
                                Login
                        </button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>   
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script> 
<script src="<?php echo base_url() ?>assets/vendor/animsition/animsition.min.js"></script>