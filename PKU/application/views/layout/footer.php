 </div>
 <!-- END PAGE CONTAINER-->

<!-- Jquery JS-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?php echo base_url() ?>assets/vendor/slick/slick.min.js">
</script>
<script src="<?php echo base_url() ?>assets/vendor/wow/wow.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?php echo base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?php echo base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/select2/select2.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/sweetalert.js"></script>

<!-- Main JS-->
<script src="<?php echo base_url() ?>assets/js/main.js"></script>


<!-- end document-->

<style>
@media (max-width: 767px) {
    #deskripsi_rab{
        width: 400px;
    }
    #volume_rab{
        width: 150px;
    }
    #unit_cost_rab{
        width: 150px;
    }
    #total_cost_rab{
        width: 150px;
    }

    #deskripsi_rab_details{
        width: 400px;
    }
    #volume_rab_details{
        width: 150px;
    }
    #unit_cost_rab_details{
        width: 150px;
    }
    #total_cost_rab_details{
        width: 150px;
    }

    #deskripsi_rab_edit{
        width: 400px;
    }
    #volume_rab_edit{
        width: 150px;
    }
    #unit_cost_rab_edit{
        width: 150px;
    }
    #total_cost_rab_edit{
        width: 150px;
    }    

    
    #deskripsi_rab_modallpj{
        width: 400px;
    }
    #volume_rab_modallpj{
        width: 150px;
    }
    #unit_cost_rab_modallpj{
        width: 150px;
    }
    #total_cost_rab_modallpj{
        width: 150px;
    }        
}


.custom-file-label{
	margin: 0 15px;
}


@media screen and (max-width: 768px) {
    li.paginate_button.previous {
        display: inline;
    }
 
    li.paginate_button.next {
        display: inline;
    }
 
    li.paginate_button {
        display: none;
    }
}

</style>


<!-- START CHECK GEOLOCATION -->
<script>
var watchId = 0;

$(document).ready(function() {


    
    // $('#startMonitoring').on('click', getLocation);
    // $('#stopMonitoring').on('click', endWatch);

    // if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        // true for mobile device
        // console.log("mobile device");
        // getLocation();
        // setTimeout(function(){endWatch()}, 3000);
    // }else{
        // false for not mobile device
        // console.log("bukan mobile device");
    // }

});

function supportsGeolocation() {
    return 'geolocation' in navigator;
}

function showMessage(message) {
    // $('#message').html(message);    
    console.log(message);    
}

function getLocation() {
    if (supportsGeolocation()) {
        var options = { enableHighAccuracy: true };
        watchId = navigator.geolocation.watchPosition(showPosition, showError, options);
    } else {
        showMessage("Geolocation isn't supported by your browser");
    }
}

function endWatch() {
    // if (watchId != 0) {
        navigator.geolocation.clearWatch(watchId);
        watchId = 0;
        showMessage("Monitoring ended.");
    // }
}

function showPosition(position) {
    var datetime = new Date(position.timestamp).toLocaleString();
    showMessage('Latitude: ' + position.coords.latitude + '<br>' +
        'Longitude: ' + position.coords.longitude + '<br>' +
        'Timestamp: ' + datetime);   

	//simpan latitude  longitude
    var formURL = "<?php echo base_url('master/post_geolocation'); ?>";
    var frmdata = new FormData();

    frmdata.append('latitude',position.coords.latitude);
    frmdata.append('longititude',position.coords.longitude);
    
    var xhr = $.ajax({
        url: formURL,
        type: 'POST',
        data: frmdata,
        processData: false,
        contentType: false
    });

}

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            showMessage("User denied Geolocation access request."); 
            window.location.href = '<?php echo base_url(); ?>/404';           
            break;
        case error.POSITION_UNAVAILABLE:
            showMessage("Location Information unavailable.");
            break;
        case error.TIMEOUT:
            showMessage("Get user location request timed out.");
            break;
        case error.UNKNOWN_ERROR:
            showMessage("An unknown error occurred.");
            break;
    }
}
 
</script>

<!-- END CHECK GEOLOCATION -->

<!-- START Socket Notification Client -->

<script src="<?php echo base_url() ?>assets/js/socket.io.js"></script>

<script>

    //START GLOBAL SOCKET 

    <?php if ($this->config->item('socket_on')=='on'){ ?>
        let ipAddress = '<?php echo $this->config->item('socket_server'); ?>'; 

        const socketIoAddress = ipAddress;

        var connectionOptions =  {
            "force new connection" : true,
            "reconnectionAttempts": "Infinity", 
            "timeout" : 10000,                  
            "transports" : ["websocket"],
            'multiplex': false
        };

        const socket = io(socketIoAddress,connectionOptions);
    <?php } ?>
    //END GLOBAL SOCKET 


    $(function () {
   
        const reloadNotif = function () {
            $.ajax({
                url: "<?= base_url('notifsocket') ?>",
                method: "GET",
                dataType: "json",
                async: false,
                success: function (data) {
                    
                    
                    console.log(data.notification_count);

                    var notifikasi='';
                    var notifikasi_note='';

                    if (data.notification_count > 0){
                        notifikasi='<span class="quantity">'+data.notification_count+'</span>';
                    }else{
                        notifikasi='<span class="quantity" style="background:black;">0</span>';
                    }

                    $("#notifikasi_socket_count").html(notifikasi);


                    
                    if (data.notification_count >= 3) {
                        notifikasi_note ='<div class="notifi-dropdown js-dropdown" style=" height:500px;overflow-y: scroll;">';
                    } else {
                        notifikasi_note ='<div class="notifi-dropdown js-dropdown">';
                    }


                    notifikasi_note +='<div class="notifi__title">';
                    if (data.notification_count > 0){
                        notifikasi_note +='<p>Kamu memiliki '+data.notification_count+' Notifikasi</p>';
                    } else {
                        notifikasi_note +='<p>Tidak ada Notifikasi</p>';
                    }
                    notifikasi_note +='</div>';



                    if (data.notification_count > 0){
                        for (i=0;i<Object.keys(data.notification).length;i++) {

                            var url = "'<?php echo base_url(); ?>"+data.notification[i].URL_APPROVAL+'';    

                            notifikasi_note +='<div class="notifi__item">'+
                                '<div class="'+data.notification[i].CLASS_APPROVAL+'">'+
                                    '<i class="zmdi zmdi-file-text"></i>'+
                                '</div>'+
                                '<div class="content">'+
                                    '<a onclick="window.location.href = '+url+' \' ">'+
                                        '<p>'+data.notification[i].APPROVAL+'</p>'+
                                        '<span class="date">'+data.notification[i].TANGGAL+'</span>'+
                                    '</a>'+
                                '</div>'+
                            '</div>';
                        }
                    }


                    $("#notifikasi_socket_messages").html(notifikasi_note);

                },
            });
        }
        reloadNotif();

        <?php if ($this->config->item('socket_on')=='on'){ ?>
        socket.on('reload', () => {
            reloadNotif();
        });
        <?php } ?>

    })

</script>
<!-- END Socket Notification Client -->