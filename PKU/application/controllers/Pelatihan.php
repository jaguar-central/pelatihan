<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelatihan extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
	}
	
	/*public function info()
	{
		// phpinfo();

		$memtest = new Memcached();
		$memtest->addServer("10.63.8.60", 30005);


		$result = $memtest->get("total");
		
		if (!$result){		
			$start_time = microtime(true); 	
			$username       = 'event';
			$password       = 'event';						
			// Set up and execute the curl process
			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, "http://10.61.3.37/WebService/SSO_Mobile/get_all_karyawan.php");
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_POST, 1);
			// Optional, delete this line if your API is open
			curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);
			$result = json_decode($buffer);
			//count total data
			$total = 0;
			$key = 1;
			foreach ($result->karyawan[0]->data as $row) {
				// var_dump($row);die();
				$memtest->set("datamulti".$key,$row,time()+100);	
				$total ++;
				$key ++;
			};

			$memtest->set("total",$total,time()+100);
			$end_time = microtime(true); 
			//sent data to datatables
			// $oleh = array(
			// 			'draw'              => 1,
			// 			'recordsTotal'      => $total,
			// 			'recordsFiltered'   => $total,
			// 			'data'              => $result->karyawan[0]->data
			// 	);							
			$execution_time = ($end_time - $start_time); 
			echo " eksekusi time database ".$execution_time; 	
		}else{		
			$start_time = microtime(true); 		
			for($i=1;$i < $result;$i++){
				var_dump($memtest->get("datamulti".$i));
			}	
			$end_time = microtime(true); 
			$execution_time = ($end_time - $start_time); 
			echo " eksekusi time memcached ".$execution_time; 		
		}
	}
*/

    public function proposal_ulamm()    	   
    {
		$this->is_logged();		
    	
        $data["content"] 		= "Pelatihan";
        $data["view"] 			= "pelatihan/ulamm";
		$data["script"] 		= "pelatihan/include/ulamm-script";
		$data["modal"] 			= array(
									'pelatihan/modal-ulamm/modalview',
									'pelatihan/modal-ulamm/modaladd',									
									'pelatihan/modal-ulamm/modaldetails',
									'pelatihan/modal-ulamm/modaledit',
									'pelatihan/modal-ulamm/modalunggah',
									'pelatihan/modal-ulamm/modaladdklasterisasi'								
									
								);
		
        $data["menu"] 			= $this->Menu_model->select_ms_menu();
        $data["pelatihan_type"] = $this->Pelatihan_model->select_ms_pelatihan_type_ulamm();
        // $data["pelatihan"] 		= $this->Pelatihan_model->select_t_pelatihan_ulamm_by_status(array('draft','approved','lpj_approved','lpj_draft'));		
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();
		$data["sektor_ekonomi"]	= $this->Master_model->select_dw_nasabah_ulamm_sektor_ekonomi();
		$data["jenis_pinjaman"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_pinjaman();
		$data["jenis_program"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_program();
        

        // echo '<pre>';
		// print_r($data['modal']);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

	}
	
	public function proposal_mekaar()    	    
    {		
		$this->is_logged();		
		
		
    	
        $data["content"] = "Pelatihan";
        $data["view"] 	 = "pelatihan/mekaar";
		$data["script"]  = "pelatihan/include/mekaar-script";
		$data["menu"] 	 = $this->Menu_model->select_ms_menu();
		$data["modal"] 	 = array(
									'pelatihan/modal-mekaar/modalview',
									'pelatihan/modal-mekaar/modaladd',									
									'pelatihan/modal-mekaar/modaldetails',
									'pelatihan/modal-mekaar/modaledit',
									'pelatihan/modal-mekaar/modalunggah',
									'pelatihan/modal-mekaar/modaladdklasterisasi'								
			
								);

		$data["menu"] 			= $this->Menu_model->select_ms_menu();
		$data["pelatihan_type"] = $this->Pelatihan_model->select_ms_pelatihan_type_mekaar();
		// $data["pelatihan"] 		= $this->Pelatihan_model->select_t_pelatihan_mekaar_by_status(array('draft','approved','lpj_approved','lpj_draft'));
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();		
		$data["region"] 		= $this->Master_model->select_ms_region_mekaar();
		$data["sektor_ekonomi"]	= $this->Master_model->select_dw_nasabah_ulamm_sektor_ekonomi();
		$data["jenis_pinjaman"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_pinjaman();
		$data["jenis_program"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_program();
        

        // echo '<pre>';
		// print_r($data);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function history_ulamm()
    {
		$this->is_logged();				
		
        $data["content"] 	= "Pelatihan";
        $data["view"] 		= "pelatihan/history";
		$data["script"] 	= "pelatihan/include/history-script";
		$data["modal"] 		= array( "pelatihan/modal-ulamm/modaldhistory"); 

        $data["menu"] 		= $this->Menu_model->select_ms_menu();
		$data["pelatihan"] 	= $this->Pelatihan_model->select_t_pelatihan();
		//$data["cabang"] 	= $this->Master_model->select_ms_cabang_ulamm();
		
		
        $this->load->view('layout/gabung', $data);
	}

	public function history_mekaar()
    {
		$this->is_logged();				
		
        $data["content"] 	= "Pelatihan";
        $data["view"] 		= "pelatihan/history";
		$data["script"] 	= "pelatihan/include/history-script";
		$data["modal"] 		= array( "pelatihan/modal-mekaar/modaldhistory"); 

        $data["menu"] 		= $this->Menu_model->select_ms_menu();
		$data["pelatihan"] 	= $this->Pelatihan_model->select_t_pelatihan();
		//$data["cabang"] 	= $this->Master_model->select_ms_cabang_ulamm();
		
		
        $this->load->view('layout/gabung', $data);
	}
	
	public function lpj($idpelatihan)    	    
    {		
		$this->is_logged();						
    	
        $data["content"] = "Pelatihan";
        $data["view"] 	 = "pelatihan/lpj";
		$data["script"]  = "pelatihan/include/lpj-script";
		$data["menu"] 	 = $this->Menu_model->select_ms_menu();
		// $data["modal"] 	 = array('pelatihan/modal-lpj/modallistkehadiran');
        
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();
		$data["sektor_ekonomi"]	= $this->Master_model->select_dw_nasabah_ulamm_sektor_ekonomi();
		$data["jenis_pinjaman"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_pinjaman();
		$data["jenis_program"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_program();
		$data["pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_by_id($idpelatihan)->row();
		$data["rab"] = $this->Pelatihan_model->select_t_rab_by_id($idpelatihan);

        // echo '<pre>';
		// print_r($data['rab']);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function konfirmasi_proposal()
    {
		$this->is_logged();				
		
        $data["content"] 	= "Pelatihan";
        $data["view"] 		= "pelatihan/konfirmasi_prop";
        $data["script"] 	= "pelatihan/include/konfirmasi-proposal-script";
		$data["modal"] 		= array(
									'pelatihan/modal-konfirmasi/modaldetails',
									'pelatihan/modal-konfirmasi/modalapproval'
								);		
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
		
		if ($this->session->userdata('sess_user_id_user_group')=='2'){
			$data["t_pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_proposal_by_approval('');			
		}else if ($this->session->userdata('sess_user_id_user_group')=='3'){
			$data["t_pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_proposal_by_approval('Pinca');
		}else if ($this->session->userdata('sess_user_id_user_group')=='4'){
			$data["t_pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_proposal_by_approval('PIC Pusat');
		}else if ($this->session->userdata('sess_user_id_user_group')=='5'){
			$data["t_pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_proposal_by_approval('Kabag');			
		}else if ($this->session->userdata('sess_user_id_user_group')=='6'){
			$data["t_pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_proposal_by_approval('Wakadiv');	
		}else if ($this->session->userdata('sess_user_id_user_group')=='7'){
			$data["t_pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_proposal_by_approval('Kadiv');									
		}else{
			$data["t_pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_proposal_by_approval('');
		}			
		
		// var_dump($this->db->last_query());die();

        $this->load->view('layout/gabung', $data);
    }

    public function konfirmasi_lpj()
    {
		$this->is_logged();				
		
        $data["content"] 			= "Pelatihan";
        $data["view"] 				= "pelatihan/konfirmasi_lpj";
        $data["script"] 			= "pelatihan/include/konfirmasi-lpj-script";
		$data["modal"] 				= array(
										'pelatihan/modal-konfirmasi/modaldetails',
										'pelatihan/modal-konfirmasi/modalapprovallpj'
									);			
			
        $data["menu"] 				= $this->Menu_model->select_ms_menu();
				
		if ($this->session->userdata('sess_user_id_user_group')=='2'){
			$data["t_pelatihan_lpj"] = $this->Pelatihan_model->select_t_pelatihan_lpj_by_approval('');
		}else if ($this->session->userdata('sess_user_id_user_group')=='3'){
			$data["t_pelatihan_lpj"] = $this->Pelatihan_model->select_t_pelatihan_lpj_by_approval('Pinca');			
		}else if ($this->session->userdata('sess_user_id_user_group')=='4'){
			$data["t_pelatihan_lpj"] = $this->Pelatihan_model->select_t_pelatihan_lpj_by_approval('PIC Pusat');
		}else if ($this->session->userdata('sess_user_id_user_group')=='5'){
			$data["t_pelatihan_lpj"] = $this->Pelatihan_model->select_t_pelatihan_lpj_by_approval('Kabag');
		}else if ($this->session->userdata('sess_user_id_user_group')=='6'){
			$data["t_pelatihan_lpj"] = $this->Pelatihan_model->select_t_pelatihan_lpj_by_approval('Wakadiv');	
		}else if ($this->session->userdata('sess_user_id_user_group')=='6'){
			$data["t_pelatihan_lpj"] = $this->Pelatihan_model->select_t_pelatihan_lpj_by_approval('Kadiv');									
		}else{
			$data["t_pelatihan_lpj"] = $this->Pelatihan_model->select_t_pelatihan_lpj_by_approval('');
		}								

        $this->load->view('layout/gabung', $data);
    }

     public function post_pelatihan_proposal()
    {
		$this->is_logged();				
		
        $bisnis_pelatihan   		= trim($this->security->xss_clean(strip_image_tags($this->input->post('bisnis_pelatihan'))));
        $klasterisasi   			= trim($this->security->xss_clean(strip_image_tags($this->input->post('klasterisasi'))));
        $pelatihan_type     		= trim($this->security->xss_clean(strip_image_tags($this->input->post('pelatihan_type'))));
		$judul_pelatihan    		= trim($this->security->xss_clean(strip_image_tags($this->input->post('judul_pelatihan'))));
		
		$cabang_ulamm				= trim($this->security->xss_clean(strip_image_tags($this->input->post('cabang_ulamm'))));
		$unit_ulamm         		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_ulamm')));
		$regional_mekaar			= trim($this->security->xss_clean(strip_image_tags($this->input->post('regional_mekaar'))));       
		$area_mekaar				= trim($this->security->xss_clean(strip_image_tags($this->input->post('area_mekaar'))));        
		$cabang_mekaar   			= $this->security->xss_clean(strip_image_tags($this->input->post('cabang_mekaar')));							
        $deskripsi_pelatihan        = trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi_pelatihan'))));
        $durasi_pelatihan           = trim($this->security->xss_clean(strip_image_tags($this->input->post('durasi_pelatihan'))));
        $inputStartTglPelaksanaan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTglPelaksanaan'))));
        $inputStartTimePelaksanaan  = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTimePelaksanaan'))));
        $inputAkhirTglPelaksanaan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputAkhirTglPelaksanaan'))));
        $inputEndTimePelaksanaan    = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputEndTimePelaksanaan'))));
        $pembicara_pelatihan        = trim($this->security->xss_clean(strip_image_tags($this->input->post('pembicara_pelatihan'))));
        $kuota_peserta              = trim($this->security->xss_clean(strip_image_tags($this->input->post('kuota_peserta'))));

        $anggaran               	= str_replace(array('.',',00'),'',trim($this->security->xss_clean(strip_image_tags($this->input->post('anggaran')))));
        $provinsi               	= trim($this->security->xss_clean(strip_image_tags($this->input->post('provinsi'))));
        $alamat_tempat_pelatihan    = trim($this->security->xss_clean(strip_image_tags($this->input->post('alamat_tempat_pelatihan'))));
        $lokasi_pelatihan           = trim($this->security->xss_clean(strip_image_tags($this->input->post('lokasi_pelatihan'))));
        $radius               		= trim($this->security->xss_clean(strip_image_tags($this->input->post('radius'))));
        $latitude               	= trim($this->security->xss_clean(strip_image_tags($this->input->post('latitude'))));
        $longitude               	= trim($this->security->xss_clean(strip_image_tags($this->input->post('longitude'))));
		$id_user					= $this->session->userdata('sess_user_idsdm');	
		
				
		$deskripsi_rab        		= $this->security->xss_clean(strip_image_tags($this->input->post('deskripsi_rab')));
		$jumlah_rab           		= $this->security->xss_clean(strip_image_tags($this->input->post('jumlah_rab')));
		$unit_rab             		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_rab')));
		$unit_cost_rab        		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_cost_rab')));
		$total_cost_rab       		= $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab')));
		$total_cost_rab_akhir 		= $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab_akhir')));				
		
		$no_trx='';		
		$no_trx_reject='';
		$no_proposal='';
		if ($bisnis_pelatihan=='ULAMM'){
			$data_unit_ulamm = '';
			$data_cabang_mekaar = '';
			foreach ($unit_ulamm as $key => $value) {	

				$PARAMETER = $this->Master_model->select_ms_pelatihan_type_by_id($pelatihan_type)->row()->KODE;

				$param = array(
					'PELATIHAN_TYPE_ID' => $pelatihan_type,
					'PARAMETER' => $PARAMETER,
					'PARAM1' => $value,
					'PARAM2' => ''
				);

				// $no_trx_reject .= ','.$this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value);
				
				if (!$this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)){
					$no_trx = ','.$this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->NO_TRX;					
					$this->Pelatihan_model->update_aktif_trx_reject($this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->ID);
				}else{
					$no_trx = ','.$this->create_trx_no($param);
				}
				$data_unit_ulamm .= ','.$value;
			}
			
			//create no proposal
			$param = array(
				'PELATIHAN_TYPE_ID' => $pelatihan_type,
				'PARAMETER' => 'PROPOSAL',
				'PARAM1' => $cabang_ulamm,
				'PARAM2' => ''
			);
			
			$no_proposal = $this->create_trx_no($param);
		}	
		
		if ($bisnis_pelatihan=='MEKAAR'){	
			$data_unit_ulamm = '';
			$data_cabang_mekaar = '';
			foreach ($cabang_mekaar as $key => $value) {
				
				$PARAMETER = $this->Master_model->select_ms_pelatihan_type_by_id($pelatihan_type)->row()->KODE;
				$param = array(
					'PELATIHAN_TYPE_ID' => $pelatihan_type,
					'PARAMETER' => $PARAMETER,
					'PARAM1' => $value,
					'PARAM2' => ''
				);	
				
				// $no_trx_reject .= ','.$this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->NO_TRX;
												
				// $no_trx = ($no_trx_reject) ? $no_trx_reject : ','.$this->create_trx_no($param);	
				
				// $this->Pelatihan_model->update_aktif_trx_reject($this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->ID);
				
				if (!$this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)){
					$no_trx = ','.$this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->NO_TRX;					
					$this->Pelatihan_model->update_aktif_trx_reject($this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->ID);
				}else{
					$no_trx = ','.$this->create_trx_no($param);
				}
				
				$data_cabang_mekaar .= ','.$value;
			}					


			//create no proposal
			$param = array(
				'PELATIHAN_TYPE_ID' => $pelatihan_type,
				'PARAMETER' => 'PROPOSAL',
				'PARAM1' => $regional_mekaar,
				'PARAM2' => $area_mekaar
			);
			
			$no_proposal = $this->create_trx_no($param);
		}	
		

		
		
		$no_trx = substr($no_trx,1,strlen($no_trx));				
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);		
		
		
		try{
			$data = array(
				'ID_TIPE' 			=> $pelatihan_type,
				'NO_PROPOSAL' 		=> $no_proposal,
				'NO_TRX' 			=> $no_trx,
				'ID_KLASTERISASI' 	=> $klasterisasi,
				'TITLE' 			=> $judul_pelatihan,
				'TIPE_BISNIS'		=> $bisnis_pelatihan,
				'REGIONAL_MEKAAR'	=> $regional_mekaar,
				'AREA_MEKAAR' 		=> $area_mekaar,
				'CABANG_MEKAAR'		=> $data_cabang_mekaar,
				'CABANG_ULAMM' 		=> $cabang_ulamm,
				'UNIT_ULAMM'		=> $data_unit_ulamm,
				'DESKRIPSI' 		=> $deskripsi_pelatihan,
				'DURASI_PELATIHAN' 	=> $durasi_pelatihan,
				'TANGGAL_MULAI' 	=> $inputStartTglPelaksanaan.' '.date("H:i", strtotime($inputStartTimePelaksanaan)),
				'TANGGAL_SELESAI' 	=> $inputAkhirTglPelaksanaan.' '.date("H:i", strtotime($inputEndTimePelaksanaan)),
				'KUOTA_PESERTA' 	=> $kuota_peserta,
				'BUDGET' 			=> $anggaran,
				'STATUS' 			=> 'draft',
				'PROVINSI' 			=> $provinsi,
				'ALAMAT' 			=> $alamat_tempat_pelatihan,
				'LOKASI' 			=> $lokasi_pelatihan,
				'RADIUS' 			=> $radius,
				'LATITUDE' 			=> $latitude,
				'LONGITUDE' 		=> $longitude,
				'PEMBICARA'			=> $pembicara_pelatihan,
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
			);
			
			$this->Pelatihan_model->insert_t_pelatihan($data);
			
			$id_pelatihan = $this->db->insert_id(); //last id yang di insert		
			
			for ($i=1;$i<count($deskripsi_rab);$i++){
				$rab = array(
					'ID_PELATIHAN' 		=> $id_pelatihan,
					'TIPE_BISNIS' 		=> $bisnis_pelatihan,
					'URAIAN' 			=> $deskripsi_rab[$i],
					'JUMLAH' 			=> $jumlah_rab[$i],
					'SATUAN' 			=> $unit_rab[$i],
					'UNIT_COST' 		=> $unit_cost_rab[$i],
					'SUB_TOTAL_COST' 	=> $total_cost_rab[$i],
					'GRAND_TOTAL' 		=> $total_cost_rab_akhir,
					'CREATED_BY' 		=> $id_user,
					'CREATED_DATE' 		=> date('Y-m-d H:i:s')
				);							
				$this->Pelatihan_model->insert_t_rab($rab);
			}
		}		
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
        
		echo json_encode($output);
		exit;
    }


	public function get_rab(){
		$id_pelatihan = $_GET['pelatihanid'];
		$rab = $this->Pelatihan_model->select_t_rab_by_id($id_pelatihan);					
		
		$data= '';
			
		foreach ($rab as $data_rab) {
			$data .= '
			<tr class="">
			  <td><input type="text" class="form-control" id="deskripsi_rab_details" name="deskripsi_rab[]" value="'.$data_rab->URAIAN.'" disabled=""></td>
			  <td><input type="number" class="form-control" id="jumlah_rab_details" name="jumlah_rab[]" disabled="" value="'.$data_rab->JUMLAH.'"></td>
			  <td><input type="text" class="form-control" id="unit_rab_details" name="unit_rab[]" value="'.$data_rab->SATUAN.'" disabled=""></td>
			  <td><input type="number" class="form-control" id="unit_cost_rab_details" name="unit_cost_rab[]" value="'.$data_rab->UNIT_COST.'" disabled=""></td>
			  <td><input type="number" class="form-control" id="total_cost_rab_details" name="total_cost_rab[]" value="'.$data_rab->SUB_TOTAL_COST.'" readonly="" disabled=""></td>
			  <td>                            
				<a class="table-remove btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>   
			  </td>
			  <td>                            
				<a class="table-up btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   
				<a class="table-down btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>                               
			  </td>
			</tr>
			';
			
		} 
			
		echo $data;	
	}

	public function insert_unggah_proposal()
    {
		$this->is_logged();				
		
        $pelatihan_id           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('pelatihan_id'))));
        $nomor_pelatihan			= trim($this->security->xss_clean(strip_image_tags($this->input->post('nomor_pelatihan'))));
        $pelatihan_jenis            = trim($this->security->xss_clean(strip_image_tags($this->input->post('pelatihan_jenis'))));
        $tema_pelatihan        		= trim($this->security->xss_clean(strip_image_tags($this->input->post('tema_pelatihan'))));
		$id_user					= $this->session->userdata('sess_user_idsdm');
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
	if ($_FILES['pilih_file']) 
	{
		$config['upload_path']	= './assets/dokumen/proposal';
		$config['allowed_types']	= 'docx|jpg|jpeg|png|pdf';
		$config['max_size']	= '8000';
		$config['overwrite']	= TRUE;

		$nama_file	= base64_encode($pelatihan_id.'_'.date('Ymd').'at'.date('His'));
		$config['file_name']	= $nama_file;
		$this->upload->initialize($config);

		if($this->upload->do_upload('pilih_file'))
		{
			$this->upload->data();
			try
			{
				$data = array(
					'ID_PELATIHAN' 		=> $pelatihan_id,
					'NAMA_FILE' 		=> $nama_file,
					'JENIS_FILE' 		=> 'unggah_proposal',
					'TIPE_FILE' 		=> '',
					'AKTIF' 			=> '1',
					'CREATED_BY' 		=> $id_user,
					'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
				);
				
				$this->Pelatihan_model->insert_t_dokumen($data);
								
								
				$data_update 	= array(
					'STATUS' => 'submitted',
					'UPDATED_BY' => $id_user,
					'UPDATED_DATE' => date('Y-m-d H:i:s')			
					);
				$where_update	= array(
					'ID' 	=> $pelatihan_id
					);
				$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);
				
			}		
			catch (Exception $e)
			{
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $e->getMessage()
				);
			}

		}

		else
		$output = array(
			'result' => 'UP',
			'msg'	 => $this->upload->display_errors().'nama->'.$nama_file
		);
	} 	
		
		
        
		echo json_encode($output);
		exit;
    }

	public function post_konfirmasi_proposal()
    {
		$this->is_logged();						
		
        $id_pelatihan           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan'))));
		$keterangan           		= trim($this->security->xss_clean(strip_image_tags($this->input->post('keterangan'))));		
		$id_user					= $this->session->userdata('sess_user_idsdm');
		$tingkat_approval			= $this->session->userdata('sess_user_group');		
		$username					= $this->session->userdata('sess_user_username');					

		$status_approval = $this->Pelatihan_model->check_bwmp_approval_proposal($id_pelatihan,$tingkat_approval);
		
		$tingkat_approval = $status_approval=='approved' ? '' : $tingkat_approval;
		
		switch ($this->session->userdata('sess_user_id_user_group')) {
		  case "2":
			$urutan_approval = '1';
			break;
		  case "3":
			$urutan_approval = '2';
			break;
		  case "4":
			$urutan_approval = '3';
			break;		  
		  case "5":
			$urutan_approval = '4';
			break;	
		  case "6":
			$urutan_approval = '5';
			break;	
		  case "7":
			$urutan_approval = '6';
			break;				
		}
		
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		try
		{
			$data = array(
				'ID_PELATIHAN' 		=> $id_pelatihan,
				'TIPE_APPROVAL' 	=> 'PROPOSAL',
				'URUTAN_APPROVAL'	=> $urutan_approval,
				'USERNAME'			=> $username,	
				'TTD'				=> base_url()."assets/images/tandatangan/".$username,
				'APPROVAL'			=> $tingkat_approval,
				'KETERANGAN'		=> $keterangan,
				'AKTIF' 			=> '1',
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
			);
					
			$this->Pelatihan_model->insert_t_approval($data);
			
			
			$data_update 	= array(
				'STATUS'			=> $status_approval,
				'APPROVAL' 			=> $tingkat_approval,
				'UPDATED_BY' 		=> $id_user,
				'UPDATED_DATE' 		=> date('Y-m-d H:i:s')			
				);
			$where_update	= array(
				'ID' 	=> $id_pelatihan
				);
			$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);
			
			
		}
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
		
		
        
		echo json_encode($output);
		exit;
	}
	
	public function post_pelatihan_lpj()
    {
		$this->is_logged();				
		
		$id_pelatihan           = trim($this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan'))));
        $lampiran	            = trim($this->security->xss_clean(strip_image_tags($this->input->post('lampiran'))));
        $tanggal_realisasi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('tanggal_realisasi'))));
        $csi_final            	= trim($this->security->xss_clean(strip_image_tags($this->input->post('csi_final'))));
		$catatan_tambahan       = trim($this->security->xss_clean(strip_image_tags($this->input->post('catatan_tambahan'))));
		$id_user				= $this->session->userdata('sess_user_idsdm');
        
		$deskripsi_rab        = $this->security->xss_clean(strip_image_tags($this->input->post('deskripsi_rab')));
		$jumlah_rab           = $this->security->xss_clean(strip_image_tags($this->input->post('jumlah_rab')));
		$unit_rab             = $this->security->xss_clean(strip_image_tags($this->input->post('unit_rab')));
		$unit_cost_rab        = $this->security->xss_clean(strip_image_tags($this->input->post('unit_cost_rab')));
		$total_cost_rab       = $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab')));
		$total_cost_rab_akhir = $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab_akhir')));				
		
		// var_dump(date("H:i", strtotime($inputStartTimePelaksanaan)));die();
		// var_dump($inputStartTglPelaksanaan);die();
		
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);		
		
		try{
			$data = array(
				'ID_PELATIHAN' 			=> $id_pelatihan,
				'LINK_LAMPIRAN' 		=> $lampiran,
				'TANGGAL_REALISASI' 	=> $tanggal_realisasi,
				'CSI_FINAL' 			=> $csi_final,
				'CATATAN_TAMBAHAN' 		=> $catatan_tambahan,
				'AKTIF' 				=> '1',
				'CREATED_BY' 			=> $id_user,
				'CREATED_DATE' 			=> date('Y-m-d H:i:s')			
			);
			
			$this->Pelatihan_model->insert_t_pelatihan_lpj($data);
					
			
			for ($i=1;$i<count($deskripsi_rab);$i++){
				$rab = array(
					'ID_PELATIHAN' 		=> $id_pelatihan,
					'URAIAN' 			=> $deskripsi_rab[$i],
					'JUMLAH' 			=> $jumlah_rab[$i],
					'SATUAN' 			=> $unit_rab[$i],
					'UNIT_COST' 		=> $unit_cost_rab[$i],
					'SUB_TOTAL_COST' 	=> $total_cost_rab[$i],
					'GRAND_TOTAL' 		=> $total_cost_rab_akhir,
					'CREATED_BY' 		=> $id_user,
					'CREATED_DATE' 		=> date('Y-m-d H:i:s')
				);							
				$this->Pelatihan_model->insert_t_rab_lpj($rab);
			}

			$data_update 	= array(
				'STATUS'			=> 'lpj_submitted',
				'UPDATED_BY' 		=> $id_user,
				'UPDATED_DATE' 		=> date('Y-m-d H:i:s')			
				);
			$where_update	= array(
				'ID' 	=> $id_pelatihan
				);
			$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);
		}

		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
        
		echo json_encode($output);
		exit;
	}
	
	public function post_konfirmasi_lpj()
    {
		$this->is_logged();				
		
        $id_pelatihan           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan'))));
		$keterangan           		= trim($this->security->xss_clean(strip_image_tags($this->input->post('keterangan'))));
		$id_user					= $this->session->userdata('sess_user_idsdm');
		$tingkat_approval			= $this->session->userdata('sess_user_group');	
		$username					= $this->session->userdata('sess_user_username');	
		
		$status_approval = $this->Pelatihan_model->check_bwmp_approval_lpj($id_pelatihan,$tingkat_approval);		
		
		$tingkat_approval = $status_approval=='approved' ? '' : $tingkat_approval;
		
		switch ($this->session->userdata('sess_user_id_user_group')) {
		  case "2":
			$urutan_approval = '1';
			break;
		  case "3":
			$urutan_approval = '2';
			break;
		  case "4":
			$urutan_approval = '3';
			break;		  
		  case "5":
			$urutan_approval = '4';
			break;		
		  case "6":
			$urutan_approval = '5';
			break;	  
		  case "7":
			$urutan_approval = '6';
			break;	 				
		}				
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		try
		{
			$data = array(
				'ID_PELATIHAN' 		=> $id_pelatihan,
				'TIPE_APPROVAL' 	=> 'LPJ',
				'URUTAN_APPROVAL'	=> $urutan_approval,
				'USERNAME'			=> $username,				
				'APPROVAL'			=> $tingkat_approval,
				'TTD'				=> base_url()."assets/images/tandatangan/".$username,
				'KETERANGAN'		=> $keterangan,				
				'AKTIF' 			=> '1',
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
			);
					
			$this->Pelatihan_model->insert_t_approval($data);
			
			
			$data_update 	= array(
				'STATUS'			=> $status_approval,
				'APPROVAL' 			=> $tingkat_approval,
				'UPDATED_BY' 		=> $id_user,
				'UPDATED_DATE' 		=> date('Y-m-d H:i:s')			
				);
			$where_update	= array(
				'ID' 	=> $id_pelatihan
				);
			$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);
			
			
		}
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
		
		
        
		echo json_encode($output);
		exit;
	}

	public function post_kehadiran()
    {
		$this->is_logged();				
		
        $id_pelatihan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan'))));
        $bisnis         = trim($this->security->xss_clean(strip_image_tags($this->input->post('bisnis'))));
        $ktp           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('ktp'))));
        $nama_nasabah	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_nasabah'))));
		$no_hp          = trim($this->security->xss_clean(strip_image_tags($this->input->post('no_hp'))));
		
        $kolektibilitas = $this->security->xss_clean(strip_image_tags($this->input->post('kolektibilitas')));
        $cabang        	= trim($this->security->xss_clean(strip_image_tags($this->input->post('cabang'))));
		$unit           = trim($this->security->xss_clean(strip_image_tags($this->input->post('unit'))));
		

		$produk         = trim($this->security->xss_clean(strip_image_tags($this->input->post('produk'))));
		$region         = trim($this->security->xss_clean(strip_image_tags($this->input->post('Region'))));
		$area		    = trim($this->security->xss_clean(strip_image_tags($this->input->post('Area'))));
		$id_user		= $this->session->userdata('sess_user_idsdm');					
		
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);

		if ($bisnis=='NON_NASABAH'){
			$nasabah_type = $bisnis;
		}else{
			$nasabah_type = 'NASABAH';
		}
		
		
		
		try{
			$data = array(
				'ID_PELATIHAN' 		=> $id_pelatihan,
				'BISNIS' 			=> $bisnis,
				'KTP' 				=> $ktp,
				'NAMA' 				=> $nama_nasabah,
				'NASABAH_TIPE' 		=> $nasabah_type,
				'AKTIF' 			=> '1',
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
			);
			
			$this->Pelatihan_model->insert_t_kehadiran($data);
			
			// $cek_kehadiran = $this->Pelatihan_model->select_t_kehadiran_by_idpelatihan($id_pelatihan)->num_rows();
			
			// if ($cek_kehadiran > 0){
				// $data_update 	= array(
					// 'STATUS' 		=> 'lpj_draft',
					// 'UPDATED_BY' 	=> $id_user,
					// 'UPDATED_DATE' 	=> date('Y-m-d H:i:s')			
					// );
				// $where_update	= array(
					// 'ID' 	=> $id_pelatihan
					// );
				// $this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);
			// }			
			
			
		}		
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
        
		echo json_encode($output);
		exit;
	}
	
	public function get_kehadiran($idpelatihan)
	{						
		$param["id_pelatihan"] = isset($idpelatihan) ? $idpelatihan : NULL;
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						
		$data["data"] = $this->Pelatihan_model->paging_select_kehadiran($param);				
		$param['count'] = 1;				
		$total = $this->Pelatihan_model->paging_select_kehadiran($param)[0]->COUNT_DATA;				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);
	}

	public function delete_kehadiran()
	{
		$this->is_logged();				
		
        $id_pelatihan           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan'))));					
        $ktp           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('ktp'))));					
		
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		
		
		try{
			$data = array(
				'ID_PELATIHAN'		=> $id_pelatihan,
				'KTP' 				=> $ktp
			);
			
			$this->Pelatihan_model->delete_t_kehadiran($data);
			
			$cek_kehadiran = $this->Pelatihan_model->select_t_kehadiran_by_idpelatihan($id_pelatihan)->num_rows();
			
			if ($cek_kehadiran == 0){
				$data_update 	= array(
					'STATUS' 		=> 'approved',
					'UPDATED_BY' 	=> $id_user,
					'UPDATED_DATE' 	=> date('Y-m-d H:i:s')			
					);
				$where_update	= array(
					'ID' 	=> $id_pelatihan
					);
				$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);
			}			
			
		}		
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
        
		echo json_encode($output);
		exit;
	}

	public function get_paging_kehadiran_nasabah_ulamm($idpelatihan)
	{					
		$param['sektor_ekonomi'] 	= $_GET["columns"][0]['search']['value'];
		$param['jenis_pinjaman'] 	= $_GET["columns"][1]['search']['value'];
		$param['jenis_program'] 	= $_GET["columns"][2]['search']['value'];
		$param['cabang'] 			= $_GET["columns"][3]['search']['value'];
		$param['unit'] 				= $_GET["columns"][4]['search']['value'];
		
		$param["idpelatihan"] = isset($idpelatihan) ? $idpelatihan : NULL;					
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						
		$data["data"] = $this->Pelatihan_model->paging_kehadiran_select_nasabah_ulamm($param);				
		$param['count'] = 1;				
		$total = $this->Pelatihan_model->paging_kehadiran_select_nasabah_ulamm($param)[0]->COUNT_DATA;				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);
	}

	public function get_paging_kehadiran_nasabah_mekaar($idpelatihan)
	{					
		$param["idpelatihan"] = isset($idpelatihan) ? $idpelatihan : NULL;					
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						
		$data["data"] = $this->Pelatihan_model->paging_kehadiran_select_nasabah_mekaar($param);				
		$param['count'] = 1;				
		$total = $this->Pelatihan_model->paging_kehadiran_select_nasabah_mekaar($param)[0]->COUNT_DATA;				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);
	}

	public function post_non_nasabah()
    {
		$this->is_logged();				
		
        $ktp   		= trim($this->security->xss_clean(strip_image_tags($this->input->post('ktp'))));
        $no_hp      = trim($this->security->xss_clean(strip_image_tags($this->input->post('no_hp'))));
        $nama       = trim($this->security->xss_clean(strip_image_tags($this->input->post('nama'))));
        $lokasi_pnm	= trim($this->security->xss_clean(strip_image_tags($this->input->post('lokasi_pnm'))));
        $alamat     = trim($this->security->xss_clean(strip_image_tags($this->input->post('alamat'))));
        $catatan 	= $this->security->xss_clean(strip_image_tags($this->input->post('catatan')));
		$id_user	= $this->session->userdata('sess_user_idsdm');					
		
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		
		
		try{
			$data = array(
				'NO_KTP' 			=> $ktp ,
				'NO_HP' 		=> $no_hp,
				'NAMA' 			=> $nama,
				'LOKASI_PNM' 	=> $lokasi_pnm,
				'ALAMAT' 		=> $alamat,
				'CATATAN' 		=> $catatan,
				'CREATED_BY' 	=> $id_user,
				'CREATED_DATE' 	=> date('Y-m-d H:i:s')			
			);
			
			$this->Pelatihan_model->insert_t_non_nasabah($data);
			
		}		
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
        
		echo json_encode($output);
		exit;
	}

	public function get_paging_kehadiran_non_nasabah()
	{										
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						
		$data["data"] = $this->Pelatihan_model->paging_kehadiran_non_nasabah($param);				
		$param['count'] = 1;				
		$total = $this->Pelatihan_model->paging_kehadiran_non_nasabah($param)[0]->COUNT_DATA;				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);
	}

	public function post_submit_proposal()
	{
		$this->is_logged();		

		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		$pelatihanid	= trim($this->security->xss_clean(strip_image_tags($this->input->post('pelatihanid'))));
		$id_user 		= $this->session->userdata('sess_user_idsdm');

		$data_update 	= array(
			'STATUS' => 'submitted',
			'UPDATED_BY' => $id_user,
			'UPDATED_DATE' => date('Y-m-d H:i:s')			
			);
		$where_update	= array(
			'ID' 	=> $pelatihanid
			);
			
		try
		{	
		$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);
		}
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
		
		echo json_encode($output);
		exit;
		
	}


	public function post_change_status_pelatihan($idpelatihan,$status)
	{		
		$id_user = $this->session->userdata('sess_user_idsdm');	
		$approval = $this->session->userdata('sess_user_group');
		
		$data_update 	= array(
			'STATUS' => $status,
			'APPROVAL' => $approval,
			'UPDATED_BY' => $id_user,
			'UPDATED_DATE' => date('Y-m-d H:i:s')			
			);
		$where_update	= array(
			'ID' 	=> $idpelatihan
			);
		$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);	

		// jika status reject NO_TRX disimpan di table TRX_NO_REJECT
		if ($status=='reject'){			

			$NO_TRX = $this->Pelatihan_model->select_t_pelatihan_by_id($idpelatihan)->row()->NO_TRX;

			$ARRAY_NO_TRX = explode(",",$NO_TRX);

			foreach ($ARRAY_NO_TRX as $NO){
				$data = array(
					'NO_TRX' 		=> $NO,
					'AKTIF' 		=> '1',
					'CREATED_BY' 	=> $id_user,
					'CREATED_DATE' 	=> date('Y-m-d H:i:s')			
				);			

				$this->Pelatihan_model->insert_trx_no_reject($data);
			}
		}
		
	}

	public function get_paging_pelatihan($tipe,$bisnis){
						
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["tipe_pelatihan"] 	= isset($tipe) ? $tipe : NULL ;			
		$param["tipe_bisnis"] 		= isset($bisnis) ? $bisnis : NULL ;			
		$param["search"] 			= isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						

		$data["data"] = $this->Pelatihan_model->paging_t_pelatihan($param);				
		$param['count'] = 1;				
		$total = $this->Pelatihan_model->paging_t_pelatihan($param)[0]->COUNT_DATA;				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);		
		
	}




    public function post_klasterisasi()
    {
		$this->is_logged();	

		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);			
		
        $type_klasterisasi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('type_klasterisasi'))));
        $judul_klasterisasi = trim($this->security->xss_clean(strip_image_tags($this->input->post('judul_klasterisasi'))));
		$max_pelatihan    	= trim($this->security->xss_clean(strip_image_tags($this->input->post('max_pelatihan'))));
		$bisnis_pelatihan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('bisnis_pelatihan'))));
		$id_user			= $this->session->userdata('sess_user_idsdm');	
		
		try
		{
			$data = array(
				'ID_TIPE_PELATIHAN' 	=> $type_klasterisasi,
				'JUDUL_KLASTERISASI' 	=> $judul_klasterisasi,
				'BISNIS' 				=> $bisnis_pelatihan,
				'MAX_PELATIHAN' 		=> $max_pelatihan,
				'AKTIF'					=> '1',
				'CREATED_BY' 			=> $id_user,
				'CREATED_DATE' 			=> date('Y-m-d H:i:s')			
			);
			
			$this->Pelatihan_model->insert_t_klasterisasi($data);	
		}
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}		
		
		echo json_encode($output);
		exit;
	}



	public function get_klasterisasi(){
		$tipe = $_GET['tipepelatihan'];
		$klasterisasi = $this->Pelatihan_model->select_t_klasterisasi_by_tipe($tipe);					
		
		$return= '';
			
		foreach ($klasterisasi as $data) {
			$return .="<option value='$data->ID' >$data->JUDUL_KLASTERISASI<option/>";
		}
		
		echo $return;	
	}


}