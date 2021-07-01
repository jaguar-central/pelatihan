<!-- Modal -->
<div id="modaladd" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<div id="judul_modal">
					<h4>Add Survey Nasabah</h4>
				</div>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

		    <?php

			$attrib = array('class' => 'form-horizontal', 'id' => 'survey_pelatihan', 'name' => 'survey_pelatihan', 'enctype' => 'multipart/form-data', 'onkeydown' => "return event.key != 'Enter';");
			echo form_open('', $attrib);
			?>
			<div class="modal-body">

				<div class="form-group row">
					<label class="col-form-label col-md-2">Pilih Nasabah</label>
					<div class="col-md-10">
						<input type="radio" id="pilih_nasabah_ulamm" name="pilih_nasabah" value="ulamm" checked >
						<label for="pilih_nasabah_ulamm">ULAMM &nbsp;&nbsp;&nbsp; </label>
						<input type="radio" id="pilih_nasabah_mekaar" name="pilih_nasabah" value="mekaar">
						<label for="pilih_nasabah_mekaar">MEKAAR</label>
					</div>
				</div>

				<div class="form-group row" id="select_nasabah_survey">
					<label class="col-sm-2">ID Nasabah <span class="text-danger">*</span></label>
					<div class="col-sm-4 nasabah_ulamm">
						<select class="form-control" required="" id="nasabah_id_ulamm" name="nasabah_id_ulamm">
							<option value="">--pilih ID--</option>
						</select>
					</div>
					<div class="col-sm-4 nasabah_mekaar">
						<select class="form-control" required="" id="nasabah_id_mekaar" name="nasabah_id_mekaar">
							<option value="">--pilih ID--</option>
						</select>
					</div>


					<label class="col-sm-2">Jenis Usaha <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" required="" id="usaha_nasabah" name="usaha_nasabah" maxlength="150" readonly/>
					</div>
				</div>

				<div class="form-group row" id="select_tag_area">
					<label class="col-sm-2">Nama Nasabah <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" required="" id="nama_nasabah" name="nama_nasabah" maxlength="150" readonly/>
					</div>

					<label class="col-sm-2">No Hp <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" required="" id="no_hp" name="no_hp" maxlength="150" readonly/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2">Plafond <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" required="" id="plafond_nasabah" name="plafond_nasabah" maxlength="150" readonly/>
					</div>

					<label class="col-sm-2">Alamat <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" required="" id="alamat_nasabah" name="alamat_nasabah" maxlength="150" readonly/>
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
