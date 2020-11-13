<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?php echo base_url() ?>assets/images/logo-pnm.png" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
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
            <header class="header-desktop">
            <!-- <i class="fas fa-angle-double-left"></i> -->
                <div class="section__content section__content--p30">
                    <span>Sistem Informasi Manajemen Pelatihan</span>
                </div>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap float-right">
                            <div class="header-button">
                                <div class="noti-wrap">                             
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
										<?php if (isset($notification)){ ?>
											<span class="quantity" ><?php echo $notification_count; ?></span>
										<?php }else{ ?>
											<span class="quantity" style="background:black;" ><?php echo $notification_count; ?></span>
										<?php } ?>
                                        <div class="notifi-dropdown js-dropdown">
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
                                        <div class="image">
                                            <img src="<?php echo $this->session->userdata('sess_user_foto'); ?>" alt="PNM" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $this->session->userdata('sess_user_nama'); ?> </a>                                            
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