<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelatihan extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
	}
	
/*-------------------------------------CTRL VIEW-------------------------------------*/
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
									'pelatihan/modal-ulamm/modaladdprojectcharter',					
									'pelatihan/modal-ulamm/modalviewprojectcharter',
									'pelatihan/modal-ulamm/modaleditprojectcharter'		
								);
		
        $data["menu"] 			= $this->Menu_model->select_ms_menu();
		$data["pelatihan_type"] = $this->Pelatihan_model->select_ms_pelatihan_type_ulamm();
		$data["grade_ulamm"] 	= $this->Master_model->select_ms_grading();        
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();
		$data["sektor_ekonomi"]	= $this->Master_model->select_dw_nasabah_ulamm_sektor_ekonomi();
		$data["jenis_pinjaman"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_pinjaman();
		$data["jenis_program"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_program();

		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();
        

        // echo '<pre>';
		// print_r($data['kecamatan']);
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
									'pelatihan/modal-mekaar/modaladdprojectcharter',								
									'pelatihan/modal-mekaar/modalviewprojectcharter',
									'pelatihan/modal-mekaar/modaleditprojectcharter'		
								);

		$data["pelatihan_type"] = $this->Pelatihan_model->select_ms_pelatihan_type_mekaar();
		$data["grade_mekaar"] 	= $this->Master_model->select_ms_grading();		
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();		
		$data["region"] 		= $this->Master_model->select_ms_region_mekaar();
		$data["sektor_ekonomi"]	= $this->Master_model->select_dw_nasabah_ulamm_sektor_ekonomi();
		$data["jenis_pinjaman"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_pinjaman();
		$data["jenis_program"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_program();
        
		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();
        // echo '<pre>';
		// print_r($data['kecamatan']);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function history_ulamm()
    {
		$this->is_logged();				
		
        $data["content"] 	= "Pelatihan";
        $data["view"] 		= "pelatihan/history_ulamm";
		$data["script"] 	= "pelatihan/include/history-ulamm-script";
		$data["modal"] 		= array( "pelatihan/modal-ulamm/modaldetails"); 

        $data["menu"] 		= $this->Menu_model->select_ms_menu();
		$data["pelatihan"] 	= $this->Pelatihan_model->select_t_pelatihan_ulamm_by_status(array('draft','submitted','approved','lpj_draft','lpj_submitted','lpj_approved'));
		$data["cabang"] 	= $this->Master_model->select_ms_cabang_ulamm();	

		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();
		
        $this->load->view('layout/gabung', $data);
	}

	public function history_mekaar()
    {
		$this->is_logged();				
		
        $data["content"] 	= "Pelatihan";
        $data["view"] 		= "pelatihan/history_mekaar";
		$data["script"] 	= "pelatihan/include/history-mekaar-script";
		$data["modal"] 		= array( "pelatihan/modal-mekaar/modaldetails"); 

        $data["menu"] 		= $this->Menu_model->select_ms_menu();
		$data["pelatihan"] 	= $this->Pelatihan_model->select_t_pelatihan_mekaar_by_status(array('draft','submitted','approved','lpj_draft','lpj_submitted','lpj_approved'));
		$data["cabang"] 	= $this->Master_model->select_ms_cabang_ulamm();		
		$data["region"] 	= $this->Master_model->select_ms_region_mekaar();

		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();
		
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

		$data['provinsi'] 	= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 	= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 	= $this->Master_model->select_ms_kecamatan();
								
        
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



/*-------------------------------------CTRL API POST-------------------------------------*/	
     public function post_pelatihan_proposal()
    {
		$this->is_logged();				
		

		$id_pelatihan_project_charter= trim($this->security->xss_clean(strip_image_tags($this->input->post('judul_project_charter'))));

        $id_bisnis_pelatihan   		= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_bisnis_pelatihan'))));        
        $pelatihan_type     		= trim($this->security->xss_clean(strip_image_tags($this->input->post('pelatihan_type'))));
		$judul_pelatihan    		= trim($this->security->xss_clean(strip_image_tags($this->input->post('judul_pelatihan'))));
		$grading   					= trim($this->security->xss_clean(strip_image_tags($this->input->post('grading'))));

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
        //$provinsi               	= trim($this->security->xss_clean(strip_image_tags($this->input->post('provinsi'))));
		$alamat_tempat_pelatihan    = trim($this->security->xss_clean(strip_image_tags($this->input->post('alamat_tempat_pelatihan'))));
		
		$provinsi    				= trim($this->security->xss_clean(strip_image_tags($this->input->post('provinsi'))));
		$kabkot    					= trim($this->security->xss_clean(strip_image_tags($this->input->post('kabkot'))));
		$kecamatan    				= trim($this->security->xss_clean(strip_image_tags($this->input->post('kecamatan'))));
        // $lokasi_pelatihan        = trim($this->security->xss_clean(strip_image_tags($this->input->post('lokasi_pelatihan'))));
        // $radius               	= trim($this->security->xss_clean(strip_image_tags($this->input->post('radius'))));
        // $latitude               	= trim($this->security->xss_clean(strip_image_tags($this->input->post('latitude'))));
        // $longitude              	= trim($this->security->xss_clean(strip_image_tags($this->input->post('longitude'))));
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
		if ($id_bisnis_pelatihan=='1'){
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
		
		if ($id_bisnis_pelatihan=='2'){	
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
				'ID_TIPE' 				=> $pelatihan_type,
				'NO_PROPOSAL' 			=> $no_proposal,
				'NO_TRX' 				=> $no_trx,
				'ID_PROJECT_CHARTER'	=> $id_pelatihan_project_charter,
				'ID_GRADING'			=> $grading,
				'TITLE' 				=> $judul_pelatihan,
				'ID_BISNIS'				=> $id_bisnis_pelatihan,
				'REGIONAL_MEKAAR'		=> $regional_mekaar,
				'AREA_MEKAAR' 			=> $area_mekaar,
				'CABANG_MEKAAR'			=> $data_cabang_mekaar,
				'CABANG_ULAMM' 			=> $cabang_ulamm,
				'UNIT_ULAMM'			=> $data_unit_ulamm,
				'DESKRIPSI' 			=> $deskripsi_pelatihan,
				'DURASI_PELATIHAN' 		=> $durasi_pelatihan,
				'TANGGAL_MULAI' 		=> $inputStartTglPelaksanaan.' '.date("H:i", strtotime($inputStartTimePelaksanaan)),
				'TANGGAL_SELESAI' 		=> $inputAkhirTglPelaksanaan.' '.date("H:i", strtotime($inputEndTimePelaksanaan)),
				'KUOTA_PESERTA' 		=> $kuota_peserta,
				'BUDGET' 				=> $anggaran,
				'STATUS' 				=> 'draft',
				'PROVINSI' 				=> $provinsi,
				'KABKOT' 				=> $kabkot,
				'KECAMATAN'				=> $kecamatan,								
				'ALAMAT' 				=> $alamat_tempat_pelatihan,
				'PEMBICARA'				=> $pembicara_pelatihan,
				'CREATED_BY' 			=> $id_user,
				'CREATED_DATE' 			=> date('Y-m-d H:i:s')			
			);
			
			$this->Pelatihan_model->insert_t_pelatihan($data);
			
			$id_pelatihan = $this->db->insert_id(); //last id yang di insert		
			
			for ($i=1;$i<count($deskripsi_rab);$i++){
				$rab = array(
					'ID_PELATIHAN' 		=> $id_pelatihan,
					'ID_BISNIS' 		=> $id_bisnis_pelatihan,
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

			/*nonaktifkan pelatihan project charter yang telah terpakai*/
			if ($id_pelatihan_project_charter){

				$data_update = array(
					'AKTIF' 		=> '0',
					'UPDATED_BY'	=> $id_user,
					'UPDATED_DATE' 	=> date('Y-m-d H:i:s')
				);

				$where_update	= array('ID' 	=> $id_pelatihan_project_charter);

				$this->Pelatihan_model->update_project_charter($data_update,$where_update);
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

	public function update_pelatihan_proposal()
	{
		$this->is_logged();	
		
        $pelatihan_id   	= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan'))));
        $id_bisnis		    = trim($this->security->xss_clean(strip_image_tags($this->input->post('id_bisnis_edit'))));
        $pelatihan_type     = trim($this->security->xss_clean(strip_image_tags($this->input->post('pelatihan_type_edit'))));
		$judul_pelatihan    = trim($this->security->xss_clean(strip_image_tags($this->input->post('judul_pelatihan_edit'))));
		$grading   			= trim($this->security->xss_clean(strip_image_tags($this->input->post('grading_edit'))));

        $deskripsi_pelatihan 		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi_pelatihan_edit'))));
        $durasi_pelatihan    		= trim($this->security->xss_clean(strip_image_tags($this->input->post('durasi_pelatihan_edit'))));
        $inputStartTglPelaksanaan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTglPelaksanaan_edit'))));
        $inputStartTimePelaksanaan  = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTimePelaksanaan_edit'))));
        $inputAkhirTglPelaksanaan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputAkhirTglPelaksanaan_edit'))));
        $inputEndTimePelaksanaan    = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputEndTimePelaksanaan_edit'))));
        $pembicara_pelatihan        = trim($this->security->xss_clean(strip_image_tags($this->input->post('pembicara_pelatihan_edit'))));
        $kuota_peserta              = trim($this->security->xss_clean(strip_image_tags($this->input->post('kuota_peserta_edit'))));

        $anggaran               	= str_replace(array('.',',00'),'',trim($this->security->xss_clean(strip_image_tags($this->input->post('anggaran_edit')))));
		$provinsi               	= trim($this->security->xss_clean(strip_image_tags($this->input->post('provinsi_edit'))));
		$kabkot   	            	= trim($this->security->xss_clean(strip_image_tags($this->input->post('kabkot_edit'))));
		$kecamatan               	= trim($this->security->xss_clean(strip_image_tags($this->input->post('kecamatan_edit'))));
        $alamat_tempat_pelatihan    = trim($this->security->xss_clean(strip_image_tags($this->input->post('alamat_tempat_pelatihan_edit'))));
		$id_user					= $this->session->userdata('sess_user_idsdm');	
		
				
		$deskripsi_rab        		= $this->security->xss_clean(strip_image_tags($this->input->post('deskripsi_rab_edit')));
		$jumlah_rab           		= $this->security->xss_clean(strip_image_tags($this->input->post('jumlah_rab_edit')));
		$unit_rab             		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_rab_edit')));
		$unit_cost_rab        		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_cost_rab_edit')));
		$total_cost_rab       		= $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab_edit')));
		$total_cost_rab_akhir 		= $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab_akhir_edit')));		


		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);	

		try{
			$data_update = array(
				'ID_TIPE' 			=> $pelatihan_type,
				'ID_GRADING'		=> $grading,
				'TITLE' 			=> $judul_pelatihan,
				'ID_BISNIS'			=> $id_bisnis,
				'DESKRIPSI' 		=> $deskripsi_pelatihan,
				'DURASI_PELATIHAN' 	=> $durasi_pelatihan,
				'TANGGAL_MULAI' 	=> $inputStartTglPelaksanaan.' '.date("H:i", strtotime($inputStartTimePelaksanaan)),
				'TANGGAL_SELESAI' 	=> $inputAkhirTglPelaksanaan.' '.date("H:i", strtotime($inputEndTimePelaksanaan)),
				'KUOTA_PESERTA' 	=> $kuota_peserta,
				'BUDGET' 			=> $anggaran,
				'STATUS' 			=> 'draft',
				'PROVINSI' 			=> $provinsi,
				'KABKOT' 			=> $kabkot,
				'KECAMATAN'			=> $kecamatan,
				'ALAMAT' 			=> $alamat_tempat_pelatihan,
				'PEMBICARA'			=> $pembicara_pelatihan,
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
			);			
			$where_update	= array('ID' 	=> $pelatihan_id);
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
		$id_grading					= trim($this->security->xss_clean(strip_image_tags($this->input->post('grading'))));
							

		$status_approval = $this->Pelatihan_model->check_bwmp_approval_proposal($id_pelatihan,$tingkat_approval);
		
		// $tingkat_approval = $status_approval=='approved' ? '' : $tingkat_approval;

		$final_approval = $status_approval=='approved' ? '1' : '0';
		
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
				'FINAL_APPROVAL'	=> $final_approval,
				'KETERANGAN'		=> $keterangan,
				'AKTIF' 			=> '1',
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
			);
					
			$this->Pelatihan_model->insert_t_approval($data);
			
			if ($this->session->userdata('sess_user_id_user_group')=='3'){
				$data_update 	= array(
					'ID_GRADING'		=> $id_grading,				
					'STATUS'			=> $status_approval,
					'APPROVAL' 			=> $tingkat_approval,
					'UPDATED_BY' 		=> $id_user,
					'UPDATED_DATE' 		=> date('Y-m-d H:i:s')			
					);
			}else{
				$data_update 	= array(		
					'STATUS'			=> $status_approval,
					'APPROVAL' 			=> $tingkat_approval,
					'UPDATED_BY' 		=> $id_user,
					'UPDATED_DATE' 		=> date('Y-m-d H:i:s')			
					);	
			}
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
		
		// $tingkat_approval = $status_approval=='approved' ? '' : $tingkat_approval;

		$final_approval = $status_approval=='approved' ? '1' : '0';
		
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
				'FINAL_APPROVAL'	=> $final_approval,
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

    public function post_project_charter()
    {
		$this->is_logged();	

		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);			

		// var_dump($this->input->post());die();

		$id_project_charter 	= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_project_charter'))));

		$id_user 				= $this->session->userdata('sess_user_idsdm');
		$bisnis_pelatihan   	= trim($this->security->xss_clean(strip_image_tags($this->input->post('bisnis_pelatihan'))));
        $type_klasterisasi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('type_klasterisasi'))));
		$tema_project_charter  	= trim($this->security->xss_clean(strip_image_tags($this->input->post('tema_project_charter'))));
		


		$judul_pelatihan    = $this->security->xss_clean(strip_image_tags($this->input->post('judul_pelatihan')));
		$tanggal_pelatihan  = $this->security->xss_clean(strip_image_tags($this->input->post('tanggal_pelatihan')));
		$time_pelatihan  	= $this->security->xss_clean(strip_image_tags($this->input->post('time_pelatihan')));
		$cabang_ulamm		= $this->security->xss_clean(strip_image_tags($this->input->post('cabang_ulamm')));
		$alamat_pelatihan   = $this->security->xss_clean(strip_image_tags($this->input->post('alamat_pelatihan')));
		$budget_pelatihan   = $this->security->xss_clean(strip_image_tags($this->input->post('budget_pelatihan')));
		

		
		

		$id_user			= $this->session->userdata('sess_user_idsdm');	
		
		try
		{
			for ($i=1;$i<count($judul_pelatihan);$i++){
				$data = array(
					'ID_PROJECT_CHARTER'	=> base64_encode($type_klasterisasi.date('Y-m-d H:i:s')),
					'ID_TIPE_PELATIHAN' 	=> $type_klasterisasi,
					'TEMA_PROJECT_CHARTER' 	=> $tema_project_charter,
					'FILE' 					=> '',
					'JUDUL_PELATIHAN' 		=> $judul_pelatihan[$i],
					'TANGGAL' 				=> $tanggal_pelatihan[$i].' '.$time_pelatihan[$i],
					'CABANG_ULAMM' 			=> $cabang_ulamm[$i],
					'ALAMAT' 				=> $alamat_pelatihan[$i],
					'BUDGET' 				=> $budget_pelatihan[$i],
					'AKTIF'					=> '1',
					'CREATED_BY' 			=> $id_user,
					'CREATED_DATE' 			=> date('Y-m-d H:i:s')			
				);
				

				$where = array(
					'ID_PROJECT_CHARTER'=> $id_project_charter,
					'AKTIF'=> '1',
				);
				
				$project_charter = $this->Pelatihan_model->select_t_project_charter_where($where);	

				if ($project_charter){
					$this->Pelatihan_model->update_project_charter(array('AKTIF'=>'0'),$where);
				}
				$this->Pelatihan_model->insert_t_project_charter($data);					
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


/*-------------------------------------CTRL API GET-------------------------------------*/	
	public function get_rab()
	{
		$id_pelatihan = $_GET['pelatihanid'];
		$tipe_modal = $_GET['tipe_modal'];
		$rab = $this->Pelatihan_model->select_t_rab_by_id($id_pelatihan);					
		
		$data= '';		
		
		foreach ($rab as $data_rab) {
			$data .= '
			<tr class="">
			<td><input type="text" class="form-control" id="deskripsi_rab_'.$tipe_modal.'" name="deskripsi_rab[]" value="'.$data_rab->URAIAN.'" disabled=""></td>
			<td><input type="number" class="form-control" id="jumlah_rab_'.$tipe_modal.'" name="jumlah_rab[]" disabled="" value="'.$data_rab->JUMLAH.'"></td>
			<td><input type="text" class="form-control" id="unit_rab_'.$tipe_modal.'" name="unit_rab[]" value="'.$data_rab->SATUAN.'" disabled=""></td>
			<td><input type="number" class="form-control" id="unit_cost_rab_'.$tipe_modal.'" name="unit_cost_rab[]" value="'.$data_rab->UNIT_COST.'" disabled=""></td>
			<td><input type="number" class="form-control" id="total_cost_rab_'.$tipe_modal.'" name="total_cost_rab[]" value="'.$data_rab->SUB_TOTAL_COST.'" readonly="" disabled=""></td>
			<td>                            
				<a class="table-remove-'.$tipe_modal.' btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>   
			</td>
			<td>                            
				<a class="table-up-'.$tipe_modal.' btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   
				<a class="table-down-'.$tipe_modal.' btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>                               
			</td>
			</tr>
			';
			
		} 
			
		echo $data;	
	}

	public function get_project_charter()
	{
		$id = $_GET['idprojectcharter'];

		$where = array(
			'ID_PROJECT_CHARTER'=> $id,
			'AKTIF'=> '1',
		);
		
		$project_charter = $this->Pelatihan_model->select_t_project_charter_where($where);		
		
		$cabang = $this->Master_model->select_ms_cabang_ulamm();

		$data= '';		
		
		foreach ($project_charter as $data_project_charter) {
			$data .= '
			<tr class="">
			<td><input type="text" class="form-control" id="judul_pelatihan_edit" name="judul_pelatihan[]" value="'.$data_project_charter->JUDUL_PELATIHAN.'" ></td>
			<td>									  
			<div class="input-group">
				<input type="date" class="form-control" id="tanggal_pelatihan_edit" name="tanggal_pelatihan[]" >
				<input type="time" class="form-control" id="time_pelatihan_edit" name="time_pelatihan[]" >
				<span class="input-group-addon">
					<span class="fa fa-calendar"></span>
				</span>																				
			</div>
			</td>									  
			<td >
				<select class="form-control" id="cabang_ulamm_edit" name="cabang_ulamm[]">
					<option value="">--pilih cabang--</option>';
			foreach ($cabang as $data_cabang){
				if ($data_project_charter->CABANG_ULAMM==$data_cabang->KODE_CABANG){
					$data .= '<option value="'.$data_cabang->KODE_CABANG.'" selected >'.$data_cabang->KODE_CABANG.' - '.$data_cabang->DESKRIPSI.'</option>';                                                                    
				}else{
					$data .= '<option value="'.$data_cabang->KODE_CABANG.'">'.$data_cabang->KODE_CABANG.' - '.$data_cabang->DESKRIPSI.'</option>';                                                                    
				}
			}					
			$data .='	
				</select>
			</td>
			<td ><input type="text" class="form-control" id="alamat_pelatihan_edit" name="alamat_pelatihan[]" value="'.$data_project_charter->ALAMAT.'"></td>
			<td ><input type="text" class="form-control" id="budget_pelatihan_edit" name="budget_pelatihan[]" value="'.$data_project_charter->BUDGET.'"></td>
			<td>                            
			<a class="table-remove-modaladd btn btn-outline-primary btn-sm" href="#"><i class="fas fa-trash"></i></a>   
			</td>
			<td>                            
			<a class="table-up-modaladd btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-up"></i></a>   
			<a class="table-down-modaladd btn btn-outline-primary btn-sm" href="#"><i class="fas fa-arrow-circle-down"></i></a>                               
			</td>
			</tr>
			';
			
		} 
			
		echo $data;	
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

	public function get_paging_kehadiran_nasabah_ulamm($idpelatihan)
	{					
		$param['sektor_ekonomi'] 	= isset($_GET["columns"][0]['search']['value']) ? $_GET["columns"][0]['search']['value'] : NULL;
		$param['jenis_pinjaman'] 	= isset($_GET["columns"][1]['search']['value']) ? $_GET["columns"][1]['search']['value'] : NULL;
		$param['jenis_program'] 	= isset($_GET["columns"][2]['search']['value']) ? $_GET["columns"][2]['search']['value'] : NULL;
		$param['kode_cabang'] 		= isset($_GET["columns"][3]['search']['value']) ? $_GET["columns"][3]['search']['value'] : NULL;
		$param['kode_unit'] 		= isset($_GET["columns"][4]['search']['value']) ? $_GET["columns"][4]['search']['value'] : NULL;
		
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;

		$this->config->set_item('elastic_index', 'nasabah');	
		if ($param['sektor_ekonomi']!=NULL){
			$debitur = $this->elastic->call('/_search?q=sektorekonomi:'.$param["sektor_ekonomi"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->elastic->call('_count?q=sektorekonomi:'.$param["sektor_ekonomi"]);
		}else if ($param['jenis_pinjaman']!=NULL){
				$debitur = $this->elastic->call('/_search?q=jenis_pinjaman:'.$param["jenis_pinjaman"].'&filter_path=hits.hits.*,aggregations.*');
				$debitur_count = $this->elastic->call('_count?q=jenis_pinjaman:'.$param["jenis_pinjaman"]);			
		}else if ($param['jenis_program']!=NULL){
			$debitur = $this->elastic->call('/_search?q=jenis_program:'.$param["jenis_program"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->elastic->call('_count?q=jenis_program:'.$param["jenis_program"]);			
		}else if ($param['kode_cabang']!=NULL){
			$debitur = $this->elastic->call('/_search?q=kode_cabang:'.$param["kode_cabang"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->elastic->call('_count?q=kode_cabang:'.$param["kode_cabang"]);
		}else if ($param['kode_unit']!=NULL){
			$debitur = $this->elastic->call('/_search?q=kode_unit:'.$param["kode_unit"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->elastic->call('_count?q=kode_unit:'.$param["kode_unit"]);									
		}else if ($param["search"]!=NULL){
			$debitur = $this->elastic->call('/_search?q=nama:'.$param["search"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->elastic->call('_count?q=nama:'.$param["search"]);			
		}else{						
			$debitur = $this->elastic->call('_search?from='.$param["start"].'&size='.$param["limit"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->elastic->call('_count');
		}				
		
		if (isset($debitur->hits->hits)){
			for ($i=0;$i<count($debitur->hits->hits);$i++){
				$data["data"][$i] = $debitur->hits->hits[$i]->_source;
			}	
			$data["recordsTotal"] = $debitur_count->count;	
			$data["recordsFiltered"] = $debitur_count->count;			
		}else{
			$data["data"] = array();
			$data["recordsTotal"] = 0;	
			$data["recordsFiltered"] = 0;
		}		
		
						
		echo json_encode($data);		

	}
	
	public function get_paging_kehadiran_nasabah_mekaar($idpelatihan)
	{									
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			

		$this->config->set_item('elastic_index', 'debitur');		
		if ($param["search"]!=NULL){
			$debitur = $this->elastic->call('/_search?q=nama:'.$param["search"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->elastic->call('_count?q=nama:'.$param["search"]);			
		}else{						
			$debitur = $this->elastic->call('_search?from='.$param["start"].'&size='.$param["limit"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->elastic->call('_count');
		}				
		
		if (isset($debitur->hits->hits)){
			for ($i=0;$i<count($debitur->hits->hits);$i++){
				$data["data"][$i] = $debitur->hits->hits[$i]->_source;
			}	
			$data["recordsTotal"] = $debitur_count->count;	
			$data["recordsFiltered"] = $debitur_count->count;			
		}else{
			$data["data"] = array();
			$data["recordsTotal"] = 0;	
			$data["recordsFiltered"] = 0;
		}		
		
						
		echo json_encode($data);		
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

	public function get_paging_pelatihan($tipe,$bisnis)
	{
						
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

	public function get_list_project_charter()
	{
		$tipe = $_GET['tipepelatihan'];
		$cabang_ulamm = $_GET['cabang_ulamm'];

		$where = array(
			'ID_TIPE_PELATIHAN'=> $tipe,
			'CABANG_ULAMM'=> $cabang_ulamm,
			'AKTIF'=> '1',
		);
		
		$project_charter = $this->Pelatihan_model->select_t_project_charter_where($where);					
		$return= "<option value=''>--pilih tema project charter--</option>";
			
		if ($project_charter){
			foreach ($project_charter as $data) {
				$return .="<option value='$data->ID_PROJECT_CHARTER' >$data->TEMA_PROJECT_CHARTER</option>";
			}
		}else{
			$return = "<option value=''>--project charter belum di input--</option>";
		}

		// echo '<pre>';
		// print_r($project_charter);
		// echo '</pre>';die;
		echo $return;	
	}

	public function get_data_project_charter()
	{
		$id = $_GET['id_project_charter'];

		$project_charter = $this->Pelatihan_model->select_t_project_charter_by_id_project_charter($id);	

		$return= "<option value=''>--pilih judul project charter--</option>";
			
		if ($project_charter){
			foreach ($project_charter as $data) {
				$return .="<option value='$data->ID' >$data->JUDUL_PELATIHAN</option>";
			}
		}else{
			$return = "<option value=''>--project charter belum di input--</option>";
		}

		// echo '<pre>';
		// print_r($project_charter);
		// echo '</pre>';die;
		echo $return;		
	}

	public function get_pelatihan_project_charter()
	{
		$id = $_GET['id'];

		$data["data"] = $this->Pelatihan_model->select_t_project_charter_by_id($id)[0];	
		
		echo json_encode($data);				
	}


	public function get_paging_project_charter($tipe)
	{
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["tipe_pelatihan"] 	= isset($tipe) ? $tipe : NULL ;				
		$param["search"] 			= isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						

		$data["data"] = $this->Pelatihan_model->paging_t_project_charter($param);				
		$param['count'] = 1;				
		$total = COUNT($data["data"]);				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);			

	}
/*-------------------------------------CTRL API DELETE-------------------------------------*/	
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

}