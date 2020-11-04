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
                    echo "title: '".$value->TEMA_PROJECT_CHARTER." - ".$value->JUDUL_PELATIHAN."',"; 
                    echo "start: '".$value->TANGGAL."',";
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

</script>