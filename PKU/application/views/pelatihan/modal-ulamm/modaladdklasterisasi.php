<style>
[type="date"]::-webkit-inner-spin-button {
  display: none;
}
[type="date"]::-webkit-calendar-picker-indicator {
  opacity: 0;
}
input [type="date"] {
  border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 190px;
}
</style>
<!-- Modal -->
<div id="modaladdklasterisasi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Add Project Charter</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'add_klasterisasi','name'=>'add_klasterisasi','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
			<div class="modal-body">

				<div class="form-group row">
					<input type="hidden" class="form-control" id="bisnis_pelatihan" name="bisnis_pelatihan" value="ULAMM" />

					<label class="col-sm-2 offset-sm-3">Tipe Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="type_klasterisasi" name="type_klasterisasi" readonly>
							<option value="">--pilih tipe--</option>										
						</select>																	
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 offset-sm-3">Tema <span class="text-danger">*</span></label>
					<div class="col-sm-4">
					<textarea class="form-control" id="tema_klasterisasi" name="tema_klasterisasi" rows="4" required=""></textarea>
					</div>
				</div>

				<div class="form-group row">
                    <label class="col-sm-2 offset-sm-3">Upload File <span class="text-danger">*</span></label>
					<div class="col-sm-4">
      					<input type="file" class="custom-file-input" id="customFile" name="filename">
      					<label class="custom-file-label" for="customFile">Choose file</label>
    				</div>
                </div>
				
			</div>


			<div class="container-fluid">
				  <div class="row">
					<div class="col-sm-12">
					  <div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title ">Pelatihan</h4>                        
						</div>
						<div class="card-body">
						  <div class="table">                
								<table id="table_charter_modaladd"  class="table">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Judul</th>
									  <th class="col-md-2">Tanggal</th>
									  <th class="col-md-2">Tempat</th>
									  <th class="col-md-2">Budget</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody id="tbody_charter_modaladd">
								  <tr class="d-none">									
									<td><input type="text" class="form-control" id="judul_pelatihan" name="judul_pelatihan[]" value=""></td>
									<td>									  
									<div class='input-group'>
										<input type="date" class="form-control" id="tanggal_pelatihan" name="tanggal_pelatihan[]">
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
									</td>									  
									<td ><input type="text" class="form-control" id="tempat_pelatihan" name="tempat_pelatihan[]" value=""></td>
									<td ><input type="text" class="form-control" id="budget_pelatihan" name="budget_pelatihan[]" value=""></td>
									<td>                            
									<a class="table-remove-modaladd btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>   
									</td>
									<td>                            
									<a class="table-up-modaladd btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   
									<a class="table-down-modaladd btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>                               
									</td>
								</tr>                        
								  </tbody>                                                                      
								</table>  

								  <div class="col-md-12"></div>
							
								  <div>
								  
								
								
								</br>
								<a class="table-add-modaladd btn btn-outline-primary" href="#" ><i class="fas fa-plus"></i></a>                                                           
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

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

var $TABLE = $('#table_charter_modaladd');

$('.table-add-modaladd').click(function () {
	console.log('modaladd');
	var $clone = $TABLE.find('tr.d-none').clone(true).removeClass('d-none');
	$TABLE.find('tbody').append($clone);	
	calculate_grand_total();
});


$('.table-remove-modaladd').click(function () {		
	console.log('modalklaster')
	$(this).parents('tr').detach();
	calculate_grand_total();
});

$('.table-up-modaladd').click(function () {        
	var $row = $(this).parents('tbody tr');
	if ($row.index() === 1) return;
	$row.prev().before($row.get(0));
});

$('.table-down-modaladd').click(function () {
	var $row = $(this).parents('tbody tr');
	$row.next().after($row.get(0));
});


$('#table_charter_modaladd tbody tr').keyup(function () {            
	var index = parseInt($(this).index());
	var jumlah_rab = $("#table_charter_modaladd tbody tr:eq("+index+")").find("#jumlah_rab").val(); 
	var unit_cost_rab = $("#table_charter_modaladd tbody tr:eq("+index+")").find("#unit_cost_rab").val();
	sum = parseInt(jumlah_rab) * parseInt(unit_cost_rab);                


	$("#table_charter_modaladd tbody tr:eq("+index+")").find("#total_cost_rab").val(sum);

	calculate_grand_total();

})

function calculate_grand_total(){
	var total = 0;
	$('tr #total_cost_rab').each(function () {            
		var total_cost_rab = $(this).val();
		if (!isNaN(total_cost_rab) && total_cost_rab.length !== 0) {
			total += parseFloat(total_cost_rab);
		}
	});

	var rowCount = $('tr #total_cost_rab').length;
	$("#PelatihanRabCount").val(rowCount);        

	$("#total_cost_rab_akhir").val(total);
}			  	  


</script>