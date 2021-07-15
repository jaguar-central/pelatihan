<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p20">
<div class="container-fluid">                        
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Survey Nasabah PKU</h2>
					</div>
				</div>
			</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-style">
			<div class="p-3">
				<a href="#" data-toggle="modal" data-target="#modaladd" class="btn btn-outline-primary">
				<span class="btn-label"><i class="fa fa-plus"></i></span> Add Survey Nasabah
				</a>
			</div>    
			<table id="datatable" class="table table-bordered table-striped fzl-table-responsive">
				<thead>
					<tr>
						<th>ID NASABAH</th>
						<th>NAMA NASABAH</th>
						<th>TIPE BISNIS</th>
						<th>JENIS USAHA</th>
						<th>ALAMAT NASABAH</th>
						<th>NO. HANDPHONE NASABAH</th>
						<th>PLAFOND</th>
						<th>Apakah jumlah plafon meningkat?</th>
						<th>Apakah produk usaha bertambah?</th>
						<th>Apakah jumlah pendapatan perbulan meningkat?</th>
						<th>Apakah ada penambahan serapan tenaga kerja?</th>
						<th>Apakah ada penambahan izin usaha lain?</th>
					</tr>
				</thead>
				<tbody>	
				<?php	
				foreach ($survey as $data){
						echo '<tr>';
						echo '<td>'.$data->ID_NASABAH.'</td>'; 													
						echo '<td>'.$data->NAMA_NASABAH.'</td>'; 													
						echo '<td>'.$data->JENIS_NASABAH.'</td>'; 													
						echo '<td>'.$data->JENIS_USAHA.'</td>'; 													
						echo '<td>'.$data->ALAMAT_NASABAH.'</td>'; 													
						echo '<td>'.$data->TELP_NASABAH.'</td>'; 													
						echo '<td>'.$data->PLAFOND.'</td>'; 																							
						echo '<td>'.$data->P1.'</td>'; 																							
						echo '<td>'.$data->P2.'</td>'; 																							
						echo '<td>'.$data->P3.'</td>'; 																							
						echo '<td>'.$data->P4.'</td>'; 																							
						echo '<td>'.$data->P5.'</td>'; 																							
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
			