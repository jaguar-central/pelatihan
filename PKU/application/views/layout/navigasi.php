<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar bg-info text-white">
        <div class="container-fluid">
            <div class="header-mobile-inner">


                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>

                <?php if (isset($notification)) { ?>
                    <span class="badge badge-danger"><?php echo $notification_count; ?></span>
                <?php } ?>

                <div class="section__content section__content--p30">
                    <span>Sistem Informasi Manajemen Pelatihan Usaha</span>
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


                <?php foreach ($menu as $abu) : ?>
                    <?php if ($abu->NAMA == $content) { ?>
                        <li class="active has-sub">
                        <?php } else { ?>
                        <li class="has-sub">
                        <?php } ?>
                        <?php if ($abu->CHILD == '1') { ?>
                            <a class="js-arrow" href="#">
                            <?php } else { ?>
                                <a class="js-arrow" href="<?php echo base_url($abu->LINK); ?> ">
                                <?php } ?>
                                <i class="<?php echo $abu->CLASS; ?>"></i><?php echo $abu->NAMA; ?>
                                </a>
                                <?php
                                if ($abu->CHILD == '1') {
                                    $submenu = $this->Menu_model->select_ms_sub_menu_by_id($abu->ID);
                                    //var_dump($submenu);
                                ?>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" <?php if ($abu->NAMA == $content) {
                                                                                                        echo 'style="display:block;';
                                                                                                    } ?>">
                                        <?php foreach ($submenu as $arl) : ?>
                                            <li>
                                                <a href="<?php echo base_url($arl->LINK); ?> "><?php echo $arl->NAMA; ?></a>
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
                            <img src="<?= base_url() ?>assets/images/logo-pnm.png" alt="PNM" width="10%" /> <?php echo $this->session->userdata('sess_user_nama'); ?>
                            <!-- <img src="<?php //echo $this->session->userdata('sess_user_foto'); ?>" alt="PNM" width="10%" /> <?php //echo $this->session->userdata('sess_user_nama'); ?> -->
                        </a>

                        <?php if (isset($notification)) { ?>
                            <?php foreach ($notification as $data_notif) { ?>
                                <div class="notifi__item">
                                    <div class="<?php echo $data_notif->CLASS_APPROVAL; ?>">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <a href="<?php echo base_url($data_notif->URL_APPROVAL) ?>">
                                            <p><?php echo $data_notif->APPROVAL; ?></p>
                                            <span class="date"><?php echo $data_notif->TANGGAL; ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>

                    </li>

                    <li class="active has-sub">
                        <a class="js-arrow" href="<?php echo base_url() . 'logout'; ?>">
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
        <div class="bg-info text-center logo">
            <a href="#">
                <img src="<?php echo base_url() ?>assets/images/logo-pnm.png" style="max-width:70%;" />
            </a>
        </div>
        <div class="Menu_model">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <?php foreach ($menu as $abu) : ?>
                        <?php if ($abu->NAMA == $content) { ?>
                            <li class="active has-sub">
                            <?php } else { ?>
                            <li class="has-sub">
                            <?php } ?>
                            <?php if ($abu->CHILD == '1') { ?>
                                <a class="js-arrow" href="#">
                                <?php } else { ?>
                                    <a class="js-arrow" href="<?php echo base_url($abu->LINK); ?> ">
                                    <?php } ?>
                                    <i class="<?php echo $abu->CLASS; ?>"></i><?php echo $abu->NAMA; ?>
                                    </a>
                                    <?php
                                    if ($abu->CHILD == '1') {
                                        $submenu = $this->Menu_model->select_ms_sub_menu_by_id($abu->ID);
                                        //var_dump($submenu);
                                    ?>
                                        <ul class="list-unstyled navbar__sub-list js-sub-list" <?php if ($abu->NAMA == $content) {
                                                                                                    echo 'style="display:block;';
                                                                                                } ?>">
                                            <?php foreach ($submenu as $arl) : ?>
                                                <li>
                                                    <a href="<?php echo base_url($arl->LINK); ?> "><?php echo $arl->NAMA; ?></a>
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
        <header class="header-desktop d-none d-lg-block bg-info text-white">
            <div class="section__content section__content--p30 ">
                <span>Sistem Informasi Manajemen Pelatihan Usaha</span>
            </div>
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap float-right">
                        <div class="header-button">
                            <div class="noti-wrap ">
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>

                                    <div id="notifikasi_socket_count"></div>


                                    <div id="notifikasi_socket_messages"></div>
                                </div>
                            </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div style="float: left;font-size: 30px;" >
                                            <!-- <img src="<?php //echo $this->session->userdata('sess_user_foto'); ?>" alt="PNM" /> -->
                                            <i class="zmdi zmdi-account"></i>
                                        </div>
                                        <div class="content ">
                                            <a class="js-acc-btn text-white" href="#"><?php echo $this->session->userdata('sess_user_nama'); ?> </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">

                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $this->session->userdata('sess_user_nama') . '</br> ' . ucfirst(strtolower($this->session->userdata('sess_user_group'))) . ' </br> ' . $this->session->userdata('sess_user_lokasi') . ' ' . $this->session->userdata('sess_user_cabang'); ?></a>
                                                    </h5>
          
                                                </div>
                                            </div>          
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url() . 'logout'; ?>">
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