 <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">  
						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-2">Non Nasabah</h2>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-lg-12">
								<div class="table-style table-responsive">
									<table id="datanonnasabah" class="table table-bordered table-striped"> 
                                        <thead>
                                            <tr>
                                                <th>NO KTP</th>
                                                <th>NAMA NASABAH</th>
                                                <th>NO. TELEPON</th>
                                                <th>NO. HANDPHONE</th>
                                                <th>ALAMAT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($ulamm as $cus){
                                                echo '<tr>';
                                                echo '<td>'.$cus->NO_KTP.'</td>';
                                                echo '<td>'.$cus->NAMA.'</td>'; 
                                                echo '<td>'.$cus->TELP.'</td>';
                                                echo '<td>'.$cus->NO_HP.'</td>';
                                                echo '<td>'.$cus->ALAMAT.'</td>';                                              
                                                echo '</tr>';
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
            <!-- END MAIN CONTENT-->