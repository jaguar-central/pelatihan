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
<!-- <button id="mencoba_socket" class="btn btn-info">mencoba socket</button> -->

    <div class="welcome">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12 card bg-info">
                <div class="content card-body text-center text-white">
                <h2 class="text-white">Welcome to Dashboard</h2>
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
            <div class="box bg-warning">
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


    <ul class="nav nav-tabs px-4">
    <?php if (COUNT($top_ten_sub_sektor_mekaar)>0){ ?>
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#kehadiran_mekaar">Sektor Usaha Mekaar</a>
			</li>
    <?php } ?>
    <?php if (COUNT($top_ten_sub_sektor_ulamm)>0){ ?>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kehadiran_ulamm">Sektor Usaha Ulamm</a>
			</li>
    <?php } ?>
		</ul>



<!-- Tab panes -->
<div class="tab-content px-4">
				<div id="kehadiran_mekaar" class="tab-pane active">
						<div class = "table-style" style = "padding : 25px">
							<div class="form-group row">
        <?php if (COUNT($top_ten_sub_sektor_mekaar)>0){ ?>
        <?php $branch='';$x=0; ?>
            <section class='statis text-center text-white'>
              <div class="container-fluid">
                <div class="row">
                  <?php foreach($top_ten_sub_sektor_mekaar as $data1){ ?>		      
                  <?php 
                  if ($branch==''){
                    $branch=$data1['branch'];
                  }else if ($data1['branch']==$branch){        
                    continue;              
                  }else if ($data1['branch']!=$branch){
                    $branch=$data1['branch'];                  
                  }           
                  
                  $class = array(
                  'box bg-primary','box bg-danger','box bg-info','box bg-success','box bg-warning'
                  );	

                  ?>       
                  <div class="col-md-4" >
                    <div class="<?php echo $class[rand(0,4)];$x++; ?>" data-toggle="collapse" data-target="#<?php echo 'sektor_usaha'.$x; ?>" style="cursor: pointer;">  
                    <i class="fas fa-address-book"></i>
                      <h3 class="text-white"><?php echo $data1['DESKRIPSI']; ?></h3>      
                      <div id="<?php echo 'sektor_usaha'.$x; ?>" class="collapse">
                      <?php foreach($top_ten_sub_sektor_mekaar as $data2){ ?>
                        <?php if ($data2['branch']==$data1['branch']){ ?>	            
                        <p class="lead"><?php echo $data2['SUB_SEKTOR'].' '.$data2['JML']; ?></p>            
                        <?php } ?>  
                      <?php } ?>  
                      </div>
                    </div>
                  </div> 
                  <?php } ?>  
                </div>
              </div>
            </section>

        <?php } ?>
        </div></div></div>


<div id="kehadiran_ulamm" class="tab-pane fade">
	<div class = "table-style" style = "padding : 25px">
  <div class="form-group row">
  <?php if (COUNT($top_ten_sub_sektor_ulamm)>0){ ?>
      <?php $KodeUnit='';$y=0; ?>
      <section class='statis text-center text-white'>
        <div class="container-fluid">
          <div class="row">
            <?php foreach($top_ten_sub_sektor_ulamm as $data_ulamm1){ ?>		      
            <?php 
            if ($KodeUnit==''){
              $KodeUnit=$data_ulamm1['KodeUnit'];
            }else if ($data_ulamm1['KodeUnit']==$KodeUnit){        
              continue;              
            }else if ($data_ulamm1['KodeUnit']!=$KodeUnit){
              $KodeUnit=$data_ulamm1['KodeUnit'];                  
            }           
            
            $class = array(
              'box bg-primary','box bg-danger','box bg-info','box bg-success','box bg-warning'
            );	

            ?>       
            <div class="col-md-4" >
              <div class="<?php echo $class[rand(0,4)];$y++; ?>" data-toggle="collapse" data-target="#<?php echo 'sektor_usaha_ulamm'.$y; ?>" style="cursor: pointer;">  
              <i class="fas fa-address-book"></i>
                <h3 class="text-white"><?php echo $data_ulamm1['DESKRIPSI']; ?></h3>      
                <div id="<?php echo 'sektor_usaha_ulamm'.$y; ?>" class="collapse">
                <?php foreach($top_ten_sub_sektor_ulamm as $data_ulamm2){ ?>
                  <?php if ($data_ulamm1['KodeUnit']==$data_ulamm2['KodeUnit']){ ?>	            
                  <p class="lead"><?php echo $data_ulamm2['Deskripsi_Bidang_Usaha'].' '.$data_ulamm2['JML']; ?></p>            
                  <?php } ?>  
                <?php } ?>  
                </div>
              </div>
              </div> 
              <?php } ?>  
          </div>
        </div>
      </section>

    <?php } ?>
  </div>
</div>
</div>
</div>







<!-- END MAIN CONTENT-->