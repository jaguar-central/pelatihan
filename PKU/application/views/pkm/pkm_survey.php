<link href="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
<style>
    input[type="radio"] {
        display: block;
        float: left;
        margin: 0.5em 0.5em;
        -webkit-transform: scale(2, 2);
        -moz-transform: scale(2, 2);
        -ms-transform: scale(2, 2);
        -o-transform: scale(2, 2);
        transform: scale(2, 2) !important;
    }

    .form-control {
        font-size: 1em;
    }
</style>



<div class="form-group card text-white bg-info" style="font-size:3em;">
    <div class="card-header text-center">Survey Kelompok</div>



    <form id="pkm_survey">
        <div class="card-body row">
            <label class="col-sm-12">Apakah kelompok ini sudah mempraktekan PKM Bermakna? </label>
            <div class="col-sm-12">
                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_materi1" name="survey_materi" value="1" />
                    <label for="survey_materi1">Sudah</label>
                </div>

                <div class="survey_materi_detail">
                    <select class="form-control" id="survey_materi_detail" name="survey_materi_detail" size="3">
                        <option value="1" selected>Kurang dari separuh Jumlah Anggota Kelompok</option>
                        <option value="2">Lebih dari separuh Jumlah Anggota Kelompok</option>
                    </select>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_materi2" name="survey_materi" value="0" />
                    <label for="survey_materi2">Belum</label>
                </div>
            </div>
        </div>

        <div class="card-body row">
            <label class="col-sm-12">Apakah ada penambahan jumlah tenaga kerja ? </label>
            <div class="col-sm-12">
                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_tenaga_kerja1" name="survey_tenaga_kerja" value="1" />
                    <label for="survey_tenaga_kerja1">Ada penambahan</label>
                </div>

                <div class="survey_tenaga_kerja_detail">
                    <select class="form-control" id="survey_tenaga_kerja_detail" name="survey_tenaga_kerja_detail" size="3">
                        <option value="0.25" selected>Kurang dari separuh Jumlah Anggota Kelompok</option>
                        <option value="0.50">Lebih dari separuh Jumlah Anggota Kelompok</option>
                    </select>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_tenaga_kerja2" name="survey_tenaga_kerja" value="0" />
                    <label for="survey_tenaga_kerja2">Tidak ada penambahan</label>
                </div>
            </div>

        </div>


        <div class="card-body row">
            <label class="col-sm-12">Apakah ada penambahan jumlah aset (misalnya: TV/Hp/Kulkas/Motor)? </label>
            <div class="col-sm-12">
                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_aset1" name="survey_aset" value="1" />
                    <label for="survey_aset1">Ada penambahan</label>
                </div>

                <div class="survey_aset_detail">
                    <select class="form-control" id="survey_aset_detail" name="survey_aset_detail" size="3">
                        <option value="0.25" selected>Kurang dari separuh Jumlah Anggota Kelompok</option>
                        <option value="0.50">Lebih dari separuh Jumlah Anggota Kelompok</option>
                    </select>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_aset2" name="survey_aset" value="0" />
                    <label for="survey_aset2">Tidak ada penambahan</label>
                </div>
            </div>

        </div>

        <div class="card-body row">
            <label class="col-sm-12">Berapa banyak yang sudah mempunyai ijin usaha (misalnya:IUMK/NIB/PIRT)? </label>
            <div class="col-sm-12">
                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_ijin1" name="survey_ijin" value="1" />
                    <label for="survey_ijin1">Ada</label>
                </div>

                <div class="survey_ijin_detail">
                    <select class="form-control" id="survey_ijin_detail" name="survey_ijin_detail" size="3">
                        <option value="0.25" selected>Kurang dari separuh Jumlah Anggota Kelompok</option>
                        <option value="0.50">Lebih dari separuh Jumlah Anggota Kelompok</option>
                    </select>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_ijin2" name="survey_ijin" value="0" />
                    <label for="survey_ijin2">Tidak</label>
                </div>
            </div>

        </div>

        <div class="card-body row">
            <label class="col-sm-12">Apakah produk usaha bertambah? </label>
            <div class="col-sm-12">
                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_produk1" name="survey_produk" value="1" />
                    <label for="survey_produk1">Bertambah</label>
                </div>

                <div class="survey_produk_detail">
                    <select class="form-control" id="survey_produk_detail" name="survey_produk_detail" size="3">
                        <option value="0.25" selected>Kurang dari separuh Jumlah Anggota Kelompok</option>
                        <option value="0.50">Lebih dari separuh Jumlah Anggota Kelompok</option>
                    </select>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_produk2" name="survey_produk" value="0" />
                    <label for="survey_produk2">Tidak</label>
                </div>
            </div>

        </div>


        <div class="card-body row">
            <label class="col-sm-12">Apakah plafond pinjaman meningkat? </label>
            <div class="col-sm-12">
                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_plafond1" name="survey_plafond" value="1" />
                    <label for="survey_plafond1">Ada</label>
                </div>

                <div class="survey_omset_detail">
                    <select class="form-control" id="survey_plafond_detail" name="survey_plafond_detail" size="3">
                        <option value="0.50" selected>Peningkatan plafond pinjaman kurang dari separuh jumlah anggota kelompok</option>
                        <option value="1">Peningkatan plafond pinjaman lebih dari separuh jumlah anggota kelompok</option>
                    </select>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_plafond2" name="survey_plafond" value="0" />
                    <label for="survey_plafond2">Tidak</label>
                </div>
            </div>

        </div>



        <div class="card-body row">
            <label class="col-sm-12">Apakah ada penambahan pendapatan (omset) rata-rata per hari? </label>
            <div class="col-sm-12">
                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_omset1" name="survey_omset" value="1" />
                    <label for="survey_omset1">Ada</label>
                </div>

                <div class="survey_omset_detail">
                    <select class="form-control" id="survey_omset_detail" name="survey_omset_detail" size="3">
                        <option value="0.50" selected>Kurang dari separuh Jumlah Anggota Kelompok</option>
                        <option value="1">Lebih dari separuh Jumlah Anggota Kelompok</option>
                    </select>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="survey_omset2" name="survey_omset" value="0" />
                    <label for="survey_omset2">Tidak</label>
                </div>
            </div>

        </div>

        <div class="card-body text-center">
            <input type="submit" name="submit" value="Selesai" class="btn btn-primary submit" style="font-size:1em;">
        </div>
    </form>

</div>





<script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/sweetalert.js"></script>
<script type="text/javascript">
    $(document).ready(function() {


        //SURVEY MATERI
        $('.survey_materi_detail').hide();

        $('input[type=radio][name=survey_materi]').change(function() {
            if (this.value == '1') {
                $('.survey_materi_detail').show();
            } else if (this.value == '0') {
                $('.survey_materi_detail').hide();
            }
        });




        //SURVEY TENAGA KERJA
        $('.survey_tenaga_kerja_detail').hide();

        $('input[type=radio][name=survey_tenaga_kerja]').change(function() {
            if (this.value == '1') {
                $('.survey_tenaga_kerja_detail').show();
            } else if (this.value == '0') {
                $('.survey_tenaga_kerja_detail').hide();
            }
        });


        //SURVEY ASET
        $('.survey_aset_detail').hide();

        $('input[type=radio][name=survey_aset]').change(function() {
            if (this.value == '1') {
                $('.survey_aset_detail').show();
            } else if (this.value == '0') {
                $('.survey_aset_detail').hide();
            }
        });


        //SURVEY IJIN
        $('.survey_ijin_detail').hide();

        $('input[type=radio][name=survey_ijin]').change(function() {
            if (this.value == '1') {
                $('.survey_ijin_detail').show();
            } else if (this.value == '0') {
                $('.survey_ijin_detail').hide();
            }
        });


        //SURVEY PRODUK
        $('.survey_produk_detail').hide();

        $('input[type=radio][name=survey_produk]').change(function() {
            if (this.value == '1') {
                $('.survey_produk_detail').show();
            } else if (this.value == '0') {
                $('.survey_produk_detail').hide();
            }
        });


        //SURVEY OMSET
        $('.survey_omset_detail').hide();

        $('input[type=radio][name=survey_omset]').change(function() {
            if (this.value == '1') {
                $('.survey_omset_detail').show();
            } else if (this.value == '0') {
                $('.survey_omset_detail').hide();
            }
        });


    });


    $("#pkm_survey").submit(function(e) {
        e.preventDefault();

        var formURL = "/pkm/post_pkm_survey";
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
            console.log(obj);

            if (obj.result === "OK") {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Pkm survey tersimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    window.location.href = '<?php echo base_url(); ?>/pkm/pkm_selesai';
                }, 1600);
            } else {
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