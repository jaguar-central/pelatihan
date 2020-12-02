<style>
@media (max-width: 767px) {
    #judul_pelatihan{
        width: 400px;
    }
	#tanggal_pelatihan{
		width: 150px;
	}
	#time_pelatihan{
		width: 150px;
	}
	#cabang_ulamm{
		width: 150px;
	}
	#cabang_ulamm{
		width: 150px;
	}
	#alamat_pelatihan{
		width: 150px;
	}
	#budget_pelatihan{
		width: 150px;
	}
}
</style>


<!-- Modal -->
<div id="modaladdprojectcharter" class="modal fade" role="dialog">
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

			$attrib = array('class' => 'form-horizontal','id'=>'add_project_charter','name'=>'add_project_charter','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
			<div class="modal-body">

				<div class="form-group row">
					<input type="hidden" class="form-control" id="bisnis_pelatihan" name="bisnis_pelatihan" value="MEKAAR" />

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
					<textarea class="form-control" id="tema_project_charter" name="tema_project_charter" rows="4" required=""></textarea>
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
									<th class="col-md-3">Tanggal</th>
									<th class="col-md-2">Cabang</th>
									<th class="col-md-2">Alamat</th>
									<th class="col-md-2">Anggaran</th>
									<th></th>
									<th></th>
								</thead>    
								<tbody id="tbody_charter_modaladd">
								<tr class="d-none">									
									<td><input type="text" class="form-control" id="judul_pelatihan" name="judul_pelatihan[]" value=""></td>
									<td>									  
									<div class='input-group'>
										<input type="date" class="form-control" id="tanggal_pelatihan" name="tanggal_pelatihan[]">
										<input type="time" class="form-control" id="time_pelatihan" name="time_pelatihan[]">
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
									</td>
									<td >
										<select class="form-control" id="cabang_ulamm" name="cabang_ulamm[]">
											<option value="">--pilih cabang--</option>			

												<?php 
												foreach ($cabang as $data_cabang){
													echo '<option value="'.$data_cabang->KODE_CABANG.'">'.$data_cabang->KODE_CABANG.' - '.$data_cabang->DESKRIPSI.'</option>';                                                                    
												}
												?>										
										</select>
									</td>																		  
									<td ><input type="text" class="form-control" id="alamat_pelatihan" name="alamat_pelatihan[]" value=""></td>
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
				<?php echo form_submit('submit', 'Submit', 'class="btn btn-outline-primary submit"'); ?>
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
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




$("#add_project_charter").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_project_charter'); ?>";
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
				Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Project Charter telah di simpan',
				  showConfirmButton: false,
				  timer: 1500
				})
				setTimeout(function () {
					window.location.href = '<?php echo base_url(); ?>pelatihan/<?php echo $this->uri->segment(2); ?>';
				}, 1600);									
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