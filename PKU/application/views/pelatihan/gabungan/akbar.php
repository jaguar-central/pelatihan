 <!-- MAIN CONTENT-->
 <div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">PKU Akbar Gabungan</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">					
					<div class="table-style">
						<div class="p-3">
							<a href="#"  data-toggle="modal" data-target="#akbarmodal" class="btn btn-outline-primary">
							<span class="btn-label"><i class="fa fa-plus"></i></span> PKU Akbar Gabungan
							</a>
						</div>    					
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center">Judul Pelatihan Gabungan</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							foreach($pelatihan as $data){
								echo '<tr>';
								echo '<td>'.$data->JUDUL_GABUNGAN.'</td>';
								echo '<td>'.$data->JUDUL_GABUNGAN.'</td>';
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