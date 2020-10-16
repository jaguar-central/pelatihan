<!-- MAIN CONTENT-->
<div class="main-content">
<div class="section__content section__content--p20">
<div class="container-fluid">                        
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">History</h2>
					</div>
				</div>
			</div>
<div class="row">
	<div class="col-lg-12">
		<div class="table-style">
			<table id="datatable" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>JENIS PELATIHAN</th>
						<th>NO MEMO</th>
						<th>TITLE</th>
						<th>TANGGAL MULAI</th>
						<th>TANGGAL SELESAI</th>
						<th>CABANG</th>
						<th>UNIT</th>
						<th>STATUS</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($pelatihan as $cus){
						echo '<tr>';
						echo '<td>'.$cus->DESKRIPSI_PELATIHAN_TYPE.'</td>';
						echo '<td>'.$cus->NO_PROPOSAL.'</td>'; 
						echo '<td>'.$cus->TITLE.'</td>';
						echo '<td>'.$cus->TANGGAL_MULAI.'</td>';
						echo '<td>'.$cus->TANGGAL_SELESAI.'</td>';
						echo '<td>'.$cus->CABANG_ULAMM.'</td>';
						echo '<td>'.$cus->UNIT_ULAMM.'</td>'; 
						echo '<td>'.$cus->STATUS.'</td>'; 						
						echo '<td><button type="button" class="btn btn-outline-info modaldetails" href="#" data-toggle="modal" data-target="#modaldetails" 
								data-pelatihanid="'.$cus->ID.'"
								data-pelatihantype="'.$cus->ID_TIPE.'"
								data-pelatihantypedeskripsi="'.$cus->DESKRIPSI_PELATIHAN_TYPE.'"								
								data-pelatihantitle="'.$cus->TITLE.'"
								data-pelatihancabang="'.$cus->CABANG_ULAMM.'"
								data-pelatihanunit="'.$cus->UNIT_ULAMM.'"
								data-pelatihandeskripsi="'.$cus->DESKRIPSI.'"
								data-pelatihantanggal="'.$cus->TANGGAL_MULAI.' - '.$cus->TANGGAL_SELESAI.'"
								data-pelatihandurasi="'.$cus->DURASI_PELATIHAN.'"
								data-pelatihankuota="'.$cus->KUOTA_PESERTA.'"
								data-pelatihananggaran="'.$cus->BUDGET.'"
								data-pelatihanprovinsi="'.$cus->PROVINSI.'"
								data-pelatihanalamat="'.$cus->ALAMAT.'"
								data-pelatihanlokasi="'.$cus->LOKASI.'"
								data-pelatihanlradius="'.$cus->RADIUS.'"
								data-pelatihanlongitude="'.$cus->LONGITUDE.'"
								data-pelatihanlatitude="'.$cus->LATITUDE.'"
								data-pelatihanpembicara="'.$cus->PEMBICARA.'"	
								><span class="btn-label"><i class="fa fa-eye"></i></span> Details</button></td>'; 
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
			