!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-2">Pelatihan Konfirmasi Proposal</h2>
								</div>
							</div>
						</div>					
                        <div class="row">
                            <div class="col-lg-12">
								<div class="table-style">
									<table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>JENIS PELATIHAN</th>
                                                <th>NO MEMO</th>
                                                <th>TITLE</th>
                                                <th>TANGGAL MULAI</th>
                                                <th>TANGGAL SELESAI</th>
                                                <th>DURASI PELATIHAN</th>
                                                <th>DESKRIPSI</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($t_pelatihan as $data){
                                                echo '<tr>';
                                                echo '<td>'.$data->DESKRIPSI_PELATIHAN_TYPE.'</td>';
                                                echo '<td>'.$data->NO_PROPOSAL.'</td>'; 
                                                echo '<td>'.$data->TITLE.'</td>';
                                                echo '<td>'.$data->TANGGAL_MULAI.'</td>';
                                                echo '<td>'.$data->TANGGAL_SELESAI.'</td>';
                                                echo '<td>'.$data->JAM_MENIT.'</td>';
                                                echo '<td>'.$data->DESKRIPSI.'</td>';
                                                //echo '<td>'.$data->LOKASI.'</td>';                                             
												echo '<td> 
                                                <div class="dropdown"><button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown">Action<span class="caret"></span></button><div class="dropdown-menu">
                                                <a class="dropdown-item pelatihan_details" href="#" data-toggle="modal" data-target="#modaldetails"
                                                                data-pelatihanid="'.$data->ID.'"
                                                                data-pelatihantype="'.$data->ID_TIPE.'"
						                                        data-pelatihantiddeskripsi="'.$data->DESKRIPSI_PELATIHAN_TYPE.'" 
						                                        data-pelatihantitle="'.$data->TITLE.'"
						                                        data-pelatihancabang="'.$data->CABANG_ULAMM.'"
						                                        data-pelatihanunit="'.$data->UNIT_ULAMM.'"
						                                        data-pelatihandeskripsi="'.$data->DESKRIPSI.'" 
						                                        data-pelatihantanggal="'.$data->TANGGAL_MULAI.' - '.$data->TANGGAL_SELESAI.'" 
						                                        data-pelatihandurasi="'.$data->DURASI_PELATIHAN.'" 
						                                        data-pelatihankuota="'.$data->KUOTA_PESERTA.'" 
						                                        data-pelatihananggaran="'.$data->BUDGET.'"
                                                                data-pelatihanprovinsi="'.$data->PROVINSI.'"
                                                                data-pelatihankabkot="'.$data->KABKOT.'"
								                                data-pelatihankecamatan="'.$data->KECAMATAN.'" 
						                                        data-pelatihanalamat="'.$data->ALAMAT.'"
                                                                data-pelatihanpembicara="'.$data->PEMBICARA.'"
                                                                > Details</a>
                                                                
																<a class= "dropdown-item" target="_blank" href="'.$this->config->item("jasper_report").'Pelatihan.pdf?ID='.$data->ID.'"> Unduh Proposal</a>				
																<a class= "dropdown-item pelatihan_approval" href="#" data-toggle="modal" data-target="#modalapproval" data-pelatihanid="'.$data->ID.'" data-gradingid="'.$data->ID_GRADING.'" data-idjenisnasabah="'.$data->ID_JENIS_NASABAH.'"  > Verify</a>				
															  </div>
															</div> 
													</td>'; 
                                                echo '</tr>';

                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            <!-- END MAIN CONTENT-->