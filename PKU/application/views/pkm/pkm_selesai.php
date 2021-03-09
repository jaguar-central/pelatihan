<link href="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
<style>
.bg-info{
	background-color : #0D67B2 !important;
}
</style>

    <div class="form-group card text-white bg-info" style="height:100%;font-size:2em;">
        <div class="card-header text-center">Pkm Bermakna</div>
        <?php if (isset($SURVEY)){ ?>
        <table class="table" style="width: 80%;margin: auto;">
        <thead>
            <tr>
            <th scope="col">MATERI</th>
            <th scope="col">TENAGA KERJA</th>
            <th scope="col">ASET</th>
            <th scope="col">IJIN</th>
            <th scope="col">PRODUK</th>
            <th scope="col">PLAFOND</th>
            <th scope="col">OMSET</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php 
            foreach ($SURVEY as $data){
                echo '<tr>';
                echo '<td>'.$data->NILAI_SURVEY_MATERI.'</td>';
                echo '<td>'.$data->NILAI_SURVEY_TENAGA_KERJA.'</td>';
                echo '<td>'.$data->NILAI_ASET.'</td>';
                echo '<td>'.$data->NILAI_IJIN.'</td>';
                echo '<td>'.$data->NILAI_PRODUK.'</td>';
                echo '<td>'.$data->NILAI_PLAFOND.'</td>';
                echo '<td>'.$data->NILAI_OMSET.'</td>';
                echo '</tr>';
            }
            ?>
            </tr>
        </tbody>
        </table>
        <?php } ?>
        <div class="card-body text-center" style="margin-top:200px;">
            <label class="text-center">Selesai</label>
        </div>
    </div>





<script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/sweetalert.js"></script>