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

				<div class="form-group row" id="select_nasabah_survey">
					<input type="hidden" class="form-control" id="id_bisnis_pelatihan" name="id_bisnis_pelatihan" value="2" />

					<label class="col-sm-2">ID Nasabah <span class="text-danger">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" required="" id="nasabah_id" name="nasabah_id">
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
<script type="text/javascript">
	$(document).ready(function() {

		$('#radio_lokasi').change(function() {
			selected_value = $("input[name='radio_lokasi']:checked").val();
			if (selected_value == 'online') {
				$('#provinsi').val('0');
				$('#kabkot').val('0');
				$('#kecamatan').val('0');

				$('#kabkot').html('<option value="0">online</option>');
				$('#kecamatan').html('<option value="0">online</option>');

				$("#select_tag_provinsi").hide();
				$("#select_tag_kabupaten").hide();

				$("#alamat_tempat_pelatihan").val('online');
			} else {
				$('#provinsi').val('');
				$('#kabkot').val('');
				$('#kecamatan').val('');

				$('#kabkot').html('');
				$('#kecamatan').html('');

				$("#select_tag_provinsi").show();
				$("#select_tag_kabupaten").show();

				$("#alamat_tempat_pelatihan").val('');
			}
		});

		new AutoNumeric("#anggaran", "commaDecimalCharDotSeparator");

		//$('.input-limit-datepicker').daterangepicker({
		//  timePicker: true
		//  ,locale: {
		//	format: 'DD MMMM YYYY hh:mm A'           
		//}
		//}, function(start, end, label) {						

		//$("#inputStartTglPelaksanaan").val(start.format('YYYY-MM-DD'));
		//$("#inputAkhirTglPelaksanaan").val(end.format('YYYY-MM-DD'));
		//$("#inputStartTimePelaksanaan").val(start.format('hh:mm A'));
		//$("#inputEndTimePelaksanaan").val(end.format('hh:mm A'));


		//var diff =  Math.abs(new Date(end) - new Date(start));
		//var seconds = Math.floor(diff/1000);
		//var minutes = Math.floor(seconds/60); 
		//seconds = seconds % 60;
		//var hours = Math.floor(minutes/60);
		//minutes = minutes % 60;
		//var total = 0
		//total = minutes + (hours*60)
		//console.log("Diff = " + hours + ":" + minutes + ":" + seconds);
		//$("#durasi_pelatihan").val(total);
		// console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
		//});

		var durasi = function() {
			var start = $('#timeawal').val();
			var end = $('#timeakhir').val();

			var diff = Math.abs(new Date(end) - new Date(start));
			var seconds = Math.floor(diff / 1000);
			var minutes = Math.floor(seconds / 60);
			seconds = seconds % 60;
			var hours = Math.floor(minutes / 60);
			minutes = minutes % 60;
			var total = 0
			total = minutes + (hours * 60)
			console.log("Diff = " + hours + ":" + minutes + ":" + seconds);
			$("#durasi_tampilan").val(hours + " jam " + minutes + " menit ");
			$("#durasi_pelatihan").val(total);
		};

		$('#timeawal').datetimepicker();
		$('#timeakhir').datetimepicker(
			// {useCurrent: false /*Important! See issue #1075*/}
		);
		$("#timeawal").on("dp.change", function(e) {
			$('#timeakhir').data("DateTimePicker").minDate(e.date);
			$("#inputStartTglPelaksanaan").val(e.date.format('YYYY-MM-DD'));
			$("#inputStartTimePelaksanaan").val(e.date.format('hh:mm A'));
			durasi();
		});
		$("#timeakhir").on("dp.change", function(e) {
			$('#timeawal').data("DateTimePicker").maxDate(e.date);
			$("#inputAkhirTglPelaksanaan").val(e.date.format('YYYY-MM-DD'));
			$("#inputEndTimePelaksanaan").val(e.date.format('hh:mm A'));
			durasi();
		});


		$(".select").select2({
			tags: true,
			tokenSeparators: [',', ' '],
			createTag: function() {
				// Disable tagging
				return null;
			}
		})

		$(".select_tag_region").select2({
			dropdownParent: $("#select_tag_region")
		});

		$(".select_tag_area").select2({
			dropdownParent: $("#select_tag_area")
		});

		$(".select_tag_provinsi").select2({
			dropdownParent: $("#select_tag_provinsi")
		});

		$(".select_tag_kabupaten").select2({
			dropdownParent: $("#select_tag_kabupaten")
		});

		$(".select_tag_kecamatan").select2({
			dropdownParent: $("#select_tag_kabupaten")
		});



		$('#regional_mekaar').on('change', function(e) {
			$.ajax({
				url: "<?php echo base_url() ?>master/get_area_mekaar",
				data: "kode_region=" + $("#regional_mekaar").val(),
				cache: false,
				success: function(data) {
					$('#area_mekaar').html(data)
				}
			});

		});

		$('#area_mekaar').on('change', function(e) {
			$.ajax({
				url: "<?php echo base_url() ?>master/get_cabang_mekaar",
				data: "kode_area=" + $("#area_mekaar").val(),
				cache: false,
				success: function(data) {
					$('#cabang_mekaar').html(data)
				}
			});

		});

		$('#provinsi').on('change', function(e) {
			$.ajax({
				url: "<?php echo base_url() ?>master/get_kabkot",
				data: "kode_provinsi=" + $("#provinsi").val(),
				cache: false,
				success: function(data) {
					$('#kabkot').html(data)
				}
			});

		});

		$('#kabkot').on('change', function(e) {
			$.ajax({
				url: "<?php echo base_url() ?>master/get_kecamatan",
				data: "kode_kabkot=" + $("#kabkot").val(),
				cache: false,
				success: function(data) {
					$('#kecamatan').html(data)
				}
			});

		});

		$('#jenis_nasabah_grading').on('change', function(e) {
			console.log($(this).val());
			$.ajax({
				url: "<?php echo base_url() ?>master/get_list_nasabah_grading",
				data: "id_jenis_nasabah=" + $(this).val(),
				cache: false,
				success: function(data) {
					$('#grading').html(data)
				}
			});
			if ($(this).val() == 1) {
				$('.grading_system').addClass('bg-danger text-white');
				$(".grading_system").removeClass('bg-warning bg-success bg-info');
			} else if ($(this).val() == 2) {
				$('.grading_system').addClass('bg-danger text-white');
				$(".grading_system").removeClass('bg-warning bg-success bg-info');				
			} else if ($(this).val() == 3) {
				$('.grading_system').addClass('bg-danger text-white');
				$(".grading_system").removeClass('bg-warning bg-success bg-info');											
			} else if ($(this).val() == 4) {
				$('.grading_system').addClass('bg-warning');
				$(".grading_system").removeClass('bg-danger bg-success bg-info text-white');
			} else if ($(this).val() == 5) {
				$('.grading_system').addClass('bg-warning');
				$(".grading_system").removeClass('bg-danger bg-success bg-info text-white');								
			} else if ($(this).val() == 6) {
				$('.grading_system').addClass('bg-success text-white');
				$(".grading_system").removeClass('bg-danger bg-warning bg-info');
			} else if ($(this).val() == 7) {
				$('.grading_system').addClass('bg-info text-white');
				$(".grading_system").removeClass('bg-danger bg-warning bg-success');
			} else {
				$('.grading_system').addClass('bg-default');
				$(".grading_system").removeClass('bg-danger bg-warning bg-success bg-info text-white');
			}

		});

		$('#tema_project_charter').on('change', function(e) {
			console.log($('#tema_project_charter').val());

			$.ajax({
				url: "<?php echo base_url() ?>pelatihan/get_data_project_charter",
				data: "no_project_charter=" + $("#tema_project_charter").val(),
				cache: false,
				success: function(data) {
					$('#judul_project_charter').html(data);
				}
			});
		});

		$('#judul_project_charter').on('change', function(e) {

			$.ajax({
				url: "<?php echo base_url() ?>pelatihan/get_pelatihan_project_charter",
				data: "id=" + $("#judul_project_charter").val(),
				cache: false,
				success: function(data) {
					var mydata = JSON.parse(data);
					console.log(mydata);
					$('#judul_pelatihan').val(mydata.data.JUDUL_PELATIHAN);
					$('#alamat_tempat_pelatihan').val(mydata.data.ALAMAT);

					const element = AutoNumeric.getAutoNumericElement('#anggaran')
					element.set(mydata.data.BUDGET);

					var dateawal = moment(mydata.data.TANGGAL);
					$('#timeawal').val(dateawal.format('MM/DD/YYYY hh:mm A'));
					$('#inputStartTglPelaksanaan').val(dateawal.format('YYYY-MM-DD'));
					$('#inputStartTimePelaksanaan').val(dateawal.format('hh:mm A'));

					$('#nama_nsbh').html('<a id="nama_nsbh" class="btn btn-light" href="<?php echo base_url() ?>'+mydata.data.FILE+'.pdf" target="_blank">View Dokumen</a>');


				}
			});
		});
	});

	//* TABLE RAB js start*//			

	$('.table-add-modaladd').click(function() {
		console.log('modaladd');
		var $clone = $('#table_rab_modaladd').find('tr.d-none').clone(true).removeClass('d-none');
		$('#table_rab_modaladd').find('tbody').append($clone);
		calculate_grand_total();
	});


	$('.table-remove-modaladd').click(function() {

		$(this).parents('tr').detach();
		calculate_grand_total();
	});

	$('.table-up-modaladd').click(function() {
		var $row = $(this).parents('tbody tr');
		if ($row.index() === 1) return;
		$row.prev().before($row.get(0));
	});

	$('.table-down-modaladd').click(function() {
		var $row = $(this).parents('tbody tr');
		$row.next().after($row.get(0));
	});


	$('#table_rab_modaladd tbody tr').keyup(function() {
		var index = parseInt($(this).index());
		var volume_rab = $("#table_rab_modaladd tbody tr:eq(" + index + ")").find("#volume_rab").val();
		var unit_cost_rab = $("#table_rab_modaladd tbody tr:eq(" + index + ")").find("#unit_cost_rab").val();
		sum = parseInt(volume_rab) * parseInt(unit_cost_rab);


		$("#table_rab_modaladd tbody tr:eq(" + index + ")").find("#total_cost_rab").val(sum);

		calculate_grand_total();

	})

	function calculate_grand_total() {
		var total = 0;
		$('tr #total_cost_rab').each(function() {
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



	$("#add_pelatihan").submit(function(e) {
		e.preventDefault();
		var formURL = "<?php echo base_url('pelatihan/post_pelatihan'); ?>";
		var frmdata = new FormData(this);

		Swal.fire({
              imageUrl: "<?= base_url() ?>assets/images/loader.gif",
              showConfirmButton: false,
              allowOutsideClick: false
            });

		if ($('#total_cost_rab_akhir').val() > 0) {
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

				if (obj.result == 'OK') {
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Pelatihan telah di simpan',
						showConfirmButton: false,
						timer: 1500
					})
					setTimeout(function() {
						window.location.href = '<?php echo base_url(); ?>pelatihan/mekaar';
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

		} else {
			Swal.fire({
				position: 'center',
				icon: 'error',
				title: 'Rencana Anggaran Biaya tidak boleh kosong',
				showConfirmButton: false,
				timer: 1500
			})
		}
	});
</script>