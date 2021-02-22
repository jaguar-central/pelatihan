<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Report Summary Mekaar</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">					
					<div class="table-style">
						<table id="datatable12" class="table table-bordered table-striped table-responsive">
							<thead>
									<th class="text-center" rowspan="2">Nomor Memo</th>
									<th class="text-center" rowspan="2">Tipe Pelatihan</th>
                                    <th class="text-center" rowspan="2">Judul</th>
                                    <th class="text-center" rowspan="2">Nomor Unit</th>
                                    <th class="text-center" rowspan="2">Cabang Ulamm</th>
                                    <th class="text-center" rowspan="2">Anggaran Proposal</th>
                                    <th class="text-center" rowspan="2">Anggaran Realisasi</th>
                                    <th class="text-center" rowspan="2">Status</th>
                                    <th class="text-center" rowspan="2">Tanggal Mulai</th>
                                    <th class="text-center" rowspan="2">Tanggal Selesai</th>
							</thead>
							<tbody>		
                            <?php 
                            foreach ($report as $data){
                                echo '<tr>';
                                echo '<td>'.$data->NO_PROPOSAL.'</td>';
                                echo '<td>'.$data->TIPE_PELATIHAN.'</td>';
                                echo '<td>'.$data->TITLE.'</td>';
                                echo '<td>'.$data->NO_TRX.'</td>';
                                echo '<td>'.$data->CABANG_ULAMM.'</td>';
                                echo '<td>'.$data->ANGGARAN_PROPOSAL.'</td>';
                                echo '<td>'.$data->ANGGARAN_REALISASI.'</td>';
                                echo '<td>'.$data->STATUS.'</td>';
                                echo '<td>'.$data->TANGGAL_MULAI.'</td>';
								echo '<td>'.$data->TANGGAL_SELESAI.'</td>';
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