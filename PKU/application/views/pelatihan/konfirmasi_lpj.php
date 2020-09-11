!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-2">Pelatihan Konfirmasi LPJ</h2>
								</div>
							</div>
						</div>					
                        <div class="row">
                            <div class="col-lg-12">
								<div class="table-style">
									<table id="datatable" class="table table-bordered table-striped table-responsive">
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
                                                <th>KUOTA PESERTA</th>
                                                <th>PROVINSI</th>
                                                <th>LOKASI PNM</th>
                                                <th>REGIONAL PNM</th>
                                                <th>AREA PNM</th>
                                                <th>CABANG PNM</th>
                                                <th>UNIT PNM</th>
                                                <th>BUDGET</th>
                                                <th>STATUS</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($t_pelatihan_lpj as $data){
                                                echo '<tr>';
                                                echo '<td>'.$data->ID_TIPE.'</td>';
                                                echo '<td>'.$data->NO_MEMO.'</td>'; 
                                                echo '<td>'.$data->TITLE.'</td>';
                                                echo '<td>'.$data->TANGGAL_MULAI.'</td>';
                                                echo '<td>'.$data->TANGGAL_SELESAI.'</td>';
                                                echo '<td>'.$data->DURASI_PELATIHAN.'</td>';
                                                echo '<td>'.$data->DESKRIPSI.'</td>';
                                                echo '<td>'.$data->LOKASI.'</td>';
                                                echo '<td>'.$data->KUOTA_PESERTA.'</td>';
                                                echo '<td>'.$data->PROVINSI.'</td>';
                                                echo '<td>'.$data->LOKASI_PNM.'</td>';
                                                echo '<td>'.$data->REGIONAL_PNM.'</td>';
                                                echo '<td>'.$data->AREA_PNM.'</td>';
                                                echo '<td>'.$data->CABANG_PNM.'</td>';
                                                echo '<td>'.$data->UNIT_PNM.'</td>';
                                                echo '<td>'.$data->BUDGET.'</td>';
                                                echo '<td>'.$data->STATUS.'</td>';                                              
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
																data-pelatihancabang="'.$data->CABANG_PNM.'"
																data-pelatihanunit="'.$data->UNIT_PNM.'"
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
																<a class= "dropdown-item pelatihan_approval_lpj" href="#" data-toggle="modal" data-target="#modalapprovallpj" data-pelatihanid="'.$data->ID.'"> Verify</a>				
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