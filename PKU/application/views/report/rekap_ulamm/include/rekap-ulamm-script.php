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

<script src="<?php echo base_url() ?>assets/js/autoNumeric.js"></script>

<script type="text/javascript">		


    $(document).ready(function() {	
		$('#datatable').DataTable({			
			"aaSorting" : [],	
			"paging": false,
			"processing": true,
			"serverSide": false,			
			"dom": "<'dom_datable'f>Brt<'dom_datable col-md-6'i>",
			// "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
			"buttons": [
				{
					extend: 'excelHtml5',				
					customize: function (xlsx){						
						var sheet = xlsx.xl.worksheets['sheet1.xml'];						
						var downrows = 2;
						var clRow = $('row', sheet);

						
						//update Row
						clRow.each(function () {
							var attr = $(this).attr('r');
							var ind = parseInt(attr);
							ind = ind + downrows;
							$(this).attr("r",ind);
						});
				
						// Update  row > c
						$('row c ', sheet).each(function () {
							var attr = $(this).attr('r');
							var pre = attr.substring(0, 1);
							var ind = parseInt(attr.substring(1, attr.length));
							ind = ind + downrows;
							$(this).attr("r", pre + ind);
						});
				
						// function Addrow(index,data) {
						function Addrow(index,data) {	
							msg='<row r="'+index+'">'
							for(i=0;i<data.length;i++){
								var key=data[i].k;
								var value=data[i].v;
								msg += '<c t="inlineStr" r="' + key + index + '" >';
								msg += '<is>';
								msg +=  '<t>'+value+'</t>';
								msg+=  '</is>';
								msg+='</c>';
							}
							msg += '</row>';
							return msg;
						}

				
						//insert


						var r1 = Addrow(1, [{ k: 'A', v: '' }]);
						var r2 = Addrow(2, [
							{ k: 'B', v: 'TUNU' }
							,{ k: 'C', v: 'TUNU' }
							,{ k: 'D', v: 'TUNCA' }
							,{ k: 'E', v: 'TUNCA' }
							,{ k: 'F', v: 'Klasterisasi Sektoral' }
							,{ k: 'G', v: 'Klasterisasi Sektoral' }
							,{ k: 'H', v: 'Klasterisasi Teritorial' }
							,{ k: 'I', v: 'Klasterisasi Teritorial' }
							,{ k: 'J', v: 'Pameran' }
							,{ k: 'K', v: 'Pameran' }
							,{ k: 'L', v: 'PKU Akbar' }
							,{ k: 'M', v: 'PKU Akbar' }
							,{ k: 'N', v: 'Realisasi Pelatihan' }
							,{ k: 'O', v: 'Realisasi Pelatihan' }
							,{ k: 'P', v: 'Realisasi Peserta' }
							,{ k: 'Q', v: 'Realisasi Peserta' }
						]);
						
						sheet.childNodes[0].childNodes[1].innerHTML = r1+ r2 + sheet.childNodes[0].childNodes[1].innerHTML;

						
						$('row c[r^="B2"]', sheet).attr( 's', '2' );
           				$('row c[r^="C2"]', sheet).attr( 's', '2' );
           				$('row c[r^="D2"]', sheet).attr( 's', '2' );
           				$('row c[r^="E2"]', sheet).attr( 's', '2' );
           				$('row c[r^="F2"]', sheet).attr( 's', '2' );
           				$('row c[r^="G2"]', sheet).attr( 's', '2' );
           				$('row c[r^="H2"]', sheet).attr( 's', '2' );
           				$('row c[r^="I2"]', sheet).attr( 's', '2' );
           				$('row c[r^="J2"]', sheet).attr( 's', '2' );
           				$('row c[r^="K2"]', sheet).attr( 's', '2' );
           				$('row c[r^="L2"]', sheet).attr( 's', '2' );
           				$('row c[r^="M2"]', sheet).attr( 's', '2' );
           				$('row c[r^="N2"]', sheet).attr( 's', '2' );
           				$('row c[r^="O2"]', sheet).attr( 's', '2' );
           				$('row c[r^="P2"]', sheet).attr( 's', '2' );
           				$('row c[r^="Q2"]', sheet).attr( 's', '2' );
						


					}
				
				}
			]
		});																
	});
	
	
</script>       