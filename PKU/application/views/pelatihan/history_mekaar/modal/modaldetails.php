<!-- Modal -->
<div id="modaldetails" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Details Pelatihan</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
		<div class="modal-body">
	
				<div class="form-group row">
					<label class="col-sm-2">Tipe Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="pelatihan_type_details" name="pelatihan_type_details" disabled>
							<option value="">--pilih tipe--</option>										
						</select>																	
					</div>
					
					<label class="col-sm-2">Region <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="region_pelatihan_details" name="region_pelatihan_details" disabled>
							<option value="">--pilih region--</option>			

								<?php 
								foreach ($region as $data_region){
									echo '<option value="'.$data_region->KODE_REGION.'">'.$data_region->KODE_REGION.' - '.$data_region->DESKRIPSI.'</option>';                                                                    
								}
								?>										
						</select>																	
					</div>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-2">Judul <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="judul_pelatihan_details" name="judul_pelatihan_details" disabled />
					</div>							
				
					<label class="col-sm-2">Area <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="area_pelatihan_details" name="area_pelatihan_details" disabled />
																						
					</div>							
				</div>								

				<div class="form-group row">
					<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="deskripsi_pelatihan_details" name="deskripsi_pelatihan_details" disabled />
					</div>							
				
					<label class="col-sm-2">Cabang <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="cabang_pelatihan_details" name="cabang_pelatihan_details" disabled />
																						
					</div>	
				</div>	
				
				<div class="form-group row">

					<label class="col-sm-2">Tanggal <span class="text-danger">*</span></label>

					<div class="col-sm-4">

						 <div class="input-group">										
							
							<input type="text" class="form-control input-limit-datepicker" id="input-limit-datepicker" disabled  />																				
							<input type="hidden" id="inputStartTglPelaksanaan" name="inputStartTglPelaksanaan" />
							
							<input type="hidden" id="inputStartTimePelaksanaan" name="inputStartTimePelaksanaan" />

							<input type="hidden" id="inputAkhirTglPelaksanaan" name="inputAkhirTglPelaksanaan"/>
							
							<input type="hidden" id="inputEndTimePelaksanaan" name="inputEndTimePelaksanaan" />

						</div>

					</div>
					
					<label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="durasi_pelatihan_details" name="durasi_pelatihan_details" disabled />
					</div>														

				</div>			


				<div class="form-group row">
					<label class="col-sm-2">Pembicara <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="pembicara_pelatihan_details" name="pembicara_pelatihan_details" disabled />
					</div>							
				
					<label class="col-sm-2">Kuota Peserta <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="kuota_peserta_details" name="kuota_peserta_details" disabled />
					</div>						
				</div>

				<div class="form-group row">
					<!--label class="col-sm-2">Modul <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="modul" name="modul" />
					</div-->                          
				
					<label class="col-sm-2">Anggaran <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="anggaran_details" name="anggaran_details" disabled />
					</div>                      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Provinsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="provinsi_details" name="provinsi_details" disabled >
						<?php 
							foreach ($provinsi as $data_provinsi){
								echo '<option value="'.$data_provinsi->MS_KODE_PROVINSI.'">'.$data_provinsi->MS_PROVINSI.'</option>';                                                                    
							}
							?>	
						</select>
					</div>                          
				
					<label class="col-sm-2">Alamat Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="alamat_tempat_pelatihan_details" name="alamat_tempat_pelatihan_details" disabled />
					</div>                      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Kabupaten / Kota <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="kabkot_details" name="kabkot_details" disabled>
						<?php 
							foreach ($kabkot as $data_kabkot){
								echo '<option value="'.$data_kabkot->MS_KODE_KABKOT.'">'.$data_kabkot->MS_KABKOT.'</option>';                                                                    
							}
							?>							
						</select>
					</div>              

					<label class="col-sm-2">Kecamatan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="kecamatan_details" name="kecamatan_details" disabled>
						<?php 
							foreach ($kecamatan as $data_kecamatan){
								echo '<option value="'.$data_kecamatan->MS_KODE_KECAMATAN.'">'.$data_kecamatan->MS_KECAMATAN.'</option>';                                                                    
							}
							?>								
						</select>
					</div>              					                  
				</div>				

				<div class="container-fluid">
				  <div class="row">
					<div class="col-md-12">
					  <div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title ">Rencana Anggaran Biaya</h4>                        
						</div>
						<div class="card-body">
						  <div class="table">                
							<table id="table_rab_details"  class="table fzl-table-responsive">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Uraian</th>
									  <th class="col-md-2">Volume</th>
									  <th class="col-md-2">Unit Cost</th>
									  <th class="col-md-2">Sub Total Cost</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody id="tbody_rab_details">
                     
								  </tbody>                                                                      
								</table>  

								  <div class="col-md-12"></div>
									<label>Grand Total </label>
								  <div>
								  <div class="col-md-12">    
									<input type="text" class="form-control money" id="total_cost_rab_akhir_details" name="total_cost_rab_akhir_details" data-a-sign="Rp. " value="" readonly="" required>
								  </div>
								
								
								</br>
								<a class="table-add-details btn btn-outline-primary" href="#" ><i class="fas fa-plus"></i></a>                                                           
							  </div>
							</div>
						  </div>
						</div>
				  </div>
				</div>  

			</div>  
			 
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
			</div>
	  
		<?php echo form_close(); ?>
		</div>

	</div>
 </div>
</div>