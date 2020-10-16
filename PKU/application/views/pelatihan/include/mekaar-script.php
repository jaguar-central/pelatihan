<!-- Required datatable js -->

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->

<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

<!-- Modal-Effect -->

<script src="<?php echo base_url(); ?>assets/plugins/custombox/js/custombox.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/custombox/js/legacy.min.js"></script>

<!-- Responsive examples -->

<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>

<script src="http://cdn.datatables.net/plug-ins/1.10.13/dataRender/datetime.js"></script>


<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>


<script src="<?php echo base_url() ?>assets/js/googlejs.js"></script>

<script src="<?php echo base_url() ?>assets/js/locationpicker.jquery.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/autoNumeric.js"></script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyCwGoo1jtr3HgU66bulwQ6qDI4CJqpgJjU"></script>


<script type="text/javascript">

	$(document).on("click", ".project_charter", function () {	
		console.log('project_charter');
		var pelatihantype = $(this).data('pelatihantype');	
		var pelatihantitle = $(this).data('pelatihantitle');    										
		$('#type_klasterisasi').html('<option value="'+pelatihantype+'">'+pelatihantitle+'</option>');			
		$('#modaladdklasterisasi').modal('show');
	});	

    $(document).ready(function() {	
		$('#datatable').DataTable({
            "aaSorting" : [],	
			"paging": true,
			"processing": true,
			"serverSide": false,			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>"
		});																
	});
	
	
	$(document).on("click", ".add_pelatihan", function () {			
		$('#add_pelatihan').trigger("reset");
		var pelatihantype = $(this).data('pelatihantype');	
		var pelatihantitle = $(this).data('pelatihantitle');
		
		$("#add_pelatihan :input").prop("disabled", false);
		$('#pelatihan_type').html('<option value="'+pelatihantype+'">'+pelatihantitle+'</option>');		
		$('.select_project_charter').hide();  
		$("#tema_project_charter").prop('required',false);
		$("#judul_project_charter").prop('required',false);
	});					

	$(document).on("click", ".add_pelatihan_project_charter", function () {
		$('#add_pelatihan').trigger("reset");
		var pelatihantype = $(this).data('pelatihantype');	
		var pelatihantitle = $(this).data('pelatihantitle');
		
		$("#add_pelatihan :input").prop("disabled", false);
		$('#pelatihan_type').html('<option value="'+pelatihantype+'">'+pelatihantitle+'</option>');			  
		$('.select_project_charter').show();  
		$("#tema_project_charter").prop('required',true);
		$("#judul_project_charter").prop('required',true);

		$.get("<?php echo base_url() ?>pelatihan/get_list_project_charter",{ tipepelatihan:pelatihantype }, function(data, status){
			if (data){
				$('#pilih_project_charter').html(data);	
			}
		});
	});	
	  
	$(document).on("click", ".pelatihan_details", function () {			
				
		$('#pelatihan_type_details').html('<option value="'+$(this).data('pelatihantype')+'">'+$(this).data('pelatihantitle')+'</option>');		
				
		$('#cabang_pelatihan_details').trigger('change');							
		$('#region_pelatihan_details').val($(this).data('pelatihanregion'));		
		$('#area_pelatihan_details').val($(this).data('pelatihanarea'));		
		$('#cabang_pelatihan_details').val($(this).data('pelatihancabang'));
		$('#judul_pelatihan_details').val($(this).data('pelatihantitle'));		
		$('#deskripsi_pelatihan_details').val($(this).data('pelatihandeskripsi'));		
		$('#input-limit-datepicker_details').val($(this).data('pelatihantanggal'));		
		$('#durasi_pelatihan_details').val($(this).data('pelatihandurasi'));		
		$('#kuota_peserta_details').val($(this).data('pelatihankuota'));		
		$('#anggaran_details').val($(this).data('pelatihananggaran'));		
		$('#provinsi_details').val($(this).data('pelatihanprovinsi'));		
		$('#alamat_tempat_pelatihan_details').val($(this).data('pelatihanalamat'));		
		$('#lokasi_pelatihan_details').val($(this).data('pelatihanlokasi'));		
		$('#radius_details').val($(this).data('pelatihanlradius'));		
		$('#latitude_details').val($(this).data('pelatihanlongitude'));		
		$('#longitude_details').val($(this).data('pelatihanlatitude'));						
		$('#pembicara_pelatihan_details').val($(this).data('pelatihanpembicara'));	
		$('#input-limit-datepicker').val($(this).data('pelatihantanggal'));							
				
		$.ajax({
			url: "<?php echo base_url()?>pelatihan/get_rab",
			data: "pelatihanid="+$(this).data("pelatihanid")+"&tipe_modal=details",
			cache: false,
			success: function(data){				         
				$('#table_rab_details').html(data);    
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
		});	
						
	});	

	$(document).on("click", ".pelatihan_edit", function () {			
				
		$('#id_pelatihan').val($(this).data('pelatihanid'));	
		$('#pelatihan_type_edit').html('<option value="'+$(this).data('pelatihantype')+'">'+$(this).data('pelatihantiddeskripsi')+'</option>');		
		$('#regional_mekaar_edit').val($(this).data('pelatihanregion'));		
		// $('#cabang_pelatihan').trigger('change');							
		// $('#unit_pelatihan').val($(this).data('pelatihanunit'));		
		$('#judul_pelatihan_edit').val($(this).data('pelatihantitle'));		
		$('#area_mekaar_edit').val($(this).data('pelatihanarea'));	
		$('#deskripsi_pelatihan_edit').val($(this).data('pelatihandeskripsi'));	
		$('#cabang_mekaar_edit').val($(this).data('pelatihancabang'));
		
		var dateawal = moment($(this).data('pelatihantanggalmulai'));
		var dateakhir = moment($(this).data('pelatihantanggalselesai'));
		$('#timeawal_edit').val(dateawal.format('YYYY-MM-DD hh:mm A'));	
		$('#timeakhir_edit').val(dateakhir.format('YYYY-MM-DD hh:mm A'));

		$('#inputStartTglPelaksanaan_edit').val(dateawal.format('YYYY-MM-DD'));
		$('#inputStartTimePelaksanaan_edit').val(dateawal.format('hh:mm A'));
		$('#inputAkhirTglPelaksanaan_edit').val(dateawal.format('YYYY-MM-DD'));
		$('#inputEndTimePelaksanaan_edit').val(dateawal.format('hh:mm A'));
							
		$('#anggaran_edit').val($(this).data('pelatihananggaran'));	
		new AutoNumeric("#anggaran_edit","commaDecimalCharDotSeparator");	
		$('#grading_edit').val($(this).data('pelatihangrading'));	
		$('#pembicara_pelatihan_edit').val($(this).data('pelatihanpembicara'));		
		$('#durasi_pelatihan_edit').val($(this).data('pelatihandurasi'));		
		$('#kuota_peserta_edit').val($(this).data('pelatihankuota'));		
		$('#anggaran_edit').val($(this).data('pelatihananggaran'));		
		$('#provinsi_edit').val($(this).data('pelatihanprovinsi'));		
		$('#alamat_tempat_pelatihan_edit').val($(this).data('pelatihanalamat'));		
		$('#lokasi_pelatihan_edit').val($(this).data('pelatihanlokasi'));		
		$('#radius_edit').val($(this).data('pelatihanlradius'));		
		$('#latitude_edit').val($(this).data('pelatihanlongitude'));		
		$('#longitude_edit').val($(this).data('pelatihanlatitude'));				
		
		$("#add_pelatihan :input").prop("disabled", false);				
		
		$.ajax({
			url: "<?php echo base_url()?>pelatihan/get_rab",
			data: "pelatihanid="+$(this).data("pelatihanid")+"&tipe_modal=edit",
			cache: false,
			success: function(data){				         
				$('#tbody_rab_edit').html('<tr class="d-none"><td ><input type="text" class="form-control" id="deskripsi_rab_edit" name="deskripsi_rab_edit[]" value=""></td><td ><input type="number" class="form-control" id="jumlah_rab_edit" name="jumlah_rab_edit[]"></td><td ><input type="text" class="form-control" id="unit_rab_edit" name="unit_rab_edit[]" value=""></td><td ><input type="number" class="form-control" id="unit_cost_rab_edit" name="unit_cost_rab_edit[]" value=""></td><td ><input type="number" class="form-control" id="total_cost_rab_edit" name="total_cost_rab_edit[]" value="" readonly=""></td><td><a class="table-remove-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a></td><td><a class="table-up-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a><a class="table-down-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a></td></tr> ');
				$('#tbody_rab_edit').append(data);    
				calculate_grand_total_edit();
			}
		});	
						
	});

	$(document).on("click", ".submit_proposal", function () {					
		var idpelatihan = $(this).data('idpelatihan');	
		var judulpelatihan = $(this).data('judulpelatihan');		
		
		Swal.fire({
		  title: 'Apakah anda yakin?',
		  text: "submit proposal "+judulpelatihan,
		  icon: 'question',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Submit'
		}).then((result) => {
		  if (result.value) {				
			$.post("post_submit_proposal",{pelatihanid: idpelatihan}, function(data, status){
				if (status=='success'){
					Swal.fire({
					  position: 'center',
					  icon: 'success',
					  title: 'Pelatihan telah di submit',
					  showConfirmButton: false,
					  timer: 1500
					})
					setTimeout(function () {
						window.location.href = '<?php echo base_url(); ?>pelatihan/mekaar';
					}, 1600);
				}else{
					Swal.fire({
					  position: 'center',
					  icon: 'error',
					  title: obj.msg,
					  showConfirmButton: false,
					  timer: 1500
					})					
				}			
			});	
		  }
		})			
	});

	$(document).on("click", ".pelatihan_lpj", function () {							
		$('#id_pelatihan').val($(this).data('pelatihanid'));													
	});

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
				{ "data": "TITLE" },
				{ "data": "REGIONAL_MEKAAR" },
				{ "data": "AREA_MEKAAR" },    
				{ "data": "CABANG_MEKAAR" },    
				{ "data": "TANGGAL_MULAI" },    
				{ "data": "STATUS" },    
				{ "data": "STATUS", render: function (data, type, row) 
					{
					  var tombol_action = '';
					  
					  tombol_action = '<div class="dropdown"><button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">Action<span class="caret"></span></button><div class="dropdown-menu">';
					  
					  if (row.STATUS=='draft' || row.STATUS=='approved' || row.STATUS=='lpj_draft')
					  {
						tombol_action +='<a class="dropdown-item pelatihan_details" href="#" data-toggle="modal" data-target="#modaldetails" '
						+'data-pelatihanid="'+row.ID+'" '
						+'data-pelatihantype="'+row.ID_TIPE+'" '						
						+'data-pelatihantitle="'+row.TITLE+'" '
						+'data-pelatihanregion="'+row.REGIONAL_MEKAAR+'" '
						+'data-pelatihanarea="'+row.AREA_MEKAAR+'" '
						+'data-pelatihancabang="'+row.CABANG_MEKAAR+'" '
						+'data-pelatihancabangulamm="'+row.CABANG_ULAMM+'" '
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
						tombol_action +='<a class="dropdown-item pelatihan_edit" href="#" data-toggle="modal" '
						+'data-target="#modaledit" '
						+'data-pelatihanid="'+row.ID+'" '
						+'data-pelatihantype="'+row.ID_TIPE+'" '
						+'data-pelatihantiddeskripsi="'+row.ID_TIPE_DESKRIPSI+'" '						
						+'data-pelatihangrading="'+row.ID_GRADING+'" '
						+'data-pelatihantitle="'+row.TITLE+'" '
						+'data-pelatihanregion="'+row.REGIONAL_MEKAAR+'" '
						+'data-pelatihanarea="'+row.AREA_MEKAAR+'" '
						+'data-pelatihancabang="'+row.CABANG_MEKAAR+'" '						
						+'data-pelatihancabangulamm="'+row.CABANG_ULAMM+'" '
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
						tombol_action +='<div class="dropdown-divider"></div> <a id="submit_proposal" class="dropdown-item submit_proposal" data-idpelatihan="'+row.ID+'" data-judulpelatihan="'+row.TITLE+'"  href="#" > Submit Proposal</a></div></div> ';
					  }
					  
					  if (row.STATUS=='approved' || row.STATUS=='lpj_draft'){		
						tombol_action +='<a class= "dropdown-item" href="<?php  echo base_url('pelatihan/lpj/'); ?>'+row.ID+'/mekaar"> Pelatihan LPJ</a>'; 
					  }
					  
					if (row.STATUS=='lpj_approved'){
						tombol_action +='<a class="dropdown-item pelatihan_details" href="#" data-toggle="modal" '
						+'data-target="#modaldetails" '
						+'data-pelatihanid="'+row.ID+'" '
						+'data-pelatihantype="'+row.ID_TIPE+'" '
						+'data-pelatihantitle="'+row.TITLE+'" '
						+'data-pelatihanregion="'+row.REGIONAL_MEKAAR+'" '
						+'data-pelatihanarea="'+row.AREA_MEKAAR+'" '
						+'data-pelatihancabang="'+row.CABANG_MEKAAR+'" '						
						+'data-pelatihancabangulamm="'+row.CABANG_ULAMM+'" '
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