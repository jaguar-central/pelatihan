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

<script type="text/javascript">

    $(document).ready(function() {		
		
		var table = $('#datatable').DataTable({	
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('nasabah/get_paging_nasabah_mekaar'); ?>',
			"type" :'GET'                      
			},
			"columns" : [
				{ "data": "noktp" },
				{ "data": "nama" },
				{ "data": "alamat" },
				{ "data": "produk" },
				{ "data": "region" },
				{ "data": "area" },
			],			
			"pagingType": "simple",
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>"
		});
		
		
		// $("div.dataTables_filter input").unbind();
		// $("div.dataTables_filter input").keyup( function (e) {
			// if (e.keyCode == 13) {
			// table.search( this.value ).draw();
			// }
		// });
							
		
	});

     
</script>       