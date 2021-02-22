<link href="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">


<?php $attrib = array('class' => 'form-horizontal', 'id' => 'add_pelatihan', 'name' => 'add_pelatihan', 'enctype' => 'multipart/form-data', 'onkeydown' => "return event.key != 'Enter';");
echo form_open('', $attrib);
?>
    <div class="form-group card text-white bg-info">
        <div class="card-header text-center">Survey Kelompok</div>

        <div class="card-body row">
            <label class="col-sm-12">Apakah kelompok ini sudah mempraktekan PKM Bermakna? </label>
            <div class="col-sm-12">                
                <div class="custom-control custom-radio">
                <input type="radio" id="survey_materi1" name="survey_materi" class="custom-control-input" value="1" />
                <label class="custom-control-label" for="survey_materi1">Sudah</label>
                </div>

                <div class="survey_materi_detail">
                <select class="form-control" required="" id="survey_materi_detail" name="survey_materi_detail">
                    <option value="0">Kurang dari separuh Jumlah Anggota Kelompok</option>
                    <option value="1">Lebih  dari separuh  Jumlah Anggota Kelompok</option>
                </select>
                </div>

                <div class="custom-control custom-radio">
                <input type="radio" id="survey_materi2" name="survey_materi" class="custom-control-input" value="0" />
                <label class="custom-control-label" for="survey_materi2">Belum</label>
                </div>
            </div>
        </div>
            
        <div class="card-body row">
            <label class="col-sm-12">Apakah ada penambahan jumlah tenaga kerja ? </label>
            <div class="col-sm-12">                
                <div class="custom-control custom-radio">
                <input type="radio" id="survey_tenaga_kerja1" name="survey_tenaga_kerja" class="custom-control-input" value="1" />
                <label class="custom-control-label" for="survey_tenaga_kerja1">Ada penambahan</label>
                </div>

                <div class="survey_tenaga_kerja_detail">
                <select class="form-control" required="" id="survey_tenaga_kerja_detail" name="survey_tenaga_kerja_detail">
                    <option value="0">Kurang dari separuh Jumlah Anggota Kelompok</option>
                    <option value="1">Lebih  dari separuh  Jumlah Anggota Kelompok</option>
                </select>
                </div>

                <div class="custom-control custom-radio">
                <input type="radio" id="survey_tenaga_kerja2" name="survey_tenaga_kerja" class="custom-control-input" value="0" />
                <label class="custom-control-label" for="survey_tenaga_kerja2">Tidak ada penambahan</label>
                </div>
            </div>
            
        </div>


        <div class="card-body row">
            <label class="col-sm-12">Apakah ada penambahan jumlah aset (misalnya: TV/Hp/Kulkas/Motor)? </label>
            <div class="col-sm-12">                
                <div class="custom-control custom-radio">
                <input type="radio" id="survey_aset1" name="survey_aset" class="custom-control-input" value="1" />
                <label class="custom-control-label" for="survey_aset1">Ada penambahan</label>
                </div>

                <div class="survey_aset_detail">
                <select class="form-control" required="" id="survey_aset_detail" name="survey_aset_detail">
                    <option value="0">Kurang dari separuh Jumlah Anggota Kelompok</option>
                    <option value="1">Lebih  dari separuh  Jumlah Anggota Kelompok</option>
                </select>
                </div>

                <div class="custom-control custom-radio">
                <input type="radio" id="survey_aset2" name="survey_aset" class="custom-control-input" value="0" />
                <label class="custom-control-label" for="survey_aset2">Tidak ada penambahan</label>
                </div>
            </div>
            
        </div>

        <div class="card-body row">
            <label class="col-sm-12">Berapa banyak yang sudah mempunyai ijin usaha (misalnya:IUMK/NIB/PIRT)?  </label>
            <div class="col-sm-12">                
                <div class="custom-control custom-radio">
                <input type="radio" id="survey_ijin1" name="survey_ijin" class="custom-control-input" value="1" />
                <label class="custom-control-label" for="survey_ijin1">Ada</label>
                </div>

                <div class="survey_ijin_detail">
                <select class="form-control" required="" id="survey_ijin_detail" name="survey_ijin_detail">
                    <option value="0">Kurang dari separuh Jumlah Anggota Kelompok</option>
                    <option value="1">Lebih  dari separuh  Jumlah Anggota Kelompok</option>
                </select>
                </div>

                <div class="custom-control custom-radio">
                <input type="radio" id="survey_ijin2" name="survey_ijin" class="custom-control-input" value="0" />
                <label class="custom-control-label" for="survey_ijin2">Tidak</label>
                </div>
            </div>
            
        </div>        

        <div class="card-body row">
            <label class="col-sm-12">Apakah produk usaha bertambah?  </label>
            <div class="col-sm-12">                
                <div class="custom-control custom-radio">
                <input type="radio" id="survey_produk1" name="survey_produk" class="custom-control-input" value="1" />
                <label class="custom-control-label" for="survey_produk1">Bertambah</label>
                </div>

                <div class="survey_produk_detail">
                <select class="form-control" required="" id="survey_produk_detail" name="survey_produk_detail">
                    <option value="0">Kurang dari separuh Jumlah Anggota Kelompok</option>
                    <option value="1">Lebih  dari separuh  Jumlah Anggota Kelompok</option>
                </select>
                </div>

                <div class="custom-control custom-radio">
                <input type="radio" id="survey_produk2" name="survey_produk" class="custom-control-input" value="0" />
                <label class="custom-control-label" for="survey_produk2">Tidak</label>
                </div>
            </div>
            
        </div>  

        <div class="card-body row">
            <label class="col-sm-12">Apakah ada penambahan pendapatan (omset) rata-rata per hari?  </label>
            <div class="col-sm-12">                
                <div class="custom-control custom-radio">
                <input type="radio" id="survey_omset1" name="survey_omset" class="custom-control-input" value="1" />
                <label class="custom-control-label" for="survey_omset1">Ada</label>
                </div>

                <div class="survey_omset_detail">
                <select class="form-control" required="" id="survey_omset_detail" name="survey_omset_detail">
                    <option value="0">Kurang dari separuh Jumlah Anggota Kelompok</option>
                    <option value="1">Lebih  dari separuh  Jumlah Anggota Kelompok</option>
                </select>
                </div>

                <div class="custom-control custom-radio">
                <input type="radio" id="survey_omset2" name="survey_omset" class="custom-control-input" value="0" />
                <label class="custom-control-label" for="survey_omset2">Tidak</label>
                </div>
            </div>
            
        </div>  

        <div class="card-body text-center">
        <button type="submit" class="btn btn-success selesai-survey">Selesai</button>        
        </div> 

    </div>

   

<?php echo form_close(); ?>    




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
            }
            else if (this.value == '0') {
                $('.survey_materi_detail').hide();
            }
        });




        //SURVEY TENAGA KERJA
        $('.survey_tenaga_kerja_detail').hide();

        $('input[type=radio][name=survey_tenaga_kerja]').change(function() {
            if (this.value == '1') {
                $('.survey_tenaga_kerja_detail').show();
            }
            else if (this.value == '0') {
                $('.survey_tenaga_kerja_detail').hide();
            }
        });


        //SURVEY ASET
        $('.survey_aset_detail').hide();

        $('input[type=radio][name=survey_aset]').change(function() {
            if (this.value == '1') {
                $('.survey_aset_detail').show();
            }
            else if (this.value == '0') {
                $('.survey_aset_detail').hide();
            }
        });


        //SURVEY IJIN
        $('.survey_ijin_detail').hide();

        $('input[type=radio][name=survey_ijin]').change(function() {
            if (this.value == '1') {
                $('.survey_ijin_detail').show();
            }
            else if (this.value == '0') {
                $('.survey_ijin_detail').hide();
            }
        });


        //SURVEY PRODUK
        $('.survey_produk_detail').hide();

        $('input[type=radio][name=survey_produk]').change(function() {
            if (this.value == '1') {
                $('.survey_produk_detail').show();
            }
            else if (this.value == '0') {
                $('.survey_produk_detail').hide();
            }
        });


        //SURVEY OMSET
        $('.survey_omset_detail').hide();

        $('input[type=radio][name=survey_omset]').change(function() {
            if (this.value == '1') {
                $('.survey_omset_detail').show();
            }
            else if (this.value == '0') {
                $('.survey_omset_detail').hide();
            }
        });


    });

</script>