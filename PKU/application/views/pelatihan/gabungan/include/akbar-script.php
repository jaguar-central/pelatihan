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

<!-- <script src="http://cdn.datatables.net/plug-ins/1.10.13/dataRender/datetime.js"></script> -->


<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>


<!-- <script src="<?php echo base_url() ?>assets/js/googlejs.js"></script> -->

<!-- <script src="<?php echo base_url() ?>assets/js/locationpicker.jquery.min.js"></script> -->


<script src="<?php echo base_url() ?>assets/js/autoNumeric.js"></script>

<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyCwGoo1jtr3HgU66bulwQ6qDI4CJqpgJjU"></script> -->

<script>
    $('#datatable').DataTable({
        "dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>"
    });



    $(document).on("click", ".gabungan-view", function () {			
        
        $('#judul_gabungan_view').val($(this).data('judul'));	

        $('#akbar_gabungan_view').DataTable().clear();
		$('#akbar_gabungan_view').DataTable().destroy();

        $('#akbar_gabungan_view').DataTable({			
			"paging": true,
			"processing": true,
			"serverSide": false,
			"ajax": {
			"url" : '<?php echo base_url('pelatihan/get_akbar_gabungan/'); ?>'+$(this).data('idakbargabungan'),
			"type" :'GET'                      
			},
			"columnDefs": [
    			{ "className": "col-md-2", targets: "_all" },
			],
			"columns" : [
				{ "data": "NO_PROPOSAL" },
				{ "data": "NO_TRX" },
				{ "data": "TITLE" },
				{ "data": "TANGGAL_MULAI" },    
				{ "data": "TANGGAL_SELESAI" },    
            ],
            "dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>",
			"createdRow" : function (row, data, index) {
				$(row).addClass("add-kehadiran-non-nasabah");      
			}
		});	
      
    });	
  


    $(document).on("click", ".delete_akbar_gabungan", function () {					
		var idakbargabungan = $(this).data('idakbargabungan');	
		
		Swal.fire({
		  title: 'Apakah anda yakin?',
		  text: "Hapus Pelatihan Akbar Gabungan",
		  icon: 'question',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Submit'
		}).then((result) => {
		  if (result.value) {				
			$.post("delete_akbar_gabungan",{idakbargabungan: idakbargabungan}, function(data, status){
				var obj = $.parseJSON(data);
				if (obj.result=='OK'){
					Swal.fire({
					  position: 'center',
					  icon: 'success',
					  title: 'Pelatihan akbar gabungan telah dihapus.',
					  showConfirmButton: false,
					  timer: 1500
					})
					setTimeout(function () {
						window.location.href = '<?php echo base_url(); ?>pelatihan/gabungan';
					}, 1600);
				}else{
					Swal.fire({
					  position: 'center',
					  icon: 'error',
					  title: obj.msg,
					  showConfirmButton: false,
					  timer: 2000
					})					
				}			
			});	
		  }
		})									
	});
</script>