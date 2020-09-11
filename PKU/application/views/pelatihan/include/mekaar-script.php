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
		$('.select_klasterisasi').hide();  
	});					

	$(document).on("click", ".add_pelatihan_klasterisasi", function () {
		$('#add_pelatihan').trigger("reset");
		var pelatihantype = $(this).data('pelatihantype');	
		var pelatihantitle = $(this).data('pelatihantitle');
		
		$("#add_pelatihan :input").prop("disabled", false);
		$('#pelatihan_type').html('<option value="'+pelatihantype+'">'+pelatihantitle+'</option>');			  
		$('.select_klasterisasi').show();  
		$("#klasterisasi").prop('required',true);
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
				
		$.ajax({
			url: "<?php echo base_url()?>pelatihan/get_rab",
			data: "pelatihanid="+$(this).data("pelatihanid"),
			cache: false,
			success: function(data){				         
				$('#table_rab_details').html(data);    
				calculate_grand_total_details();
			}
		});	
						
	});	

	$(document).on("click", ".pelatihan_edit", function () {			
				
		$('#pelatihan_type').html('<option value="'+$(this).data('pelatihantype')+'">'+$(this).data('pelatihantitle')+'</option>');		
		$('#cabang_pelatihan').val($(this).data('pelatihancabang'));		
		$('#cabang_pelatihan').trigger('change');							
		$('#unit_pelatihan').val($(this).data('pelatihanunit'));		
		$('#judul_pelatihan').val($(this).data('pelatihantitle'));		
		$('#deskripsi_pelatihan').val($(this).data('pelatihandeskripsi'));		
		$('#input-limit-datepicker').val($(this).data('pelatihantanggal'));		
		$('#durasi_pelatihan').val($(this).data('pelatihandurasi'));		
		$('#kuota_peserta').val($(this).data('pelatihankuota'));		
		$('#anggaran').val($(this).data('pelatihananggaran'));		
		$('#provinsi').val($(this).data('pelatihanprovinsi'));		
		$('#alamat_tempat_pelatihan').val($(this).data('pelatihanalamat'));		
		$('#lokasi_pelatihan').val($(this).data('pelatihanlokasi'));		
		$('#radius').val($(this).data('pelatihanlradius'));		
		$('#latitude').val($(this).data('pelatihanlongitude'));		
		$('#longitude').val($(this).data('pelatihanlatitude'));				
		
		$("#add_pelatihan :input").prop("disabled", false);				
		
		$("#tbody_rab").html('<tr class="d-none"><td ><input type="text" class="form-control" id="deskripsi_rab" name="deskripsi_rab[]" value=""></td><td ><input type="number" class="form-control" id="jumlah_rab" name="jumlah_rab[]"></td><td ><input type="text" class="form-control" id="unit_rab" name="unit_rab[]" value=""></td><td ><input type="number" class="form-control" id="unit_cost_rab" name="unit_cost_rab[]" value=""></td><td ><input type="number" class="form-control" id="total_cost_rab" name="total_cost_rab[]" value="" readonly=""></td><td><a class="table-remove btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a></td><td>                            <a class="table-up btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   <a class="table-down btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a></td></tr>');

						
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

</script>       