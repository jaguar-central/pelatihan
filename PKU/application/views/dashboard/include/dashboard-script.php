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
      var ctx = document.getElementById("index-pemberdayaan-ulamm");
      if (ctx) {
        ctx.height = 100;
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul","Agu","Sep","Okt","Nov","Des"],
            type: 'line',
            defaultFontFamily: 'Poppins',
            datasets: [{
              label: "Mikro (Ulamm)",
              data: [<?= $U1 ?>, <?= $U2 ?>, <?= $U3 ?>, <?= $U4 ?>, <?= $U5 ?>, <?= $U6 ?>, <?= $U7 ?>, <?= $U8 ?>, <?= $U9 ?>, <?= $U10 ?>, <?= $U11 ?>, <?= $U12 ?>],
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


    try {
      var ctx = document.getElementById("index-pemberdayaan-mekaar");
      if (ctx) {
        ctx.height = 100;
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul","Agu","Sep","Okt","Nov","Des"],
            type: 'line',
            defaultFontFamily: 'Poppins',
            datasets: [{
              label: "Ultra Mikro (Mekaar)",
              data: [<?= $M1 ?>, <?= $M2 ?>, <?= $M3 ?>, <?= $M4 ?>, <?= $M5 ?>, <?= $M6 ?>, <?= $M7 ?>, <?= $M8 ?>, <?= $M9 ?>, <?= $M10 ?>, <?= $M11 ?>, <?= $M12 ?>],
              backgroundColor: 'transparent',              
              borderColor: 'rgba(220,53,69,0.75)',
              borderWidth: 3,
              pointStyle: 'circle',
              pointRadius: 5,
              pointBorderColor: 'transparent',
              pointBackgroundColor: 'rgba(220,53,69,0.75)',
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



    try {

    //Team chart
    var ctx = document.getElementById("index-pemberdayaan-pnm");
    if (ctx) {
      ctx.height = 80;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul","Agu","Sep","Okt","Nov","Des"],
          type: 'line',
          defaultFontFamily: 'Poppins',
          datasets: [{
            data: [<?= $P1 ?>, <?= $P2 ?>, <?= $P3 ?>, <?= $P4 ?>, <?= $P5 ?>, <?= $P6 ?>, <?= $P7 ?>, <?= $P8 ?>, <?= $P9 ?>, <?= $P10 ?>, <?= $P11 ?>, <?= $P12 ?>],
            label: "Index Pemberdayaan PNM",
            backgroundColor: 'rgba(0,103,255,.15)',
            borderColor: 'rgba(0,103,255,0.5)',
            borderWidth: 3.5,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(0,103,255,0.5)',
          },]
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
            position: 'top',
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

          }
        }
      });
    }


    } catch (error) {
    console.log(error);
    }    


    try {

    //radar chart
    var ctx = document.getElementById("index-cabang-mekaar");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
          labels: [<?php foreach($CABANG_MEKAAR as $MEKAAR_LABEL){echo '"'.trim($MEKAAR_LABEL->CABANG).'",';} ?>],
          defaultFontFamily: 'Poppins',
          datasets: [
            {
              label: "Index Pemberdayaan Cabang Mekaar Top 10",
              data: [<?php foreach($CABANG_MEKAAR as $MEKAAR_DATA){ echo $MEKAAR_DATA->TOTAL.',';} ?>],
              borderColor: "rgba(208, 73, 15, 0.6)",
              borderWidth: "3",
              backgroundColor: "rgba(208, 73, 15, 0.4)"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scale: {
            ticks: {
              beginAtZero: true,
              fontFamily: "Poppins"
            }
          }
        }
      });
    }

    } catch (error) {
    console.log(error)
    }


    try {

    //radar chart
    var ctx = document.getElementById("index-cabang-ulamm");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
          labels: [<?php foreach($CABANG_ULAMM as $ULAMM_LABEL){echo '"'.trim($ULAMM_LABEL->CABANG).'",';} ?>],
          defaultFontFamily: 'Poppins',
          datasets: [
            {
              label: "Index Pemberdayaan Cabang Ulamm Top 10",
              data: [<?php foreach($CABANG_ULAMM as $ULAMM_DATA){ echo $ULAMM_DATA->TOTAL.',';} ?>],
              borderColor: "rgba(13, 189, 51, 0.6)",
              borderWidth: "3",
              backgroundColor: "rgba(13, 189, 51, 0.4)"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scale: {
            ticks: {
              beginAtZero: true,
              fontFamily: "Poppins"
            }
          }
        }
      });
    }

    } catch (error) {
    console.log(error)
    }

  });

</script>