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

<!-- Responsive examples -->

<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {

    // $("#mencoba_socket").click(function () {
    //     socket.emit('reload-notif');
    // });

    // $('#datatable_pemberdayaan_ulamm').DataTable({
    //   "dom": "rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>"
    // });

    // $('#datatable_pemberdayaan_mekaar').DataTable({
    //   "dom": "rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>"
    // });
    
    $('#datatable_pemberdayaan_ulamm').DataTable({			
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('get_index_pemberdayaan_ulamm'); ?>',
			"type" :'GET'                      
			},
			"columnDefs": [
    			{ "className": "col-md-2", targets: "_all" },
			],			
			"columns" : [
				{ "data": "ID_NASABAH" },
				{ "data": "NAMA" },
				{ "data": "NILAI_GRADING" },
				{ "data": "ASPEK_IMPLEMENTASI" },
				{ "data": "JUMLAH_PLAFOND" },    
				{ "data": "DIVERSIFIKASI_PRODUK" },    
				{ "data": "PENDAPATAN_PERBULAN" },    
				{ "data": "TENAGA_KERJA" },    
				{ "data": "PERIJINAN_USAHA" },    
				{ "data": "TOTAL_NILAI" } 		                 
			],
      "dom": "rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>"
    });
    

    $('#datatable_pemberdayaan_mekaar').DataTable({			
			"paging": true,
			"processing": true,
			"serverSide": true,
			"ajax": {
			"url" : '<?php echo base_url('get_index_pemberdayaan_mekaar'); ?>',
			"type" :'GET'                      
			},
			"columnDefs": [
    			{ "className": "col-md-2", targets: "_all" },
			],			
			"columns" : [
				{ "data": "ID_NASABAH" },
				{ "data": "NAMA" },
				{ "data": "NILAI_GRADING" },
				{ "data": "ASPEK_IMPLEMENTASI" },
				{ "data": "JUMLAH_PLAFOND" },    
				{ "data": "DIVERSIFIKASI_PRODUK" },    
				{ "data": "PENDAPATAN_PERBULAN" },    
				{ "data": "TENAGA_KERJA" },    
				{ "data": "PERIJINAN_USAHA" },    
				{ "data": "TOTAL_NILAI" } 		                 
			],
      "dom": "rt<'dom_datable col-md-6'i><'dom_datable col-md-6'p>"
		});

    try {
      var ctx = document.getElementById("index_pemberdayaan");
      if (ctx) {
        ctx.height = 150;
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul","Agu","Sep","Okt","Nov","Des"],
            type: 'line',
            defaultFontFamily: 'Poppins',
            datasets: [{
              label: "Mikro (Ulamm)",
              data: [0, 3, 1, 12, 5, 6, 1,0, 3, 1, 12, 5],
              backgroundColor: 'transparent',
              borderColor: 'rgba(220,53,69,0.75)',
              borderWidth: 3,
              pointStyle: 'circle',
              pointRadius: 5,
              pointBorderColor: 'transparent',
              pointBackgroundColor: 'rgba(220,53,69,0.75)',
            }, {
              label: "Ultra Mikro (Mekaar)",
              data: [0, 5, 4, 8, 4, 7, 10,0, 3, 1, 12, 5],
              backgroundColor: 'transparent',
              borderColor: 'rgba(40,167,69,0.75)',
              borderWidth: 3,
              pointStyle: 'circle',
              pointRadius: 5,
              pointBorderColor: 'transparent',
              pointBackgroundColor: 'rgba(40,167,69,0.75)',
            }]
          },
          options: {
            responsive: true,
            tooltips: {
              mode: 'index',
              titleFontSize: 12,
              titleFontColor: '#000',
              bodyFontColor: '#000',
              backgroundColor: '#fff',
              titleFontFamily: 'Poppins',
              bodyFontFamily: 'Poppins',
              cornerRadius: 3,
              intersect: false,
            },
            legend: {
              display: false,
              labels: {
                usePointStyle: true,
                fontFamily: 'Poppins',
              },
            },
            scales: {
              xAxes: [{
                display: true,
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                scaleLabel: {
                  display: false,
                  labelString: 'Month'
                },
                ticks: {
                  fontFamily: "Poppins"
                }
              }],
              yAxes: [{
                display: true,
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Nilai',
                  fontFamily: "Poppins"

                },
                ticks: {
                  fontFamily: "Poppins"
                }
              }]
            },
            title: {
              display: false,
              text: 'Normal Legend'
            }
          }
        });
      }


    } catch (error) {
      console.log(error);
    }

  });
</script>