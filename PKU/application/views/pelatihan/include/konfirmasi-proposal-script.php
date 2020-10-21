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


<script src="<?php echo base_url() ?>assets/js/googlejs.js"></script>

<script src="<?php echo base_url() ?>assets/js/locationpicker.jquery.min.js"></script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyCwGoo1jtr3HgU66bulwQ6qDI4CJqpgJjU"></script>


<script type="text/javascript">
    $(document).ready(function() {	
		$('#datatable').DataTable({	
			"paging": true,
			"processing": true,
			"serverSide": false,			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>"
		});								
	});

	$(document).on("click", ".pelatihan_details", function () {			
				
				$('#pelatihan_type_details').html('<option value="'+$(this).data('pelatihantype')+'">'+$(this).data('pelatihantiddeskripsi')+'</option>');		
				$('#cabang_pelatihan_details').val($(this).data('pelatihancabang'));		
				$('#cabang_pelatihan_details').trigger('change');							
				$('#unit_pelatihan_details').val($(this).data('pelatihanunit'));		
				$('#judul_pelatihan_details').val($(this).data('pelatihantitle'));		
				$('#deskripsi_pelatihan_details').val($(this).data('pelatihandeskripsi'));		
				$('#input-limit-datepicker_details').val($(this).data('pelatihantanggal'));		
				$('#durasi_pelatihan_details').val($(this).data('pelatihandurasi'));		
				$('#kuota_peserta_details').val($(this).data('pelatihankuota'));		
				$('#anggaran_details').val($(this).data('pelatihananggaran'));		
				$('#provinsi_details').val($(this).data('pelatihanprovinsi'));		
				$('#alamat_tempat_pelatihan_details').val($(this).data('pelatihanalamat'));
				$('#kabkot_details').val($(this).data('pelatihankabkot'));		
				$('#kecamatan_details').val($(this).data('pelatihankecamatan'));		
				//$('#lokasi_pelatihan_details').val($(this).data('pelatihanlokasi'));		
				//$('#radius_details').val($(this).data('pelatihanlradius'));		
				//$('#latitude_details').val($(this).data('pelatihanlongitude'));		
				//$('#longitude_details').val($(this).data('pelatihanlatitude'));						
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


	$(document).on("click", ".pelatihan_approval", function () {			
		var pelatihanid = $(this).data('pelatihanid');	
		var gradingid = $(this).data('gradingid');	
		
		$('#id_pelatihan').val(pelatihanid);
		$('#draft_proposal').html('<iframe style="width: 100%;height: 550px;"  src="<?php echo $this->config->item("jasper_report"); ?>Pelatihan.html?ID='+pelatihanid+'" title="PDF in an i-Frame" frameborder="1" scrolling="auto"></iframe>');		
		
		$.ajax({
			url: "<?php echo base_url()?>master/get_grading",
			data: "id_grading="+gradingid,
			cache: false,
			success: function(data){				         
				$('#grading').html(data)           
			}
		});
		
	});	
</script>