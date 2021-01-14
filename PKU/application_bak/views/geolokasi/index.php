<!-- MAIN CONTENT-->
 <div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Lokasi karyawan login terakhir</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">					
					<div class="table-style">
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center">Username</th>
									<th class="text-center">Waktu</th>
									<th class="text-center">Posisi</th>
								</tr>
							</thead>
							<tbody>
                                <?php
                                foreach ($lokasi as $lokasinya){
										echo '<tr>';
										echo '<td>'.$lokasinya->USERNAME.'</td>'; 
										echo '<td>'.$lokasinya->TIMESTAMP.'</td>'; 
                                        ?><td><button class="btn btn-success" onclick="window.open('https://www.google.com.sa/maps/search/<?php echo $lokasinya->KOOR?>','_blank','location=yes,height=800,width=600,scrollbars=yes,status=yes') " >View on map</button></td><?php 
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


<!-- END MAIN CONTENT-->