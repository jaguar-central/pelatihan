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


<script type="text/javascript">		
	// $(document).ready(function() {	
	// 	$('.table-responsive').on('show.bs.dropdown', function () {
	// 		$('.table-responsive').css( "overflow", "inherit" );
	// 	});

	// 	$('.table-responsive').on('hide.bs.dropdown', function () {
	// 		$('.table-responsive').css( "overflow", "auto" );
	// 	})

	// });

	$(document).on("click", ".add_project_charter", function () {			
		var pelatihantype = $(this).data('pelatihantype');	
		var pelatihantitle = $(this).data('pelatihantitle');   

		$.get("<?php echo base_url() ?>pelatihan/get_no_project_charter", function(data, status){
			if (data){
				$('#no_project_charter').val(data);	
			}
		});
		
		$('#type_klasterisasi').html('<option value="'+pelatihantype+'">'+pelatihantitle+'</option>');			
		$('#modaladdprojectcharter').modal('show');
	});	

    $(document).ready(function() {	

		if (screen.width<660){
			$("#datatable").addClass("table-responsive"); 
		}else{
			$("#datatable").removeClass("table-responsive"); 
		}


		$('#datatable').DataTable({
			"aaSorting" : [],	
			"paging": true,
			"processing": true,
			"serverSide": false,			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>"
		});																
	});
	


	$(document).on("click", ".view_project_charter", function () {
		var pelatihantype 	= $(this).data('pelatihantype');						
		
		$('#datatable_modalviewprojectcharter_ulamm').DataTable().clear();
		$('#datatable_modalviewprojectcharter_ulamm').DataTable().destroy();

		$('#datatable_modalviewprojectcharter_ulamm').DataTable({			
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('pelatihan/get_paging_project_charter/'); ?>'+pelatihantype,
			"type" :'GET'                      
			},
			"columns" : [
				{ "data": "TEMA_PROJECT_CHARTER" },  
				{ "data": "ID", render: function (data, type, row)   
					{
					  var tombol_action = '<td>';   

					  tombol_action +='<button type="button" class="btn btn-outline-info project_charter_edit" href="#" data-toggle="modal" data-target="#modaleditprojectcharter" '
						+'data-idprojectcharter="'+row.ID+'" '
						+'data-tema="'+row.TEMA_PROJECT_CHARTER+'" '
						+'data-idtipepelatihan="'+row.ID_TIPE_PELATIHAN+'" '
						+'data-tipedeskripsipelatihan="'+row.ID_TIPE_DESKRIPSI+'" '												
						+'data-noprojectcharter="'+row.NO_PROJECT_CHARTER+'"> Edit</button>';

					  tombol_action += '</td>';					  
					  return tombol_action;
					} 
				},  					  

			],
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>"
		});	
				
										
		$('#modalviewprojectcharter').modal({
			show: true
		}); 
		
	});
	
	

	$(document).on("click", ".project_charter_edit", function () {			
		
		$('#type_klasterisasi_edit').html('<option value="'+$(this).data('idtipepelatihan')+'">'+$(this).data('tipedeskripsipelatihan')+'</option>');		
		$('#tema_project_charter_edit').val($(this).data('tema'));	
		$('#id_project_charter').val($(this).data('idprojectcharter'));	
		$('#no_project_charter_edit').val($(this).data('noprojectcharter'));	
		
		
		
		
		$.ajax({
			url: "<?php echo base_url()?>pelatihan/get_project_charter",
			data: "noprojectcharter="+$(this).data("noprojectcharter"),
			cache: false,
			success: function(data){				         
				$('#tbody_charter_modaledit').html('<tr class="d-none">'+
				'<td><input type="text" class="form-control" id="judul_pelatihan_edit" name="judul_pelatihan[]" ></td>'+
				'<td>'+
				'<div class="input-group">'+
										'<input type="date" class="form-control" id="tanggal_pelatihan_edit" name="tanggal_pelatihan[]">'+
										'<input type="time" class="form-control" id="time_pelatihan_edit" name="time_pelatihan[]">'+
										'<span class="input-group-addon">'+
											'<span class="fa fa-calendar"></span>'+
										'</span>'+
									'</div>'+
									'</td>'+								  
									'<td >'+
										'<select class="form-control" id="cabang_ulamm_edit" name="cabang_ulamm[]">'+
											'<option value="">--pilih cabang--</option>'+
												'<?php 
												foreach ($cabang as $data_cabang){
													echo '<option value="'.$data_cabang->KODE_CABANG.'">'.$data_cabang->KODE_CABANG.' - '.$data_cabang->DESKRIPSI.'</option>';                                                                    
												}
												?>'+'</select>'+
									'</td>'+
									'<td ><input type="text" class="form-control" id="alamat_pelatihan_edit" name="alamat_pelatihan[]" value=""></td>'+
									'<td ><input type="text" class="form-control" id="budget_pelatihan_edit" name="budget_pelatihan[]" value=""></td>'+
									'<td>'+
									'<a class="table-remove-modaledit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>'+
									'</td>'+
									'<td>'+                         
									'<a class="table-up-modaledit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>'+   
									'<a class="table-down-modaledit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>'+              
									'</td>'+
								'</tr>    ');
				$('#tbody_charter_modaledit').append(data);    
			}
		});	
						
	});	
</script>     