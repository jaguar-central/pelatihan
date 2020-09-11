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
						<input type="text" class="form-control"  required="" id="alamat_tempat_pelatihan_details" name="alamat_tempat_pelatihan_details" disabled />
					</div>                      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Lokasi Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control"  required="" id="lokasi_pelatihan_details" name="lokasi_pelatihan_details" disabled />
					</div>                                
				</div>

				<div class="form-group row">
					<label class="col-sm-4" >Radius <span class="text-danger">*</span></label>
					<label class="col-sm-4">Latitude <span class="text-danger">*</span></label>
					<label class="col-sm-4">Longitude <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="radius_details" name="radius_details" disabled />
					</div>               
					
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="latitude_details" name="latitude_details" disabled />
					</div>                          
				
					
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="longitude_details" name="longitude_details" disabled />
					</div>                      
				</div>

				<div class="col-xs-12" style="margin-bottom:30px;">
						<div id="us_details" style="width:100%; height: 400px;" disabled ></div>
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
							<table id="table_rab_details"  class="table">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Uraian</th>
									  <th class="col-md-2">Jumlah</th>
									  <th class="col-md-2">Unit</th>
									  <th class="col-md-2">Unit Cost</th>
									  <th class="col-md-2">Sub Total Cost</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody id="tbody_rab">
                     
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
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
	  
		<?php echo form_close(); ?>
		</div>

	</div>
 </div>
</div>
<script>
	$('#us_details').locationpicker({
        location: {
              latitude: -0.9470831999999999,
              longitude: 100.417181   
		},
        radius: 50,
        inputBinding: {
            latitudeInput: $('#latitude_add'),
            longitudeInput: $('#longitude_add'),
            radiusInput: $('#radius_add'),
            locationNameInput: $('#lokasi_pelatihan_add')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
  
        }
    });
	
	
	function calculate_grand_total_details(){		
		var total = 0;
		$('tr #total_cost_rab_details').each(function () {            
			var total_cost_rab = $(this).val();			
			if (!isNaN(total_cost_rab) && total_cost_rab.length !== 0) {
				total += parseFloat(total_cost_rab);
			}
		});

		var rowCount = $('tr #total_cost_rab_details').length;

		$("#total_cost_rab_akhir_details").val(total);
	}	
</script>