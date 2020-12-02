
 <!-- MAIN CONTENT-->
 <div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">




			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Pelatihan LPJ</h2>
					</div>
				</div>
			</div>		
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'lpj_pelatihan','name'=>'lpj_pelatihan','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>				
			<div class = "table-style" style = "padding : 25px">
				<div class="form-group">				
					<input type="hidden" class="form-control" id="id_pelatihan" name="id_pelatihan" value="<?php echo $this->uri->segment(3); ?>"/>		
					<div class="form-group row">			
						<!-- <label class="col-sm-2">Tanggal Realisasi <span class="text-danger"></span></label>
						<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="tanggal_realisasi" name="tanggal_realisasi" />		
						</div> -->
						<label class="col-sm-2">Tanggal <span class="text-danger">*</span></label>
						<div class="col-sm-4">
							<div class="input-group">																										
								<div class='input-group date'>
									<span class="input-group-addon">
									<span class="fas fa-calendar"></span>
									</span>
									<input type='text' class="form-control" id='timeawal' value="<?php echo $timeawal;  ?>" />
									<span class="input-group-addon bg-custom b-0">s/d</span>
									<input type='text' class="form-control" id='timeakhir' value="<?php echo $timeakhir; ?>" />
								</div>							
								<input type="hidden" id="inputStartTglPelaksanaan" name="inputStartTglPelaksanaan" value="<?php echo $inputStartTglPelaksanaan; ?>" />						
								<input type="hidden" id="inputStartTimePelaksanaan" name="inputStartTimePelaksanaan" value="<?php echo $inputStartTimePelaksanaan;  ?>" />
								<input type="hidden" id="inputAkhirTglPelaksanaan" name="inputAkhirTglPelaksanaan" value="<?php echo $inputAkhirTglPelaksanaan;  ?>" />								
								<input type="hidden" id="inputEndTimePelaksanaan" name="inputEndTimePelaksanaan" value="<?php echo $inputEndTimePelaksanaan;  ?>" />
							</div>
						</div>		

						<label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  required="" id="durasi_tampilan" readonly="" />
							<input type="hidden" class="form-control"  required="" id="durasi_pelatihan" name="durasi_pelatihan" />
						</div>										
					</div>		

					<div class="form-group row">					
						<!-- <label class="col-sm-2">Link Lampiran <span class="text-danger"></span></label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  required="" id="lampiran" name="lampiran" />	
						</div>	 -->


						<label class="col-sm-2" for="lampiran">Lampiran</label>
						<div class="col-sm-4">
						<input type="file" class="form-control-file" id="lampiran" name="lampiran">										
						</div>						
					</div>						
					
					<div class="form-group row">
						<label class="col-sm-2">CSI Final <span class="text-danger"></span></label>
						<div class="col-sm-4">
							<input type="number" class="form-control"  required="" id="csi_final" name="csi_final" value="<?php echo $csi_final;?>" />
						</div>							
					
						<label class="col-sm-2">Catatan Tambahan <span class="text-danger"></span></label>
						<div class="col-sm-4">
						<textarea class="form-control rounded-0" id="catatan_tambahan" name="catatan_tambahan" rows="3">
						<?php echo $catatan_tambahan; ?>
						</textarea>																	
						</div>							
					</div>								
				</div>	
				<div class="row">
					<div class="col-md-12">
					  <div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title ">Realisasi Anggaran Biaya</h4>                        
						</div>
						<div class="card-body">
						  <div class="table">                
							<table id="table_rab_modallpj"  class="table table-responsive">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Uraian</th>
									  <th class="col-md-2">Jumlah</th>
									  <th class="col-md-2">Unit</th>
									  <th class="col-md-2">Unit Cost</th>
									  <th class="col-md-2">Sub Total Cost</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody id="tbody_rab_modallpj">
									<tr class="d-none">
									  <td ><input type="text" class="form-control" id="deskripsi_rab_modallpj" name="deskripsi_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="jumlah_rab_modallpj" name="jumlah_rab[]"></td>
									  <td ><input type="text" class="form-control" id="unit_rab_modallpj" name="unit_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="unit_cost_rab_modallpj" name="unit_cost_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="total_cost_rab_modallpj" name="total_cost_rab[]" value="" readonly=""></td>
									  <td>                            
										<a class="table-remove-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>   
									  </td>
									  <td>                            
										<a class="table-up-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   
										<a class="table-down-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>                               
									  </td>
									</tr>                        
								  </tbody>                                                                      
								</table>  

								  <div class="col-md-12"></div>
									<label>Grand Total </label>
								  <div>
								  <div class="col-md-12">    
									<input type="text" class="form-control money" id="total_cost_rab_akhir_modallpj" name="total_cost_rab_akhir" data-a-sign="Rp. " value="0" readonly="" required>
								  </div>
								
								
								</br>
								<a class="table-add-modallpj btn btn-outline-primary" href="#" ><i class="fas fa-plus"></i></a>                                                           
							  </div>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-sm-12">
						<?php echo form_submit('submit', 'Submit LPJ', 'class="btn btn-outline-success float-right submit"'); ?>					
					</div>					
				</div>  																							
			</div>
			<?php echo form_close(); ?>


			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#list_kehadiran">List Kehadiran</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#detail_pelatihan">Pelatihan Pengajuan</a>
			</ul>	


			<div class="tab-content">	


			<div id="list_kehadiran" class="tab-pane active">
			<div class = "table-style" style = "padding : 25px">
			<div class="section__content section__content--p10">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<!--h2 class="title-1 m-b-25">Earnings By Items</h2-->
							<div class="table-style">
								<table id="datatable_listkehadiran" class="table table-hover table-responsive"> 
									<thead>
										<tr>
											<th>ID Nasabah</th>											
											<th>KTP</th>											
											<th>Bisnis</th>
											<th>Nama</th>
											<th>Tipe Nasabah</th>																																											
										</tr>
									</thead>
									<tbody>
									

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>

			<div id="detail_pelatihan" class="tab-pane" >
			<div class = "table-style" style = "padding : 25px">
				<div class="form-group row">
					<label class="col-sm-2">Tipe Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" disabled>
							<option value=""><?php echo $pelatihan->DESKRIPSI_TIPE; ?></option>										
						</select>																	
					</div>

					<label class="col-sm-2">Judul <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->TITLE; ?>" disabled />
					</div>						
					

				</div>		
				
				<?php if ($pelatihan->ID_BISNIS==1){ ?>
				<div class="form-group row">
					<label class="col-sm-2">Cabang Ulamm<span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" disabled>	
							<option value=""><?php echo $pelatihan->DESKRIPSI_CABANG_ULAMM; ?></option>									
						</select>																	
					</div>						
				
					<label class="col-sm-2">Unit <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->DESKRIPSI_UNIT; ?>" disabled />
																						
					</div>							
				</div>				
				<?php }else{ ?>	
				<div class="form-group row">
					<label class="col-sm-2">Region <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" disabled>	
							<option value=""><?php echo $pelatihan->DESKRIPSI_REGION; ?></option>									
						</select>																	
					</div>						
				
					<label class="col-sm-2">Area <span class="text-danger">*</span></label>
					<div class="col-sm-4">			
						<select class="form-control" disabled>	
							<option value=""><?php echo $pelatihan->DESKRIPSI_AREA; ?></option>									
						</select>	
					</div>	
												
				</div>		
				<div class="form-group row">
					<label class="col-sm-2">Cabang Mekaar<span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->DESKRIPSI_CABANG_MEKAAR; ?>" disabled />																						
					</div>			
					<label class="col-sm-2">Cabang Ulamm<span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" disabled>	
							<option value=""><?php echo $pelatihan->DESKRIPSI_CABANG_ULAMM; ?></option>									
						</select>																	
					</div>															
				</div>							
				<?php } ?>				

				<div class="form-group row">
					<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->DESKRIPSI; ?>" disabled />
					</div>							
				

				</div>	
				
				<div class="form-group row">

					<label class="col-sm-2">Tanggal <span class="text-danger">*</span></label>

					<div class="col-sm-4">

						 <div class="input-group">										
						 	<input type="text" class="form-control" value="<?php echo $pelatihan->TANGGAL_MULAI; ?>" disabled />
						 	<input type="text" class="form-control" value="<?php echo $pelatihan->TANGGAL_SELESAI; ?>" disabled />
						</div>

					</div>
					
					<label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->DURASI_PELATIHAN; ?>" disabled />
					</div>														

				</div>			


				<div class="form-group row">
					<label class="col-sm-2">Pembicara <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->PEMBICARA; ?>" disabled />
					</div>							
				
					<label class="col-sm-2">Kuota Peserta <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->KUOTA_PESERTA; ?>" disabled />
					</div>						
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Anggaran <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->BUDGET; ?>" disabled />
					</div>                      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Provinsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="provinsi_details" name="provinsi_details" disabled >							
							<option value=""><?php echo $pelatihan->DESKRIPSI_PROVINSI; ?></option>						
						</select>
					</div>                          
				
					<label class="col-sm-2">Alamat Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" value="<?php echo $pelatihan->ALAMAT; ?>" disabled />
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
							<table class="table table-responsive">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Uraian</th>
									  <th class="col-md-2">Volume</th>
									  <th class="col-md-2">Unit Cost</th>
									  <th class="col-md-2">Sub Total Cost</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <?php foreach($rab as $data_rab){ ?>
									<tr>
									  <td ><input type="text" class="form-control" id="deskripsi_rab_details" value="<?= $data_rab->URAIAN; ?>" disabled></td>
									  <td ><input type="number" class="form-control" id="volumerab_details" value="<?= $data_rab->VOLUME; ?>" disabled></td>
									  <td ><input type="number" class="form-control" id="unit_cost_rab_details" value="<?= $data_rab->UNIT_COST; ?>" disabled></td>
									  <td ><input type="number" class="form-control" id="total_cost_rab_details" value="<?= $data_rab->SUB_TOTAL_COST; ?>" disabled></td>							
									</tr>                        
								  <?php } ?>
								  </tbody>                                                                      
								</table>  
								  <div class="col-md-12"></div>
									<label>Grand Total </label>
								  <div>
								  <div class="col-md-12">    
									<input type="text" class="form-control money" data-a-sign="Rp. " value="<?= $rab[0]->GRAND_TOTAL; ?>" readonly="" required>
								  </div>	
								
								
								
							  </div>
							</div>
						  </div>
						</div>
				  </div>




				</div>  

			</div>  
				
			</div>	
			</div>	
			</div>	

			<!-- DETAIL PELATIHAN END-->



			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#kehadiran_ulamm">Nasabah Ulamm</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kehadiran_mekaar">Nasabah Mekaar</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#non_nasabah">Non Nasabah</a>
			</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div id="kehadiran_ulamm" class="tab-pane active">

						<div class = "table-style" style = "padding : 25px">
							<div class="form-group row">															
								<label class="col-sm-2">Sektor Ekonomi </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="sektor_ekonomi" name="sektor_ekonomi">
										<option value="">--pilih sektor ekonomi--</option>							
											<?php 
											foreach ($sektor_ekonomi as $data_sektor_ekonomi){
												echo '<option value="'.$data_sektor_ekonomi->SEKTOR_EKONOMI.'">'.$data_sektor_ekonomi->SEKTOR_EKONOMI.'</option>';                                                                    
											}
											?>	
									</select>																	
								</div>		

								<label class="col-sm-2">Jenis Pinjaman </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="jenis_pinjaman" name="jenis_pinjaman">
										<option value="">--pilih pinjaman--</option>	
											<?php 
											foreach ($jenis_pinjaman as $data_jenis_pinjaman){
												echo '<option value="'.$data_jenis_pinjaman->Jenis_pinjaman.'">'.$data_jenis_pinjaman->Jenis_pinjaman.'</option>';                                                                    
											}
											?>								
									</select>																	
								</div>										
							</div>		
							<div class="form-group row">
								<label class="col-sm-2">Jenis Program </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="jenis_program" name="jenis_program">
										<option value="">--pilih program--</option>	
											<?php 
											foreach ($jenis_program as $data_jenis_program){
												echo '<option value="'.$data_jenis_program->Jenis_program.'">'.$data_jenis_program->Jenis_program.'</option>';                                                                    
											}
											?>							
									</select>																	
								</div>	

								<label class="col-sm-2">Tipe Kredit </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="tipe_kredit" name="tipe_kredit">
										<option value="">--pilih program--</option>	
										<option value="1">Baru</option>	
										<option value="2">Top Up</option>	
										<option value="3">3R</option>								
									</select>																	
								</div>									
									
							</div>	
							<div class="form-group row">	
											<label class="col-sm-2">Cabang </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="cabang_kehadiran" name="cabang_kehadiran">
										<option value="">--pilih cabang--</option>	
											<?php 
											foreach ($cabang as $data_cabang){
												echo '<option value="'.$data_cabang->KODE_CABANG.'">'.$data_cabang->DESKRIPSI.'</option>';                                                                    
											}
											?>								
									</select>																	
								</div>	
								<label class="col-sm-2">Unit </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="unit_kehadiran" name="unit_kehadiran">
										<option value="">--pilih unit--</option>										
									</select>																	
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="table-style">
								<table id="datatable_kehadiran_ulamm" class="table table-hover table-responsive">                                     
								<thead>
									<tr>
										<th>ID NASABAH</th>
										<th>KTP</th>
										<th>NAMA NASABAH</th>
										<th>NO. HANDPHONE</th>
										<th>KOLEKTIBILITAS</th>
										<th>CABANG</th>
										<th>UNIT</th>
										<th>TIPE KREDIT</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
									</table>
								
								</div>
							</div>
						</div>												




				</div>
				<div id="kehadiran_mekaar" class="tab-pane fade">

					<div class = "table-style" style = "padding : 25px">
							<div class="form-group row">															
								<label class="col-sm-2">Sektor Ekonomi </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="sektor_ekonomi_mekaar" name="sektor_ekonomi_mekaar">
										<option value="">--pilih sektor ekonomi--</option>							
											<?php 
											foreach ($sektor_ekonomi_mekaar as $data_sektor_ekonomi_mekaar){
												echo '<option value="'.$data_sektor_ekonomi_mekaar->ID_SUB_SEKTOR.'">'.$data_sektor_ekonomi_mekaar->SEKTOR.' - '.$data_sektor_ekonomi_mekaar->SUB_SEKTOR.'</option>';                                                                    
											}
											?>	
									</select>																	
								</div>		

								<label class="col-sm-2">Siklus Kredit </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="siklus_kredit" name="siklus_kredit">
										<option value="">--pilih siklus--</option>							
										<option value="1">Siklus 1</option>							
										<option value="2">Siklus 2</option>							
										<option value="3">Siklus 3</option>								
										<option value="4">Siklus 4</option>								
										<option value="5">Siklus 5</option>								
										<option value="6">Siklus 6</option>								
										<option value="7">Siklus 7</option>								
										<option value="8">Siklus 8</option>								
										<option value="9">Siklus 9</option>								
										<option value="10">Siklus 10</option>								
									</select>																	
								</div>																																		
							</div>	

							<div class="form-group row">															
								<label class="col-sm-2">Region </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="regional_mekaar" name="regional_mekaar">
										<option value="">--pilih region--</option>							
											<?php 
											foreach ($regional_mekaar as $data_regional_mekaar){
												echo '<option value="'.$data_regional_mekaar->KODE_REGION.'">'.$data_regional_mekaar->DESKRIPSI.'</option>';                                                                    
											}
											?>	
									</select>																	
								</div>	

								<label class="col-sm-2">Area </label>
								<div class="col-sm-4">
									<select class="form-control select2" id="area_mekaar" name="area_mekaar">
									</select>																	
								</div>																																				
							</div>												
						</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="table-style">
									<table id="datatable_kehadiran_mekaar" class="table table-hover table-responsive">                                     
									<thead>
										<tr>
											<th>KTP</th>
											<th>NAMA NASABAH</th>
											<th>ALAMAT</th>
											<th>PRODUK</th>
											<th>REGION</th>
											<th>AREA</th>
											<th>SIKLUS</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
										</table>
									
									</div>
								</div>
							</div>												
				</div>
				<div id="non_nasabah" class="tab-pane fade">
						<div class = "table-style" style = "padding : 25px">

						<?php 

						$attrib = array('class' => 'form-horizontal','id'=>'add_non_nasabah','name'=>'add_non_nasabah','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
						echo form_open('',$attrib); 
						?>	
						<div class="form-group row">
						<div class="modal-header">
							<div id="judul_modal">
							<h4>Input Non Nasabah</h4>
							</div>
						</div>
						</div>
						
							<div class="form-group row">															
								<label class="col-sm-2"> KTP </label>
								<div class="col-sm-4">
								<input type="text" class="form-control"  required="" id="ktp" name="ktp" />															
								</div>

								<label class="col-sm-2"> No Hp <span class="text-danger"></span></label>
								<div class="col-sm-4">
								<input type="text" class="form-control"  required="" id="no_hp" name="no_hp" />
								</div>											
							</div>

							<div class="form-group row">
								<label class="col-sm-2"> Nama </label>
								<div class="col-sm-4">
								<input type="text" class="form-control"  required="" id="nama" name="nama" />																
								</div>

								<label class="col-sm-2"> Lokasi PNM <span class="text-danger"></span></label>
								<div class="col-sm-4">
								<input type="text" class="form-control"  required="" id="lokasi_pnm" name="lokasi_pnm" />
								</div>				
							</div>

							<div class="form-group row">	
								<label class="col-sm-2"> Alamat </label>
								<div class="col-sm-4">
								<input type="text" class="form-control"  required="" id="alamat" name="alamat" />													
								</div>

								<label class="col-sm-2"> Catatan <span class="text-danger"></span></label>
								<div class="col-sm-4">					
								<textarea class="form-control rounded-0" id="catatan" name="catatan" rows="3"></textarea>
								</div>				
							</div>	

							<div class="modal-footer">
							<?php echo form_submit('submit', 'Simpan', 'class="btn btn-primary submit"'); ?>
							</div>
							<?php echo form_close(); ?>

						</div>
				
						
						<div class="row">
							<div class="col-lg-12">
								<div class="table-style">
								<table id="datatable_kehadiran_non_nasabah" class="table table-hover table-responsive">                                     
									<thead>
										<tr>
											<th>KTP</th>
											<th>NAMA NASABAH</th>
											<th>NO. HANDPHONE</th>
											<th>ALAMAT</th>
											<th>CABANG</th>
											<th>UNIT</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
								
								</div>
							</div>
						</div>												
						</div>	
				</div>
		</div>
	</div>
</div>			
<!-- END MAIN CONTENT-->
