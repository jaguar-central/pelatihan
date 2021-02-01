<link href="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<body style="width:80%;margin-left:auto;margin-right:auto">
<?php echo $content->KONTEN ?>
</body>


<div class="text-center">
<input type="hidden" class="form-control" id="id_konten" value="<?= $content->ID ?>" />
<button type="button" class="btn btn-primary telah-baca">Telah Baca</button>
</div>


<script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/sweetalert.js"></script>
<script>
    $( ".telah-baca" ).on( "click", function() {
        console.log( $("#id_konten").val());

        var formURL = "<?php echo base_url('pkm/post_pkm_bermakna'); ?>";
        var frmdata = new FormData();
        
        frmdata.append("id_konten",$("#id_konten").val());

        var xhr = $.ajax({
            url: formURL,
            type: 'POST',
            data: frmdata,
            processData: false,
            contentType: false
        });
        xhr.done(function(data) {
            var obj = $.parseJSON(data);

            // console.log(data);

            if (obj.result == 'OK') {
                Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Pkm untuk kelompok ini telah di baca',
						showConfirmButton: false,
						timer: 1500
					})
					setTimeout(function() {
                        // window.location.href = '<?php //echo base_url(); ?>/pkm/pkm_bermakna_selesai';
                        location.reload();
					}, 1600);
            }            
            if (obj.result == 'NG') {
                Swal.fire({
						position: 'center',
						icon: 'error',
						title: obj.msg,
						showConfirmButton: false,
						timer: 1500
					})
            }
        });
        xhr.fail(function() {
            Swal.fire({
						position: 'center',
						icon: 'error',
						title: obj.msg,
						showConfirmButton: false,
						timer: 1500
					})
        });        
    });
</script>