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
                                                <th>ID TIPE</th>
                                                <th>NO MEMO</th>
                                                <th>TITLE</th>
                                                <th>TANGGAL MULAI</th>
                                                <th>TANGGAL SELESAI</th>
                                                <th>DURASI PELATIHAN</th>
                                                <th>DESKRIPSI</th>
                                                <th>LOKASI</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($t_pelatihan as $data){
                                                echo '<tr>';
                                                echo '<td>'.$data->ID_TIPE.'</td>';
                                                echo '<td>'.$data->NO_PROPOSAL.'</td>'; 
                                                echo '<td>'.$data->TITLE.'</td>';
                                                echo '<td>'.$data->TANGGAL_MULAI.'</td>';
                                                echo '<td>'.$data->TANGGAL_SELESAI.'</td>';
                                                echo '<td>'.$data->DURASI_PELATIHAN.'</td>';
                                                echo '<td>'.$data->DESKRIPSI.'</td>';
                                                echo '<td>'.$data->LOKASI.'</td>';                                             
												echo '<td> 
															<div class="dropdown">
															  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
															  <span class="caret"></span>
															  </button>
															  <div class="dropdown-menu">
																<a class="dropdown-item pelatihan_details" href="#" data-toggle="modal" data-target="#modaldetails" 
																data-pelatihanid="'.$data->ID.'"
																data-pelatihantype="'.$data->ID_TIPE.'"
																data-pelatihantitle="'.$data->TITLE.'"
																data-pelatihancabang="'.$data->CABANG_ULAMM.'"
																data-pelatihanunit="'.$data->UNIT_ULAMM.'"
																data-pelatihandeskripsi="'.$data->DESKRIPSI.'"
																data-pelatihantanggal="'.$data->TANGGAL_MULAI.' - '.$data->TANGGAL_SELESAI.'"
																data-pelatihandurasi="'.$data->DURASI_PELATIHAN.'"
																data-pelatihankuota="'.$data->KUOTA_PESERTA.'"
																data-pelatihananggaran="'.$data->BUDGET.'"
																data-pelatihanprovinsi="'.$data->PROVINSI.'"
																data-pelatihanalamat="'.$data->ALAMAT.'"
																data-pelatihanlokasi="'.$data->LOKASI.'"
																data-pelatihanlradius="'.$data->RADIUS.'"
																data-pelatihanlongitude="'.$data->LONGITUDE.'"
																data-pelatihanlatitude="'.$data->LATITUDE.'"
																> Details</a>
																<a class= "dropdown-item" target="_blank" href="'.$this->config->item("jasper_report").'Pelatihan.pdf?ID='.$data->ID.'"> Unduh Proposal</a>				
																<a class= "dropdown-item pelatihan_approval" href="#" data-toggle="modal" data-target="#modalapproval" data-pelatihanid="'.$data->ID.'"> Verify</a>				
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