 <!-- MAIN CONTENT-->
 <div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Report Detail Mekaar</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">					
					<div class="table-style">
						<table id="datatable" class="table table-bordered table-striped table-responsive">
							<thead>
								<tr>
									<th class="text-center" rowspan="2">Tipe Debitur</th>
									<th class="text-center" rowspan="2">Nasabah ID</th>
                                    <th class="text-center" rowspan="2">Nama Nasabah</th>
                                    <th class="text-center" rowspan="2">Wilayah</th>
                                    <th class="text-center" rowspan="2">Cabang Ulamm</th>
                                    <th class="text-center" rowspan="2">Region Mekaar</th>
                                    <th class="text-center" rowspan="2">Cabang Mekaar</th>
                                    <th class="text-center" rowspan="2">Jenis Program</th>
                                    <th class="text-center" rowspan="2">Nomor Memo</th>
                                    <th class="text-center" rowspan="2">Nomor Proposal</th>
                                    <th class="text-center" rowspan="2">Tema Pelatihan</th>
                                    <th class="text-center" rowspan="2">Judul Pelatihan</th>
                                    <th class="text-center" rowspan="2">Sektor Usaha</th>
                                    <th class="text-center" rowspan="2">Tanggal Pelatihan</th>
                                    <th class="text-center" rowspan="2">Tanggal LPJ</th>
                                    <th class="text-center" rowspan="2">Realisasi Anggaran</th>
                                    <th class="text-center" colspan="2">Grading System</th>
								</tr>
                                <tr>
                                    <th class="text-center" rowspan="1">Star Model</th>
                                    <th class="text-center" rowspan="1">Kelas / Warna</th>
                                </tr>
							</thead>
							<tbody>		
                            <?php 
                            foreach ($report as $data){
                                echo '<tr>';
                                echo '<td>'.$data->NASABAH_TIPE.'</td>';
                                echo '<td>'.$data->ID_NASABAH.'</td>';
                                echo '<td>'.$data->NAMA.'</td>';
                                echo '<td>'.$data->CABANG_ULAMM.'</td>';
                                echo '<td>'.$data->CABANG_ULAMM.'</td>';
                                echo '<td>'.$data->CABANG_ULAMM.'</td>';
                                echo '<td>'.$data->UNIT_ULAMM.'</td>';
                                echo '<td>'.$data->ID_TIPE.'</td>';
                                echo '<td>'.$data->NO_PROPOSAL.'</td>';
                                echo '<td>'.$data->TITLE.'</td>';
                                echo '<td>'.$data->TANGGAL_MULAI.'</td>';
                                echo '<td>'.$data->TANGGAL_REALISASI.'</td>';
                                echo '<td>'.$data->BUDGET.'</td>';
                                echo '<td>'.$data->ID_GRADING.'</td>';
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

