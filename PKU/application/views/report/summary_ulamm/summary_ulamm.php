<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Report Summary Ulamm</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">					
					<div class="table-style">
						<table id="datatable" class="table table-bordered table-striped fzl-table-responsive">
							<thead>
									<th class="text-center" >Nomor Memo</th>
									<th class="text-center" >Tipe Pelatihan</th>
                                    <th class="text-center" >Judul</th>
                                    <th class="text-center" >Nomor Unit</th>
                                    <th class="text-center" >Cabang Ulamm</th>
									<!--th class="text-center" >Pembicara</th-->
									<th class="text-center" >Jumlah Peserta</th>
                                    <th class="text-center" >Anggaran Proposal</th>
                                    <th class="text-center" >Anggaran Realisasi</th>
                                    <th class="text-center" >Status</th>
                                    <th class="text-center" >Tanggal Mulai</th>
                                    <th class="text-center" >Tanggal Selesai</th>
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
								//echo '<td>'.$data->PEMBICARA.'</td>';
								echo '<td>'.$data->KUOTA_PESERTA.'</td>';
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