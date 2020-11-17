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

<script src="http://cdn.datatables.net/plug-ins/1.10.13/dataRender/datetime.js"></script>

<script type="text/javascript">

    $(document).ready(function() {	

		$(".select").select2({
			tags: true,
			tokenSeparators: [',', ' '],
			createTag: function () {
			// Disable tagging
			return null;
			}
		})	

		$('#user_table').DataTable({"dom": "<'dom_datable offset-md-6'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>"});
		
		
		$("#list_user_sso").DataTable({
			"bLengthChange": false,
			"ajax": "get_sso_karyawan",
			"columns" : [
				{ "data": "profile_id_sdm" },
				{ "data": "profile_nama" },
				{ "data": "profile_nip" },
				{ "data": "profile_username" },				
				{ "data" : "profile_id_sdm", render: function (data, type, row)
					{
						var  data;
						data = '<a href="#view-detail" class="btn action btn-info  waves-effect waves-light view-detail" data-animation="blur" data-plugin="custommodal"'+
						'data-overlaySpeed="100" data-overlayColor="#36404a" >'+
						'<span class="btn-label"><i class="fa fa-eye"></i></span> Pilih'+						
						'</a>';
						return data;
					}
				}
			],
			"dom": "<'dom_datable offset-md-6'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>"
		});	
		
			
		$('#list_user_sso tbody').on('click', 'tr', function () {
			var $row = $(this).closest("tr");    // Find the row
			var idsdm	 		= $row.find("td:nth-child(1)");
			var username 		= $row.find("td:nth-child(4)");		
					
			$("#username").val(username.text());
			$("#profile_idsdm").val(idsdm.text());
			
			$('#user_sso').modal('hide');			
		});
		
		// $(".bisnis").hide();
		
		$('#role').on('change', function (e) {			
			var role = $("#role").val();
			
			if (role>=5){
				$(".bisnis").hide();				
				$(".cabang_ulamm").hide();
			}else{
				$(".bisnis").show();
				$(".cabang_ulamm").show();
			}			
			
		});	
		
	});
	
	$("#form-add-user").submit(function(e){
		e.preventDefault();		
		var formURL = "<?php echo base_url('master/post_user'); ?>";
		var formDatas = new FormData(this);						
		$("#loader").show();
		var xhr = $.ajax({
			url: formURL,
			type: 'POST',
			data: formDatas,
			processData: false,
			contentType: false
		});
		xhr.done(function(data) {
			var obj = $.parseJSON(data);
			
			if(obj.result == 'OK')
			{
				location.reload();
			}
			if(obj.result == 'NG')
			{
				$("#loader").hide();
				$("#m-ap-cab").html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> '+obj.msg+'</div>');
			}
			
			console.log(data);
		});
		xhr.fail(function() {
			$("#loader").hide();
			var failMsg = "Something error happened! as";
			alert(failMsg);
		});	
	});		

     
</script>       