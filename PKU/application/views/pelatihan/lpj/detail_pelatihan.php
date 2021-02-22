<div id="detail_pelatihan" class="tab-pane active">
    <div class="table-style" style="padding : 25px">
        <div class="form-group row">
            <label class="col-sm-2">Tipe Pelatihan <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <select class="form-control" disabled>
                    <option value=""><?php echo $pelatihan->DESKRIPSI_TIPE; ?></option>
                </select>
            </div>

            <label class="col-sm-2">Judul <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="<?php echo $pelatihan->TITLE; ?>" disabled />
            </div>


        </div>

        <?php if ($pelatihan->ID_BISNIS == 1) { ?>
            <div class="form-group row">
                <label class="col-sm-2">Cabang Ulamm<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" disabled>
                        <option value=""><?php echo $pelatihan->DESKRIPSI_CABANG_ULAMM; ?></option>
                    </select>
                </div>

                <label class="col-sm-2">Unit <span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $pelatihan->DESKRIPSI_UNIT; ?>" disabled />

                </div>
            </div>
        <?php } else { ?>
            <div class="form-group row">
                <label class="col-sm-2">Region <span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" disabled>
                        <option value=""><?php echo $pelatihan->DESKRIPSI_REGION; ?></option>
                    </select>
                </div>

                <label class="col-sm-2">Area <span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" disabled>
                        <option value=""><?php echo $pelatihan->DESKRIPSI_AREA; ?></option>
                    </select>
                </div>

            </div>
            <div class="form-group row">
                <label class="col-sm-2">Cabang Mekaar<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $pelatihan->DESKRIPSI_CABANG_MEKAAR; ?>" disabled />
                </div>
                <label class="col-sm-2">Cabang Ulamm<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" disabled>
                        <option value=""><?php echo $pelatihan->DESKRIPSI_CABANG_ULAMM; ?></option>
                    </select>
                </div>
            </div>
        <?php } ?>

        <div class="form-group row">
            <label class="col-sm-2">Deskripsi <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="<?php echo $pelatihan->DESKRIPSI; ?>" disabled />
            </div>


        </div>

        <div class="form-group row">

            <label class="col-sm-2">Tanggal <span class="text-danger">*</span></label>

            <div class="col-sm-4">

                <div class="input-group">
                    <input type="text" class="form-control" value="<?php echo $pelatihan->TANGGAL_MULAI; ?>" disabled />
                    <input type="text" class="form-control" value="<?php echo $pelatihan->TANGGAL_SELESAI; ?>" disabled />
                </div>

            </div>

            <label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="<?php echo $pelatihan->DURASI_PELATIHAN; ?>" disabled />
            </div>

        </div>


        <div class="form-group row">
            <label class="col-sm-2">Pembicara <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="<?php echo $pelatihan->PEMBICARA; ?>" disabled />
            </div>

            <label class="col-sm-2">Kuota Peserta <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="<?php echo $pelatihan->KUOTA_PESERTA; ?>" disabled />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2">Anggaran <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="<?php echo $pelatihan->BUDGET; ?>" disabled />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2">Provinsi <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <select class="form-control" required="" id="provinsi_details" name="provinsi_details" disabled>
                    <option value=""><?php echo $pelatihan->DESKRIPSI_PROVINSI; ?></option>
                </select>
            </div>

            <label class="col-sm-2">Alamat Pelatihan <span class="text-danger">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="<?php echo $pelatihan->ALAMAT; ?>" disabled />
            </div>
        </div>





        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Rencana Anggaran Biaya</h4>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-responsive">
                                    <thead class=" text-primary col-md-12">
                                        <th class="col-md-2">Uraian</th>
                                        <th class="col-md-2">Volume</th>
                                        <th class="col-md-2">Unit Cost</th>
                                        <th class="col-md-2">Sub Total Cost</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <?php foreach ($rab as $data_rab) { ?>
                                        <tr>
                                            <td><input type="text" class="form-control" id="deskripsi_rab_details" value="<?= $data_rab->URAIAN; ?>" disabled></td>
                                            <td><input type="number" class="form-control" id="volumerab_details" value="<?= $data_rab->VOLUME; ?>" disabled></td>
                                            <td><input type="number" class="form-control" id="unit_cost_rab_details" value="<?= $data_rab->UNIT_COST; ?>" disabled></td>
                                            <td><input type="number" class="form-control" id="total_cost_rab_details" value="<?= $data_rab->SUB_TOTAL_COST; ?>" disabled></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <div class="col-md-12"></div>
                                <label>Grand Total </label>
                                <div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control money" data-a-sign="Rp. " value="<?= $rab[0]->GRAND_TOTAL; ?>" readonly="" required>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>