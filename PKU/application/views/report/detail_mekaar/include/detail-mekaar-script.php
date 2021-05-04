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

<script src="<?php echo base_url() ?>assets/js/autoNumeric.js"></script>

<script type="text/javascript">		

    $(document).ready(function() {	
		$('#datatable').DataTable({			
			"aaSorting" : [],	
			"paging": true,
			"processing": true,
			"serverSide": true,			
			"ajax": {
				"url": '<?php echo base_url('report/get_paging_report_detail/'); ?>',
				"type": 'POST',
				"data": {"tipe_bisnis":"2"}
			},
			"columns" : [
				{ "data": "NASABAH_TIPE" },
				{ "data": "ID_NASABAH" },
				{ "data": "NAMA" },    				
				{ "data": "PLAFOND" },
				{ "data": "WILAYAH" },
				{ "data": "DESKRIPSI_CABANG_ULAMM" },    
				{ "data": "DESKRIPSI_REGION_MEKAAR" }, 
				{ "data": "DESKRIPSI_CABANG_MEKAAR" }, 
				{ "data": "TIPE_PELATIHAN_DESKRIPSI" }, 
				{ "data": "NO_PROPOSAL" }, 
				{ "data": "NO_PROPOSAL" }, 
				{ "data": "TEMA_PELATIHAN" }, 
				{ "data": "TITLE" }, 
				{ "data": "SEKTOR_EKONOMI" }, 
				{ "data": "TANGGAL_MULAI" }, 
				{ "data": "TANGGAL_REALISASI_MULAI" }, 
				{ "data": "BUDGET" }, 
				{ "data": "GRADING" }, 
				{ "data": "KELAS_WARNA" }, 
			],	
			"dom": "<'tombol'>rt<'dom_datable col-md-6'i>p",
		});		
		
		$("div.tombol").html('<a class="btn btn-success m-2" href="<?php echo base_url('report/download_excel_report_detail_mekaar'); ?>" target="_blank">Download Excel</a>');		
	});
	
	
</script>       