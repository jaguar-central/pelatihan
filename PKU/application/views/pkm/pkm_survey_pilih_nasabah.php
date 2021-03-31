<link href="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
<style>
.bg-info{
	background-color : #0D67B2 !important;
}
</style>

    <div class="form-group card text-white bg-info" style="font-size:2em;">
        <div class="card-header text-center">Survey Nasabah</div>
        <table class="table text-white" style="width: 80%;margin: auto;font-size:0.5em;">
        <thead>
            <tr>
            <th scope="col">ID Nasabah</th>
            <th scope="col">Nama Nasabah</th>
            <th scope="col">Menabung</th>
            <th scope="col">Pengelolaan Keuangan</th>
            <th scope="col">Omset</th>
            <th scope="col">Strategi Penjualan</th>
            <th scope="col">Asset</th>
            <th scope="col">Ijin Usaha</th>
            <th scope="col">Diversifikasi Produk</th>
            <th scope="col">Tenaga Kerja</th>
            <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php 
            foreach ($nasabah as $data){
                echo '<tr>';
                echo '<td>'.$data->ClientID.'</td>';
                echo '<td>'.$data->ClientName.'</td>';
                echo '<td>'.$data->NILAI_SURVEY_MENABUNG.'</td>';
                echo '<td>'.$data->NILAI_SURVEY_PENGELOLAAN_KEUANGAN.'</td>';
                echo '<td>'.$data->NILAI_SURVEY_OMSET.'</td>';
                echo '<td>'.$data->NILAI_STRATEGI_PENJUALAN.'</td>';
                echo '<td>'.$data->NILAI_SURVEY_ASSET.'</td>';
                echo '<td>'.$data->NILAI_SURVEY_IJIN.'</td>';
                echo '<td>'.$data->NILAI_SURVEY_DIVERSIFIKASI.'</td>';
                echo '<td>'.$data->NILAI_SURVEY_TENAGA_KERJA.'</td>';
                echo '<td><a class="btn btn-success survey-nasabah" href="'.base_url().'pkm/pkm_survey/'.$data->ClientID.'"  >Survey</a></td>';
                echo '</tr>';
            }
            ?>
            </tr>
        </tbody>
        </table>
    </div>





<script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/sweetalert.js"></script>