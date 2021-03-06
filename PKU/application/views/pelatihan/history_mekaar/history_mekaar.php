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
			<table id="datatable" class="table table-bordered table-striped table-responsive">
				<thead>
					<tr>
						<th>JENIS PELATIHAN</th>
						<th>NO MEMO</th>
						<th>TITLE</th>
						<th>TANGGAL MULAI</th>
						<th>TANGGAL SELESAI</th>
						<th>REGION</th>
						<th>AREA</th>
						<th>CABANG</th>
						<th>STATUS</th>
						<th>APPROVAL</th>
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
						echo '<td>'.$cus->MULAI.'</td>';
						echo '<td>'.$cus->SELESAI.'</td>';
						echo '<td>'.$cus->REGIONAL_MEKAAR.'</td>';
						echo '<td>'.$cus->AREA_MEKAAR.'</td>';
						echo '<td>'.$cus->CABANG_MEKAAR.'</td>';
						echo '<td>'.$cus->STATUS.'</td>'; 	
						echo '<td>'.$cus->APPROVAL.'</td>'; 		
						echo '<td>
							<div class="dropdown"><button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">Action<span class="caret"></span></button><div class="dropdown-menu">
								<a class="dropdown-item modaldetails" href="#" data-toggle="modal" data-target="#modaldetails" 
								data-pelatihanid="'.$cus->ID.'"
								data-pelatihantype="'.$cus->ID_TIPE.'"
								data-pelatihantypedeskripsi="'.$cus->DESKRIPSI_PELATIHAN_TYPE.'"									
								data-pelatihantitle="'.$cus->TITLE.'"
								data-pelatihanregional="'.$cus->REGIONAL_MEKAAR.'"
								data-pelatihanarea="'.$cus->AREA_MEKAAR.'"
								data-pelatihancabang="'.$cus->CABANG_MEKAAR.'"
								data-pelatihandeskripsi="'.$cus->DESKRIPSI.'"
								data-pelatihantanggal="'.$cus->TANGGAL_MULAI.' - '.$cus->TANGGAL_SELESAI.'"
								data-pelatihandurasi="'.$cus->DURASI_PELATIHAN.'"
								data-pelatihankuota="'.$cus->KUOTA_PESERTA.'"
								data-pelatihananggaran="'.$cus->BUDGET.'"
								data-pelatihanprovinsi="'.$cus->PROVINSI.'"
								data-pelatihankabkot="'.$cus->KABKOT.'"
								data-pelatihankecamatan="'.$cus->KECAMATAN.'"								
								data-pelatihanalamat="'.$cus->ALAMAT.'"
								data-pelatihanpembicara="'.$cus->PEMBICARA.'"								
								> Details Proposal</a>'; 
						if ($cus->STATUS=='approved'){
							echo '<a class= "dropdown-item" target="_blank" href="'.$this->config->item('jasper_report').'Pelatihan.pdf?ID='.$cus->ID.'"> Unduh Proposal</a>';
						}
						if ($cus->STATUS=='lpj_approved'){
							echo '<a class="dropdown-item modallpjdetails" href="#" data-toggle="modal" data-target="#modallpjdetails" 
							data-pelatihanid="'.$cus->ID.'"
							data-pelatihantanggal="'.$cus->LPJ_MULAI.' - '.$cus->LPJ_SELESAI.'"
							data-pelatihancsifinal="'.$cus->CSI_FINAL.'"								
							data-pelatihancatatan="'.$cus->CATATAN_TAMBAHAN.'"
							data-pelatihandurasi="'.$cus->DURASI_LPJ.'"
							> Details Lpj</a>';
							echo '<a class= "dropdown-item" target="_blank" href="'.$this->config->item('jasper_report').'Pelatihan.pdf?ID='.$cus->ID.'"> Unduh Proposal</a>';	
							echo '<a class= "dropdown-item" target="_blank" href="'.$this->config->item('jasper_report').'Lpj.pdf?ID='.$cus->ID.'"> Unduh Lpj</a>';
						}
						echo '</div></div> </td>';								
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
			