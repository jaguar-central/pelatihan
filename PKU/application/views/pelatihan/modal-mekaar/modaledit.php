<!-- Modal -->
<div id="modaledit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Edit Pelatihan</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'edit_pelatihan','name'=>'edit_pelatihan','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
		<div class="modal-body">
	
				<div class="form-group row">
					<label class="col-sm-2">Tipe Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="pelatihan_type_edit" name="pelatihan_type_edit">
							<option value="">--pilih tipe--</option>										
						</select>																	
					</div>
					
					<label class="col-sm-2">Cabang <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="cabang_pelatihan_edit" name="cabang_pelatihan_edit">
							<option value="">--pilih cabang--</option>			

								<?php 
								foreach ($cabang as $data_cabang){
									echo '<option value="'.$data_cabang->KODE_CABANG.'">'.$data_cabang->KODE_CABANG.' - '.$data_cabang->DESKRIPSI.'</option>';                                                                    
								}
								?>										
						</select>																	
					</div>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-2">Judul <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="judul_pelatihan_edit" name="judul_pelatihan_edit" />
					</div>							
				
					<label class="col-sm-2">Unit <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control select" required="" id="unit_pelatihan_edit" name="unit_pelatihan_edit[]" multiple="multiple">
							<option value="">--pilih unit--</option>											
						</select>																	
					</div>							
				</div>								

				<div class="form-group row">
					<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="deskripsi_pelatihan_edit" name="deskripsi_pelatihan_edit" />
					</div>							
				

				</div>	
				
				<div class="form-group row">

					<label class="col-sm-2">Tanggal <span class="text-danger">*</span></label>

					<div class="col-sm-4">

						 <div class="input-group">										
							
							<input type="text" class="form-control input-limit-datepicker-edit" id="input-limit-datepicker-edit" required />																				
							<input type="hidden" id="inputStartTglPelaksanaan_edit" name="inputStartTglPelaksanaan_edit" />
							
							<input type="hidden" id="inputStartTimePelaksanaan_edit" name="inputStartTimePelaksanaan_edit" />

							<input type="hidden" id="inputAkhirTglPelaksanaan_edit" name="inputAkhirTglPelaksanaan_edit"/>
							
							<input type="hidden" id="inputEndTimePelaksanaan_edit" name="inputEndTimePelaksanaan_edit" />

						</div>

					</div>
					
					<label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="durasi_pelatihan_edit" name="durasi_pelatihan_edit" readonly="" />
					</div>														

				</div>			


				<div class="form-group row">
					<label class="col-sm-2">Pembicara <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="pembicara_pelatihan_edit" name="pembicara_pelatihan_edit" />
					</div>							
				
					<label class="col-sm-2">Kuota Peserta <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="kuota_peserta_edit" name="kuota_peserta_edit" />
					</div>						
				</div>

				<div class="form-group row">
					<!--label class="col-sm-2">Modul <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="modul" name="modul" />
					</div-->                          
				
					<label class="col-sm-2">Anggaran <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="anggaran_edit" name="anggaran_edit" />
					</div>                      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Provinsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="provinsi_edit" name="provinsi_edit">
							<option value="">- Pilih Provinsi -</option>
							<option value="ACEH">ACEH</option>
							<option value="BALI">BALI</option>
							<option value="BANTEN">BANTEN</option>
							<option value="BENGKULU">BENGKULU</option>
							<option value="DAERAH ISTIMEWA YOGYAKARTA">DAERAH ISTIMEWA YOGYAKARTA</option>
							<option value="DKI JAKARTA">DKI JAKARTA</option>
							<option value="GORONTALO">GORONTALO</option>
							<option value="JAMBI">JAMBI</option>
							<option value="JAWA BARAT">JAWA BARAT</option>
							<option value="JAWA TENGAH">JAWA TENGAH</option>
							<option value="JAWA TIMUR">JAWA TIMUR</option>
							<option value="KALIMANTAN BARAT">KALIMANTAN BARAT</option>
							<option value="KALIMANTAN SELATAN">KALIMANTAN SELATAN</option>
							<option value="KALIMANTAN TENGAH">KALIMANTAN TENGAH</option>
							<option value="KALIMANTAN TIMUR">KALIMANTAN TIMUR</option>
							<option value="KALIMANTAN UTARA">KALIMANTAN UTARA</option>
							<option value="KEPULAUAN BANGKA BELITUNG">KEPULAUAN BANGKA BELITUNG</option>
							<option value="KEPULAUAN RIAU">KEPULAUAN RIAU</option>
							<option value="LAMPUNG">LAMPUNG</option>
							<option value="MALUKU">MALUKU</option>
							<option value="MALUKU UTARA">MALUKU UTARA</option>
							<option value="NUSA TENGGARA BARAT">NUSA TENGGARA BARAT</option>
							<option value="NUSA TENGGARA TIMUR">NUSA TENGGARA TIMUR</option>
							<option value="PAPUA">PAPUA</option>
							<option value="PAPUA BARAT">PAPUA BARAT</option>
							<option value="RIAU">RIAU</option>
							<option value="SULAWESI BARAT">SULAWESI BARAT</option>
							<option value="SULAWESI SELATAN">SULAWESI SELATAN</option>
							<option value="SULAWESI TENGAH">SULAWESI TENGAH</option>
							<option value="SULAWESI TENGGARA">SULAWESI TENGGARA</option>
							<option value="SULAWESI UTARA">SULAWESI UTARA</option>
							<option value="SUMATERA BARAT">SUMATERA BARAT</option>
							<option value="SUMATERA SELATAN">SUMATERA SELATAN</option>
							<option value="SUMATERA UTARA">SUMATERA UTARA</option>
						</select>
					</div>                          
				
					<label class="col-sm-2">Alamat Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="alamat_tempat_pelatihan_edit" name="alamat_tempat_pelatihan_edit" />
					</div>                      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Lokasi Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control"  required="" id="lokasi_pelatihan_edit" name="lokasi_pelatihan" />
					</div>                                
				</div>

				<div class="form-group row">
					<label class="col-sm-4" >Radius <span class="text-danger">*</span></label>
					<label class="col-sm-4">Latitude <span class="text-danger">*</span></label>
					<label class="col-sm-4">Longitude <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="radius_edit" name="radius" />
					</div>               
					
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="latitude_edit" name="latitude" />
					</div>                          
				
					
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="longitude_edit" name="longitude" />
					</div>                      
				</div>

				<div class="col-xs-12" style="margin-bottom:30px;">
						<div id="us_edit" style="width:100%; height: 400px;"></div>
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
							<table id="table_rab_edit"  class="table">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Uraian</th>
									  <th class="col-md-2">Jumlah</th>
									  <th class="col-md-2">Unit</th>
									  <th class="col-md-2">Unit Cost</th>
									  <th class="col-md-2">Sub Total Cost</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody id="tbody_rab_edit">
									<tr class="d-none">
									  <td ><input type="text" class="form-control" id="deskripsi_rab_edit" name="deskripsi_rab_edit[]" value=""></td>
									  <td ><input type="number" class="form-control" id="jumlah_rab_edit" name="jumlah_rab_edit[]"></td>
									  <td ><input type="text" class="form-control" id="unit_rab_edit" name="unit_rab_edit[]" value=""></td>
									  <td ><input type="number" class="form-control" id="unit_cost_rab_edit" name="unit_cost_rab_edit[]" value=""></td>
									  <td ><input type="number" class="form-control" id="total_cost_rab_edit" name="total_cost_rab_edit[]" value="" readonly=""></td>
									  <td>                            
										<a class="table-remove-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>   
									  </td>
									  <td>                            
										<a class="table-up-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   
										<a class="table-down-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>                               
									  </td>
									</tr>                        
								  </tbody>                                                                      
								</table>  

								  <div class="col-md-12"></div>
									<label>Grand Total </label>
								  <div>
								  <div class="col-md-12">    
									<input type="text" class="form-control money" id="total_cost_rab_akhir_edit" name="total_cost_rab_akhir_edit" data-a-sign="Rp. " value="" readonly="" required>
								  </div>
								
								
								</br>
								<a class="table-add-modaledit btn btn-outline-primary" href="#" ><i class="fas fa-plus"></i></a>                                                           
							  </div>
							</div>
						  </div>
						</div>
				  </div>
				</div>  

			</div>  
			 
			<div class="modal-footer">
				<?php echo form_submit('submit', 'Submit', 'class="btn btn-primary submit"'); ?>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
	  
		<?php echo form_close(); ?>
		</div>

	</div>
 </div>
</div>