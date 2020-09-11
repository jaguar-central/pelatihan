<!-- Modal -->
<div id="unggah_proposal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4>Unggah Proposal Pelatihan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'unggah_proposal_pelatihan','name'=>'unggah_proposal_pelatihan','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
			<div class="modal-body">
		
					<div class="form-group row">
						<label class="col-sm-2">ID Pelatihan <span class="text-danger"></span></label>
						<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="pelatihan_id" name="pelatihan_id" readonly />
						</div>																		
			
						
						<label class="col-sm-2">Nomor Memo Pelatihan <span class="text-danger"></span></label>
						<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="nomor_pelatihan" name="nomor_pelatihan" readonly />																
						</div>
					</div>		
					
					<div class="form-group row">
						<label class="col-sm-2">Pelatihan Jenis <span class="text-danger"></span></label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  required="" id="pelatihan_jenis" name="pelatihan_jenis" readonly />
						</div>							
					
						<label class="col-sm-2">Tema Pelatihan <span class="text-danger"></span></label>
						<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="tema_pelatihan" name="tema_pelatihan" readonly />								
						</div>							
					</div>								

					<div class="form-group row">
						<label class="col-sm-8">Detail Pelatihan, Rencana Anggaran Biaya, Lembar Approval (PDF) <a style="color:red">*</a></label>
						<div class="col-sm-12">
						<div class="custom-file">
						<input type="file" class="custom-file-input" id="pilih_file" name="pilih_file"  >
						<label class="custom-file-label" for="pilih_file">Pilih file</label>
						</div>
							<a style="color:black; font-size:11px">Max: 8 Mb.</a>
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
<script>
	$(".custom-file-input").on("change", function() {		
  		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});	
	
	$("#unggah_proposal_pelatihan").submit(function(e){
		console.log('test');
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_unggah_proposal'); ?>";
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
				window.location.href = '<?php echo base_url(); ?>pelatihan/list';
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