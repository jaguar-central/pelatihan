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


<!-- <script src="<?php echo base_url() ?>assets/js/googlejs.js"></script>

<script src="<?php echo base_url() ?>assets/js/locationpicker.jquery.min.js"></script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyCwGoo1jtr3HgU66bulwQ6qDI4CJqpgJjU"></script> -->


<script type="text/javascript">

	$(document).ready(function() {	
		$('#datatable').DataTable({
			"aaSorting" : [],	
			"paging": true,
			"processing": true,
			"serverSide": false,			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>"
		});																
	});

    $(document).on("click", ".modaldetails", function () {		

				
				$('#pelatihan_type_details').html('<option value="'+$(this).data('pelatihantype')+'">'+$(this).data('pelatihantypedeskripsi')+'</option>');
                $('#region_pelatihan_details').val($(this).data('pelatihanregional'));	
                $('#region_pelatihan_details').trigger('change');		
                $('#area_pelatihan_details').val($(this).data('pelatihanarea'));
                $('#cabang_pelatihan_details').val($(this).data('pelatihancabang'));                
				$('#judul_pelatihan_details').val($(this).data('pelatihantitle'));							
				$('#unit_pelatihan_details').val($(this).data('pelatihanunit'));				
				$('#deskripsi_pelatihan_details').val($(this).data('pelatihandeskripsi'));		
				$('#input-limit-datepicker').val($(this).data('pelatihantanggal'));		
				$('#durasi_pelatihan_details').val($(this).data('pelatihandurasi'));				
				$('#kuota_peserta_details').val($(this).data('pelatihankuota'));
                $('#anggaran_details').val($(this).data('pelatihananggaran'));		
				$('#provinsi_details').val($(this).data('pelatihanprovinsi'));		
				$('#kabkot_details').val($(this).data('pelatihankabkot'));		
				$('#kecamatan_details').val($(this).data('pelatihankecamatan'));	
				$('#alamat_tempat_pelatihan_details').val($(this).data('pelatihanalamat'));						
                $('#pembicara_pelatihan_details').val($(this).data('pelatihanpembicara'));				
				
				$("#add_pelatihan :input").prop("disabled", false);				
				
				$("#tbody_rab_details").html('<tr class="d-none"><td ><input type="text" class="form-control" id="deskripsi_rab" name="deskripsi_rab[]" value=""></td><td ><input type="number" class="form-control" id="jumlah_rab" name="jumlah_rab[]"></td><td ><input type="text" class="form-control" id="unit_rab" name="unit_rab[]" value=""></td><td ><input type="number" class="form-control" id="unit_cost_rab" name="unit_cost_rab[]" value=""></td><td ><input type="number" class="form-control" id="total_cost_rab" name="total_cost_rab[]" value="" readonly=""></td><td><a class="table-remove btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a></td><td>                            <a class="table-up btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   <a class="table-down btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a></td></tr>');
		
				$.ajax({
					url: "<?php echo base_url()?>pelatihan/get_rab",
					data: "pelatihanid="+$(this).data("pelatihanid")+"&tipe_modal=details",
					cache: false,
					success: function(data){				         
						$('#tbody_rab_details').html(data);    
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


	$(document).on("click", ".modallpjdetails", function () {		

										
		$('#tanggallpj').val($(this).data('pelatihantanggal'));				
		$('#csi_final').val($(this).data('pelatihancsifinal'));							
		$('#catatan_tambahan').val($(this).data('pelatihancatatan'));					
		$('#durasi_tampilan').val($(this).data('pelatihandurasi'));					

		$("#tbody_rab_modallpj").html('<tr class="d-none"><td ><input type="text" class="form-control" id="deskripsi_rab" name="deskripsi_rab[]" value=""></td><td ><input type="number" class="form-control" id="jumlah_rab" name="jumlah_rab[]"></td><td ><input type="text" class="form-control" id="unit_rab" name="unit_rab[]" value=""></td><td ><input type="number" class="form-control" id="unit_cost_rab" name="unit_cost_rab[]" value=""></td><td ><input type="number" class="form-control" id="total_cost_rab" name="total_cost_rab[]" value="" readonly=""></td><td><a class="table-remove btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a></td><td>                            <a class="table-up btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   <a class="table-down btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a></td></tr>');

		$.ajax({
			url: "<?php echo base_url()?>pelatihan/get_rab_lpj",
			data: "pelatihanid="+$(this).data("pelatihanid")+"&tipe_modal=modallpj",
			cache: false,
			success: function(data){				         
				$('#tbody_rab_modallpj').html(data);    
				var total_lpj = 0;
				$('tr #total_cost_rab_modallpj').each(function () {            
				var total_cost_rab_lpj = $(this).val();			
				if (!isNaN(total_cost_rab_lpj) && total_cost_rab_lpj.length !== 0) {
					total_lpj += parseFloat(total_cost_rab_lpj);
				}
				});

				console.log('total_lpj',total_lpj);
				var rowCount = $('tr #total_cost_rab_akhir_modallpj').length;
				$("#total_cost_rab_akhir_modallpj").val(total_lpj);
			}	
		});	


		// $('#datatable_listkehadiran').DataTable({	
		// 	"paging": true,
		// 	"processing": true,
		// 	"serverSide": true,
		// 	"ajax": {
		// 	"url" : '<?php echo base_url(); ?>'+'pelatihan/get_kehadiran/'+$(this).data("pelatihanid"),
		// 	"type" :'GET'                      
		// 	},
		// 	"columnDefs": [
		// 		{ "className": "col-md-2", targets: "_all" },
		// 	],				
		// 	"columns" : [
		// 		{ "data": "ID_NASABAH" },
		// 		{ "data": "KTP", render: function (data, type, row)
		// 		    {
		// 				return '<input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.KTP+'">'+row.KTP;
		// 			}
		// 		},
		// 		{ "data": "BISNIS" },
		// 		{ "data": "NAMA" },
		// 		{ "data": "NASABAH_TIPE" },				
		// 		{ "data": "ID_TIPE_KREDIT"},					
		// 	],
		// 	"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>",
		// 	"createdRow" : function (row, data, index) {
		// 		$(row).addClass("remove-kehadiran");      
		// 	}
		// });				
						
	});



</script>       