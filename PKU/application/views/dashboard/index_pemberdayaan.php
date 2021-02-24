<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("layout/header"); ?>
</head>

<body class="animsition" style="background-color:#d9e8ff;">
    <!-- MAIN CONTENT-->
    <div>
        <div class="section__content section__content--p20">
            <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="overview-wrap" style="margin-top: 20px;">                            
                            <div class="title-2 bg-white text-center">                                
                                <h2 class="title-2 bg-info text-white">
                                <img style="float:left"  src="<?= base_url() ?>assets/images/logo-pnm.png" width="65" />                                 
                                INDEX PEMBERDAYAAN
                                <img style="float:right" src="<?= base_url() ?>assets/images/BUMN2020.png" width="100" /> 
                                </h2>
                            </div>
                        </div>
                    </div>
                <!-- MAIN CONTENT-->
                <div style="padding-top:10px">
                    <div class="section__content section__content--p0">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="au-card m-b-10">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40 bg-danger text-center text-white">Mekaar</h3>
                                            <canvas id="index-pemberdayaan-mekaar"></canvas>
                                        </div>
                                    </div>
                                </div>                             

                                <div class="col-lg-6">
                                    <div class="au-card m-b-10">
                                        <div class="au-card-inner">
                                            <h4 class="title-2 m-b-40 bg-success text-center text-white">Ulamm</h4>
                                            <canvas id="index-pemberdayaan-ulamm"></canvas>
                                        </div>
                                    </div>
                                </div>      

                                <div class="col-lg-6">
                                    <div class="au-card m-b-10">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40 bg-success text-center text-white">Cabang Ulamm Top 10 </h3>
                                            <canvas id="index-cabang-ulamm"></canvas>
                                        </div>
                                    </div>
                                </div>                                
                                
                                <div class="col-lg-6">
                                    <div class="au-card m-b-10">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40 bg-danger text-center text-white">Cabang Mekaar Top 10 </h3>
                                            <canvas id="index-cabang-mekaar"></canvas>
                                        </div>
                                    </div>
                                </div>   


                                <div class="col-lg-12">
                                    <div class="au-card m-b-10">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40 bg-info text-center text-white">PNM</h3>
                                            <canvas id="index-pemberdayaan-pnm"></canvas>
                                        </div>
                                    </div>
                                </div>                                                          


 
                                <!-- <div class="col-lg-6">
                                    <div class="au-card m-b-30">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40">Bar chart</h3>
                                            <canvas id="barChart"></canvas>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-6">
                                    <div class="au-card m-b-30">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40">Rader chart</h3>
                                            <canvas id="radarChart"></canvas>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-6">
                                    <div class="au-card m-b-30">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40">Line Chart</h3>
                                            <canvas id="lineChart"></canvas>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-6">
                                    <div class="au-card m-b-30">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40">Doughut Chart</h3>
                                            <canvas id="doughutChart"></canvas>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <div class="col-lg-6">
                                    <div class="au-card m-b-30">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40">Polar Chart</h3>
                                            <canvas id="polarChart"></canvas>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-6">
                                    <div class="au-card m-b-30">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 m-b-40">Single Bar Chart</h3>
                                            <canvas id="singelBarChart"></canvas>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#mikro_ulamm">Mikro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#ultra_mikro_mekaar">Ultra Mikro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#top_mikro_ulamm">TOP 10 Mikro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#top_ultra_mikro_mekaar">TOP 10 Ultra Mikro</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#bottom_mikro_ulamm">BOTTOM 10 Mikro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#bottom_ultra_mikro_mekaar">BOTTOM 10 Ultra Mikro</a>
                    </li>                    
                </ul>
                <div class="tab-content">
                    <div id="mikro_ulamm" class="tab-pane active">
                        <div class="table-style" style="padding : 25px">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Index Pemberdayaan Ulamm</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_ulamm" class="table ">
                                                            <thead class=" text-primary col-md-12">
                                                                <tr>
                                                                    <th rowspan="2" colspan="1">ID Nasabah</th>
                                                                    <th rowspan="2" colspan="1">Nasabah</th>
                                                                    <th class="text-center" rowspan="1" colspan="2">Penilaian Intrinsik</th>
                                                                    <th class="text-center" rowspan="1" colspan="5">Penilaian Ekstrinsik</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Grading System</th>
                                                                    <th>Aspek Implementasi</th>
                                                                    <th>Jumlah Plafond</th>
                                                                    <th>Diversifikasi Produk</th>
                                                                    <th>Pendapatan Perbulan</th>
                                                                    <th>Tenaga Kerja</th>
                                                                    <th>Perijinan Usaha</th>
                                                                    <th>Total Nilai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        <div class="col-md-12"></div>
                                                        <label>Total Nilai </label>
                                                        <div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control money" data-a-sign="Rp. " value="<?php echo $TOTAL_ULAMM; ?>" readonly="" required>
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
                        <div class="table-style" style="padding : 25px">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Index Pemberdayaan Mekaar</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_mekaar" class="table">
                                                            <thead class=" text-primary col-md-12">
                                                                <tr>
                                                                    <th rowspan="2" colspan="1">ID Kelompok</th>
                                                                    <th rowspan="2" colspan="1">Kelompok</th>
                                                                    <th class="text-center" rowspan="1" colspan="2">Penilaian Intrinsik</th>
                                                                    <th class="text-center" rowspan="1" colspan="5">Penilaian Ekstrinsik</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Grading System</th>
                                                                    <th>Aspek Implementasi</th>
                                                                    <th>Jumlah Plafond</th>
                                                                    <th>Diversifikasi Produk</th>
                                                                    <th>Pendapatan Perhari</th>
                                                                    <th>Perijinan Usaha</th>
                                                                    <th>Kepemilikan Aset</th>
                                                                    <th>Total Nilai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        <div class="col-md-12"></div>
                                                        <label>Total Nilai </label>
                                                        <div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control money" data-a-sign="Rp. " value="<?php echo $TOTAL_MEKAAR; ?>" readonly="" required>
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
                    <div id="top_mikro_ulamm" class="tab-pane">
                        <div class="table-style" style="padding : 25px">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Top 10 Per Provinsi Index Pemberdayaan</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_mekaar" class="table">
                                                            <thead class=" text-primary col-md-12">
                                                                <tr>
                                                                    <th>Provinsi</th>
                                                                    <th>Kabupaten</th>
                                                                    <th>Nilai Index Keberhasilan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            foreach ($TOP_ULAMM as $data_ulamm){
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
                    <div id="top_ultra_mikro_mekaar" class="tab-pane">
                        <div class="table-style" style="padding : 25px">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Top 10 Per Provinsi Index Pemberdayaan</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_mekaar" class="table">
                                                            <thead class=" text-primary col-md-12">
                                                                <tr>
                                                                    <th>Provinsi</th>
                                                                    <th>Kabupaten</th>
                                                                    <th>Nilai Index Keberhasilan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            foreach ($TOP_MEKAAR as $data_mekaar){
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

                    <div id="bottom_mikro_ulamm" class="tab-pane">
                        <div class="table-style" style="padding : 25px">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Bottom 10 Per Provinsi Index Pemberdayaan</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_mekaar" class="table">
                                                            <thead class=" text-primary col-md-12">
                                                                <tr>
                                                                    <th>Provinsi</th>
                                                                    <th>Kabupaten</th>
                                                                    <th>Nilai Index Keberhasilan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            foreach ($BOTTOM_ULAMM as $data_ulamm){
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
                    <div id="bottom_ultra_mikro_mekaar" class="tab-pane">
                        <div class="table-style" style="padding : 25px">
                            <div class="form-group row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="title-2 bg-info card-title text-center text-white">Bottom 10 Per Provinsi Index Pemberdayaan</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table">
                                                        <table id="datatable_pemberdayaan_mekaar" class="table">
                                                            <thead class=" text-primary col-md-12">
                                                                <tr>
                                                                    <th>Provinsi</th>
                                                                    <th>Kabupaten</th>
                                                                    <th>Nilai Index Keberhasilan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            foreach ($BOTTOM_MEKAAR as $data_mekaar){
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

                </div>
            </div>
            <!-- END MAIN CONTENT-->



            <?php $this->load->view("layout/footer"); ?>
            <?php $this->load->view($script); ?>

</body>

</html>