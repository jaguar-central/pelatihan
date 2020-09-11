<!-- Modal -->
<div id="modaladdklasterisasi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Add Klasterisasi</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'add_klasterisasi','name'=>'add_klasterisasi','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
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
						<input type="text" class="form-control"  required="" id="tema_klasterisasi" name="tema_klasterisasi" />
					</div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 offset-sm-3">Maximal Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="max_pelatihan" name="max_pelatihan">
							<option value="">--pilih--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>									
						</select>									
					</div>
				</div>

				
            </div>

				<div class="container-fluid">
				  <div class="row">
					<div class="col-sm-12">
					  <div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title ">Budget</h4>                        
						</div>
						<div class="card-body">
						  <div class="table">                
							<table id="table_rab_modaladd"  class="table">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Judul</th>
									  <th class="col-md-2">Tanggal</th>
									  <th class="col-md-2">Tempat</th>
									  <th class="col-md-2">Budget</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody id="tbody_rab_modaladd">
									<tr class="d-none">
									  <td ><input type="text" class="form-control" id="deskripsi_rab" name="deskripsi_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="jumlah_rab" name="jumlah_rab[]"></td>
									  <td ><input type="text" class="form-control" id="unit_rab" name="unit_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="unit_cost_rab" name="unit_cost_rab[]" value=""></td>
									  <td ><input type="number" class="form-control" id="total_cost_rab" name="total_cost_rab[]" value="" readonly=""></td>
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
									<label>Grand Total </label>
								  <div>
								  <div class="col-md-12">    
									<input type="text" class="form-control money" id="total_cost_rab_akhir" name="total_cost_rab_akhir" data-a-sign="Rp. " value="" readonly="" required>
								  </div>
								
								
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
	$("#add_klasterisasi").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_klasterisasi'); ?>";
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
				  title: 'Klasterisasi telah di simpan',
				  showConfirmButton: false,
				  timer: 1500
				})
				setTimeout(function () {
					window.location.href = '<?php echo base_url(); ?>pelatihan/mekaar';
				}, 1600);
			}
			if(obj.result == 'UP')
			{
				console.log(data);
				Swal.fire({
				  position: 'center',
				  icon: 'error',
				  title: obj.msg,
				  showConfirmButton: false,
				  timer: 1500
				})					
			}
			if(obj.result == 'NG')
			{
				Swal.fire({
				  position: 'center',
				  icon: 'error',
				  title: obj.msg,
				  showConfirmButton: false,
				  timer: 1500
				})	
			}
		});
		xhr.fail(function() {
			$("#loader_container").hide();
			var failMsg = "Something error happened! as";
		});	
	});	
</script>