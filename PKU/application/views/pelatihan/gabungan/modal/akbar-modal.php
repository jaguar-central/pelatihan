<style>
@media (max-width: 767px) {
    #judul_pelatihan_charter{
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
<div id="akbarmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Pilih Pelatihan Akbar</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'add_pku_akbar_gabungan','name'=>'add_pku_akbar_gabungan','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
			<div class="modal-body">	

				<div class="form-group row">
					<label class="col-sm-2 offset-sm-3">Judul Gabungan<span class="text-danger">*</span></label>
					<div class="col-sm-4">
                        <input type="text" class="form-control" id="judul_gabungan" name="judul_gabungan" required>
					</div>
				</div>			
				
			</div>
			<div class="container-fluid">
				  <div class="row">
					<div class="col-sm-12">
					  <div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title ">List Pelatihan Akbar</h4>                        
						</div>
						<div class="card-body">
						  <div class="table">                
								<table id="akbar_gabungan"  class="table table-responsive">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-1"></th>
									  <th class="col-md-2">No Proposal</th>
									  <th class="col-md-3">No Trx</th>
									  <th class="col-md-2">Judul</th>
									  <th class="col-md-2">Cabang</th>
									  <th class="col-md-2">Tanggal Mulai</th>
									  <th class="col-md-2">Tanggal Selesai</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody >
                                  <?php
                                  foreach($pelatihan_akbar as $data_akbar)
                                  {
                                      echo '<tr>';
                                      echo '<td><input type="checkbox" id="id_pelatihan" name="id_pelatihan[]" value="'.$data_akbar->ID.'" ></td>';
                                      echo '<td>'.$data_akbar->NO_PROPOSAL.'</td>';
                                      echo '<td>'.$data_akbar->NO_TRX.'</td>';
									  echo '<td>'.$data_akbar->TITLE.'</td>';
									  echo '<td>'.$data_akbar->CABANG_ULAMM.'</td>';
                                      echo '<td>'.$data_akbar->TANGGAL_MULAI.'</td>';
                                      echo '<td>'.$data_akbar->TANGGAL_SELESAI.'</td>';
                                      echo '</tr>';
                                  }
                                  ?>								               
								  </tbody>                                                                      
								</table>  

								  <div class="col-md-12"></div>
							
								  <div>								  														
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
<script>
  $("#add_pku_akbar_gabungan").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_pku_akbar_gabungan'); ?>";
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

			if(obj.result == 'OK')
			{
				Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Pelatihan Akbar Gabungan',
				  showConfirmButton: false,
				  timer: 1500
				})
				setTimeout(function () {
					window.location.href = '<?php echo base_url(); ?>pelatihan/gabungan';
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