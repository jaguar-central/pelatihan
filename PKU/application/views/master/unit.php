!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="overview-wrap">
						            <h2 class="title-2">Unit Ulamm</h2>
					            </div>
                                <div class="table-style">
                                    <!--div class="p-3">
                                        <a href="#"  data-toggle="modal" data-target="#add_user" class="btn btn-primary">
                                        <span class="btn-label"><i class="fa fa-plus"></i></span> Tambah Unit
                                        </a>
                                    </div-->
                                    <table id="unit_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>KODE CABANG</th>
                                                <th>KODE UNIT</th>
                                                <th>DESKRIPSI</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($t_unit_ulamm as $dta){
                                                echo '<tr>';
                                                echo '<td>'.$dta->KODE_CABANG.'</td>';
                                                echo '<td>'.$dta->KODE_UNIT.'</td>'; 
                                                echo '<td>'.$dta->DESKRIPSI.'</td>'; 
                                                echo '<td><button type="button" class="btn btn-primary">Add</button> <button type="button" class="btn btn-danger">Delete</button></td>'; 
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

