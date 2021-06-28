<div id="inputan_lpj" class="tab-pane">
    <div class="table-style" style="padding : 25px">
        <?php

        $attrib = array('class' => 'form-horizontal', 'id' => 'lpj_pelatihan', 'name' => 'lpj_pelatihan', 'enctype' => 'multipart/form-data', 'onkeydown' => "return event.key != 'Enter';");
        echo form_open('', $attrib);
        ?>
        <div class="table-style" style="padding : 25px">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pelatihan" name="id_pelatihan" value="<?php echo $this->uri->segment(3); ?>" />
                <div class="form-group row">

                    <label class="col-sm-2">Tanggal <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class='input-group date'>
                                <span class="input-group-addon">
                                    <span class="fas fa-calendar"></span>
                                </span>
                                <input type='text' class="form-control" id='timeawal' value="<?php echo $timeawal;  ?>" />
                                <span class="input-group-addon bg-custom b-0">s/d</span>
                                <input type='text' class="form-control" id='timeakhir' value="<?php echo $timeakhir; ?>" />
                            </div>
                            <input type="hidden" id="inputStartTglPelaksanaan" name="inputStartTglPelaksanaan" value="<?php echo $inputStartTglPelaksanaan; ?>" />
                            <input type="hidden" id="inputStartTimePelaksanaan" name="inputStartTimePelaksanaan" value="<?php echo $inputStartTimePelaksanaan;  ?>" />
                            <input type="hidden" id="inputAkhirTglPelaksanaan" name="inputAkhirTglPelaksanaan" value="<?php echo $inputAkhirTglPelaksanaan;  ?>" />
                            <input type="hidden" id="inputEndTimePelaksanaan" name="inputEndTimePelaksanaan" value="<?php echo $inputEndTimePelaksanaan;  ?>" />
                        </div>
                    </div>

                    <label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" required="" id="durasi_tampilan" readonly="" />
                        <input type="hidden" class="form-control" required="" id="durasi_pelatihan" name="durasi_pelatihan" />
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2">CSI Final <span class="text-danger"></span></label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" required="" id="csi_final" name="csi_final" value="<?php echo $csi_final; ?>" />
                    </div>

                    <label class="col-sm-2">Catatan Tambahan <span class="text-danger"></span></label>
                    <div class="col-sm-4">
                        <textarea class="form-control rounded-0" id="catatan_tambahan" name="catatan_tambahan" rows="3" maxlength="250"><?php echo $catatan_tambahan; ?></textarea>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2">Lampiran (file pdf maksimal 8mb)<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
                        <label class="custom-file-label" for="lampiran">Pilih file</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Fee <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <!-- <span class="input-group-addon">Rp</span> -->
                        <input type="text" class="form-control" required="" id="fee_pelatihan" name="fee_pelatihan" />
                    </div>

                    <label class="col-sm-2">Efisiensi / Pendapatan <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" required="" id="efisiensi_pelatihan" name="efisiensi_pelatihan" />
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Realisasi Anggaran Biaya</h4>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table id="table_rab_modallpj" class="table table-responsive">
                                    <thead class=" text-primary col-md-12">
                                        <th class="col-md-2">Uraian</th>
                                        <th class="col-md-2">Volume</th>
                                        <th class="col-md-2">Unit Cost</th>
                                        <th class="col-md-2">Sub Total Cost</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody id="tbody_rab_modallpj">
                                        <tr class="d-none">
                                            <td><input type="text" class="form-control" id="deskripsi_rab_modallpj" name="deskripsi_rab[]" maxlength="50" value=""></td>
                                            <td><input type="number" class="form-control" id="volume_rab_modallpj" name="volume_rab[]"></td>
                                            <td><input type="number" class="form-control" id="unit_cost_rab_modallpj" name="unit_cost_rab[]" value=""></td>
                                            <td><input type="number" class="form-control" id="total_cost_rab_modallpj" name="total_cost_rab[]" value="" readonly=""></td>
                                            <td>
                                                <a class="table-remove-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>
                                            </td>
                                            <td>
                                                <a class="table-up-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>
                                                <a class="table-down-modallpj btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="col-md-12"></div>
                                <label>Grand Total </label>
                                <div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control money" id="total_cost_rab_akhir_modallpj" name="total_cost_rab_akhir" data-a-sign="Rp. " value="0" readonly="" required>
                                    </div>


                                    </br>
                                    <a class="table-add-modallpj btn btn-outline-primary" href="#"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <?php echo form_submit('submit', 'Submit LPJ', 'class="btn btn-outline-success float-right submit"'); ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>