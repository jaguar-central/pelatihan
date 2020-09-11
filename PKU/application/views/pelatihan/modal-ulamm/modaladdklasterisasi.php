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
					<input type="hidden" class="form-control" id="bisnis_pelatihan" name="bisnis_pelatihan" value="ULAMM" />

					<label class="col-sm-2 offset-sm-3">Tipe Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="type_klasterisasi" name="type_klasterisasi" readonly>
							<option value="">--pilih tipe--</option>										
						</select>																	
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 offset-sm-3">Judul <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="judul_klasterisasi" name="judul_klasterisasi" />
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 offset-sm-3">Maximal Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="max_pelatihan" name="max_pelatihan" />
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
					window.location.href = '<?php echo base_url(); ?>pelatihan/ulamm';
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