<style>
/* Start statis */

.statis {
  color: #EEE;
  margin-top: 15px;
}
.statis .box {
  position: relative;
  padding: 15px;
  overflow: hidden;
  border-radius: 3px;
  margin-bottom: 25px;
}
.statis .box h3:after {
  content: "";
  height: 2px;
  width: 70%;
  margin: auto;
  background-color: rgba(255, 255, 255, 0.12);
  display: block;
  margin-top: 10px;
}
.statis .box i {
  position: absolute;
  height: 70px;
  width: 70px;
  font-size: 22px;
  padding: 15px;
  top: -25px;
  left: -25px;
  background-color: rgba(255, 255, 255, 0.15);
  line-height: 60px;
  text-align: right;
  border-radius: 50%;
}

</style>

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="welcome">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="content">
                <h2>Welcome to Dashboard</h2>
                <p>Data Realisasi Pelatihan dan Kehadiran Nasabah</p>                
                </div>
            </div>
            </div>
        </div>
    </div>

    <section class='statis text-center text-white'>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="box bg-primary">
            <i class="fas fa-edit"></i>
              <h3 class="text-white"><?php echo $pelatihan;?></h3>
              <p class="lead">Pelatihan</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-danger">
            <i class="far fa-user"></i>
            <h3 class="text-white"><?php echo $nasabah_ulamm;?></h3>
              <p class="lead">Nasabah Ulamm</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-info">
            <i class="far fa-user"></i>
            <h3 class="text-white"><?php echo $nasabah_mekaar;?></h3>
              <p class="lead">Nasabah Mekaar</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-success">
            <i class="fas fa-address-card"></i>
            <h3 class="text-white"><?php echo $non_nasabah;?></h3>
              <p class="lead">Non Nasabah</p>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- <div style="padding:1%">
    <iframe style="width: 100%;height: 600px;"  src="http://192.168.10.219/QvAJAXZfc/opendoc.htm?document=dashboard%20pku.qvw&host=QVS%40hqtraining2" title="PDF in an i-Frame" frameborder="1" scrolling="auto"></iframe>
</div>     -->


                            <!-- <div class="col-sm-12 col-lg-12">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">                                        
                                        <div class="overview-chart">
                                            <canvas id="dashboard_pelatihan"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            

</div>
<p id="posisition_device"></p>
<!-- END MAIN CONTENT-->