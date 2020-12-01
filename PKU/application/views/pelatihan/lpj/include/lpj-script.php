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
		

		$(".select2").select2();

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

			if (isNaN(hours)){
				hours = 0;
				minutes = 0;
			}

			$("#durasi_tampilan").val(hours+" jam "+minutes+" menit ");
			$("#durasi_pelatihan").val(total);
		};	
		
		durasi();

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
			"url" : '<?php echo base_url('pelatihan/get_paging_kehadiran_non_nasabah/'.$this->uri->segment(3)); ?>',
			"type" :'GET'                      
			},
			"columnDefs": [
    			{ "className": "col-md-2", targets: "_all" },
			],			
			"columns" : [
				{ "data": "NO_KTP", render: function (data, type, row) 
                {
				  return '<input type="hidden" class="form-control" id="bisnis" name="bisnis[]" value="NON_NASABAH">'
				  		+'<input type="hidden" class="form-control" id="id_non_nasabah" name="id_non_nasabah[]" value="'+row.ID+'">'
				  		+'<input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.NO_KTP+'">'+row.NO_KTP;
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
			"columnDefs": [
    			{ "className": "col-md-2", targets: "_all" },
			],			
			"columns" : [
			  { "data": "nasabahid", render: function (data, type, row) 
                {
				  return '<input type="hidden" class="form-control" id="sektor_ekonomi" name="sektor_ekonomi[]" value="'+row.sektorekonomi+'">'			
                  +'<input type="hidden" class="form-control" id="id_nasabah" name="id_nasabah[]" value="'+row.nasabahid+'">'+row.nasabahid;
                } 
              },				
              { "data": "ktp", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="bisnis" name="bisnis[]" value="ULAMM"><input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.ktp+'">'+row.ktp;
                } 
              },
              { "data": "nama_nasabah", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="nama_nasabah" name="nama_nasabah[]" value="'+row.nama_nasabah+'">'+row.nama_nasabah;
                } 
              },
              { "data": "no_hp", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="no_hp" name="no_hp[]" value="'+row.no_hp+'">'+row.no_hp;
                }  
              },
              { "data": "kolektibilitas", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="kolektibilitas" name="kolektibilitas[]" value="'+row.kolektibilitas+'">'+row.kolektibilitas;
                }  
              },    
              { "data": "cabang", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="cabang" name="cabang[]" value="'+row.cabang+'">'+row.cabang;
                }  
              },    
              { "data": "unit", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="unit" name="unit[]" value="'+row.unit+'">'+row.unit;
                } 
			  },   
              { "data": "tipe_kredit", render: function (data, type, row) 
                {
				  var desk_tipe_kredit;	
				  if (row.tipe_kredit==1){
					desk_tipe_kredit='Baru';
				  }else if (row.tipe_kredit==2){
					desk_tipe_kredit='Top Up';
  				  }else if (row.tipe_kredit==3){
					desk_tipe_kredit='3R';
				  }
                  return '<input type="hidden" class="form-control" id="tipe_kredit" name="tipe_kredit[]" value="'+row.tipe_kredit+'">'+desk_tipe_kredit;
                } 
              },  			                        
			],			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>",
			"createdRow" : function (row, data, index) {
				$(row).addClass("add-kehadiran-ulamm");      
			}
		});			
		

		$(document).on("change", "#sektor_ekonomi, #jenis_pinjaman, #jenis_program, #cabang_kehadiran, #unit_kehadiran, #tipe_kredit", function () {			
			var sektor_ekonomi 	= $('#sektor_ekonomi').val();			
			var jenis_pinjaman 	= $('#jenis_pinjaman').val();			
			var jenis_program 	= $('#jenis_program').val();			
			var cabang 			= $('#cabang_kehadiran').val();			
			var unit 			= $('#unit_kehadiran').val();	
			var tipe_kredit 	= $('#tipe_kredit').val();	
					
			
			table_kehadiran_ulamm.clear();
			table_kehadiran_ulamm.column(0).search( sektor_ekonomi=='0' ? '' : sektor_ekonomi   );
			table_kehadiran_ulamm.column(1).search( jenis_pinjaman=='0' ? '' : jenis_pinjaman   );
			table_kehadiran_ulamm.column(2).search( jenis_program=='0' ? '' : jenis_program   );
			table_kehadiran_ulamm.column(3).search( cabang=='0' ? '' : cabang   );
			table_kehadiran_ulamm.column(4).search( unit=='0' ? '' : unit   );
			table_kehadiran_ulamm.column(5).search( tipe_kredit=='0' ? '' : tipe_kredit   );

			table_kehadiran_ulamm.clear().draw(false);
		});		


		var table_kehadiran_mekaar = $('#datatable_kehadiran_mekaar').DataTable({	
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('pelatihan/get_paging_kehadiran_nasabah_mekaar/'.$this->uri->segment(3)); ?>',
			"type" :'GET'                      
			},
			"columnDefs": [
    			{ "className": "col-md-2", targets: "_all" },
			],			
			"columns" : [										
              { "data": "noktp", render: function (data, type, row) 
                {
				  return '<input type="hidden" class="form-control" id="sektor_ekonomi" name="sektor_ekonomi[]" value="'+row.sektor_ekonomi+'">'
				  +'<input type="hidden" class="form-control" id="bisnis" name="bisnis[]" value="MEKAAR">'
				  +'<input type="hidden" class="form-control" id="id_nasabah" name="id_nasabah[]" value="'+row.nasabahid+'">'
				  +'<input type="hidden" class="form-control" id="regionid" name="regionid[]" value="'+row.regionid+'">'
				  +'<input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.noktp+'">'+row.noktp;
                } 
              },
              { "data": "nama", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="nama_nasabah" name="nama_nasabah[]" value="'+row.nama+'">'+row.nama;
                } 
              },
              { "data": "alamat", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="no_hp" name="no_hp[]" value="'+row.alamat+'">'+row.alamat;
                }  
              },
              { "data": "produk", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="produk" name="produk[]" value="'+row.produk+'">'+row.produk;
                }  
              },    
              { "data": "region", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="region" name="region[]" value="'+row.region+'">'+row.region;
                }  
              },    
              { "data": "area", render: function (data, type, row) 
                {
                  return '<input type="hidden" class="form-control" id="area" name="area[]" value="'+row.area+'">'+row.area;
                } 
			  },    
              { "data": "siklus", render: function (data, type, row) 
                {
				  var desk_siklus;					  
				  desk_siklus='Siklus '+row.siklus;				  
                  return '<input type="hidden" class="form-control" id="siklus_kredit" name="siklus_kredit[]" value="'+row.siklus+'">'+desk_siklus;
                } 
			  }, 			  				  			  			  
			],			
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>",			
			// "pagingType": "simple",
			"createdRow" : function (row, data, index) {
				$(row).addClass("add-kehadiran-mekaar");      
			}
		});


		$(document).on("change", "#sektor_ekonomi_mekaar,#regional_mekaar,#area_mekaar,#siklus_kredit", function () {			
			var sektor_ekonomi_mekaar 	= $('#sektor_ekonomi_mekaar').val();			
			var regional_mekaar 		= $('#regional_mekaar').val();			
			var area_mekaar 			= $('#area_mekaar').val();			
			var siklus_kredit 			= $('#siklus_kredit').val();			
					
			table_kehadiran_mekaar.clear();
			table_kehadiran_mekaar.column(0).search( sektor_ekonomi_mekaar=='0' ? '' : sektor_ekonomi_mekaar   );
			table_kehadiran_mekaar.column(1).search( regional_mekaar=='0' ? '' : regional_mekaar   );
			table_kehadiran_mekaar.column(2).search( area_mekaar=='0' ? '' : area_mekaar   );
			table_kehadiran_mekaar.column(3).search( siklus_kredit=='0' ? '' : siklus_kredit   );

			table_kehadiran_mekaar.clear().draw(false);
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
				table_kehadiran_non_nasabah.clear().draw(false);
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


		// $("div#datatable_kehadiran_mekaar_filter input").unbind();
		// $("div#datatable_kehadiran_mekaar_filter input").keyup( function (e) {
		// 	if (e.keyCode == 13) {
		// 	table_kehadiran_mekaar.search( this.value ).draw();
		// 	}
		// });
		
				
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
		return false;
	});

	
	$('.table-remove-modallpj').click(function () {		

		$(this).parents('tr').detach();
		calculate_grand_total_modallpj();

		return false;
	});

	$('.table-up-modallpj').click(function () {        
		var $row = $(this).parents('tbody tr');
		if ($row.index() === 1) return;
		$row.prev().before($row.get(0));

		return false;
	});

	$('.table-down-modallpj').click(function () {
		var $row = $(this).parents('tbody tr');
		$row.next().after($row.get(0));

		return false;
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
					
		
		if ($('#total_cost_rab_akhir_modallpj').val()>0) {	
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
					Swal.fire({
					position: 'center',
					icon: 'error',
					title: obj.msg,
					showConfirmButton: false,
					timer: 3000
					})	
				}
			});
			xhr.fail(function() {
				$("#loader_container").hide();
				var failMsg = "Something error happened! as";
			});	
		}else{
			Swal.fire({
			position: 'center',
			icon: 'error',
			title: 'Realisasi Anggaran Biaya tidak boleh kosong',
			showConfirmButton: false,
			timer: 1500
			})	
		}
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
			"columnDefs": [
    			{ "className": "col-md-2", targets: "_all" },
			],				
			"columns" : [
				{ "data": "ID_NASABAH" },
				{ "data": "KTP", render: function (data, type, row)
				    {
						return '<input type="hidden" class="form-control" id="ktp" name="ktp[]" value="'+row.KTP+'">'+row.KTP;
					}
				},
				{ "data": "BISNIS" },
				{ "data": "NAMA" },
				{ "data": "NASABAH_TIPE" },				
				// { "data": "ID_TIPE_KREDIT"},					
			],
			"dom": "<'dom_datable'f>rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>",
			"createdRow" : function (row, data, index) {
				$(row).addClass("remove-kehadiran");      
			}
		});		
	});

	$(document).on("click", ".add-kehadiran-ulamm", function () {					
		var index = parseInt($(this).index());				
		
		var id_nasabah 		= $("tr.add-kehadiran-ulamm:eq("+index+") #id_nasabah").val();
		var bisnis 			= $("tr.add-kehadiran-ulamm:eq("+index+") #bisnis").val();
		var ktp 			= $("tr.add-kehadiran-ulamm:eq("+index+") #ktp").val();
		var nama_nasabah 	= $("tr.add-kehadiran-ulamm:eq("+index+") #nama_nasabah").val();				
		var no_hp 			= $("tr.add-kehadiran-ulamm:eq("+index+") #no_hp").val();				
		var kolektibilitas 	= $("tr.add-kehadiran-ulamm:eq("+index+") #kolektibilitas").val();				
		var cabang 			= $("tr.add-kehadiran-ulamm:eq("+index+") #cabang").val();				
		var unit 			= $("tr.add-kehadiran-ulamm:eq("+index+") #unit").val();				


		var sektor_ekonomi 	= $("tr.add-kehadiran-ulamm:eq("+index+") #sektor_ekonomi").val();				
		var tipe_kredit 	= $("tr.add-kehadiran-ulamm:eq("+index+") #tipe_kredit").val();	

		$.post("<?php echo base_url('pelatihan/post_kehadiran'); ?>",
		{	
			id_pelatihan	: '<?php echo $this->uri->segment(3); ?>',
			id_nasabah		: id_nasabah,
			bisnis			: bisnis,
			ktp				: ktp,
			nama_nasabah	: nama_nasabah,
			no_hp			: no_hp,
			kolektibilitas	: kolektibilitas,
			cabang			: cabang,
			unit			: unit,
			sektor_ekonomi	: sektor_ekonomi,
			tipe_kredit		: tipe_kredit			
		},
		function(data, status){
			$('#datatable_listkehadiran').DataTable().draw(false);
			$('#datatable_kehadiran_ulamm').DataTable().draw(false);
			console.log("Data: " + data + "\nStatus: " + status);
		});

	});	
	
	
	$(document).on("click", ".add-kehadiran-mekaar", function () {					
		var index = parseInt($(this).index());				
		
		var id_nasabah 		= $("tr.add-kehadiran-mekaar:eq("+index+") #id_nasabah").val();
		var bisnis 			= $("tr.add-kehadiran-mekaar:eq("+index+") #bisnis").val();
		var ktp 			= $("tr.add-kehadiran-mekaar:eq("+index+") #ktp").val();
		var nama_nasabah 	= $("tr.add-kehadiran-mekaar:eq("+index+") #nama_nasabah").val();				
		var no_hp 			= $("tr.add-kehadiran-mekaar:eq("+index+") #no_hp").val();				
		var produk		 	= $("tr.add-kehadiran-mekaar:eq("+index+") #produk").val();				
		var region 			= $("tr.add-kehadiran-mekaar:eq("+index+") #Region").val();				
		var area 			= $("tr.add-kehadiran-mekaar:eq("+index+") #Area").val();	
		
		var sektor_ekonomi 	= $("tr.add-kehadiran-mekaar:eq("+index+") #sektor_ekonomi").val();				
		var siklus_kredit 	= $("tr.add-kehadiran-mekaar:eq("+index+") #siklus_kredit").val();	

		$.post("<?php echo base_url('pelatihan/post_kehadiran'); ?>",
		{	
			id_pelatihan	: '<?php echo $this->uri->segment(3); ?>',
			id_nasabah		: id_nasabah,			
			bisnis			: bisnis,
			ktp				: ktp,
			nama_nasabah	: nama_nasabah,
			no_hp			: no_hp,
			produk			: produk,
			region			: region,
			area			: area,
			sektor_ekonomi	: sektor_ekonomi,
			siklus_kredit	: siklus_kredit
		},
		function(data, status){
			$('#datatable_listkehadiran').DataTable().draw(false);
			$('#datatable_kehadiran_mekaar').DataTable().draw(false);
			console.log("Data: " + data + "\nStatus: " + status);
		});

	});


	$(document).on("click", ".add-kehadiran-non-nasabah", function () {					
		var index = parseInt($(this).index());				

		var id_non_nasabah 	= $("tr.add-kehadiran-non-nasabah:eq("+index+") #id_non_nasabah").val();
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
			id_nasabah		: id_non_nasabah,
			ktp				: ktp,
			bisnis			: bisnis,
			nama_nasabah	: nama_nasabah,
			no_hp			: no_hp,
			alamat			: alamat,
			cabang			: cabang,
			unit			: unit
		},
		function(data, status){
			$('#datatable_listkehadiran').DataTable().draw(false);
			$('#datatable_kehadiran_non_nasabah').DataTable().draw(false);
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
			$('#datatable_listkehadiran').DataTable().draw(false);
			$('#datatable_kehadiran_ulamm').DataTable().draw(false);
			$('#datatable_kehadiran_mekaar').DataTable().draw(false);
			$('#datatable_kehadiran_non_nasabah').DataTable().draw(false);
			console.log("Data: " + data + "\nStatus: " + status);
		});		
		
	});

	$('#regional_mekaar').on('change', function (e) {			
			$.ajax({
				url: "<?php echo base_url()?>master/get_area_mekaar",
				data: "kode_region="+$("#regional_mekaar").val(),
				cache: false,
				success: function(data){				         
					$('#area_mekaar').html(data)           
				}
			});
			
	});
</script>       