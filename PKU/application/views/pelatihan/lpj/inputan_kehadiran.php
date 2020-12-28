<div id="inputan_kehadiran" class="tab-pane">
    <div class="table-style" style="padding : 25px">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!--h2 class="title-1 m-b-25">Earnings By Items</h2-->
                        <div class="table-style">
                            <table id="datatable_listkehadiran" class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID Nasabah</th>
                                        <th>KTP</th>
                                        <th>Bisnis</th>
                                        <th>Nama</th>
                                        <th>Tipe Nasabah</th>
                                        <th>Tipe Kredit / Siklus</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#kehadiran_ulamm">Nasabah Ulamm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#kehadiran_mekaar">Nasabah Mekaar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#non_nasabah">Non Nasabah</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="kehadiran_ulamm" class="tab-pane active">

            <div class="table-style" style="padding : 25px">
                <div class="form-group row">
                    <label class="col-sm-2">Sektor Ekonomi </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="sektor_ekonomi" name="sektor_ekonomi">
                            <option value="">--pilih sektor ekonomi--</option>
                            <?php
                            foreach ($sektor_ekonomi as $data_sektor_ekonomi) {
                                echo '<option value="' . $data_sektor_ekonomi->SID_SEKTOR_EKONOMI . '">' . $data_sektor_ekonomi->Deskripsi_Bidang_Usaha . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Jenis Program </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="jenis_program" name="jenis_program">
                            <option value="">--pilih program--</option>
                            <?php
                            foreach ($jenis_program as $data_jenis_program) {
                                echo '<option value="' . $data_jenis_program->Jenis_program . '">' . $data_jenis_program->Jenis_program . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <label class="col-sm-2">Tipe Kredit </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="tipe_kredit" name="tipe_kredit">
                            <option value="">--pilih program--</option>
                            <option value="BARU">Baru</option>
                            <option value="TOP UP">Top Up</option>
                            <option value="3R">3R</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm-2">Cabang </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="cabang_kehadiran" name="cabang_kehadiran">
                            <option value="">--pilih cabang--</option>
                            <?php
                            foreach ($cabang as $data_cabang) {
                                echo '<option value="' . $data_cabang->KODE_CABANG . '">' . $data_cabang->DESKRIPSI . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <label class="col-sm-2">Unit </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="unit_kehadiran" name="unit_kehadiran">
                            <option value="">--pilih unit--</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-style">
                        <table id="datatable_kehadiran_ulamm" class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID NASABAH</th>
                                    <th>KTP</th>
                                    <th>NAMA NASABAH</th>
                                    <th>NO. HANDPHONE</th>
                                    <th>KOLEKTIBILITAS</th>
                                    <th>CABANG</th>
                                    <th>UNIT</th>
                                    <th>TIPE KREDIT</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>




        </div>
        <div id="kehadiran_mekaar" class="tab-pane fade">

            <div class="table-style" style="padding : 25px">
                <div class="form-group row">
                    <label class="col-sm-2">Sektor Ekonomi </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="sektor_ekonomi_mekaar" name="sektor_ekonomi_mekaar">
                            <option value="">--pilih sektor ekonomi--</option>
                            <?php
                            foreach ($sektor_ekonomi_mekaar as $data_sektor_ekonomi_mekaar) {
                                echo '<option value="' . $data_sektor_ekonomi_mekaar->ID_SUB_SEKTOR . '">' . $data_sektor_ekonomi_mekaar->SEKTOR . ' - ' . $data_sektor_ekonomi_mekaar->SUB_SEKTOR . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <label class="col-sm-2">Siklus Kredit </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="siklus_kredit" name="siklus_kredit">
                            <option value="">--pilih siklus--</option>
                            <option value="1">Siklus 1</option>
                            <option value="2">Siklus 2</option>
                            <option value="3">Siklus 3</option>
                            <option value="4">Siklus 4</option>
                            <option value="5">Siklus 5</option>
                            <option value="6">Siklus 6</option>
                            <option value="7">Siklus 7</option>
                            <option value="8">Siklus 8</option>
                            <option value="9">Siklus 9</option>
                            <option value="10">Siklus 10</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Region </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="regional_mekaar" name="regional_mekaar">
                            <option value="">--pilih region--</option>
                            <?php
                            foreach ($regional_mekaar as $data_regional_mekaar) {
                                echo '<option value="' . $data_regional_mekaar->KODE_REGION . '">' . $data_regional_mekaar->DESKRIPSI . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <label class="col-sm-2">Area </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="area_mekaar" name="area_mekaar">
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Cabang </label>
                    <div class="col-sm-4">
                        <select class="form-control select2" id="cabang_mekaar" name="cabang_mekaar">
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-style">
                        <table id="datatable_kehadiran_mekaar" class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>KTP</th>
                                    <th>NAMA NASABAH</th>
                                    <th>ALAMAT</th>
                                    <th>PRODUK</th>
                                    <th>REGION</th>
                                    <th>AREA</th>
                                    <th>SIKLUS</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div id="non_nasabah" class="tab-pane fade">
            <div class="table-style" style="padding : 25px">

                <?php

                $attrib = array('class' => 'form-horizontal', 'id' => 'add_non_nasabah', 'name' => 'add_non_nasabah', 'enctype' => 'multipart/form-data', 'onkeydown' => "return event.key != 'Enter';");
                echo form_open('', $attrib);
                ?>
                <div class="form-group row">
                    <div class="modal-header">
                        <div id="judul_modal">
                            <h4>Input Non Nasabah</h4>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2"> KTP </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" required="" id="ktp" name="ktp" />
                    </div>

                    <label class="col-sm-2"> No Hp <span class="text-danger"></span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" required="" id="no_hp" name="no_hp" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2"> Nama </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" required="" id="nama" name="nama" />
                    </div>

                    <label class="col-sm-2"> Lokasi PNM <span class="text-danger"></span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" required="" id="lokasi_pnm" name="lokasi_pnm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2"> Alamat </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" required="" id="alamat" name="alamat" />
                    </div>

                    <label class="col-sm-2"> Catatan <span class="text-danger"></span></label>
                    <div class="col-sm-4">
                        <textarea class="form-control rounded-0" id="catatan" name="catatan" rows="3"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <?php echo form_submit('submit', 'Simpan', 'class="btn btn-primary submit"'); ?>
                </div>
                <?php echo form_close(); ?>

            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="table-style">
                        <table id="datatable_kehadiran_non_nasabah" class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>KTP</th>
                                    <th>NAMA NASABAH</th>
                                    <th>NO. HANDPHONE</th>
                                    <th>ALAMAT</th>
                                    <th>CABANG</th>
                                    <th>UNIT</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>