!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">
                      
                            <div class="col-lg-12">
                                <div class="overview-wrap">
						            <h2 class="title-2">User</h2>
					            </div>
                                <div class="table-style">
                                    <div class="p-3">
                                        <a href="#"  data-toggle="modal" data-target="#add_user" class="btn btn-primary">
                                        <span class="btn-label"><i class="fa fa-plus"></i></span> Tambah User
                                        </a>
                                    </div>                                  
                                    <table id="user_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>USERNAME</th>
                                                <th>BISNIS</th>
                                                <th>ID GROUP</th>
                                                <th>LOKASI</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($t_user as $otw){
                                                echo '<tr>';
                                                echo '<td>'.$otw->USERNAME.'</td>';
                                                echo '<td>'.$otw->IDBISNIS.'</td>'; 
                                                echo '<td>'.$otw->IDGROUP.'</td>';
                                                echo '<td>'.$otw->LOKASI.'</td>';
                                                echo '<td>
                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                    </td>'; 
                                                echo '</tr>';

                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->



<!-- Modal -->
<div id="add_user" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
        <div class="modal-header">
			<div id="judul_modal">
				<h4>Tambah User</h4>
			</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
	  
	  	<?php $attrib = array('class' => 'form-horizontal','id'=>'form-add-user');echo form_open('',$attrib); ?>
        <div class="modal-body">        
		<a class="btn btn-primary waves-effect waves-light user-sso" href="#"  data-toggle="modal" data-target="#user_sso">Pilih User</a>		
		<div class="row">
			<div class="col-sm-12">					
			<div class="p-20">				
					<input type="hidden" class="form-control" name="profile_idsdm" id="profile_idsdm" required />
					</div>
					<div class="form-group row">
						<label class="col-sm-3">Username <span class="text-danger">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="username" id="username" required readonly />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3">Role <span class="text-danger">*</span></label>
						<div class="col-sm-9">							
							<select class="form-control select2" required name="previlage" id="previlage" >
							<option value="0">- Pilih Role -</option>
							<?php
							// if($role->num_rows() > 0){ 
							// 	foreach($role->result() as $data_role){
							// 		echo '<option value="'.$data_role->ID.'">'.$data_role->PREVILAGE.'</option>';
							// 	}
							// }
							?>													
							</select>
						</div>
					</div>					
					<div class="form-group row">
						<label class="col-sm-3">Aktif <span class="text-danger">*</span></label>
						<div class="col-sm-5">
							<select class="form-control select2" required name="aktif" id="aktif">
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
							</select>
						</div>
					</div>				
			</div>
		</div>								
      </div>
      <div class="modal-footer">
		<button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>	  
    </div>
	<?php echo form_close(); ?>
  </div>
</div>
</div>


<div id="user_sso" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
    <div class="modal-header">
			<div id="judul_modal">
				<h4>User SSO</h4>
			</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
	 
        <div class="modal-body">
        
		
            <table id="list_user_sso" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID sdm</th>
                    <th>Nama Karyawan</th>
                    <th>NIK</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>		
		
			
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>	  
    </div>	
  </div>
</div>
</div>

