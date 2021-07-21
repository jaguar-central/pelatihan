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

<!-- <script src="<?php echo base_url(); ?>assets/vendor/canvasjs-3.2.9/canvasjs.min.js"></script> -->



<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>


<script type="text/javascript">
// $(document).ready(function() {
  
//     $.fn.infiniteScrollUp=function(){
//       var self=this,kids=self.children()
//       kids.slice(20).hide()
//       setInterval(function(){
//         kids.filter(':hidden').eq(0).fadeIn()
//         kids.eq(0).fadeOut(function(){
//           $(this).appendTo(self)
//           kids=self.children()
//         })
//       },10000)
//       return this
//     }	

//     $(function(){
//       $('#tbody_datatable_pemberdayaan_ulamm').infiniteScrollUp();

//       $('#tbody_datatable_pemberdayaan_mekaar').infiniteScrollUp();

//       $('#tbody_datatable_pemberdayaan_provinsi_ulamm').infiniteScrollUp();

//       $('#tbody_datatable_pemberdayaan_provinsi_mekaar').infiniteScrollUp();

//       $('#tbody_datatable_pemberdayaan_cabang_ulamm').infiniteScrollUp();

//       $('#tbody_datatable_pemberdayaan_cabang_mekaar').infiniteScrollUp();
//     })

// });

am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end


    //chart_pie_u_star start
    var chart_pie_u_star = am4core.create("index-pemberdayaan-ulamm-start-model", am4charts.PieChart3D);
    chart_pie_u_star.hiddenState.properties.opacity = 0; // this creates initial fade-in
    chart_pie_u_star.fontSize = 10;


    chart_pie_u_star.legend = new am4charts.Legend();
    chart_pie_u_star.legend.scrollable = true;
    chart_pie_u_star.legend.itemContainers.template.paddingTop = 0;

    chart_pie_u_star.legend.valueLabels.template.disabled = true;

    chart_pie_u_star.data = [
    <?php
    for ($x = 0; $x < count($U_START_MODEL); $x++) {    
      echo '{';
      echo 'country: "'.$U_START_MODEL[$x]->KATEGORI_STAR_MODEL.'",';
      echo 'litres: '.$U_START_MODEL[$x]->TOTAL;
      echo '},';    
    }
    ?>
    ];

    var series_pie_u_star = chart_pie_u_star.series.push(new am4charts.PieSeries3D());
    series_pie_u_star.dataFields.value = "litres";
    series_pie_u_star.dataFields.category = "country";
    series_pie_u_star.legendSettings.labelText = "{category}: {value}";
    series_pie_u_star.labels.template.text = "{category}: {value}";
    //chart_pie_u_star end


    //chart_pie_m_star start
    var chart_pie_m_star = am4core.create("index-pemberdayaan-mekaar-start-model", am4charts.PieChart3D);
    chart_pie_m_star.hiddenState.properties.opacity = 0; // this creates initial fade-in
    chart_pie_m_star.fontSize = 10;


    chart_pie_m_star.legend = new am4charts.Legend();
    chart_pie_m_star.legend.scrollable = true;
    chart_pie_m_star.legend.itemContainers.template.paddingTop = 0;

    chart_pie_m_star.legend.valueLabels.template.disabled = true;

    chart_pie_m_star.data = [
    <?php
    for ($x = 0; $x < count($M_START_MODEL); $x++) {    
      echo '{';
      echo 'country: "'.$M_START_MODEL[$x]->KATEGORI_STAR_MODEL.'",';
      echo 'litres: '.$M_START_MODEL[$x]->TOTAL;
      echo '},';    
    }
    ?>
    ];

    var series_pie_m_star = chart_pie_m_star.series.push(new am4charts.PieSeries3D());
    series_pie_m_star.dataFields.value = "litres";
    series_pie_m_star.dataFields.category = "country";
    series_pie_m_star.legendSettings.labelText = "{category}: {value}";
    series_pie_m_star.labels.template.text = "{category}: {value}";
    //chart_pie_m_star end    

    // chart_bar_ulamm start
    var chart_bar_ulamm = am4core.create("index-pemberdayaan-ulamm-bar", am4charts.XYChart3D);

    chart_bar_ulamm.fontSize = 10;
    chart_bar_ulamm.data = [
    <?php 
    $data_ulamm_bar = array();
    array_push($data_ulamm_bar,$U1,$U2,$U3,$U4,$U5,$U6,$U7,$U8,$U9,$U10,$U11,$U12);
    for ($x = 0; $x < count($data_ulamm_bar); $x++) {
        if ($data_ulamm_bar[$x]!=0){
            echo '{';
            echo '"bulan": "'.substr(date("F", mktime(0, 0, 0, $x+1, 10)),0,3).'",';
            echo '"nilai": '.$data_ulamm_bar[$x];
            echo '},';
        }
     } 
     ?>];

    let categoryAxis_bar_ulamm = chart_bar_ulamm.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis_bar_ulamm.dataFields.category = "bulan";
    categoryAxis_bar_ulamm.renderer.labels.template.rotation = 270;
    categoryAxis_bar_ulamm.renderer.labels.template.hideOversized = false;
    categoryAxis_bar_ulamm.renderer.minGridDistance = 20;
    categoryAxis_bar_ulamm.renderer.labels.template.horizontalCenter = "right";
    categoryAxis_bar_ulamm.renderer.labels.template.verticalCenter = "middle";
    categoryAxis_bar_ulamm.tooltip.label.rotation = 270;
    categoryAxis_bar_ulamm.tooltip.label.horizontalCenter = "right";
    categoryAxis_bar_ulamm.tooltip.label.verticalCenter = "middle";

    let valueAxis_bar_ulamm = chart_bar_ulamm.yAxes.push(new am4charts.ValueAxis());
    valueAxis_bar_ulamm.title.text = "Nilai Index Pemberdayaan";
    valueAxis_bar_ulamm.title.fontWeight = "bold";

    var series_bar_ulamm = chart_bar_ulamm.series.push(new am4charts.ColumnSeries3D());
    series_bar_ulamm.dataFields.valueY = "nilai";
    series_bar_ulamm.dataFields.categoryX = "bulan";
    series_bar_ulamm.tooltipText = "{categoryX}: [bold]{valueY}[/]";
    series_bar_ulamm.columns.template.fillOpacity = .8;


    let valueLabel = series_bar_ulamm.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.text = "{nilai}";
    valueLabel.label.fontSize = 10;
    valueLabel.label.horizontalCenter = "middle";
    valueLabel.label.dx = 10;    

    var columnTemplate_bar_ulamm = series_bar_ulamm.columns.template;
    columnTemplate_bar_ulamm.strokeWidth = 2;
    columnTemplate_bar_ulamm.strokeOpacity = 1;
    columnTemplate_bar_ulamm.stroke = am4core.color("#FFFFFF");

    columnTemplate_bar_ulamm.adapter.add("fill", function(fill, target) {
    return chart_bar_ulamm.colors.getIndex(target.dataItem.index);
    })

    columnTemplate_bar_ulamm.adapter.add("stroke", function(stroke, target) {
    return chart_bar_ulamm.colors.getIndex(target.dataItem.index);
    })

    chart_bar_ulamm.cursor = new am4charts.XYCursor();
    chart_bar_ulamm.cursor.lineX.strokeOpacity = 0;
    chart_bar_ulamm.cursor.lineY.strokeOpacity = 0;      
    // chart_bar_ulamm end    





    // chart_bar_mekaar start
    var chart_bar_mekaar = am4core.create("index-pemberdayaan-mekaar-bar", am4charts.XYChart3D);

    chart_bar_mekaar.fontSize = 10;
    chart_bar_mekaar.data = [
    <?php 
    $data_mekaar_bar = array();
    array_push($data_mekaar_bar,$M1,$M2,$M3,$M4,$M5,$M6,$M7,$M8,$M9,$M10,$M11,$M12);
    for ($x = 0; $x < count($data_mekaar_bar); $x++) {
        if ($data_mekaar_bar[$x]!=0){
            echo '{';
            echo '"bulan": "'.substr(date("F", mktime(0, 0, 0, $x+1, 10)),0,3).'",';
            echo '"nilai": '.$data_mekaar_bar[$x];
            echo '},';
        }
     } 
     ?>];

    let categoryAxis_bar_mekaar = chart_bar_mekaar.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis_bar_mekaar.dataFields.category = "bulan";
    categoryAxis_bar_mekaar.renderer.labels.template.rotation = 270;
    categoryAxis_bar_mekaar.renderer.labels.template.hideOversized = false;
    categoryAxis_bar_mekaar.renderer.minGridDistance = 20;
    categoryAxis_bar_mekaar.renderer.labels.template.horizontalCenter = "right";
    categoryAxis_bar_mekaar.renderer.labels.template.verticalCenter = "middle";
    categoryAxis_bar_mekaar.tooltip.label.rotation = 270;
    categoryAxis_bar_mekaar.tooltip.label.horizontalCenter = "right";
    categoryAxis_bar_mekaar.tooltip.label.verticalCenter = "middle";

    let valueAxis_bar_mekaar = chart_bar_mekaar.yAxes.push(new am4charts.ValueAxis());
    valueAxis_bar_mekaar.title.text = "Nilai Index Pemberdayaan";
    valueAxis_bar_mekaar.title.fontWeight = "bold";

    var series_bar_mekaar = chart_bar_mekaar.series.push(new am4charts.ColumnSeries3D());
    series_bar_mekaar.dataFields.valueY = "nilai";
    series_bar_mekaar.dataFields.categoryX = "bulan";
    series_bar_mekaar.tooltipText = "{categoryX}: [bold]{valueY}[/]";
    series_bar_mekaar.columns.template.fillOpacity = .8;

    let valueLabel_m = series_bar_mekaar.bullets.push(new am4charts.LabelBullet());
    valueLabel_m.label.text = "{nilai}";
    valueLabel_m.label.fontSize = 10;
    valueLabel_m.label.horizontalCenter = "middle";
    valueLabel_m.label.dx = 10;   


    var columnTemplate_bar_mekaar = series_bar_mekaar.columns.template;
    columnTemplate_bar_mekaar.strokeWidth = 2;
    columnTemplate_bar_mekaar.strokeOpacity = 1;
    columnTemplate_bar_mekaar.stroke = am4core.color("#FFFFFF");

    columnTemplate_bar_mekaar.adapter.add("fill", function(fill, target) {
    return chart_bar_mekaar.colors.getIndex(target.dataItem.index);
    })

    columnTemplate_bar_mekaar.adapter.add("stroke", function(stroke, target) {
    return chart_bar_mekaar.colors.getIndex(target.dataItem.index);
    })

    chart_bar_mekaar.cursor = new am4charts.XYCursor();
    chart_bar_mekaar.cursor.lineX.strokeOpacity = 0;
    chart_bar_mekaar.cursor.lineY.strokeOpacity = 0;  
    // chart_bar_mekaar end    



    //chart_pie_u_pertanyaan start
    var chart_pie_u_pertanyaan = am4core.create("index-pemberdayaan-ulamm-pertanyaan", am4charts.PieChart3D);
    chart_pie_u_pertanyaan.hiddenState.properties.opacity = 0; // this creates initial fade-in
    chart_pie_u_pertanyaan.fontSize = 10;


    chart_pie_u_pertanyaan.legend = new am4charts.Legend();
    chart_pie_u_pertanyaan.legend.scrollable = true;
    chart_pie_u_pertanyaan.legend.itemContainers.template.paddingTop = 0;

    chart_pie_u_pertanyaan.legend.valueLabels.template.disabled = true;

    chart_pie_u_pertanyaan.data = [
    <?php
    for ($x = 0; $x < count($DETAIL_ULAMM); $x++) {    
      echo '{';
      echo 'country: "'.$DETAIL_ULAMM[$x]->PERTANYAAN.'",';
      echo 'litres: '.$DETAIL_ULAMM[$x]->NILAI;
      echo '},';    
    }
    ?>
    ];

    var chart_pie_u_pertanyaan = chart_pie_u_pertanyaan.series.push(new am4charts.PieSeries3D());
    chart_pie_u_pertanyaan.dataFields.value = "litres";
    chart_pie_u_pertanyaan.dataFields.category = "country";
    chart_pie_u_pertanyaan.legendSettings.labelText = "{category}: {value}";
    chart_pie_u_pertanyaan.labels.template.text = "{category}: {value}";
    //chart_pie_u_pertanyaan end


    //chart_pie_m_pertanyaan start
    var chart_pie_m_pertanyaan = am4core.create("index-pemberdayaan-mekaar-pertanyaan", am4charts.PieChart3D);
    chart_pie_m_pertanyaan.hiddenState.properties.opacity = 0; // this creates initial fade-in
    chart_pie_m_pertanyaan.fontSize = 10;


    chart_pie_m_pertanyaan.legend = new am4charts.Legend();
    chart_pie_m_pertanyaan.legend.scrollable = true;
    chart_pie_m_pertanyaan.legend.itemContainers.template.paddingTop = 0;

    chart_pie_m_pertanyaan.legend.valueLabels.template.disabled = true;

    chart_pie_m_pertanyaan.data = [
    <?php
    for ($x = 0; $x < count($DETAIL_MEKAAR); $x++) {    
      echo '{';
      echo 'country: "'.$DETAIL_MEKAAR[$x]->PERTANYAAN.'",';
      echo 'litres: '.$DETAIL_MEKAAR[$x]->NILAI;
      echo '},';    
    }
    ?>
    ];

    var chart_pie_m_pertanyaan = chart_pie_m_pertanyaan.series.push(new am4charts.PieSeries3D());
    chart_pie_m_pertanyaan.dataFields.value = "litres";
    chart_pie_m_pertanyaan.dataFields.category = "country";
    chart_pie_m_pertanyaan.legendSettings.labelText = "{category}: {value}";
    chart_pie_m_pertanyaan.labels.template.text = "{category}: {value}";
    //chart_pie_u_pertanyaan end      


}); // end am4core.ready()


</script>