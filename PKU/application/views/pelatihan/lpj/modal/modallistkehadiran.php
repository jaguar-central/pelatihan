<!-- Modal -->
<div id="modallistkehadiran" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<div id="judul_modal">
				<h4>List Kehadiran</h4>
			</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<div class="modal-body">
			<!--div class="main-content"-->
				<div class="section__content section__content--p10">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<!--h2 class="title-1 m-b-25">Earnings By Items</h2-->
								<div class="table-style">
									<table id="datatable_listkehadiran" class="table table-hover"> 
										<thead>
											<tr>
												<th>KTP</th>											
												<th>Bisnis</th>
												<th>Nama</th>
												<th>Tipe Nasabah</th>												
											</tr>
										</thead>
										<tbody>
										

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!--/div-->
		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
  </div>
</div>
		
<script>
    $(document).ready(function() {	
		// var datatable_listkehadiran = $('#datatable_listkehadiran').DataTable({	
			// "paging": true,
			// "processing": true,
			// "serverSide": false,			
			// "dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>"
		// });	

		$('#datatable_listkehadiran').DataTable({	
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('pelatihan/get_kehadiran/'.$this->uri->segment(3)); ?>',
			"type" :'GET'                      
			},
			"columns" : [
				{ "data": "KTP", render: function (data, type, row)
				    {
						return '<input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.KTP+'">'+row.KTP;
					}
				},
				{ "data": "BISNIS" },
				{ "data": "NAMA" },
				{ "data": "NASABAH_TIPE" },				
			],
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>",
			"createdRow" : function (row, data, index) {
				$(row).addClass("remove-kehadiran");      
			}
		});		
	});

	$(document).on("click", ".add-kehadiran-ulamm", function () {					
		var index = parseInt($(this).index());				
		
		var bisnis 			= $("tr.add-kehadiran-ulamm:eq("+index+") #bisnis").val();
		var ktp 			= $("tr.add-kehadiran-ulamm:eq("+index+") #ktp").val();
		var nama_nasabah 	= $("tr.add-kehadiran-ulamm:eq("+index+") #nama_nasabah").val();				
		var no_hp 			= $("tr.add-kehadiran-ulamm:eq("+index+") #no_hp").val();				
		var kolektibilitas 	= $("tr.add-kehadiran-ulamm:eq("+index+") #kolektibilitas").val();				
		var cabang 			= $("tr.add-kehadiran-ulamm:eq("+index+") #cabang").val();				
		var unit 			= $("tr.add-kehadiran-ulamm:eq("+index+") #unit").val();				

		$.post("<?php echo base_url('pelatihan/post_kehadiran'); ?>",
		{	
			id_pelatihan	: '<?php echo $this->uri->segment(3); ?>',
			bisnis			: bisnis,
			ktp				: ktp,
			nama_nasabah	: nama_nasabah,
			no_hp			: no_hp,
			kolektibilitas	: kolektibilitas,
			cabang			: cabang,
			unit			: unit
		},
		function(data, status){
			$('#datatable_listkehadiran').DataTable().draw();
			$('#datatable_kehadiran_ulamm').DataTable().draw();
			console.log("Data: " + data + "\nStatus: " + status);
		});

	});	
	
	
	$(document).on("click", ".add-kehadiran-mekaar", function () {					
		var index = parseInt($(this).index());				
		
		var bisnis 			= $("tr.add-kehadiran-mekaar:eq("+index+") #bisnis").val();
		var ktp 			= $("tr.add-kehadiran-mekaar:eq("+index+") #ktp").val();
		var nama_nasabah 	= $("tr.add-kehadiran-mekaar:eq("+index+") #nama_nasabah").val();				
		var no_hp 			= $("tr.add-kehadiran-mekaar:eq("+index+") #no_hp").val();				
		var produk		 	= $("tr.add-kehadiran-mekaar:eq("+index+") #produk").val();				
		var region 			= $("tr.add-kehadiran-mekaar:eq("+index+") #Region").val();				
		var area 			= $("tr.add-kehadiran-mekaar:eq("+index+") #Area").val();				

		$.post("<?php echo base_url('pelatihan/post_kehadiran'); ?>",
		{	
			id_pelatihan	: '<?php echo $this->uri->segment(3); ?>',
			bisnis			: bisnis,
			ktp				: ktp,
			nama_nasabah	: nama_nasabah,
			no_hp			: no_hp,
			produk			: produk,
			region			: region,
			area			: area
		}r
		function(data, status){
			$('#datatable_listkehadiran').DataTable().draw();
			$('#datatable_kehadiran_ulamm').DataTable().draw();
			console.log("Data: " + data + "\nStatus: " + status);
		});

	});


	$(document).on("click", ".add-kehadiran-non-nasabah", function () {					
		var index = parseInt($(this).index());				
		
		var ktp 			= $("tr.add-kehadiran-non-nasabah:eq("+index+") #ktp").val();
		var bisnis 			= $("tr.add-kehadiran-non-nasabah:eq("+index+") #bisnis").val();
		var nama_nasabah 	= $("tr.add-kehadiran-non-nasabah:eq("+index+") #nama_nasabah").val();
		var no_hp 			= $("tr.add-kehadiran-non-nasabah:eq("+index+") #no_hp").val();				
		var alamat 			= $("tr.add-kehadiran-non-nasabah:eq("+index+") #alamat").val();				
		var cabang 			= $("tr.add-kehadiran-non-nasabah:eq("+index+") #cabang").val();				
		var unit 			= $("tr.add-kehadiran-non-nasabah:eq("+index+") #unit").val();	


		$.post("<?php echo base_url('pelatihan/post_kehadiran'); ?>",
		{	
			id_pelatihan	: '<?php echo $this->uri->segment(3); ?>',
			ktp				: ktp,
			bisnis			: bisnis,
			nama_nasabah	: nama_nasabah,
			no_hp			: no_hp,
			alamat			: alamat,
			cabang			: cabang,
			unit			: unit
		},
		function(data, status){
			$('#datatable_listkehadiran').DataTable().draw();
			$('#datatable_kehadiran_ulamm').DataTable().draw();
			console.log("Data: " + data + "\nStatus: " + status);
		});

	});

	
	$(document).on("click", ".remove-kehadiran", function () {	
		var index = parseInt($(this).index());					
		var ktp = $("tr.remove-kehadiran:eq("+index+") #ktp").val();					
		
		$.post("<?php echo base_url('pelatihan/delete_kehadiran/'); ?>",
		{
			id_pelatihan : '<?php echo $this->uri->segment(3); ?>',
			ktp : ktp
		},
		function(data, status){
			$('#datatable_listkehadiran').DataTable().draw();
			$('#datatable_kehadiran_ulamm').DataTable().draw();
			console.log("Data: " + data + "\nStatus: " + status);
		});		
		
	});
</script>