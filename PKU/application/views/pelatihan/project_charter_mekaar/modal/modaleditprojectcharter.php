<style>
	@media (max-width: 767px) {
		#judul_pelatihan_edit {
			width: 400px;
		}

		#tanggal_pelatihan_edit {
			width: 150px;
		}

		#time_pelatihan_edit {
			width: 150px;
		}

		#cabang_ulamm_edit {
			width: 150px;
		}

		#cabang_ulamm_edit {
			width: 150px;
		}

		#alamat_pelatihan_edit {
			width: 150px;
		}

		#budget_pelatihan_edit {
			width: 150px;
		}
	}
</style>

<!-- Modal -->
<div id="modaleditprojectcharter" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<div id="judul_modal">
					<h4>Edit Project Charter</h4>
				</div>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?php

			$attrib = array('class' => 'form-horizontal', 'id' => 'edit_project_charter', 'name' => 'edit_project_charter', 'enctype' => 'multipart/form-data', 'onkeydown' => "return event.key != 'Enter';");
			echo form_open('', $attrib);
			?>
			<div class="modal-body">

				<div class="form-group row">
					<input type="hidden" class="form-control" id="id_project_charter" name="id_project_charter" />

					<label class="col-sm-2 offset-sm-3">Tipe Pelatihan <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="type_klasterisasi_edit" name="type_klasterisasi" readonly>
							<option value="">--pilih tipe--</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 offset-sm-3">No Project Charter <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="no_project_charter_edit" name="no_project_charter_edit" readonly />														
					</div>
				</div>					

				<div class="form-group row">
					<label class="col-sm-2 offset-sm-3">Tema <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<textarea class="form-control" id="tema_project_charter_edit" name="tema_project_charter" maxlength="250" rows="4" required=""></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 offset-sm-3">Upload File <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="file" class="custom-file-edit" id="customFile_edit" name="filename">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
				</div>

			</div>


			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header card-header-primary">
								<h4 class="card-title ">Pelatihan</h4>
							</div>
							<div class="card-body">
								<div class="table">
									<table id="table_charter_modaledit" class="table">
										<thead class=" text-primary col-md-12">
											<th class="col-md-2">Judul</th>
											<th class="col-md-3">Tanggal</th>
											<th class="col-md-2">Cabang</th>
											<th class="col-md-2">Alamat</th>
											<th class="col-md-2">Budget</th>
											<th></th>
											<th></th>
										</thead>
										<tbody id="tbody_charter_modaledit">
											<tr class="d-none">
												<td><input type="text" class="form-control" id="judul_pelatihan_edit" name="judul_pelatihan[]" maxlength="250"></td>
												<td>
													<div class='input-group'>
														<input type="date" class="form-control" id="tanggal_pelatihan_edit" name="tanggal_pelatihan[]">
														<input type="time" class="form-control" id="time_pelatihan_edit" name="time_pelatihan[]">
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div>
												</td>
												<td>
													<select class="form-control" id="cabang_ulamm_edit" name="cabang_ulamm[]">
														<option value="">--pilih cabang--</option>

														<?php
														foreach ($cabang as $data_cabang) {
															echo '<option value="' . $data_cabang->KODE_CABANG . '">' . $data_cabang->KODE_CABANG . ' - ' . $data_cabang->DESKRIPSI . '</option>';
														}
														?>
													</select>
												</td>
												<td><input type="text" class="form-control" id="alamat_pelatihan_edit" name="alamat_pelatihan[]" maxlength="250" value=""></td>
												<td><input type="text" class="form-control" id="budget_pelatihan_edit" name="budget_pelatihan[]" value=""></td>
												<td>
													<a class="table-remove-modaledit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>
												</td>
												<td>
													<a class="table-up-modaledit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>
													<a class="table-down-modaledit btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>
												</td>
											</tr>
										</tbody>
									</table>

									<div class="col-md-12"></div>

									<div>



										</br>
										<a class="table-add-modaledit btn btn-outline-primary" href="#"><i class="fas fa-plus"></i></a>
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
	$(".custom-file-edit").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});


	var $TABLE_EDIT = $('#table_charter_modaledit');

	$('.table-add-modaledit').click(function() {
		var $clone = $TABLE_EDIT.find('tr.d-none').clone(true).removeClass('d-none');
		$TABLE_EDIT.find('tbody').append($clone);
	});

	// $('#tbody_rab_edit').delegate('.table-remove-edit','click',function () {    
	$('#tbody_charter_modaledit').delegate('.table-remove-modaledit', 'click', function() {
		// $('.table-remove-modaledit').click(function () {		
		$(this).parents('tr').detach();
	});

	$('.table-up-modaledit').click(function() {
		var $row = $(this).parents('tbody tr');
		if ($row.index() === 1) return;
		$row.prev().before($row.get(0));
	});

	$('.table-down-modaledit').click(function() {
		var $row = $(this).parents('tbody tr');
		$row.next().after($row.get(0));
	});


	$("#edit_project_charter").submit(function(e) {
		e.preventDefault();
		var formURL = "<?php echo base_url('pelatihan/post_project_charter'); ?>";
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
				  title: 'Project Charter telah di simpan',
				  showConfirmButton: false,
				  timer: 1500
				})
				setTimeout(function () {
					window.location.href = '<?php echo base_url(); ?>pelatihan/<?php echo $this->uri->segment(2); ?>';
				}, 1600);									
			}
			if (obj.result == 'UP') {
				console.log(data);
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: obj.msg,
					showConfirmButton: false,
					timer: 1500
				})
			}
			if (obj.result == 'NG') {
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