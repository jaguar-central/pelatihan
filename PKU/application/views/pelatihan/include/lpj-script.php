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


<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>




<script type="text/javascript">

$(document).ready(function() {


		$('.submit_lpj').prop('disabled', true);
	
		$('#cabang_kehadiran').on('change', function (e) {			
			$.ajax({
				url: "<?php echo base_url()?>master/get_unit_ulamm",
				data: "kode_cabang="+$("#cabang_kehadiran").val(),
				cache: false,
				success: function(data){				         
					$('#unit_kehadiran').html(data)           
				}
			});			
		});

		var table_kehadiran_non_nasabah = $('#datatable_kehadiran_non_nasabah').DataTable({	
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('pelatihan/get_paging_kehadiran_non_nasabah/'); ?>',
			"type" :'GET'                      
			},
			"columns" : [
				{ "data": "NO_KTP", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="bisnis" name="bisnis[]" value="NON_NASABAH"><input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.NO_KTP+'">'+row.NO_KTP;
                } 
              },
              { "data": "NAMA", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="nama_nasabah" name="nama_nasabah[]" value="'+row.NAMA+'">'+row.NAMA;
                } 
              },
              { "data": "NO_HP", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="no_hp" name="no_hp[]" value="'+row.NO_HP+'">'+row.NO_HP;
                }  
              },
              { "data": "ALAMAT", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="alamat" name="alamat[]" value="'+row.ALAMAT+'">'+row.ALAMAT;
                }  
              },    
              { "data": "CABANG", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="cabang" name="cabang[]" value="'+row.CABANG+'">'+row.CABANG;
                }  
              },    
              { "data": "UNIT", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="unit" name="unit[]" value="'+row.UNIT+'">'+row.UNIT;
                } 
              },                         
			],
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i>",
			"createdRow" : function (row, data, index) {
				$(row).addClass("add-kehadiran-non-nasabah");      
			}
		});				
		
		
		var table_kehadiran_ulamm = $('#datatable_kehadiran_ulamm').DataTable({	
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('pelatihan/get_paging_kehadiran_nasabah_ulamm/'.$this->uri->segment(3)); ?>',
			"type" :'GET'                      
			},
			"columns" : [
              { "data": "KTP", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="bisnis" name="bisnis[]" value="ULAMM"><input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.KTP+'">'+row.KTP;
                } 
              },
              { "data": "NAMA_NASABAH", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="nama_nasabah" name="nama_nasabah[]" value="'+row.NAMA_NASABAH+'">'+row.NAMA_NASABAH;
                } 
              },
              { "data": "NO_HP", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="no_hp" name="no_hp[]" value="'+row.NO_HP+'">'+row.NO_HP;
                }  
              },
              { "data": "KOLEKTIBILITAS", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="kolektibilitas" name="kolektibilitas[]" value="'+row.KOLEKTIBILITAS+'">'+row.KOLEKTIBILITAS;
                }  
              },    
              { "data": "CABANG", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="cabang" name="cabang[]" value="'+row.CABANG+'">'+row.CABANG;
                }  
              },    
              { "data": "UNIT", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="unit" name="unit[]" value="'+row.UNIT+'">'+row.UNIT;
                } 
              },                         
			],			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>",
			"createdRow" : function (row, data, index) {
				$(row).addClass("add-kehadiran-ulamm");      
			}
		});			
		

		$(document).on("change", "#sektor_ekonomi, #jenis_pinjaman, #jenis_program, #cabang_kehadiran, #unit_kehadiran", function () {			
			var sektor_ekonomi 	= $('#sektor_ekonomi').val();			
			var jenis_pinjaman 	= $('#jenis_pinjaman').val();			
			var jenis_program 	= $('#jenis_program').val();			
			var cabang 			= $('#cabang_kehadiran').val();			
			var unit 			= $('#unit_kehadiran').val();			
			
			table_kehadiran_ulamm.clear();
			table_kehadiran_ulamm.column(0).search( sektor_ekonomi=='0' ? '' : sektor_ekonomi   );
			table_kehadiran_ulamm.column(1).search( jenis_pinjaman=='0' ? '' : jenis_pinjaman   );
			table_kehadiran_ulamm.column(2).search( jenis_program=='0' ? '' : jenis_program   );
			table_kehadiran_ulamm.column(3).search( cabang=='0' ? '' : cabang   );
			table_kehadiran_ulamm.column(4).search( unit=='0' ? '' : unit   );

			table_kehadiran_ulamm.clear().draw();
		});		








		var table_kehadiran_mekaar = $('#datatable_kehadiran_mekaar').DataTable({	
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('pelatihan/get_paging_kehadiran_nasabah_mekaar/'.$this->uri->segment(3)); ?>',
			"type" :'GET'                      
			},
			"columns" : [
              { "data": "NoKTP", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="bisnis" name="bisnis[]" value="MEKAAR"><input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.NoKTP+'">'+row.NoKTP;
                } 
              },
              { "data": "Nama", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="nama_nasabah" name="nama_nasabah[]" value="'+row.Nama+'">'+row.Nama;
                } 
              },
              { "data": "Alamat", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="no_hp" name="no_hp[]" value="'+row.Alamat+'">'+row.Alamat;
                }  
              },
              { "data": "Produk", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="produk" name="produk[]" value="'+row.Produk+'">'+row.Produk;
                }  
              },    
              { "data": "Region", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="region" name="region[]" value="'+row.Region+'">'+row.Region;
                }  
              },    
              { "data": "Area", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="area" name="area[]" value="'+row.Area+'">'+row.Area;
                } 
              },                         
			],			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>",
			"pagingType": "simple",
			"createdRow" : function (row, data, index) {
				$(row).addClass("add-kehadiran-mekaar");      
			}
		});


		$("#add_non_nasabah").submit(function(e){
			e.preventDefault();        	
			var formURL = "<?php echo base_url('pelatihan/post_non_nasabah'); ?>";
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
			table_kehadiran_non_nasabah.clear().draw();
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


		$("div#datatable_kehadiran_mekaar_filter input").unbind();
		$("div#datatable_kehadiran_mekaar_filter input").keyup( function (e) {
			if (e.keyCode == 13) {
			table_kehadiran_mekaar.search( this.value ).draw();
			}
		});
		
				
	});







	$(document).ready(function() {	
		$('#tanggal_realisasi').datetimepicker();
	});		


	//* TABLE RAB js start*//			
	var $TABLE_LPJ = $('#table_rab_modallpj');

	$('.table-add-modallpj').click(function () {
		var $clone = $TABLE_LPJ.find('tr.d-none').clone(true).removeClass('d-none');  
		$TABLE_LPJ.find('tbody').append($clone);
		calculate_grand_total_modallpj();
	});

	
	$('.table-remove-modallpj').click(function () {		

		$(this).parents('tr').detach();
		calculate_grand_total_modallpj();
	});

	$('.table-up-modallpj').click(function () {        
		var $row = $(this).parents('tbody tr');
		if ($row.index() === 1) return;
		$row.prev().before($row.get(0));
	});

	$('.table-down-modallpj').click(function () {
		var $row = $(this).parents('tbody tr');
		$row.next().after($row.get(0));
	});


	$('#table_rab_modallpj tbody tr').keyup(function () {            
		var index = parseInt($(this).index());		
		var jumlah_rab = $("#table_rab_modallpj tbody tr:eq("+index+")").find("#jumlah_rab_modallpj").val(); 		
		var unit_cost_rab = $("#table_rab_modallpj tbody tr:eq("+index+")").find("#unit_cost_rab_modallpj").val();
		sum = parseInt(jumlah_rab) * parseInt(unit_cost_rab);                


		$("#table_rab_modallpj tbody tr:eq("+index+")").find("#total_cost_rab_modallpj").val(sum);

		calculate_grand_total_modallpj();

	})

	function calculate_grand_total_modallpj(){
		var total = 0;
		$('tr #total_cost_rab_modallpj').each(function () {            
			var total_cost_rab = $(this).val();
			if (!isNaN(total_cost_rab) && total_cost_rab.length !== 0) {
				total += parseFloat(total_cost_rab);
			}
		});

		var rowCount = $('tr #total_cost_rab_modallpj').length;
		$("#PelatihanRabCount").val(rowCount);        

		$("#total_cost_rab_akhir_modallpj").val(total);
	}			  	  	
	//* TABLE RAB js end*//	 	
	
	
			
	$("#lpj_pelatihan").submit(function(e){
		e.preventDefault();        	
		var formURL = "<?php echo base_url('pelatihan/post_pelatihan_lpj'); ?>";
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
				window.location.href = '<?php echo base_url(); ?>pelatihan/<?php echo $this->uri->segment(4); ?>';
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
		},
		function(data, status){
			$('#datatable_listkehadiran').DataTable().draw();
			$('#datatable_kehadiran_mekaar').DataTable().draw();
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