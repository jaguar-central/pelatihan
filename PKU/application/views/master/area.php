!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="overview-wrap">
						            <h2 class="title-2">Area Mekaar</h2>
					            </div>
                                <div class="table-style">
                                    <!--div class="p-3">
                                        <a href="#"  data-toggle="modal" data-target="#add_area" class="btn btn-primary">
                                        <span class="btn-label"><i class="fa fa-plus"></i></span> Tambah Area
                                        </a>
                                    </div-->   
                                    <table id="area_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>KODE AREA</th>
                                                <th>DESKRIPSI</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($t_area_mekaar as $nma){
                                                echo '<tr>';
                                                echo '<td>'.$nma->KODE_AREA.'</td>';
                                                echo '<td>'.$nma->DESKRIPSI.'</td>'; 
                                                echo '<td><button type="button" class="btn btn-primary">Primary</button> <button type="button" class="btn btn-danger">Delete</button></td>'; 
                                                echo '</tr>';

                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->