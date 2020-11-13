<!-- Modal -->
<div id="modalapprovallpj" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Approval Pelatihan LPJ</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'approval_lpj','name'=>'approval_lpj','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
		<div class="modal-body">
				<div class="form-group row">
					<input type="hidden" class="form-control"  required="" id="id_pelatihan" name="id_pelatihan" />

					<label class="col-sm-2">Draft Proposal </label>

					<div class="col-sm-8" id="draft_proposal">
					
					</div>

                </div>			

				<div class="form-group row">

					<label class="col-sm-2">Catatan <span class="text-danger">*</span></label>

					<div class="col-sm-7">

					<textarea class="form-control" id="catatan" name="catatan"></textarea>

					</div>

				</div>				
			 	  
		</div>
        
		<div class="modal-footer">
			<?php echo form_submit('submit_approve', 'Approve', 'class="btn btn-primary submit"'); ?>
			<?php if ($this->session->userdata('sess_user_id_user_group')!='3'){ ?>			
			<a href="#" class="btn btn-danger reject">Reject</a>								
			<?php } ?>
			<a href="#" class="btn btn-warning return">Revision</a>							
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		<?php echo form_close(); ?>
	</div>
 </div>
</div>
<script src="<?php echo base_url(); ?>assets/vendor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'catatan' );
	
	$(document).ready(function() {
		$(".tox-statusbar").hide();
	});


	$("#approval_lpj").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_konfirmasi_lpj'); ?>";
		var frmdata = new FormData(this);

		frmdata.append('keterangan',CKEDITOR.instances.catatan.getData())
					
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
				window.location.href = '<?php echo base_url(); ?>pelatihan/konfirmasi_lpj';
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
	
	$(".reject").click(function(){
		var id_pelatihan = $("#id_pelatihan").val();
	  $.post("<?php echo base_url('pelatihan/post_change_status_pelatihan/"+id_pelatihan+"/reject') ?>", function(data, status){
		alert("Data: " + data + "\nStatus: " + status);
	  });
	});	
	
	$(".return").click(function(){
		var id_pelatihan = $("#id_pelatihan").val();
	  $.post("<?php echo base_url('pelatihan/post_change_status_pelatihan/"+id_pelatihan+"/draft') ?>", function(data, status){
		alert("Data: " + data + "\nStatus: " + status);
	  });
	});			
</script>