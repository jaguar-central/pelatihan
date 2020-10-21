<!-- Modal -->
<div id="modaladd" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<div id="judul_modal">
			<h4>Add Pelatihan</h4>
		</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
			<?php 

			$attrib = array('class' => 'form-horizontal','id'=>'add_pelatihan','name'=>'add_pelatihan','enctype'=>'multipart/form-data','onkeydown'=>"return event.key != 'Enter';");
			echo form_open('',$attrib); 
			?>	
			<div class="modal-body">

				<div class="form-group card text-white bg-info select_project_charter">
				<div class="card-header">Project Charter</div>
				<div class="card-body row">
					<label class="col-sm-2">Pilih Tema <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control tema_project_charter" required="" id="tema_project_charter" name="tema_project_charter">
							<option value="">-- pilih tema project charter --</option>																
						</select>																	
					</div>


					<label class="col-sm-2">Pilih Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control judul_project_charter" required="" id="judul_project_charter" name="judul_project_charter">
							<option value="">-- tentukan tema project charter --</option>																
						</select>																	
					</div>
					</div>
				</div>

				<div class="form-group row">
					<input type="hidden" class="form-control" id="id_bisnis_pelatihan" name="id_bisnis_pelatihan" value="1" /> <!--ULAMM-->
								
					<label class="col-sm-2">Tipe Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="pelatihan_type" name="pelatihan_type" readonly>
							<option value="">--pilih tipe--</option>										
						</select>																	
					</div>
		
					<label class="col-sm-2">Cabang <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control select_tag" required="" id="cabang_ulamm" name="cabang_ulamm">
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
						<input type="text" class="form-control"  required="" id="judul_pelatihan" name="judul_pelatihan" />
					</div>							
				
					<label class="col-sm-2">Unit <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control select" required="" id="unit_ulamm" name="unit_ulamm[]" multiple="multiple">
							<option value="">--pilih unit--</option>											
						</select>																	
					</div>							
				</div>								

				<div class="form-group row">
					<label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<textarea class="form-control" id="deskripsi_pelatihan" name="deskripsi_pelatihan" rows="4" required=""></textarea>
					</div>

					<label class="col-sm-2">Grade <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control select_tag" required="" id="grading" name="grading">
							<option value="">--pilih grade--</option>

							<?php 
								foreach ($grade_ulamm as $data_grade){
									echo '<option value="'.$data_grade->ID.'">'.$data_grade->GRADING_DESKRIPSI.'</option>';                                                                    
								}
								?>										
						</select>	
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
								<input type='text' class="form-control" id='timeawal' />
								<span class="input-group-addon bg-custom b-0">s/d</span>
								<input type='text' class="form-control" id='timeakhir' />
							</div>							

							<input type="hidden" id="inputStartTglPelaksanaan" name="inputStartTglPelaksanaan" />
							
							<input type="hidden" id="inputStartTimePelaksanaan" name="inputStartTimePelaksanaan" />

							<input type="hidden" id="inputAkhirTglPelaksanaan" name="inputAkhirTglPelaksanaan"/>
							
							<input type="hidden" id="inputEndTimePelaksanaan" name="inputEndTimePelaksanaan" />

						</div>

					</div>
					
					<label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="durasi_tampilan" readonly="" />
						<input type="hidden" class="form-control"  required="" id="durasi_pelatihan" name="durasi_pelatihan" />
					</div>	
				</div>			


				<div class="form-group row">
					<label class="col-sm-2">Pembicara <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="pembicara_pelatihan" name="pembicara_pelatihan" />
					</div>							
				
					<label class="col-sm-2">Kuota Peserta <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="kuota_peserta" name="kuota_peserta" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
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
						<input type="text" class="form-control"  required="" id="anggaran" name="anggaran" />				
					</div>             	
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Provinsi <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control select_tag" required="" id="provinsi" name="provinsi">
							<option value="">- Pilih Provinsi -</option>
								<?php 
								foreach ($provinsi as $data_provinsi){
									echo '<option value="'.$data_provinsi->MS_KODE_PROVINSI.'">'.$data_provinsi->MS_PROVINSI.'</option>';                                                                    
								}
								?>	
						</select>
					</div>                          
				
					<label class="col-sm-2">Alamat Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="alamat_tempat_pelatihan" name="alamat_tempat_pelatihan" />
					</div>                      
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Kabupaten / Kota <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control select_tag" required="" id="kabkot" name="kabkot">
						</select>
					</div>              

					<label class="col-sm-2">Kecamatan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control select_tag" required="" id="kecamatan" name="kecamatan">
						</select>
					</div>              					                  
				</div>				

				<!-- <div class="form-group row">
					<label class="col-sm-2">Lokasi Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control"  required="" id="lokasi_pelatihan_add" name="lokasi_pelatihan" />
					</div>                                
				</div>

				<div class="form-group row">
					<label class="col-sm-4" >Radius <span class="text-danger">*</span></label>
					<label class="col-sm-4">Latitude <span class="text-danger">*</span></label>
					<label class="col-sm-4">Longitude <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="radius_add" name="radius" />
					</div>               
					
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="latitude_add" name="latitude" />
					</div>                          
				
					
					<div class="col-sm-4">
						<input type="text" class="form-control"  required="" id="longitude_add" name="longitude" />
					</div>                      
				</div>

				<div class="col-xs-12" style="margin-bottom:30px;">
						<div id="us_add" style="width:100%; height: 400px;"></div>
				</div> -->

				<div class="container-fluid">
				  <div class="row">
					<div class="col-md-12">
					  <div class="card">
						<div class="card-header card-header-primary">
						  <h4 class="card-title ">Rencana Anggaran Biaya</h4>                        
						</div>
						<div class="card-body">
						  <div class="table">                
							<table id="table_rab_modaladd"  class="table">
								  <thead class=" text-primary col-md-12">
									  <th class="col-md-2">Uraian</th>
									  <th class="col-md-2">Jumlah</th>
									  <th class="col-md-2">Unit</th>
									  <th class="col-md-2">Unit Cost</th>
									  <th class="col-md-2">Sub Total Cost</th>
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
									<input style="text-align:right" type="text" class="form-control money" id="total_cost_rab_akhir" name="total_cost_rab_akhir" data-a-sign="Rp. " value="" readonly="" required>
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
				<?php echo form_submit('submit', 'Submit', 'class="btn btn-outline-primary submit"'); ?>
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
			</div>
	  
		<?php echo form_close(); ?>
		</div>

	</div>
 </div>
</div>

<script type="text/javascript">

	$(document).ready(function() {	

		new AutoNumeric("#anggaran","commaDecimalCharDotSeparator");		

		var durasi = function () {
			var start 	= $('#timeawal').val();
		    var end 	= $('#timeakhir').val();

	     	var diff =  Math.abs(new Date(end) - new Date(start));
			var seconds = Math.floor(diff/1000);
			var minutes = Math.floor(seconds/60); 
			seconds = seconds % 60;
			var hours = Math.floor(minutes/60);
			minutes = minutes % 60;
			var total = 0
			total = minutes + (hours*60)
			console.log("Diff = " + hours + ":" + minutes + ":" + seconds);
			$("#durasi_tampilan").val(hours+" jam "+minutes+" menit ");
			$("#durasi_pelatihan").val(total);
		};		

		$('#timeawal').datetimepicker();
		$('#timeakhir').datetimepicker(
			// {useCurrent: false /*Important! See issue #1075*/}
		);
		$("#timeawal").on("dp.change", function (e) {
		   $('#timeakhir').data("DateTimePicker").minDate(e.date);
		   $("#inputStartTglPelaksanaan").val(e.date.format('YYYY-MM-DD'));
		   $("#inputStartTimePelaksanaan").val(e.date.format('hh:mm A'));
		   durasi();		   
        });
        $("#timeakhir").on("dp.change", function (e) {
		   $('#timeawal').data("DateTimePicker").maxDate(e.date);
		   $("#inputAkhirTglPelaksanaan").val(e.date.format('YYYY-MM-DD'));
		   $("#inputEndTimePelaksanaan").val(e.date.format('hh:mm A'));	
		   durasi();
        });


		$(".select").select2({
			tags: true,
			tokenSeparators: [',', ' '],
			createTag: function () {
			// Disable tagging
			return null;
			}
		})		
		
		$(".select_tag").select2({
			dropdownParent: $("#modaladd")
		});	
		
		
		
		$('#cabang_ulamm').on('change', function (e) {			
			$.ajax({
				url: "<?php echo base_url()?>master/get_unit_ulamm",
				data: "kode_cabang="+$("#cabang_ulamm").val(),
				cache: false,
				success: function(data){				         
					$('#unit_ulamm').html(data)           
				}
			});
			
		});


		$('#provinsi').on('change', function (e) {			
			$.ajax({
				url: "<?php echo base_url()?>master/get_kabkot",
				data: "kode_provinsi="+$("#provinsi").val(),
				cache: false,
				success: function(data){				         
					$('#kabkot').html(data)           
				}
			});
			
		});

		$('#kabkot').on('change', function (e) {			
			$.ajax({
				url: "<?php echo base_url()?>master/get_kecamatan",
				data: "kode_kabkot="+$("#kabkot").val(),
				cache: false,
				success: function(data){				         
					$('#kecamatan').html(data)           
				}
			});
			
		});		

		


		$('#tema_project_charter').on('change', function (e) {	
			console.log($('#tema_project_charter').val());

			$.ajax({
				url: "<?php echo base_url()?>pelatihan/get_data_project_charter",
				data: "id_project_charter="+$("#tema_project_charter").val(),
				cache: false,
				success: function(data){	
					$('#judul_project_charter').html(data);	        
				}
			});
		});		

		$('#judul_project_charter').on('change', function (e) {

			$.ajax({
				url: "<?php echo base_url()?>pelatihan/get_pelatihan_project_charter",
				data: "id="+$("#judul_project_charter").val(),
				cache: false,
				success: function(data){											
					var mydata = JSON.parse(data);
					// console.log(mydata.data.JUDUL_PELATIHAN);
					$('#judul_pelatihan').val(mydata.data.JUDUL_PELATIHAN);
					$('#alamat_tempat_pelatihan').val(mydata.data.ALAMAT);
					$('#anggaran').val(mydata.data.BUDGET);
					new AutoNumeric("#anggaran","commaDecimalCharDotSeparator");

					var dateawal = moment(mydata.data.TANGGAL);
					$('#timeawal').val(dateawal.format('MM/DD/YYYY hh:mm A'));	
					$('#inputStartTglPelaksanaan').val(dateawal.format('YYYY-MM-DD'));	
					$('#inputStartTimePelaksanaan').val(dateawal.format('hh:mm A'));				
					
				
				}
			});
		});		
	});		

	// $('#us_add').locationpicker({
    //     location: {
    //           latitude: <?php //echo $this->session->userdata('sess_user_latitude'); ?>,
    //           longitude: <?php //echo $this->session->userdata('sess_user_longitude'); ?>
	// 	},
    //     radius: 50,
    //     inputBinding: {
    //         latitudeInput: $('#latitude_add'),
    //         longitudeInput: $('#longitude_add'),
    //         radiusInput: $('#radius_add'),
    //         locationNameInput: $('#lokasi_pelatihan_add')
    //     },
    //     enableAutocomplete: true,
    //     onchanged: function (currentLocation, radius, isMarkerDropped) {
  
    //     }
    // });



	//* TABLE RAB js start*//			

	$('.table-add-modaladd').click(function () {
		console.log('modaladd');
		var $clone = $('#table_rab_modaladd').find('tr.d-none').clone(true).removeClass('d-none');  
		$('#table_rab_modaladd').find('tbody').append($clone);
		calculate_grand_total();
	});

	
	$('.table-remove-modaladd').click(function () {		

		$(this).parents('tr').detach();
		calculate_grand_total();
	});

	$('.table-up-modaladd').click(function () {        
		var $row = $(this).parents('tbody tr');
		if ($row.index() === 1) return;
		$row.prev().before($row.get(0));
	});

	$('.table-down-modaladd').click(function () {
		var $row = $(this).parents('tbody tr');
		$row.next().after($row.get(0));
	});


	$('#table_rab_modaladd tbody tr').keyup(function () {            
		var index = parseInt($(this).index());
		var jumlah_rab = $("#table_rab_modaladd tbody tr:eq("+index+")").find("#jumlah_rab").val(); 
		var unit_cost_rab = $("#table_rab_modaladd tbody tr:eq("+index+")").find("#unit_cost_rab").val();
		sum = parseInt(jumlah_rab) * parseInt(unit_cost_rab);                


		$("#table_rab_modaladd tbody tr:eq("+index+")").find("#total_cost_rab").val(sum);

		calculate_grand_total();

	})

	function calculate_grand_total(){
		var total = 0;
		$('tr #total_cost_rab').each(function () {            
			var total_cost_rab = $(this).val();
			if (!isNaN(total_cost_rab) && total_cost_rab.length !== 0) {
				total += parseFloat(total_cost_rab);
			}
		});

		var rowCount = $('tr #total_cost_rab').length;
		$("#PelatihanRabCount").val(rowCount);        

		$("#total_cost_rab_akhir").val(total);			
		
	}			  	  	
	//* TABLE RAB js end*//	 	
	
	
			
	$("#add_pelatihan").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_pelatihan'); ?>";
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
