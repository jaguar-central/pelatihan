<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar bg-success text-white">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
  

                        <button class="hamburger hamburger--slider" type="button">                        
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>

                        <?php if (isset($notification)){ ?>
                            <span class="badge badge-danger"><?php echo $notification_count; ?></span>
                        <?php } ?>

                        <div class="section__content section__content--p30">
                            <span>Sistem Informasi Manajemen Pelatihan</span>
                         </div>
                         
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li class="active has-sub">     
                        <a class="js-arrow bg-success" href="#"></a>
                        </li>


                        <?php foreach ($menu as $abu): ?>
						<?php if ($abu->NAMA==$content){ ?>
                        <li class="active has-sub">        
						<?php }else{ ?>		
						<li class="has-sub">        
						<?php } ?>
								<?php if ($abu->CHILD == '1'){ ?>
								<a class="js-arrow" href="#">                                
								<?php }else{ ?>
								<a class="js-arrow" href="<?php echo base_url($abu->LINK); ?> ">
								<?php } ?>
                                    <i class="<?php echo $abu->CLASS; ?>"></i><?php echo $abu->NAMA;?>
                                </a>
                                <?php
                                if ($abu->CHILD == '1'){ 
                                    $submenu = $this->Menu_model->select_ms_sub_menu_by_id($abu->ID);
                                    //var_dump($submenu);
                                ?>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" <?php if ($abu->NAMA==$content){ echo 'style="display:block;'; }?>">
                                <?php foreach ($submenu as $arl): ?>
                                <li>
                                    <a href="<?php echo base_url($arl->LINK); ?> "><?php echo $arl->NAMA;?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php } 
                            ?> 
                        </li>
                        <?php endforeach; ?>    


                        <li class="active has-sub">     
                        <a class="js-arrow bg-success" href="#"></a>
                        </li>
                                        
                        <li class="active has-sub">        
                        <a class="js-arrow" href="#">
                        <img src="<?php echo $this->session->userdata('sess_user_foto'); ?>" alt="PNM" width="10%" /> <?php echo $this->session->userdata('sess_user_nama'); ?>  
                        </a>

                            <?php if (isset($notification)){ ?>
                            <?php foreach($notification as $data_notif){ ?>
                            <div class="notifi__item">
                                <div class="<?php echo $data_notif->CLASS_APPROVAL; ?>">
                                    <i class="zmdi zmdi-file-text"></i>
                                </div>
                                <div class="content">
                                    <a href="<?php echo base_url($data_notif->URL_APPROVAL) ?>" ><p><?php echo $data_notif->APPROVAL; ?></p>
                                    <span class="date"><?php echo $data_notif->TANGGAL; ?></span>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
   
                        </li>

                        <li class="active has-sub">        
                        <a class="js-arrow" href="<?php echo base_url().'logout'; ?>">
                        <i class="fas fa-power-off"></i>Logout </a>
                        </li>

                        <li class="active has-sub">     
                        <a class="js-arrow bg-success" href="#"></a>
                        </li>

                        </ul>

                    </ul>
                </div>
            </nav>
</header>
        <!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo base_url() ?>assets/images/logo-pnm.png" style="max-width:70%;" />
                </a>
            </div>
            <div class="Menu_model">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php foreach ($menu as $abu): ?>
						<?php if ($abu->NAMA==$content){ ?>
                        <li class="active has-sub">        
						<?php }else{ ?>		
						<li class="has-sub">        
						<?php } ?>
								<?php if ($abu->CHILD == '1'){ ?>
								<a class="js-arrow" href="#">                                
								<?php }else{ ?>
								<a class="js-arrow" href="<?php echo base_url($abu->LINK); ?> ">
								<?php } ?>
                                    <i class="<?php echo $abu->CLASS; ?>"></i><?php echo $abu->NAMA;?>
                                </a>
                                <?php
                                if ($abu->CHILD == '1'){ 
                                    $submenu = $this->Menu_model->select_ms_sub_menu_by_id($abu->ID);
                                    //var_dump($submenu);
                                ?>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" <?php if ($abu->NAMA==$content){ echo 'style="display:block;'; }?>">
                                <?php foreach ($submenu as $arl): ?>
                                <li>
                                    <a href="<?php echo base_url($arl->LINK); ?> "><?php echo $arl->NAMA;?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php } 
                            ?> 
                        </li>
                        <?php endforeach; ?>
                            </ul>
                    </ul>
                </nav>
            </div>
</aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
<div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop d-none d-lg-block bg-success text-white">

            

                <div class="section__content section__content--p30 ">
                    <span>Sistem Informasi Manajemen Pelatihan</span>
                </div>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap float-right">
                            <div class="header-button">
                                <div class="noti-wrap ">                             
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
										<?php if (isset($notification)){ ?>
											<span class="quantity" ><?php echo $notification_count; ?></span>
										<?php }else{ ?>
											<span class="quantity" style="background:black;" ><?php echo $notification_count; ?></span>
										<?php } ?>

                                        
                                        <?php if ($notification_count>=3){ ?>
                                        <div class="notifi-dropdown js-dropdown" style=" height:500px;overflow-y: scroll;">                                            
                                        <?php }else{ ?>
                                        <div class="notifi-dropdown js-dropdown" >                                            
                                        <?php } ?>
                                            <div class="notifi__title">
											<?php if (isset($notification)){ ?>
                                                <p>Kamu memiliki <?php echo $notification_count; ?> Notifikasi</p>
											<?php }else{ ?>
												<p>Tidak ada Notifikasi</p>
											<?php } ?>
                                            </div>
                                            <!--div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div-->
											<?php if (isset($notification)){ ?>
											<?php foreach($notification as $data_notif){ ?>
                                            <div class="notifi__item">
                                                <div class="<?php echo $data_notif->CLASS_APPROVAL; ?>">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <a href="<?php echo base_url($data_notif->URL_APPROVAL) ?>" ><p><?php echo $data_notif->APPROVAL; ?></p>
                                                    <span class="date"><?php echo $data_notif->TANGGAL; ?></span>
													</a>
                                                </div>
                                            </div>
											<?php } ?>
											<?php } ?>
                                            <!--div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div-->
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image ">
                                            <img src="<?php echo $this->session->userdata('sess_user_foto'); ?>" alt="PNM" />
                                        </div>
                                        <div class="content ">
                                            <a class="js-acc-btn text-white" href="#"><?php echo $this->session->userdata('sess_user_nama'); ?> </a>                                            
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo $this->session->userdata('sess_user_foto'); ?>" alt="PNM" />
                                                    </a>
                                                </div>
                                                
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $this->session->userdata('sess_user_nama').'</br> ('.ucfirst(strtolower($this->session->userdata('sess_user_group'))).' - '.$this->session->userdata('sess_user_lokasi').')'; ?></a>													
                                                    </h5>
                                                    <!--span class="email">johndoe@example.com</span-->
                                                </div>
                                            </div>
                                            <!--div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div-->
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url().'logout'; ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
		
            <!-- HEADER DESKTOP-->