 <!-- MAIN CONTENT-->
 <div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Report Rekap Ulamm</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">					
					<div class="table-style">
						<table id="datatable" class="table table-bordered table-striped fzl-table-responsive">
							<thead>
                                <tr>
                                    <th class="text-center" colspan="21">RAPOR PKU ULAMM</th>
                                </tr>
								<tr>
									<th class="text-center" rowspan="2">Cabang</th>
									<th class="text-center" rowspan="1" colspan="2">TUNU</th>
                                    <th class="text-center" rowspan="1" colspan="2">TUNCA</th>
                                    <th class="text-center" rowspan="1" colspan="2">Klasterisasi Sektoral</th>
                                    <th class="text-center" rowspan="1" colspan="2">Klasterisasi Teritorial</th>
                                    <th class="text-center" rowspan="1" colspan="2">Pameran</th>
                                    <th class="text-center" rowspan="1" colspan="2">PKU Akbar</th>
                                    <th class="text-center" rowspan="1" colspan="2">PKU Akbar Gabungan</th>
                                    <th class="text-center" rowspan="1" colspan="2">Realisasi Pelatihan</th>
                                    <th class="text-center" rowspan="1" colspan="2">Realisasi Peserta</th>
								</tr>
                                <tr>
                                    <th class="text-center" rowspan="1">Realisasi Pelatihan</th>
                                    <th class="text-center" rowspan="1">Realisasi Peserta</th>
                                    <th class="text-center" rowspan="1">Realisasi Pelatihan</th>
                                    <th class="text-center" rowspan="1">Realisasi Peserta</th>         
                                    <th class="text-center" rowspan="1">Realisasi Pelatihan</th>
                                    <th class="text-center" rowspan="1">Realisasi Peserta</th>
                                    <th class="text-center" rowspan="1">Realisasi Pelatihan</th>
                                    <th class="text-center" rowspan="1">Realisasi Peserta</th>
                                    <th class="text-center" rowspan="1">Realisasi Pelatihan</th>
                                    <th class="text-center" rowspan="1">Realisasi Peserta</th>
                                    <th class="text-center" rowspan="1">Realisasi Pelatihan</th>
                                    <th class="text-center" rowspan="1">Realisasi Peserta</th>
                                    <th class="text-center" rowspan="1">Realisasi Pelatihan</th>
                                    <th class="text-center" rowspan="1">Realisasi Peserta</th>
                                    <th class="text-center" rowspan="1">Realisasi Bulan Berjalan</th>
                                    <th class="text-center" rowspan="1">Akumulasi Realisasi s/d Bulan Berjalan</th>
                                    <th class="text-center" rowspan="1">Realisasi Bulan Berjalan</th>
                                    <th class="text-center" rowspan="1">Akumulasi Realisasi s/d Bulan Berjalan</th>                          
                                </tr>
							</thead>
							<tbody>		
                            <?php 
                            foreach ($report as $data){
                                echo '<tr>';
                                echo '<td>'.$data->DESKRIPSI.'</td>';
                                echo '<td>'.$data->TUNU_PELATIHAN.'</td>';
                                echo '<td>'.$data->TUNU_PESERTA.'</td>';
                                echo '<td>'.$data->TUNCA_PELATIHAN.'</td>';
                                echo '<td>'.$data->TUNCA_PESERTA.'</td>';
                                echo '<td>'.$data->SEKTORAL_PELATIHAN.'</td>';
                                echo '<td>'.$data->SEKTORAL_PESERTA.'</td>';
                                echo '<td>'.$data->TERITORIAL_PELATIHAN.'</td>';
                                echo '<td>'.$data->TERITORIAL_PESERTA.'</td>';
                                echo '<td>'.$data->PAMERAN_PELATIHAN.'</td>';
                                echo '<td>'.$data->PAMERAN_PESERTA.'</td>';
                                echo '<td>'.$data->AKBAR_PELATIHAN.'</td>';
                                echo '<td>'.$data->AKBAR_PESERTA.'</td>';
                                echo '<td>'.$data->AKBAR_G_PELATIHAN.'</td>';
                                echo '<td>'.$data->AKBAR_G_PESERTA.'</td>';    
                                echo '<td>'.$data->REALISASI_BERJALAN_PELATIHAN.'</td>';
                                echo '<td>'.$data->REALISASI_AKUMULASI_PELATIHAN.'</td>';
                                echo '<td>'.$data->REALISASI_BERJALAN_PESERTA.'</td>';
                                echo '<td>'.$data->REALISASI_AKUMULASI_PESERTA.'</td>';                                        
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
<!-- END MAIN CONTENT-->

