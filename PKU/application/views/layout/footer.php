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


<!-- START CHECK GEOLOCATION -->
<script>
var watchId = 0;

$(document).ready(function() {
    // $('#startMonitoring').on('click', getLocation);
    // $('#stopMonitoring').on('click', endWatch);
    getLocation();
    setTimeout(function(){endWatch()}, 3000);
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