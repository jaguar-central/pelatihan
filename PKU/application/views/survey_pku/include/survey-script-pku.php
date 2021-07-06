<!-- Required datatable js -->

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->

<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

<!-- Modal-Effect -->

<script src="<?php echo base_url(); ?>assets/plugins/custombox/js/custombox.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/custombox/js/legacy.min.js"></script>

<!-- Responsive examples -->

<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>

<!-- <script src="http://cdn.datatables.net/plug-ins/1.10.13/dataRender/datetime.js"></script> -->


<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>


<!-- <script src="<?php echo base_url() ?>assets/js/googlejs.js"></script> -->

<!-- <script src="<?php echo base_url() ?>assets/js/locationpicker.jquery.min.js"></script> -->


<script src="<?php echo base_url() ?>assets/js/autoNumeric.js"></script>

<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyCwGoo1jtr3HgU66bulwQ6qDI4CJqpgJjU"></script> -->


<script type="text/javascript">			
    $(document).ready(function() {	

		$(".nasabah_ulamm").show();
		$(".nasabah_mekaar").hide();


		$('input[type=radio][name=pilih_nasabah]').change(function() {
			console.log(this.value);
			if (this.value == 'ulamm') {
				$(".nasabah_ulamm").show();
				$(".nasabah_mekaar").hide();
			}
			else if (this.value == 'mekaar') {
				$(".nasabah_ulamm").hide();
				$(".nasabah_mekaar").show();
			}
		});


        $('#nasabah_id_ulamm').select2({
            placeholder: "Cari Nasabah",
            minimumInputLength: 2,
			tags: true,
    		dropdownParent: $("#survey_pelatihan"),
            ajax: {
                url: '<?php echo base_url('pelatihan/get_nasabah_survey/'); ?>',
                dataType: 'json',
                type: "GET",
                quietMillis: 50,
                data: function(params){					
					var path = {
						find: params.term,
						column: "namanasabah",
						table: "nasabah",
					}
					return path;					
                },
                processResults: function (data) {
					console.log(data)
                    return {						
                        results: $.map(data.data, function (item) {
                            return {
                                text: item.nasabah_id+" - "+item.namanasabah,
                                id: item.nasabah_id+":"+item.namanasabah+":"+item.dessidsektorekonomi+":"+item.jml_pinjaman+":"+item.alamat+":"+item.no_hp
                            }
                        })
                    };
                },
			}
        }).on('change', function (e) {
			var myarr = this.value.split(":");

			$("#id_nasabah").val(myarr[0]);
			$("#nama_nasabah").val(myarr[1]);
			$("#usaha_nasabah").val(myarr[2]);
			$("#plafond_nasabah").val(myarr[3]);
			$("#alamat_nasabah").val(myarr[4]);
			$("#no_hp").val(myarr[5]);

		});



        $('#nasabah_id_mekaar').select2({
            placeholder: "Cari Nasabah",
            minimumInputLength: 2,
			tags: true,
    		dropdownParent: $("#survey_pelatihan"),
            ajax: {
                url: '<?php echo base_url('pelatihan/get_nasabah_survey/'); ?>',
                dataType: 'json',
                type: "GET",
                quietMillis: 50,
                data: function(params){					
					var path = {
						find: params.term,
						column: "nama",
						table: "debitur",
					}
					return path;					
                },
                processResults: function (data) {
					console.log(data)
                    return {						
                        results: $.map(data.data, function (item) {
                            return {
                                text: item.nasabahid+" - "+item.nama,
                                id: item.nasabahid+":"+item.nama+":"+item.jenis_usaha+":"+item.plafond+":"+item.alamat
                            }
                        })
                    };
                },
			}
        }).on('change', function (e) {
			var myarr = this.value.split(":");

			$("#id_nasabah").val(myarr[0]);
			$("#nama_nasabah").val(myarr[1]);
			$("#usaha_nasabah").val(myarr[2]);
			$("#plafond_nasabah").val(myarr[3]);
			$("#alamat_nasabah").val(myarr[4]);
			$("#no_hp").val("");
		});


		
		if (screen.width<660){
			$("#datatable").addClass("table-responsive"); 
		}else{
			$("#datatable").removeClass("table-responsive"); 
		}

		$("#survey_pelatihan").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_pelatihan_survey'); ?>";
		var frmdata = new FormData(this);

		//frmdata.append('survey_pelatihan');
		//frmdata.append('keterangan',CKEDITOR.instances.catatan.getData());
		//frmdata.append('result','approve');
		
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
					title: 'Survey telah di submit',
					showConfirmButton: false,
					timer: 1500
				})
				setTimeout(function () {
					window.location.href = '<?php echo base_url(); ?>pelatihan/survey_ulamm';
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


		$('#datatable').DataTable({
			"aaSorting" : [],	
			"paging": true,
			"processing": true,
			"serverSide": false,			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>"
		});																
	});
	

</script>     