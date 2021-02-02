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

				<div class="form-group row keterangan col-md-8 offset-md-2">	
				</div>								

				<div class="form-group row download">
				</div>				

				<div class="form-group row">

					<label class="col-sm-2">Catatan <span class="text-danger">*</span></label>

					<div class="col-sm-7">

					<textarea class="form-control" id="catatan" name="catatan"></textarea>

					</div>

				</div>				
			 	  
		</div>
        
		<div class="modal-footer">
			<?php $group_id = array('2','3','4'); ?>
			<?php if (in_array($this->session->userdata('sess_user_id_user_group'),$group_id)){ ?>
			<?php echo form_submit('submit_approve', 'Verification', 'class="btn btn-primary submit"'); ?>																								
											
			<?php }else{ ?>
				<?php echo form_submit('submit', 'Approve', 'class="btn btn-primary submit"'); ?>
				<a href="#" class="btn btn-danger reject">Reject</a>
				<a href="#" class="btn btn-warning return">Revision</a>
			<?php } ?>
										
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

		frmdata.append('keterangan',CKEDITOR.instances.catatan.getData());
		frmdata.append('result','approve');		
					
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
				<?php if ($this->config->item('socket_on')=='on'){ ?>
				socket.emit('broadcast-notif');
				<?php } ?>
				
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Pelatihan telah di verifikasi',
					showConfirmButton: false,
					timer: 1500
				})
				setTimeout(function () {
					window.location.href = '<?php echo base_url(); ?>pelatihan/konfirmasi_lpj';
				}, 1600);					
				
			}

			if(obj.result == 'NG')
			{
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: obj.msg,
					showConfirmButton: false,
					timer: 1500
				});
			}
		});
		xhr.fail(function() {
			Swal.fire({
				position: 'center',
				icon: 'error',
				title: obj.msg,
				showConfirmButton: false,
				timer: 1500
			});
		});	
	});	
	
	$(".reject").click(function(e){
		e.preventDefault();    
		var id_pelatihan = $("#id_pelatihan").val();
		var formURL = "<?php echo base_url('pelatihan/post_konfirmasi_lpj'); ?>";
		var frmdata = new FormData();

		frmdata.append('id_pelatihan',$("#id_pelatihan").val());
		frmdata.append('keterangan',CKEDITOR.instances.catatan.getData());
		frmdata.append('result','reject');
		
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
				window.location.href = '<?php echo base_url(); ?>pelatihan/konfirmasi';
			}

			if(obj.result == 'NG')
			{
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: obj.msg,
					showConfirmButton: false,
					timer: 1500
				});
			}
		});
		xhr.fail(function() {
			Swal.fire({
				position: 'center',
				icon: 'error',
				title: obj.msg,
				showConfirmButton: false,
				timer: 1500
			});
		});			

	});		


	
	$(".return").click(function(e){
		e.preventDefault();    
		var formURL = "<?php echo base_url('pelatihan/post_revisi_lpj'); ?>";
		var frmdata = new FormData();

		frmdata.append('id_pelatihan',$("#id_pelatihan").val());
		frmdata.append('keterangan',CKEDITOR.instances.catatan.getData());
		frmdata.append('result','revisi');
		
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
					title: 'Pelatihan telah di revisi',
					showConfirmButton: false,
					timer: 1500
				})
				setTimeout(function () {
					window.location.href = '<?php echo base_url(); ?>pelatihan/konfirmasi_lpj';
				}, 1600);					
				
			}

			if(obj.result == 'NG')
			{
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: obj.msg,
					showConfirmButton: false,
					timer: 1500
				});
			}
		});
		xhr.fail(function() {
			Swal.fire({
				position: 'center',
				icon: 'error',
				title: obj.msg,
				showConfirmButton: false,
				timer: 1500
			});
		});	  
	  
	  
	  
	});			
</script>