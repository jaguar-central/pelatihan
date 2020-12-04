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
						<table id="datatable" class="table table-bordered table-striped table-responsive">
							<thead>
								<tr>
									<th class="text-center">TITLE</th>
									<th class="text-center">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$klasterisasi = array(3,4);								
								foreach ($pelatihan_type as $cus){
									if ($this->session->userdata('sess_user_id_user_group')!=3){ //untuk pic cabang
										echo '<tr>';
										echo '<td>'.$cus->TITLE.'</td>'; 								
										echo '<td class="text-center">';	
										echo '<button type="button" class="btn btn-outline-info col-md-4 view_pelatihan" data-pelatihantype="'.$cus->ID.'" data-pelatihanbisnis="ULAMM" ><span class="btn-label"><i class="fa fa-eye"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View</button>&nbsp;&nbsp;';																			
										if (in_array($cus->ID,$klasterisasi)){
											echo '<button type="button" class="btn btn-outline-success col-md-4 add_pelatihan_project_charter" data-toggle="modal" data-target="#modaladd" data-pelatihantype="'.$cus->ID.'" data-pelatihantitle="'.$cus->TITLE.'" ><span class="btn-label"><i class="fas fa-pencil-alt fa-fw"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add</button>'; 										
										}else{										
											echo '<button type="button" class="btn btn-outline-success col-md-4 add_pelatihan" data-toggle="modal" data-target="#modaladd" data-pelatihantype="'.$cus->ID.'" data-pelatihantitle="'.$cus->TITLE.'"><span class="btn-label"><i class="fas fa-pencil-alt fa-fw"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add</button>'; 					
										}
										echo '</td>';
										echo '</tr>';
									}else if ($this->session->userdata('sess_user_id_user_group')==3 && in_array($cus->ID,$klasterisasi)){ //untuk pic pusat
										echo '<tr>';
										echo '<td>'.$cus->TITLE.'</td>'; 								
										echo '<td class="text-center">';										
										echo '<button type="button" class="btn btn-outline-info col-md-4 view_project_charter" data-pelatihantype="'.$cus->ID.'" ><span class="btn-label"><i class="fa fa-eye"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Project Charter</button>&nbsp;&nbsp;';																			
										echo '<button type="button" class="btn btn-outline-success col-md-4 add_project_charter"
										data-toggle="modal" data-target="#modaladdklasterisasi" data-pelatihantype="'.$cus->ID.'" data-pelatihantitle="'.$cus->TITLE.'"><span class="btn-label"><i class="fas fa-pencil-alt fa-fw"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Project Charter</button></td>'; 																				
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