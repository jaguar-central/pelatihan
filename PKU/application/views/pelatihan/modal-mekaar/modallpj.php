<!-- Modal -->
<div id="modallpj" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Pelatihan LPJ</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'lpj_pelatihan','name'=>'lpj_pelatihan','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
			<div class="modal-body">
				<input type="hidden" class="form-control" id="id_pelatihan" name="id_pelatihan" />		
				<div class="form-group row">
					<label class="col-sm-2">Link Lampiran Foto <span class="text-danger"></span></label>
					<div class="col-sm-4">
                    <input type="text" class="form-control"  required="" id="lampiran_foto" name="lampiran_foto" />													
					</div>
		
					<label class="col-sm-2">Tanggal Realisasi <span class="text-danger"></span></label>
					<div class="col-sm-4">
                    <input type="text" class="form-control"  required="" id="tanggal_realisasi" name="tanggal_realisasi" />		
					</div>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-2">CSI Final <span class="text-danger"></span></label>
					<div class="col-sm-4">
						<input type="number" class="form-control"  required="" id="csi_final" name="csi_final" />
					</div>							
				
					<label class="col-sm-2">Catatan Tambahan <span class="text-danger"></span></label>
					<div class="col-sm-4">
					<textarea class="form-control rounded-0" id="catatan_tambahan" name="catatan_tambahan" rows="3"></textarea>																	
					</div>							
				</div>								

				<div class="container-fluid">
				  <div class="row">
					<div class="col-md-12">
					  <div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title ">Rencana Anggaran Biaya</h4>                        
						</div>
						<div class="card-body">
						  <div class="table">                
							<table id="table_rab_modallpj"  class="table">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Uraian</th>
									  <th class="col-md-2">Jumlah</th>
									  <th class="col-md-2">Unit</th>
									  <th class="col-md-2">Unit Cost</th>
									  <th class="col-md-2">Sub Total Cost</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody id="tbody_rab_modallpj">
									<tr class="d-none">
									  <td ><input type="text" class="form-control" id="deskripsi_rab_modallpj" name="deskripsi_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="jumlah_rab_modallpj" name="jumlah_rab[]"></td>
									  <td ><input type="text" class="form-control" id="unit_rab_modallpj" name="unit_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="unit_cost_rab_modallpj" name="unit_cost_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="total_cost_rab_modallpj" name="total_cost_rab[]" value="" readonly=""></td>
									  <td>                            
										<a class="table-remove-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>   
									  </td>
									  <td>                            
										<a class="table-up-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   
										<a class="table-down-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>                               
									  </td>
									</tr>                        
								  </tbody>                                                                      
								</table>  

								  <div class="col-md-12"></div>
									<label>Grand Total </label>
								  <div>
								  <div class="col-md-12">    
									<input type="text" class="form-control money" id="total_cost_rab_akhir_modallpj" name="total_cost_rab_akhir" data-a-sign="Rp. " value="" readonly="" required>
								  </div>
								
								
								</br>
								<a class="table-add-modallpj btn btn-outline-primary" href="#" ><i class="fas fa-plus"></i></a>                                                           
							  </div>
							</div>
						  </div>
						</div>
				  </div>
				</div>  

			</div>  
			 
			<div class="modal-footer">
				<?php echo form_submit('submit', 'Submit', 'class="btn btn-primary submit"'); ?>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
	  
		<?php echo form_close(); ?>
		</div>

	</div>
 </div>
</div>
<script type="text/javascript">

	$(document).ready(function() {	
		$('#tanggal_realisasi').datetimepicker();
	});		


	//* TABLE RAB js start*//			
	var $TABLE_LPJ = $('#table_rab_modallpj');

	$('.table-add-modallpj').click(function () {
		var $clone = $TABLE_LPJ.find('tr.d-none').clone(true).removeClass('d-none');  
		$TABLE_LPJ.find('tbody').append($clone);
		calculate_grand_total_modallpj();
	});

	
	$('.table-remove-modallpj').click(function () {		

		$(this).parents('tr').detach();
		calculate_grand_total_modallpj();
	});

	$('.table-up-modallpj').click(function () {        
		var $row = $(this).parents('tbody tr');
		if ($row.index() === 1) return;
		$row.prev().before($row.get(0));
	});

	$('.table-down-modallpj').click(function () {
		var $row = $(this).parents('tbody tr');
		$row.next().after($row.get(0));
	});


	$('#table_rab_modallpj tbody tr').keyup(function () {            
		var index = parseInt($(this).index());		
		var jumlah_rab = $("#table_rab_modallpj tbody tr:eq("+index+")").find("#jumlah_rab_modallpj").val(); 		
		var unit_cost_rab = $("#table_rab_modallpj tbody tr:eq("+index+")").find("#unit_cost_rab_modallpj").val();
		sum = parseInt(jumlah_rab) * parseInt(unit_cost_rab);                


		$("#table_rab_modallpj tbody tr:eq("+index+")").find("#total_cost_rab_modallpj").val(sum);

		calculate_grand_total_modallpj();

	})

	function calculate_grand_total_modallpj(){
		var total = 0;
		$('tr #total_cost_rab_modallpj').each(function () {            
			var total_cost_rab = $(this).val();
			if (!isNaN(total_cost_rab) && total_cost_rab.length !== 0) {
				total += parseFloat(total_cost_rab);
			}
		});

		var rowCount = $('tr #total_cost_rab_modallpj').length;
		$("#PelatihanRabCount").val(rowCount);        

		$("#total_cost_rab_akhir_modallpj").val(total);
	}			  	  	
	//* TABLE RAB js end*//	 	
	
	
			
	$("#lpj_pelatihan").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_pelatihan_lpj'); ?>";
		var frmdata = new FormData(this);
					
		var xhr = $.ajax({
			url: formURL,
			type: 'POST',
			data: frmdata,
			processData: false,
			contentType: false
		});
		xhr.done(function(data) {
			var obj = $.parseJSON(data);
			
			console.log(data);
			
			if(obj.result == 'OK')
			{
				window.location.href = '<?php echo base_url(); ?>pelatihan/mekaar';
			}
			if(obj.result == 'UP')
			{
				console.log(data);
			}
			if(obj.result == 'NG')
			{
				$("#m-ap-cab").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> '+obj.msg+'</div>');
			}
		});
		xhr.fail(function() {
			$("#loader_container").hide();
			var failMsg = "Something error happened! as";
		});	
	});	
</script>