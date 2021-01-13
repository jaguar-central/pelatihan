<link href='<?php echo base_url(); ?>assets/plugins/fullcalendarV5/lib/main.css' rel='stylesheet' />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/fullcalendarV5/lib/main.js"></script>
<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    // initialDate: '2020-09-07',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: [
        <?php          
                foreach ($project_charter as $value){
                    echo "{";
                    echo "groupId: null,"; 
                    echo "title: '".$value->CABANG_ULAMM." - ".$value->NO_TRX." - ".$value->UNIT_ULAMM."',"; 
                    echo "start: '".$value->TANGGAL_MULAI."',";
                    echo "color: '#AED34B',";
                    // echo "end: ".$value->JUDUL_PELATIHAN.",";
                    // echo "url: ".$value->JUDUL_PELATIHAN.",";
                    echo "},";
                }
        ?>   
    ]
  });

  calendar.render();
});


if (window.innerWidth <= 360 ) {
    $('#calendar').hide();
} 


</script>