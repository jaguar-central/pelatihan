 <!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Pelatihan Ulamm</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">					
					<div class="table-style">
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>TITLE</th>
									<th>AKTIF</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$klasterisasi = array(3,4);								
								foreach ($pelatihan_type as $cus){
									if ($this->session->userdata('sess_user_id_user_group')!=3){ //kecuali pic pusat
										echo '<tr>';
										echo '<td>'.$cus->TITLE.'</td>'; 
										echo '<td>'.$cus->AKTIF.'</td>'; 									
										echo '<td>';									
										echo '<button type="button" class="btn btn-primary view_pelatihan" data-pelatihantype="'.$cus->ID.'" data-pelatihanbisnis="ULAMM" ><span class="btn-label"><i class="fa fa-eye"></i></span> View</button>';									
										if (in_array($cus->ID,$klasterisasi)){
											echo '<button type="button" class="btn btn-success add_pelatihan_klasterisasi" data-toggle="modal" data-target="#modaladd" data-pelatihantype="'.$cus->ID.'" data-pelatihantitle="'.$cus->TITLE.'"><span class="btn-label"><i class="fas fa-pencil-alt fa-fw"></i></span> Add</button></td>'; 										
										}else{										
											echo '<button type="button" class="btn btn-success add_pelatihan" data-toggle="modal" data-target="#modaladd" data-pelatihantype="'.$cus->ID.'" data-pelatihantitle="'.$cus->TITLE.'"><span class="btn-label"><i class="fas fa-pencil-alt fa-fw"></i></span> Add</button></td>'; 					
										}
										echo '</tr>';
									}else if ($this->session->userdata('sess_user_id_user_group')==3 && in_array($cus->ID,$klasterisasi)){ //untuk pic pusat
										echo '<tr>';
										echo '<td>'.$cus->TITLE.'</td>'; 
										echo '<td>'.$cus->AKTIF.'</td>'; 									
										echo '<td>';										
										echo '<button type="button" class="btn btn-success project_charter"
										data-toggle="modal" data-target="#modaladdklasterisasi" data-pelatihantype="'.$cus->ID.'" data-pelatihantitle="'.$cus->TITLE.'"><span class="btn-label"><i class="fas fa-pencil-alt fa-fw"></i></span> Add Project Charter</button></td>'; 																				
										echo '</tr>';
									}
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