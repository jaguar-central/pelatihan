<!-- Modal -->
<div id="modaledit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Edit Pelatihan</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'edit_pelatihan','name'=>'edit_pelatihan','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
		<div class="modal-body">
	
				<div class="form-group row">
					<input type="hidden" class="form-control" id="id_pelatihan" name="id_pelatihan" />					
					<input type="hidden" class="form-control" id="id_bisnis_edit" name="id_bisnis_edit" value="1" />
					
				
					<label class="col-sm-2">Tipe Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="pelatihan_type_edit" name="pelatihan_type_edit" readonly="">
							<option value="">--pilih tipe--</option>										
						</select>																	
					</div>
					
					<label class="col-sm-2">Cabang <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="cabang_ulamm_edit" name="cabang_ulamm_edit" disabled="">
							<option value="">--pilih cabang--</option>			

								<?php 
								foreach ($cabang as $data_cabang){
									echo '<option value="'.$data_cabang->KODE_CABANG.'">'.$data_cabang->KODE_CABANG.' - '.$data_cabang->DESKRIPSI.'</option>';                                                                    
								}
								?>										
						</select>																	
					</div>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-2">Judul <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="judul_pelatihan_edit" name="judul_pelatihan_edit" />
					</div>							
				
					<label class="col-sm-2">Unit <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<!-- <select class="form-control " required="" id="unit_ulamm_edit" name="unit_ulamm_edit[]" multiple="multiple" disabled=""> -->
						<input type="text" class="form-control"  required="" id="unit_ulamm_edit" name="unit_ulamm_edit" disabled />
							<!-- <option value="">--pilih unit--</option>											 -->
						</select>																	
					</div>							
				</div>								

				<div class="form-group row">
					<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="deskripsi_pelatihan_edit" name="deskripsi_pelatihan_edit" />
					</div>													
				</div>	

				<div class="form-group card grading_system_edit">
				<div class="card-header"><h4>Grading System</h4></div>
				<div class="card-body row">
					<label class="col-sm-2">Jenis Nasabah <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="jenis_nasabah_grading_edit">
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
						<select class="form-control" required="" id="grading_edit" name="grading_edit">
							<option value="">--pilih grade--</option>
									
						</select>	
					</div>								
				</div>		
				</div>						
				
				<div class="form-group row">

					<label class="col-sm-2">Tanggal <span class="text-danger">*</span></label>

					<div class="col-sm-4">

						 <div class="input-group">										
							
							<!-- <input type="text" class="form-control input-limit-datepicker" id="input-limit-datepicker" required />																				 -->
							
							<div class='input-group date'>
								<span class="input-group-addon">
								<span class="fas fa-calendar"></span>
								</span>
								<input type='text' class="form-control" id='timeawal_edit' />
								<span class="input-group-addon bg-custom b-0">s/d</span>
								<input type='text' class="form-control" id='timeakhir_edit' />
							</div>							

							<input type="hidden" id="inputStartTglPelaksanaan_edit" name="inputStartTglPelaksanaan_edit" />
							
							<input type="hidden" id="inputStartTimePelaksanaan_edit" name="inputStartTimePelaksanaan_edit" />

							<input type="hidden" id="inputAkhirTglPelaksanaan_edit" name="inputAkhirTglPelaksanaan_edit"/>
							
							<input type="hidden" id="inputEndTimePelaksanaan_edit" name="inputEndTimePelaksanaan_edit" />

						</div>

					</div>
					
					<label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="durasi_tampilan_edit" readonly="" />
						<input type="hidden" class="form-control"  required="" id="durasi_pelatihan_edit" name="durasi_pelatihan_edit" />
					</div>														

				</div>			


				<div class="form-group row">
					<label class="col-sm-2">Pembicara <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="pembicara_pelatihan_edit" name="pembicara_pelatihan_edit" />
					</div>							
				
					<label class="col-sm-2">Kuota Peserta <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="kuota_peserta_edit" name="kuota_peserta_edit" />
					</div>						
				</div>

				<div class="form-group row">
					<!--label class="col-sm-2">Modul <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="modul" name="modul" />
					</div-->                          
				
					<label class="col-sm-2">Anggaran <span class="text-danger">*</span></label>
					<div class="input-group col-sm-4">
						<span class="input-group-addon">Rp</span>
						<input type="text" class="form-control"  required="" id="anggaran_edit" name="anggaran_edit" />				
					</div>  					      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Provinsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="provinsi_edit" name="provinsi_edit">
							<?php foreach ($provinsi as $data_provinsi){
								echo '<option value="'.$data_provinsi->MS_KODE_PROVINSI.'">'.$data_provinsi->MS_PROVINSI.'</option>';                                                                    
							}
							?>	
						</select>
					</div>                          
				
					<label class="col-sm-2">Alamat Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="alamat_tempat_pelatihan_edit" name="alamat_tempat_pelatihan_edit" />
					</div>                      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Kabupaten / Kota <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="kabkot_edit" name="kabkot_edit">
						<option value="">--pilih kabupaten / kota--</option>	
						</select>
					</div>              

					<label class="col-sm-2">Kecamatan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="kecamatan_edit" name="kecamatan_edit">
						<option value="">--pilih kecamatan--</option>
						</select>
					</div>              					                  
				</div>	

				<div class="container-fluid">
				  <div class="row">
					<div class="col-md-12">
					  <div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title ">Rencana Anggaran Biaya</h4>                        
						</div>
						<div class="card-body">
						  <div class="table">                
							<table id="table_rab_edit"  class="table">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Uraian</th>
									  <th class="col-md-2">Jumlah</th>
									  <th class="col-md-2">Unit</th>
									  <th class="col-md-2">Unit Cost</th>
									  <th class="col-md-2">Sub Total Cost</th>
									  <th></th>
									  <th></th>
								  </thead>    
								  <tbody id="tbody_rab_edit">
									<tr class="d-none">
									  <td ><input type="text" class="form-control" id="deskripsi_rab_edit" name="deskripsi_rab_edit[]" value=""></td>
									  <td ><input type="number" class="form-control" id="jumlah_rab_edit" name="jumlah_rab_edit[]"></td>
									  <td ><input type="text" class="form-control" id="unit_rab_edit" name="unit_rab_edit[]" value=""></td>
									  <td ><input type="number" class="form-control" id="unit_cost_rab_edit" name="unit_cost_rab_edit[]" value=""></td>
									  <td ><input type="number" class="form-control" id="total_cost_rab_edit" name="total_cost_rab_edit[]" value="" readonly=""></td>
									  <td>                            
										<a class="table-remove-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>   
									  </td>
									  <td>                            
										<a class="table-up-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   
										<a class="table-down-edit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>                               
									  </td>
									</tr>                        
								  </tbody>                                                                      
								</table>  

								  <div class="col-md-12"></div>
									<label>Grand Total </label>
								  <div>
								  <div class="col-md-12">    
									<input type="text" class="form-control money" id="total_cost_rab_akhir_edit" name="total_cost_rab_akhir_edit" data-a-sign="Rp. " value="" readonly="" required>
								  </div>
								
								
								</br>
								<a class="table-add-edit btn btn-outline-primary" href="#" ><i class="fas fa-plus"></i></a>                                                           
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
	$('#cabang_ulamm_edit').on('change', function (e) {			
		$.ajax({
			url: "<?php echo base_url()?>master/get_unit_ulamm",
			data: "kode_cabang="+$("#cabang_ulamm_edit").val(),
			cache: false,
			success: function(data){				         
				$('#unit_ulamm_edit').html(data)           
			}
		});		
	});


	$('#jenis_nasabah_grading_edit').on('change', function (e) {		
			console.log($(this).val());
			$.ajax({
				url: "<?php echo base_url()?>master/get_list_nasabah_grading",
				data: "id_jenis_nasabah="+$(this).val(),
				cache: false,
				success: function(data){				         
					$('#grading_edit').html(data)           
				}
			});
			if ($(this).val()==1){				
				$('.grading_system_edit').addClass('bg-danger text-white');
				$(".grading_system_edit").removeClass('bg-warning bg-success bg-info');
			}else if ($(this).val()==2){
				$('.grading_system_edit').addClass('bg-warning');
				$(".grading_system_edit").removeClass('bg-danger bg-success bg-info text-white');
			}else if ($(this).val()==3){
				$('.grading_system_edit').addClass('bg-success text-white');
				$(".grading_system_edit").removeClass('bg-danger bg-warning bg-info');
			}else if ($(this).val()==4){
				$('.grading_system_edit').addClass('bg-info text-white');
				$(".grading_system_edit").removeClass('bg-danger bg-warning bg-success');
			}else{
				$('.grading_system_edit').addClass('bg-default');
				$(".grading_system_edit").removeClass('bg-danger bg-warning bg-success bg-info text-white');
			}
			
		});		

	var provinsi_change = $('#provinsi_edit').on('change', function (e) {			
		$.ajax({
			url: "<?php echo base_url()?>master/get_kabkot",
			data: "kode_provinsi="+$("#provinsi_edit").val(),
			cache: false,
			success: function(data){				         
				$('#kabkot_edit').html(data)           
			}
		});
		
	});

	$('#kabkot_edit').on('change', function (e) {			
		$.ajax({
			url: "<?php echo base_url()?>master/get_kecamatan",
			data: "kode_kabkot="+$("#kabkot_edit").val(),
			cache: false,
			success: function(data){				         
				$('#kecamatan_edit').html(data)           
			}
		});
		
	});			

		
	$(document).ready(function() {		


		new AutoNumeric("#anggaran_edit","commaDecimalCharDotSeparator");	

		var durasi = function () {
			var start 	= $('#timeawal_edit').val();
		    var end 	= $('#timeakhir_edit').val();

	     	var diff =  Math.abs(new Date(end) - new Date(start));
			var seconds = Math.floor(diff/1000);
			var minutes = Math.floor(seconds/60); 
			seconds = seconds % 60;
			var hours = Math.floor(minutes/60);
			minutes = minutes % 60;
			var total = 0
			total = minutes + (hours*60)
			console.log("Diff = " + hours + ":" + minutes + ":" + seconds);
			$("#durasi_tampilan_edit").val(hours+" jam "+minutes+" menit ");
			$("#durasi_pelatihan_edit").val(total);
		};
		
		
		$('#timeawal_edit').datetimepicker();
		$('#timeakhir_edit').datetimepicker(
			// {useCurrent: false /*Important! See issue #1075*/}
		);
		$("#timeawal_edit").on("dp.change", function (e) {
		   $('#timeakhir_edit').data("DateTimePicker").minDate(e.date);
		   $("#inputStartTglPelaksanaan_edit").val(e.date.format('YYYY-MM-DD'));
		   $("#inputStartTimePelaksanaan_edit").val(e.date.format('hh:mm A'));
		   durasi();		   
        });
        $("#timeakhir_edit").on("dp.change", function (e) {
		   $('#timeawal_edit').data("DateTimePicker").maxDate(e.date);
		   $("#inputAkhirTglPelaksanaan_edit").val(e.date.format('YYYY-MM-DD'));
		   $("#inputEndTimePelaksanaan_edit").val(e.date.format('hh:mm A'));	
		   durasi();
        });
				
	});
	
	
	//* TABLE RAB js start*//			

	$('.table-add-edit').click(function () {
		console.log('modaledit');
		var $clone = $('#table_rab_edit').find('tr.d-none').clone(true).removeClass('d-none');  
		$('#table_rab_edit').find('tbody').append($clone);
		calculate_grand_total_edit();
	});
	
	$('#tbody_rab_edit').delegate('.table-remove-edit','click',function () {		
		$(this).parents('tr').detach();
		calculate_grand_total_edit();
	});	

	$('#tbody_rab_edit').delegate('.table-up-edit','click',function () {        
		var $row = $(this).parents('tbody tr');
		if ($row.index() === 1) return;
		$row.prev().before($row.get(0));
	});

	$('#tbody_rab_edit').delegate('.table-down-edit','click',function () {
		var $row = $(this).parents('tbody tr');
		$row.next().after($row.get(0));
	});


	$('#tbody_rab_edit').delegate('tr','keyup',function () {            
		var index = parseInt($(this).index());
		var jumlah_rab = $("#table_rab_edit tbody tr:eq("+index+")").find("#jumlah_rab_edit").val(); 
		var unit_cost_rab = $("#table_rab_edit tbody tr:eq("+index+")").find("#unit_cost_rab_edit").val();
		sum = parseInt(jumlah_rab) * parseInt(unit_cost_rab);                


		$("#table_rab_edit tbody tr:eq("+index+")").find("#total_cost_rab_edit").val(sum);

		calculate_grand_total_edit();

	})

	function calculate_grand_total_edit(){
		var total = 0;
		$('tr #total_cost_rab_edit').each(function () {            
			var total_cost_rab = $(this).val();
			if (!isNaN(total_cost_rab) && total_cost_rab.length !== 0) {
				total += parseFloat(total_cost_rab);
			}
		});

		var rowCount = $('tr #total_cost_rab_edit').length;
		// $("#PelatihanRabCount").val(rowCount);        

		$("#total_cost_rab_akhir_edit").val(total);			
		
	}			  	  	
	//* TABLE RAB js end*//	 	
	
	$("#edit_pelatihan").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/update_pelatihan'); ?>";
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
				  title: 'Pelatihan telah di simpan',
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