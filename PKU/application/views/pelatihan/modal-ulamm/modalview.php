<!-- Modal -->
<div id="modalview" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<div id="judul_modal">
				<h4>View Pelatihan</h4>
			</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<!--div class="main-content"-->
				<div class="section__content section__content--p10">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<!--h2 class="title-1 m-b-25">Earnings By Items</h2-->
								<div class="table-style">
									<table id="datatable_modalview" class="table table-bordered table-striped"> 
										<thead>
											<tr>
												<th>JENIS PELATIHAN</th>
												<th>CABANG</th>
												<th>UNIT</th>
												<th>TANGGAL PEMBUATAN</th>
												<th>TANGGAL PELATIHAN</th>
												<th>STATUS</th>
												<th>ACTION</th>
											</tr>
										</thead>
										<tbody>
											<?php /*
											foreach ($pelatihan as $data_1){
												echo '<tr>';
												echo '<td>'.$data_1->DESKRIPSI_PELATIHAN_TYPE.'</td>';
												echo '<td>'.$data_1->CABANG_PNM.'</td>'; 
												echo '<td>'.$data_1->UNIT_PNM.'</td>';
												echo '<td>'.$data_1->CREATED_DATE.'</td>'; 
												echo '<td>'.$data_1->TANGGAL_MULAI.'</td>';
												echo '<td>'.$data_1->STATUS.'</td>';												
												echo '<td> <div class="dropdown">
															  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
															  <span class="caret"></span></button>
															  <div class="dropdown-menu">';
												if ($data_1->STATUS=='draft' || $data_1->STATUS=='approved' || $data_1->STATUS=='lpj_draft')
												{				  
													echo '<a class="dropdown-item pelatihan_details" href="#" data-toggle="modal" data-target="#modaldetails" 
														data-pelatihanid="'.$data_1->ID.'"
														data-pelatihantype="'.$data_1->ID_TIPE.'"
														data-pelatihantitle="'.$data_1->TITLE.'"
														data-pelatihancabang="'.$data_1->CABANG_PNM.'"
														data-pelatihanunit="'.$data_1->UNIT_PNM.'"
														data-pelatihandeskripsi="'.$data_1->DESKRIPSI.'"
														data-pelatihantanggal="'.$data_1->TANGGAL_MULAI.' - '.$data_1->TANGGAL_SELESAI.'"
														data-pelatihandurasi="'.$data_1->DURASI_PELATIHAN.'"
														data-pelatihankuota="'.$data_1->KUOTA_PESERTA.'"
														data-pelatihananggaran="'.$data_1->BUDGET.'"
														data-pelatihanprovinsi="'.$data_1->PROVINSI.'"
														data-pelatihanalamat="'.$data_1->ALAMAT.'"
														data-pelatihanlokasi="'.$data_1->LOKASI.'"
														data-pelatihanlradius="'.$data_1->RADIUS.'"
														data-pelatihanlongitude="'.$data_1->LONGITUDE.'"
														data-pelatihanlatitude="'.$data_1->LATITUDE.'"
														data-pelatihanpembicara="'.$data_1->PEMBICARA.'"
														> Details</a>';
														
													echo '<a class="dropdown-item pelatihan_edit" href="#" data-toggle="modal" data-target="#modaledit" 
														data-pelatihanid="'.$data_1->ID.'"
														data-pelatihantype="'.$data_1->ID_TIPE.'"
														data-pelatihantitle="'.$data_1->TITLE.'"
														data-pelatihancabang="'.$data_1->CABANG_PNM.'"
														data-pelatihanunit="'.$data_1->UNIT_PNM.'"
														data-pelatihandeskripsi="'.$data_1->DESKRIPSI.'"
														data-pelatihantanggal="'.$data_1->TANGGAL_MULAI.' - '.$data_1->TANGGAL_SELESAI.'"
														data-pelatihandurasi="'.$data_1->DURASI_PELATIHAN.'"
														data-pelatihankuota="'.$data_1->KUOTA_PESERTA.'"
														data-pelatihananggaran="'.$data_1->BUDGET.'"
														data-pelatihanprovinsi="'.$data_1->PROVINSI.'"
														data-pelatihanalamat="'.$data_1->ALAMAT.'"
														data-pelatihanlokasi="'.$data_1->LOKASI.'"
														data-pelatihanlradius="'.$data_1->RADIUS.'"
														data-pelatihanlongitude="'.$data_1->LONGITUDE.'"
														data-pelatihanlatitude="'.$data_1->LATITUDE.'"
														data-pelatihanpembicara="'.$data_1->PEMBICARA.'"
														> Edit</a>';
													echo '<a class= "dropdown-item" target="_blank" href="'.$this->config->item("jasper_report").			   'Pelatihan.pdf?ID='.$data_1->ID.'"> Unduh Proposal</a>';														
												}
												if ($data_1->STATUS=='draft'){											

													echo '<a id="submit_proposal" class="dropdown-item submit_proposal" data-idpelatihan="'.$data_1->ID.'" data-judulpelatihan="'.$data_1->TITLE.'"  href="#" > Submit Proposal</a>';							
													echo '</div>
														  </div> '; 
												}
												if ($data_1->STATUS=='approved' || $data_1->STATUS=='lpj_draft'){	
													echo '<a class= "dropdown-item" href="'.base_url("pelatihan/kehadiran/".$data_1->ID).'">Kehadiran</a>';
												}
												if ($data_1->STATUS=='lpj_draft'){
													echo '<a class= "dropdown-item pelatihan_lpj" href="#" data-toggle="modal" data-target="#modallpj" data-pelatihanid="'.$data_1->ID.'" >Pelatihan LPJ</a>';
												}
												
											

												else if ($data_1->STATUS=='lpj_approved')
												{				  
													echo '<a class="dropdown-item pelatihan_details" href="#" data-toggle="modal" data-target="#modaldetails" 
														data-pelatihanid="'.$data_1->ID.'"
														data-pelatihantype="'.$data_1->ID_TIPE.'"
														data-pelatihantitle="'.$data_1->TITLE.'"
														data-pelatihancabang="'.$data_1->CABANG_PNM.'"
														data-pelatihanunit="'.$data_1->UNIT_PNM.'"
														data-pelatihandeskripsi="'.$data_1->DESKRIPSI.'"
														data-pelatihantanggal="'.$data_1->TANGGAL_MULAI.' - '.$data_1->TANGGAL_SELESAI.'"
														data-pelatihandurasi="'.$data_1->DURASI_PELATIHAN.'"
														data-pelatihankuota="'.$data_1->KUOTA_PESERTA.'"
														data-pelatihananggaran="'.$data_1->BUDGET.'"
														data-pelatihanprovinsi="'.$data_1->PROVINSI.'"
														data-pelatihanalamat="'.$data_1->ALAMAT.'"
														data-pelatihanlokasi="'.$data_1->LOKASI.'"
														data-pelatihanlradius="'.$data_1->RADIUS.'"
														data-pelatihanlongitude="'.$data_1->LONGITUDE.'"
														data-pelatihanlatitude="'.$data_1->LATITUDE.'"
														> Details</a>';
	
													echo '<a class= "dropdown-item" target="_blank" href="'.$this->config->item("jasper_report").			   'Pelatihan.pdf?ID='.$data_1->ID.'"> Unduh Proposal Approved</a>';

													echo '<a class= "dropdown-item" target="_blank" href="'.$this->config->item("jasper_report").			   'Pelatihan.pdf?ID='.$data_1->ID.'"> Unduh LPJ Approved</a>';

													echo '</div>
														  </div> 
														</td>'; 

													echo '</tr>';
												}
											} */
											?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!--/div-->
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
  </div>
</div>		
<script>
	$(document).on("click", ".view_pelatihan", function () {
		var pelatihantype 	= $(this).data('pelatihantype');						
		var tipe_bisnis 	= $(this).data('pelatihanbisnis');	
		
		$('#datatable_modalview').DataTable().clear();
		$('#datatable_modalview').DataTable().destroy();

		$('#datatable_modalview').DataTable({			
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('pelatihan/get_paging_pelatihan/'); ?>'+pelatihantype+'/'+tipe_bisnis,
			"type" :'GET'                      
			},
			"columns" : [
				{ "data": "ID_TIPE_DESKRIPSI" },
				{ "data": "CABANG_ULAMM" },
				{ "data": "UNIT_ULAMM" },
				{ "data": "CREATED_DATE" },    
				{ "data": "TANGGAL_MULAI" },    
				{ "data": "STATUS" },    
				{ "data": "STATUS", render: function (data, type, row) 
					{
					  var tombol_action = '';
					  
					  tombol_action = '<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action<span class="caret"></span></button><div class="dropdown-menu">';
					  
					  if (row.STATUS=='draft' || row.STATUS=='approved' || row.STATUS=='lpj_draft')
					  {
						tombol_action +='<a class="dropdown-item pelatihan_details" href="#" data-toggle="modal" data-target="#modaldetails" '
						+'data-pelatihanid="'+row.ID+'"data-pelatihantype="'+row.ID_TIPE+'" '
						+'data-pelatihantitle="'+row.TITLE+'" '
						+'data-pelatihancabang="'+row.CABANG_ULAMM+'" '
						+'data-pelatihanunit="'+row.UNIT_ULAMM+'" '
						+'data-pelatihandeskripsi="'+row.DESKRIPSI+'" '
						+'data-pelatihantanggal="'+row.TANGGAL_MULAI+' - '+row.TANGGAL_SELESAI+'" '
						+'data-pelatihandurasi="'+row.DURASI_PELATIHAN+'" '
						+'data-pelatihankuota="'+row.KUOTA_PESERTA+'" '
						+'data-pelatihananggaran="'+row.BUDGET+'" '
						+'data-pelatihanprovinsi="'+row.PROVINSI+'" '
						+'data-pelatihanalamat="'+row.ALAMAT+'" '
						+'data-pelatihanlokasi="'+row.LOKASI+'" '
						+'data-pelatihanlradius="'+row.RADIUS+'" '
						+'data-pelatihanlongitude="'+row.LONGITUDE+'" '
						+'data-pelatihanlatitude="'+row.LATITUDE+'" '
						+'data-pelatihanpembicara="'+row.PEMBICARA+'"> Details</a>';
						tombol_action +='<a class="dropdown-item pelatihan_edit" href="#" data-toggle="modal" data-target="#modaledit" '
						+'data-pelatihanid="'+row.ID+'" '
						+'data-pelatihantype="'+row.ID_TIPE+'" '
						+'data-pelatihantitle="'+row.TITLE+'" '
						+'data-pelatihancabang="'+row.CABANG_ULAMM+'" '
						+'data-pelatihanunit="'+row.UNIT_ULAMM+'" '
						+'data-pelatihandeskripsi="'+row.DESKRIPSI+'" '
						+'data-pelatihantanggal="'+row.TANGGAL_MULAI+' - '+row.TANGGAL_SELESAI+'" '
						+'data-pelatihandurasi="'+row.DURASI_PELATIHAN+'" '
						+'data-pelatihankuota="'+row.KUOTA_PESERTA+'" '
						+'data-pelatihananggaran="'+row.BUDGET+'" '
						+'data-pelatihanprovinsi="'+row.PROVINSI+'" '
						+'data-pelatihanalamat="'+row.ALAMAT+'" '
						+'data-pelatihanlokasi="'+row.LOKASI+'" '
						+'data-pelatihanlradius="'+row.RADIUS+'" '
						+'data-pelatihanlongitude="'+row.LONGITUDE+'" '
						+'data-pelatihanlatitude="'+row.LATITUDE+'" '
						+'data-pelatihanpembicara="'+row.PEMBICARA+'"> Edit</a>';
						tombol_action += '<a class= "dropdown-item" target="_blank" href="<?php echo $this->config->item('jasper_report').'Pelatihan.pdf?ID=' ?>'+row.ID+'"> Unduh Proposal</a>';
					  }
					  
					  if (row.STATUS=='draft'){	
						tombol_action +='<a id="submit_proposal" class="dropdown-item submit_proposal" data-idpelatihan="'+row.ID+'" data-judulpelatihan="'+row.TITLE+'"  href="#" > Submit Proposal</a></div></div> ';
					  }
					  
					  if (row.STATUS=='approved' || row.STATUS=='lpj_draft'){		
						tombol_action +='<a class= "dropdown-item" href="<?php  echo base_url('pelatihan/lpj/'); ?>'+row.ID+'/ulamm"> Pelatihan LPJ</a>'; 
					  }
					  
					if (row.STATUS=='lpj_approved'){
						tombol_action +='<a class="dropdown-item pelatihan_details" href="#" data-toggle="modal" data-target="#modaldetails" '
						+'data-pelatihanid="'+row.ID+'" '
						+'data-pelatihantype="'+row.ID_TIPE+'" '
						+'data-pelatihantitle="'+row.TITLE+'" '
						+'data-pelatihancabang="'+row.CABANG_ULAMM+'" '
						+'data-pelatihanunit="'+row.UNIT_ULAMM+'" '
						+'data-pelatihandeskripsi="'+row.DESKRIPSI+'" '
						+'data-pelatihantanggal="'+row.TANGGAL_MULAI+' - '+row.TANGGAL_SELESAI+'" '
						+'data-pelatihandurasi="'+row.DURASI_PELATIHAN+'" '
						+'data-pelatihankuota="'+row.KUOTA_PESERTA+'" '
						+'data-pelatihananggaran="'+row.BUDGET+'" '
						+'data-pelatihanprovinsi="'+row.PROVINSI+'" '
						+'data-pelatihanalamat="'+row.ALAMAT+'" '
						+'data-pelatihanlokasi="'+row.LOKASI+'" '
						+'data-pelatihanlradius="'+row.RADIUS+'" '
						+'data-pelatihanlongitude="'+row.LONGITUDE+'" '
						+'data-pelatihanlatitude="'+row.LATITUDE+'" > Details</a>';
						
						tombol_action += '<a class= "dropdown-item" target="_blank" href="<?php echo $this->config->item('jasper_report').'Pelatihan.pdf?ID=' ?>'+row.ID+'"> Unduh Proposal Approved</a>';
						
						tombol_action += '<a class= "dropdown-item" target="_blank" href="<?php echo $this->config->item('jasper_report').'Pelatihan.pdf?ID=' ?>'+row.ID+'"> Unduh LPJ Approved</a>';
					}
					
					
					  tombol_action += '</div></div> </td>';					  
					  return tombol_action;
					} 
				},                         
			],
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>",
			"createdRow" : function (row, data, index) {
				$(row).addClass("add-kehadiran-non-nasabah");      
			}
		});	
				
										
		$('#modalview').modal({
			show: true
		}); 
		
	});		

</script>