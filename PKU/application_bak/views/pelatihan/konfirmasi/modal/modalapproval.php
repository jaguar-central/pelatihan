<!-- Modal -->
<div id="modalapproval" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Approval Pelatihan</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
		<?php 

		$attrib = array('class' => 'form-horizontal','id'=>'approval_proposal','name'=>'approval_proposal','onkeydown'=>"return event.key != 'Enter';");
		echo form_open_multipart('',$attrib); 
		?>	
		<div class="modal-body">
				<div class="form-group row">
					<input type="hidden" class="form-control"  required="" id="id_pelatihan" name="id_pelatihan" />

					<label class="col-sm-2">Draft Proposal </label>

					<div class="col-sm-8" id="draft_proposal">
					
					</div>
					
					

                </div>		

<?php if ($this->session->userdata('sess_user_id_user_group')=='4'){ ?>

				<div class="form-group card grading_system">
				<div class="card-header"><h4>Grading System</h4></div>
				<div class="card-body row">
					<label class="col-sm-2">Jenis Nasabah <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="jenis_nasabah_grading">
							<option value="">--pilih jenis nasabah--</option>

							<?php 
								foreach ($nasabah_grading as $data_nasabah_grading){
									echo '<option value="'.$data_nasabah_grading->ID.'" >'.$data_nasabah_grading->JENIS_NASABAH.'</option>';                                                                    
								}
								?>										
						</select>	
					</div>	

					<label class="col-sm-2">Grade <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="grading" name="grading">
							<option value="">--pilih grade--</option>
									
						</select>	
					</div>								
				</div>		
				</div>	


<?php } ?>

				<div class="form-group row keterangan col-md-10 offset-md-1">	
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
			<?php echo form_submit('submit', 'Verification', 'class="btn btn-primary submit"'); ?>							
									
											
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

	$("#approval_proposal").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_konfirmasi_proposal'); ?>";
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
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Pelatihan telah di verifikasi',
					showConfirmButton: false,
					timer: 1500
				})
				setTimeout(function () {
					window.location.href = '<?php echo base_url(); ?>pelatihan/konfirmasi';
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
	
	
	$(".reject").click(function(e){
		e.preventDefault();    
		var id_pelatihan = $("#id_pelatihan").val();
		var formURL = "<?php echo base_url('pelatihan/post_konfirmasi_proposal'); ?>";
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



	//   $.post("<?php echo base_url('pelatihan/post_change_status_pelatihan/"+id_pelatihan+"/reject/proposal') ?>", function(data, status){
	// 	window.location.href = '<?php echo base_url(); ?>pelatihan/konfirmasi';
	//   });

	});	
	
	$(".return").click(function(){
		var id_pelatihan = $("#id_pelatihan").val();
	  $.post("<?php echo base_url('pelatihan/post_change_status_pelatihan/"+id_pelatihan+"/draft') ?>", function(data, status){
		window.location.href = '<?php echo base_url(); ?>pelatihan/konfirmasi';
	  });
	});		
	

	$('#jenis_nasabah_grading').on('change', function (e) {		
			console.log($(this).val());
			$.ajax({
				url: "<?php echo base_url()?>master/get_list_nasabah_grading",
				data: "id_jenis_nasabah="+$(this).val(),
				cache: false,
				success: function(data){				         
					$('#grading').html(data)           
				}
			});
			if ($(this).val()==1){				
				$('.grading_system').addClass('bg-danger text-white');
				$(".grading_system").removeClass('bg-warning bg-success bg-info');
			}else if ($(this).val()==2){
				$('.grading_system').addClass('bg-warning');
				$(".grading_system").removeClass('bg-danger bg-success bg-info text-white');
			}else if ($(this).val()==3){
				$('.grading_system').addClass('bg-success text-white');
				$(".grading_system").removeClass('bg-danger bg-warning bg-info');
			}else if ($(this).val()==4){
				$('.grading_system').addClass('bg-info text-white');
				$(".grading_system").removeClass('bg-danger bg-warning bg-success');
			}else{
				$('.grading_system').addClass('bg-default');
				$(".grading_system").removeClass('bg-danger bg-warning bg-success bg-info text-white');
			}
			
		});			
	
</script>

