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

<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyCwGoo1jtr3HgU66bulwQ6qDI4CJqpgJjU"></script>


<script type="text/javascript">

    $(document).on("click", ".modaldhistory", function () {		

				
				$('#pelatihan_type_details').html('<option value="'+$(this).data('pelatihantype')+'">'+$(this).data('pelatihantitle')+'</option>');
                $('#cabang_pelatihan_details').html('<option value="'+$(this).data('pelatihancabang')+'">'+$(this).data('pelatihancabang')+'</option>');		
				//$('#cabang_pelatihan_details').val($(this).data('pelatihancabang'));
                //$('#cabang_pelatihan_details').trigger('change');		
				$('#judul_pelatihan_details').val($(this).data('pelatihantitle'));							
				$('#unit_pelatihan_details').val($(this).data('pelatihanunit'));				
				$('#deskripsi_pelatihan_details').val($(this).data('pelatihandeskripsi'));		
				$('#input-limit-datepicker').val($(this).data('pelatihantanggal'));		
				$('#durasi_pelatihan_details').val($(this).data('pelatihandurasi'));				
				$('#kuota_peserta_details').val($(this).data('pelatihankuota'));
                $('#anggaran_details').val($(this).data('pelatihananggaran'));		
				$('#provinsi_details').val($(this).data('pelatihanprovinsi'));		
				$('#alamat_tempat_pelatihan_details').val($(this).data('pelatihanalamat'));		
				$('#lokasi_pelatihan_details_details').val($(this).data('pelatihanlokasi'));		
				$('#radius_details').val($(this).data('pelatihanlradius'));		
				$('#latitude_details').val($(this).data('pelatihanlatitude'));		
				$('#longitude_details').val($(this).data('pelatihanlongitude'));				
				
				$("#add_pelatihan :input").prop("disabled", false);				
				
				$("#tbody_rab").html('<tr class="d-none"><td ><input type="text" class="form-control" id="deskripsi_rab" name="deskripsi_rab[]" value=""></td><td ><input type="number" class="form-control" id="jumlah_rab" name="jumlah_rab[]"></td><td ><input type="text" class="form-control" id="unit_rab" name="unit_rab[]" value=""></td><td ><input type="number" class="form-control" id="unit_cost_rab" name="unit_cost_rab[]" value=""></td><td ><input type="number" class="form-control" id="total_cost_rab" name="total_cost_rab[]" value="" readonly=""></td><td><a class="table-remove btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a></td><td>                            <a class="table-up btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   <a class="table-down btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a></td></tr>');
		
				$.ajax({
					url: "<?php echo base_url()?>pelatihan/get_rab",
					data: "pelatihanid="+$(this).data("pelatihanid"),
					cache: false,
					success: function(data){				         
					$('#table_rab_details').html(data);    
					calculate_grand_total_history();
					}	
				});	
								
	});






</script>       