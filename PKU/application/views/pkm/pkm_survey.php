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

    .bg-info {
        background-color: #0D67B2 !important;
    }
</style>

<body style="background-color:#0D67B2;">

    <div class="form-group card text-white bg-info" style="font-size:3em;">
        <div class="card-header text-center">Survey Nasabah</div>



        <form id="pkm_survey">

            <div class="card-body row">
                <label class="col-sm-12">ID : <?= $nasabah_id ?> </label>
                <label class="col-sm-12">Nama : <?= $nama_nasabah ?> </label>
            </div>
            <input type="hidden" name="nasabah_id" value="<?= $nasabah_id ?>" />
            <div class="card-body row">
                <label class="col-sm-12">Apakah nasabah ini sudah menabung? </label>
                <div class="col-sm-12">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_menabung1" name="survey_menabung" value="10" checked />
                        <label for="survey_menabung1">Sudah menabung</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_menabung2" name="survey_menabung" value="0" />
                        <label for="survey_menabung2">Belum menabung</label>
                    </div>
                </div>
            </div>

            <div class="card-body row">
                <label class="col-sm-12">Apakah nasabah sudah melakukan pengelolaan keuangan? </label>
                <div class="col-sm-12">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_pengelolaan_keuangan1" name="survey_pengelolaan_keuangan" value="0" checked />
                        <label for="survey_pengelolaan_keuangan1">Belum memisahkan keuangan keluarga dan keuangan usaha</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_pengelolaan_keuangan2" name="survey_pengelolaan_keuangan" value="5" />
                        <label for="survey_pengelolaan_keuangan2">Sudah memisahkan keuangan keluarga dan keuangan usaha</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_pengelolaan_keuangan3" name="survey_pengelolaan_keuangan" value="10" />
                        <label for="survey_pengelolaan_keuangan3">Sudah mencatat pengeluaran dan pemasukan usaha</label>
                    </div>
                </div>
            </div>

            <div class="card-body row">
                <label class="col-sm-12">Apakah ada penambahan pendapatan (omset) per hari? </label>

                <div class="col-sm-12">
                    <?php if ($kategori_plafond == "A") { ?>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset1" name="survey_omset" value="0" checked />
                            <label for="survey_omset1">
                                < Rp 50.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset2" name="survey_omset" value="3" />
                            <label for="survey_omset2">Rp 50.001 - 100.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset3" name="survey_omset" value="5" />
                            <label for="survey_omset3">Rp 100.001 - 150.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset4" name="survey_omset" value="10" />
                            <label for="survey_omset4"> > Rp 150.001</label>
                        </div>

                    <?php } else if ($kategori_plafond == "B") { ?>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset1" name="survey_omset" value="0" checked />
                            <label for="survey_omset1">
                                < Rp 100.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset2" name="survey_omset" value="3" />
                            <label for="survey_omset2">Rp 100.001 - 150.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset3" name="survey_omset" value="5" />
                            <label for="survey_omset3">Rp 150.001 - 200.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset4" name="survey_omset" value="10" />
                            <label for="survey_omset4"> > Rp 200.001</label>
                        </div>
                    <?php } else if ($kategori_plafond == "C") { ?>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset1" name="survey_omset" value="0" checked />
                            <label for="survey_omset1">
                                < Rp 200.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset2" name="survey_omset" value="3" />
                            <label for="survey_omset2">Rp 200.001 - 250.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset3" name="survey_omset" value="5" />
                            <label for="survey_omset3">Rp 250.001 - 300.000</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="survey_omset4" name="survey_omset" value="10" />
                            <label for="survey_omset4"> > Rp 300.001</label>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="card-body row">
                <label class="col-sm-12">Strategi penjualan nasabah? </label>
                <div class="col-sm-12">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_strategi_penjualan1" name="survey_strategi_penjualan" value="0" checked />
                        <label for="survey_strategi_penjualan1">Secara tradisional / keliling</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_strategi_penjualan2" name="survey_strategi_penjualan" value="5" />
                        <label for="survey_strategi_penjualan2">Menetap (tempat usaha sudah tetap)</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_strategi_penjualan3" name="survey_strategi_penjualan" value="10" />
                        <label for="survey_strategi_penjualan3">Memanfaatkan media elektronik/digital/social media</label>
                    </div>
                </div>
            </div>

            <div class="card-body row">
                <label class="col-sm-12">Kepemilikan aset nasabah? </label>
                <div class="col-sm-12">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_aset1" name="survey_aset" value="0" checked />
                        <label for="survey_aset1">Belum punya </label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_aset2" name="survey_aset" value="4" />
                        <label for="survey_aset2">Asset bergerak (motor atau emas min. 10 gr)</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_aset3" name="survey_aset" value="6" />
                        <label for="survey_aset3">Tanah / bangunan (non sertifikat)</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_aset4" name="survey_aset" value="10" />
                        <label for="survey_aset4">Tanah / bangunan</label>
                    </div>
                </div>
            </div>

            <div class="card-body row">
                <label class="col-sm-12">Apakah nasabah sudah mempunyai ijin usaha? </label>
                <div class="col-sm-12">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_ijin1" name="survey_ijin" value="0" checked />
                        <label for="survey_ijin1">Tidak Ada</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_ijin2" name="survey_ijin" value="5" />
                        <label for="survey_ijin2">Ada (misal ijin usaha dari kelurahan, NIB, PIRT, dll)</label>
                    </div>
                </div>
            </div>

            <div class="card-body row">
                <label class="col-sm-12">Diversifikasi (penambahan) produk? </label>
                <div class="col-sm-12">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_diversifikasi1" name="survey_diversifikasi" value="0" checked />
                        <label for="survey_diversifikasi1">Tetap</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_diversifikasi2" name="survey_diversifikasi" value="10" />
                        <label for="survey_diversifikasi2">Ada penambahan produk</label>
                    </div>
                </div>
            </div>

            <div class="card-body row">
                <label class="col-sm-12">Serapan tenaga kerja ? </label>
                <div class="col-sm-12">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_serapan_tenaga1" name="survey_serapan_tenaga" value="0" checked />
                        <label for="survey_serapan_tenaga1">Dikerjakan sendiri</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="survey_serapan_tenaga2" name="survey_serapan_tenaga" value="10" />
                        <label for="survey_serapan_tenaga2">Ada penambahan tenaga kerja</label>
                    </div>
                </div>
            </div>

            <div class="card-body text-center">
                <input type="submit" name="submit" value="Selesai" class="btn btn-success submit" style="font-size:1em;">
            </div>
        </form>

    </div>





    <script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/sweetalert.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            //SURVEY MATERI
            // $('.survey_materi_detail').hide();

            // $('input[type=radio][name=survey_materi]').change(function() {
            //     if (this.value == '1') {
            //         $('.survey_materi_detail').show();
            //     } else if (this.value == '0') {
            //         $('.survey_materi_detail').hide();
            //     }
            // });

        });


        $("#pkm_survey").submit(function(e) {
            e.preventDefault();

            var formURL = "<?php echo base_url('pkm/post_pkm_survey'); ?>";
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
                        window.location.href = '<?php echo base_url(); ?>/pkm/pkm_survey_pilih_nasabah';
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
</body>