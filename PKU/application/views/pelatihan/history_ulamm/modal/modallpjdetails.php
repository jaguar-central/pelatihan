<!-- Modal -->
<div id="modallpjdetails" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <div id="judul_modal">
                <h4>Details Pelatihan Lpj</h4>
            </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

                <div class="modal-body">
                    <div class="form-group">									
                        <div class="form-group row">			

                            <label class="col-sm-2">Tanggal <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  required="" id="tanggallpj" readonly="" />                                
                            </div>		

                            <label class="col-sm-2">Durasi <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  required="" id="durasi_tampilan" readonly="" />
                            </div>										
                        </div>		

                                                            
                        <div class="form-group row">
                            <label class="col-sm-2">CSI Final <span class="text-danger"></span></label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control"  required="" id="csi_final" name="csi_final" readonly="" />
                            </div>							
                        
                            <label class="col-sm-2">Catatan Tambahan <span class="text-danger"></span></label>
                            <div class="col-sm-4">
                            <textarea class="form-control rounded-0" id="catatan_tambahan" name="catatan_tambahan" rows="3" readonly="">                            
                            </textarea>																	
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
                                <table id="table_rab_modallpj"  class="table table-responsive">
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
                                        <td ><input type="text" class="form-control" id="deskripsi_rab_modallpj" name="deskripsi_rab[]" value=""></td>
                                        <td ><input type="number" class="form-control" id="volume_rab_modallpj" name="volume_rab[]"></td>
                                        <td ><input type="number" class="form-control" id="unit_cost_rab_modallpj" name="unit_cost_rab[]" value=""></td>
                                        <td ><input type="number" class="form-control" id="total_cost_rab_modallpj" name="total_cost_rab[]" value="" readonly=""></td>
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
                                                                                         
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>                        
                    </div>  	


                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                <h4 class="card-title ">List Kehadiran</h4>                        
                                </div>
                                <div class="card-body">
                                    <div class="table">   
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
                    </div> -->



                </div>
            </div>
        </div>
    </div>
</div>

			