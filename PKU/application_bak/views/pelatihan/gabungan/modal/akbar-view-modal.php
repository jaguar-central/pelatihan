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
<div id="akbarviewmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Pilih Pelatihan Akbar</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>

			<div class="modal-body">	

				<div class="form-group row">
					<label class="col-sm-2 offset-sm-3">Judul Gabungan<span class="text-danger">*</span></label>
					<div class="col-sm-4">
                        <input type="text" class="form-control" id="judul_gabungan_view" name="judul_gabungan" required>
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
								<table id="akbar_gabungan_view"  class="table table-responsive">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">No Proposal</th>
									  <th class="col-md-3">No Trx</th>
									  <th class="col-md-2">Judul</th>
									  <th class="col-md-2">Tanggal Mulai</th>
									  <th class="col-md-2">Tanggal Selesai</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody >                               						               
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
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
			</div>
	  
		</div>

	</div>
 </div>
</div>