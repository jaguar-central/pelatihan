<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("layout/header"); ?>
</head>
<style>
    .dataTables_scroll {
        width: 100% !important;
    }
</style>

<body class="animsition" style="background-color:#d9e8ff;">
    <!-- MAIN CONTENT-->
    <div>
        <div class="section__content section__content--p20">
            <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="overview-wrap m-t-5" >                            
                            <div class="title-2 bg-white text-center p-2" style="display:flex;">
								<img class="col-lg-1 " style="height:35px;margin:auto;" src="<?= base_url() ?>assets/images/logo-pnm.png" />
								<h2 class="title-2 p-2 bg-info text-white col-lg-10" >INDEX PEMBERDAYAAN</h2>
								<img class="col-lg-1 d-none d-md-block d-lg-block" style="height:30px;margin:auto;" src="<?= base_url() ?>assets/images/BUMN2020.png"  /> 
                            </div>
                        </div>
                    </div>
                <!-- MAIN CONTENT-->
                <div style="padding-top:10px">
                    <div class="section__content section__content--p0">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="au-card m-b-10 p-2">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 p-2 m-b-10 bg-info text-center text-white">Ulamm</h3>
                                            <div id="index-pemberdayaan-ulamm-bar" style="height:200px" ></div>
                                        </div>
                                    </div>
                                </div>   

                                <div class="col-lg-6">
                                    <div class="au-card m-b-10 p-2">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 p-2 m-b-10 bg-info text-center text-white">Mekaar</h3>
                                            <div id="index-pemberdayaan-mekaar-bar" style="height:200px" ></div>
                                        </div>
                                    </div>
                                </div>                                   

                                <div class="col-lg-6">
                                    <div class="au-card m-b-10 p-2">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 p-2 m-b-10 bg-info text-center text-white">Ulamm Star Model</h3>
                                            <div id="index-pemberdayaan-ulamm-start-model" style="height:300px" ></div>
                                        </div>
                                    </div>
                                </div>              

                                <div class="col-lg-6">
                                    <div class="au-card m-b-10 p-2">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 p-2 m-b-10 bg-info text-center text-white">Mekaar Star Model</h3>
                                            <div id="index-pemberdayaan-mekaar-start-model" style="height:300px" ></div>
                                        </div>
                                    </div>
                                </div>                                              

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#mikro_ulamm">Detail Mikro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#ultra_mikro_mekaar">Detail Ultra Mikro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#provinsi_mikro_ulamm">Detail Per Provinsi Mikro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#provinsi_ultra_mikro_mekaar">Detail Per Provinsi Ultra Mikro</a>
                    </li>                    

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#cabang_mikro_ulamm">Detail Per Cabang Mikro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#cabang_ultra_mikro_mekaar">Detail Per Cabang Ultra Mikro</a>
                    </li>                    

                </ul>
                <div class="tab-content">
                    <div id="mikro_ulamm" class="tab-pane active">
                        <div class="table-style" >
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Index Pemberdayaan Ulamm</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_ulamm" class="table table-bordered" > 
                                                            <thead class="text-primary ">
                                                                <tr>
                                                                    <th rowspan="2" colspan="1">ID Nasabah</th>
                                                                    <th rowspan="2" colspan="1">Nama Nasabah</th>
                                                                    <th class="text-center" rowspan="1" colspan="2">Penilaian Intrinsik</th>
                                                                    <th class="text-center" rowspan="1" colspan="5">Penilaian Ekstrinsik</th>
                                                                    <th class="text-center" rowspan="2" colspan="1">Total Nilai</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Grading System</th>
                                                                    <th>Aspek Implementasi</th>
                                                                    <th>Jumlah Plafond</th>
                                                                    <th>Diversifikasi Produk</th>
                                                                    <th>Pendapatan Perbulan</th>
                                                                    <th>Tenaga Kerja</th>
                                                                    <th>Perijinan Usaha</th>                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_datatable_pemberdayaan_ulamm">
                                                            <?php 
                                                            foreach ($DATA_ULAMM as $DATA_U){
                                                                echo '<tr>';
                                                                echo '<td >'.$DATA_U->ID_NASABAH.'</td>';
                                                                echo '<td >'.$DATA_U->NAMA.'</td>';
                                                                echo '<td >'.$DATA_U->NILAI_GRADING.'</td>';
                                                                echo '<td >'.$DATA_U->ASPEK_IMPLEMENTASI.'</td>';
                                                                echo '<td >'.$DATA_U->JUMLAH_PLAFOND.'</td>';
                                                                echo '<td >'.$DATA_U->DIVERSIFIKASI_PRODUK.'</td>';
                                                                echo '<td >'.$DATA_U->PENDAPATAN_PERBULAN.'</td>';
                                                                echo '<td >'.$DATA_U->TENAGA_KERJA.'</td>';
                                                                echo '<td >'.$DATA_U->PERIJINAN_USAHA.'</td>';
                                                                echo '<td >'.$DATA_U->TOTAL_NILAI.'</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="col-lg-12"></div>
                                                        <label>Total Nasabah </label>
                                                        <div>
                                                            <div class="col-lg-12">
                                                                <input type="text" class="form-control money" data-a-sign="Rp. " value="<?php echo number_format($TOTAL_ULAMM->TOTAL_NASABAH); ?>" readonly="" required>
                                                            </div>
                                                        </div>                                                        
                                                        <label>Total Nilai </label>
                                                        <div>
                                                            <div class="col-lg-12">
                                                                <input type="text" class="form-control money" data-a-sign="Rp. " value="<?php echo $TOTAL_ULAMM->TOTAL; ?>" readonly="" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ultra_mikro_mekaar" class="tab-pane">
                        <div class="table-style">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Index Pemberdayaan Mekaar</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_mekaar" class="table table-bordered table-responsive" width="100%" >
                                                            <thead class=" text-primary ">
                                                                <tr>
                                                                    <th rowspan="2" colspan="1">ID Nasabah</th>
                                                                    <th rowspan="2" colspan="1">Nama Nasabah</th>
                                                                    <th class="text-center" rowspan="1" colspan="1">Penilaian Intrinsik</th>
                                                                    <th class="text-center" rowspan="1" colspan="8">Penilaian Ekstrinsik</th>
                                                                    <th class="text-center" rowspan="2" colspan="1">Total Nilai</th>                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <th>Grading System</th>
                                                                    <th>Aspek Menabung</th>
                                                                    <th>Pengelolaan Keuangan</th>
                                                                    <th>Pendapatan Perhari</th>
                                                                    <th>Strategi Penjualan</th>
                                                                    <th>Kepemilikan Aset</th>
                                                                    <th>Perijinan Usaha</th>
                                                                    <th>Diversifikasi Produk</th>
                                                                    <th>Serapan Tenaga Kerja</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_datatable_pemberdayaan_mekaar">
                                                            <?php 
                                                            foreach ($DATA_MEKAAR as $DATA_M){
                                                                echo '<tr>';
                                                                echo '<td>'.$DATA_M->ID_NASABAH.'</td>';
                                                                echo '<td>'.$DATA_M->NAMA.'</td>';
                                                                echo '<td>'.$DATA_M->NILAI_GRADING.'</td>';
                                                                echo '<td>'.$DATA_M->MENABUNG.'</td>';
                                                                echo '<td>'.$DATA_M->PENGELOLAAN_KEUANGAN.'</td>';
                                                                echo '<td>'.$DATA_M->OMSET.'</td>';
                                                                echo '<td>'.$DATA_M->STRATEGI_PENJUALAN.'</td>';
                                                                echo '<td>'.$DATA_M->ASSET.'</td>';
                                                                echo '<td>'.$DATA_M->PERIJINAN_USAHA.'</td>';
                                                                echo '<td>'.$DATA_M->DIVERSIFIKASI.'</td>';
                                                                echo '<td>'.$DATA_M->TENAGA_KERJA.'</td>';
                                                                echo '<td>'.$DATA_M->TOTAL_NILAI.'</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>                                                            
                                                            </tbody>
                                                        </table>
                                                        <div class="col-lg-12"></div>
                                                        <label>Total Nasabah </label>
                                                        <div>
                                                            <div class="col-lg-12">
                                                                <input type="text" class="form-control money" data-a-sign="Rp. " value="<?php echo number_format($TOTAL_MEKAAR->TOTAL_NASABAH); ?>" readonly="" required>
                                                            </div>
                                                        </div>                                                           
                                                        <label>Total Nilai </label>
                                                        <div>
                                                            <div class="col-lg-12">
                                                                <input type="text" class="form-control money" data-a-sign="Rp. " value="<?php echo $TOTAL_MEKAAR->TOTAL; ?>" readonly="" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="provinsi_mikro_ulamm" class="tab-pane">
                        <div class="table-style">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Per Provinsi Index Pemberdayaan</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_provinsi_ulamm" class="table" >
                                                            <thead class=" text-primary col-lg-12">
                                                                <tr>
                                                                    <th>Provinsi</th>
                                                                    <th>Kabupaten</th>
                                                                    <th>Nilai Index Keberhasilan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_datatable_pemberdayaan_provinsi_ulamm">
                                                            <?php 
                                                            foreach ($PROVINSI_ULAMM as $data_ulamm){
                                                                echo '<tr>';
                                                                echo '<td>'.$data_ulamm->PROVINSI.'</td>';
                                                                echo '<td>'.$data_ulamm->KABUPATEN.'</td>';
                                                                echo '<td>'.$data_ulamm->TOTAL.'</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="provinsi_ultra_mikro_mekaar" class="tab-pane">
                        <div class="table-style">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Per Provinsi Index Pemberdayaan</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_provinsi_mekaar" class="table" >
                                                            <thead class=" text-primary col-lg-12">
                                                                <tr>
                                                                    <th>Provinsi</th>
                                                                    <th>Kabupaten</th>
                                                                    <th>Nilai Index Keberhasilan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_datatable_pemberdayaan_provinsi_mekaar">
                                                            <?php 
                                                            foreach ($PROVINSI_MEKAAR as $data_mekaar){
                                                                echo '<tr>';
                                                                echo '<td>'.$data_mekaar->PROVINSI.'</td>';
                                                                echo '<td>'.$data_mekaar->KABUPATEN.'</td>';
                                                                echo '<td>'.$data_mekaar->TOTAL.'</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="cabang_mikro_ulamm" class="tab-pane">
                        <div class="table-style">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Per Cabang Index Pemberdayaan</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_cabang_ulamm" class="table">
                                                            <thead class=" text-primary col-lg-12">
                                                                <tr>
                                                                    <th>Cabang</th>
                                                                    <th>Nilai Index Keberdayaan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_datatable_pemberdayaan_cabang_ulamm" >
                                                            <?php 
                                                            foreach ($CABANG_ULAMM as $data_ulamm){
                                                                echo '<tr>';
                                                                echo '<td class="col-lg-6">'.$data_ulamm->CABANG.'</td>';
                                                                echo '<td class="col-lg-6">'.$data_ulamm->TOTAL.'</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div id="cabang_ultra_mikro_mekaar" class="tab-pane">
                        <div class="table-style">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Per Cabang Index Pemberdayaan</h4>
                                                </div>
                                                <div class="card-body table-responsive">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_cabang_mekaar" class="table">
                                                            <thead class=" text-primary" id="table_fixed">
                                                                <tr>
                                                                    <th>Cabang</th>
                                                                    <th>Nilai Index Keberdayaan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody_datatable_pemberdayaan_cabang_mekaar">
                                                            <?php 
                                                            foreach ($CABANG_MEKAAR as $data_mekaar){
                                                                echo '<tr>';
                                                                echo '<td>'.$data_mekaar->CABANG.'</td>';
                                                                echo '<td>'.$data_mekaar->TOTAL.'</td>';
                                                                echo '</tr>';
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                     

                </div>
            </div>
            <!-- END MAIN CONTENT-->



            <?php $this->load->view("layout/footer"); ?>
            <?php $this->load->view($script); ?>

</body>

</html>