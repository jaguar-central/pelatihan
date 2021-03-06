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
        $data["view"] 			= "pelatihan/pelatihan_ulamm/ulamm";
		$data["script"] 		= "pelatihan/pelatihan_ulamm/include/ulamm-script";
		$data["modal"] 			= array(
									'pelatihan/pelatihan_ulamm/modal/modalview',
									'pelatihan/pelatihan_ulamm/modal/modaladd',									
									'pelatihan/pelatihan_ulamm/modal/modaldetails',
									'pelatihan/pelatihan_ulamm/modal/modaledit',
									'pelatihan/pelatihan_ulamm/modal/modalunggah'
								);
		
        $data["menu"] 			= $this->Menu_model->select_ms_menu();
		$data["pelatihan_type"] = $this->Pelatihan_model->select_ms_pelatihan_type_ulamm();       
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();
		$data["jenis_program"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_program();

		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();
		
		$data['nasabah_grading'] = $this->Master_model->select_ms_nasabah_grading();				

		$data['openmodal'] = isset($_GET['openmodal']) ? $_GET['openmodal'] : '';

		// echo '<pre>';
		// print_r($data['openmodal']);
		// echo '</pre>';die;

        $this->load->view('layout/gabung', $data);

	}
	
	public function proposal_mekaar()    	    
    {		
		$this->is_logged();		
		
		
    	
        $data["content"] = "Pelatihan";
        $data["view"] 	 = "pelatihan/pelatihan_mekaar/mekaar";
		$data["script"]  = "pelatihan/pelatihan_mekaar/include/mekaar-script";
		$data["menu"] 	 = $this->Menu_model->select_ms_menu();
		$data["modal"] 	 = array(
									'pelatihan/pelatihan_mekaar/modal/modalview',
									'pelatihan/pelatihan_mekaar/modal/modaladd',									
									'pelatihan/pelatihan_mekaar/modal/modaldetails',
									'pelatihan/pelatihan_mekaar/modal/modaledit',
									'pelatihan/pelatihan_mekaar/modal/modalunggah'	
								);

		$data["pelatihan_type"] = $this->Pelatihan_model->select_ms_pelatihan_type_mekaar();
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();		
		$data["region"] 		= $this->Master_model->select_ms_region_mekaar();
		$data["jenis_program"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_program();
        
		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();

		$data['nasabah_grading'] = $this->Master_model->select_ms_nasabah_grading();		
		
		$data['openmodal'] = isset($_GET['openmodal']) ? $_GET['openmodal'] : '';
		
        // echo '<pre>';
		// print_r($data['kecamatan']);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function history_ulamm()
    {
		$this->is_logged();				
		
        $data["content"] 	= "Pelatihan";
        $data["view"] 		= "pelatihan/history_ulamm/history_ulamm";
		$data["script"] 	= "pelatihan/history_ulamm/include/history-ulamm-script";
		$data["modal"] 		= array(
								"pelatihan/history_ulamm/modal/modaldetails",
								"pelatihan/history_ulamm/modal/modallpjdetails"
								); 

        $data["menu"] 		= $this->Menu_model->select_ms_menu();
		$data["pelatihan"] 	= $this->Pelatihan_model->select_t_pelatihan_ulamm_by_status(array('draft','submitted','approved','reject','lpj_draft','lpj_submitted','lpj_approved'));		
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
        $data["view"] 		= "pelatihan/history_mekaar/history_mekaar";
		$data["script"] 	= "pelatihan/history_mekaar/include/history-mekaar-script";
		$data["modal"] 		= array(
								"pelatihan/history_mekaar/modal/modaldetails",
								"pelatihan/history_mekaar/modal/modallpjdetails"
								); 

        $data["menu"] 		= $this->Menu_model->select_ms_menu();
		$data["pelatihan"] 	= $this->Pelatihan_model->select_t_pelatihan_mekaar_by_status(array('draft','submitted','approved','reject','lpj_draft','lpj_submitted','lpj_approved'));

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
        $data["view"] 	 = "pelatihan/lpj/lpj";
		$data["script"]  = "pelatihan/lpj/include/lpj-script";
		$data["menu"] 	 = $this->Menu_model->select_ms_menu();
		// $data["modal"] 	 = array('pelatihan/modal-lpj/modallistkehadiran');

		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();
        
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();
		$data["sektor_ekonomi"]	= $this->Master_model->select_ms_sektor_ulamm();
		$data["jenis_program"]	= $this->Master_model->select_dw_nasabah_ulamm_jenis_program();
		$data["pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_by_id($idpelatihan)->row();
		$data["rab"] = $this->Pelatihan_model->select_t_rab_by_id($idpelatihan);

		$data["sektor_ekonomi_mekaar"]	= $this->Master_model->select_dw_nasabah_mekaar_sektor_ekonomi();
		$data["regional_mekaar"]	= $this->Master_model->select_ms_regional_mekaar();
		$data["area_mekaar"]	= $this->Master_model->select_ms_area_mekaar();

		$pelatihan_lpj = $this->Pelatihan_model->select_t_lpj_by_id($idpelatihan)->row();

		$data["timeawal"] 					= (isset($pelatihan_lpj->TANGGAL_REALISASI_MULAI)) ? date('m/d/Y H:i:s',strtotime($pelatihan_lpj->TANGGAL_REALISASI_MULAI)) : '';
		$data["inputStartTglPelaksanaan"] 	= (isset($pelatihan_lpj->TANGGAL_REALISASI_MULAI)) ? date('Y-m-d',strtotime($pelatihan_lpj->TANGGAL_REALISASI_MULAI)) : '';
		$data["inputStartTimePelaksanaan"] 	= (isset($pelatihan_lpj->TANGGAL_REALISASI_MULAI)) ? date('H:i A',strtotime($pelatihan_lpj->TANGGAL_REALISASI_MULAI)) : '';
		$data["timeakhir"] 					= (isset($pelatihan_lpj->TANGGAL_REALISASI_SELESAI)) ? date('m/d/Y H:i:s',strtotime($pelatihan_lpj->TANGGAL_REALISASI_SELESAI)) : '';
		$data["inputAkhirTglPelaksanaan"] 	= (isset($pelatihan_lpj->TANGGAL_REALISASI_SELESAI)) ? date('Y-m-d',strtotime($pelatihan_lpj->TANGGAL_REALISASI_SELESAI)) : '';
		$data["inputEndTimePelaksanaan"] 	= (isset($pelatihan_lpj->TANGGAL_REALISASI_SELESAI)) ? date('H:i A',strtotime($pelatihan_lpj->TANGGAL_REALISASI_SELESAI)) : '';

		$data["csi_final"] 					= (isset($pelatihan_lpj->CSI_FINAL)) ? $pelatihan_lpj->CSI_FINAL : '';
		$data["catatan_tambahan"] 			= (isset($pelatihan_lpj->CATATAN_TAMBAHAN)) ? $pelatihan_lpj->CATATAN_TAMBAHAN : '';


		
        // echo '<pre>';
		// print_r( date('m/d/Y H:i:s',strtotime($data['pelatihan_lpj']->TANGGAL_REALISASI_MULAI)) );
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function konfirmasi_proposal()
    {
		$this->is_logged();				
		
        $data["content"] 	= "Pelatihan";
        $data["view"] 		= "pelatihan/konfirmasi/konfirmasi_prop";
        $data["script"] 	= "pelatihan/konfirmasi/include/konfirmasi-proposal-script";
		$data["modal"] 		= array(
									'pelatihan/konfirmasi/modal/modaldetails',
									'pelatihan/konfirmasi/modal/modalapproval'
								);
								        
		$data["menu"] = $this->Menu_model->select_ms_menu();
		
		$data["t_pelatihan"] = $this->Pelatihan_model->select_t_pelatihan_by_approval('submitted');

		// var_dump($this->db->last_query());die();

		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();		
		$data["region"] 		= $this->Master_model->select_ms_region_mekaar();

		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();

		$data['nasabah_grading'] = $this->Master_model->select_ms_nasabah_grading();	
		// var_dump($this->db->last_query());die();

        $this->load->view('layout/gabung', $data);
    }

    public function konfirmasi_lpj()
    {
		$this->is_logged();				
		
        $data["content"] 			= "Pelatihan";
        $data["view"] 				= "pelatihan/konfirmasi/konfirmasi_lpj";
        $data["script"] 			= "pelatihan/konfirmasi/include/konfirmasi-lpj-script";
		$data["modal"] 				= array(
										'pelatihan/konfirmasi/modal/modaldetails',
										'pelatihan/konfirmasi/modal/modalapprovallpj'
									);			
			
		$data["menu"] 				= $this->Menu_model->select_ms_menu();
		
		$data["t_pelatihan_lpj"] = $this->Pelatihan_model->select_t_pelatihan_by_approval('lpj_submitted');
					
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();		
		$data["region"] 		= $this->Master_model->select_ms_region_mekaar();

		$data['provinsi'] 		= $this->Master_model->select_ms_provinsi();
		$data['kabkot'] 		= $this->Master_model->select_ms_kabkot();
		$data['kecamatan'] 		= $this->Master_model->select_ms_kecamatan();		

        $this->load->view('layout/gabung', $data);
    }

	public function gabungan()
	{
		$this->is_logged();				
		
        $data["content"] 			= "Pelatihan";
        $data["view"] 				= "pelatihan/gabungan/akbar";
		$data["script"] 			= "pelatihan/gabungan/include/akbar-script";					
		$data["modal"] 				= array(
										"pelatihan/gabungan/modal/akbar-modal",
										"pelatihan/gabungan/modal/akbar-view-modal"
										);

		$data["menu"] 				= $this->Menu_model->select_ms_menu();		
		$data["pelatihan"] 			= $this->Pelatihan_model->select_pelatihan_pku_akabar_gabungan();
		$data["pelatihan_akbar"] 	= $this->Pelatihan_model->select_pelatihan_pku_akabar();
											
        $this->load->view('layout/gabung', $data);
	}

    public function project_charter_ulamm()    	   
    {
		$this->is_logged();		
    	
        $data["content"] 		= "Pelatihan";
        $data["view"] 			= "pelatihan/project_charter_ulamm/ulamm";
		$data["script"] 		= "pelatihan/project_charter_ulamm/include/ulamm-script";
		$data["modal"] 			= array(
									'pelatihan/project_charter_ulamm/modal/modaladdprojectcharter',					
									'pelatihan/project_charter_ulamm/modal/modalviewprojectcharter',
									'pelatihan/project_charter_ulamm/modal/modaleditprojectcharter'		
								);
		
        $data["menu"] 			= $this->Menu_model->select_ms_menu();
		$data["pelatihan_type"] = $this->Pelatihan_model->select_ms_pelatihan_type_ulamm();       
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();
				

		// echo '<pre>';
		// print_r($data['openmodal']);
		// echo '</pre>';die;

        $this->load->view('layout/gabung', $data);

	}
	
	public function project_charter_mekaar()    	    
    {		
		$this->is_logged();		
		
		
    	
        $data["content"] = "Pelatihan";
        $data["view"] 	 = "pelatihan/project_charter_mekaar/mekaar";
		$data["script"]  = "pelatihan/project_charter_mekaar/include/mekaar-script";
		$data["menu"] 	 = $this->Menu_model->select_ms_menu();
		$data["modal"] 	 = array(
									'pelatihan/project_charter_mekaar/modal/modaladdprojectcharter',								
									'pelatihan/project_charter_mekaar/modal/modalviewprojectcharter',
									'pelatihan/project_charter_mekaar/modal/modaleditprojectcharter'		
								);

		$data["pelatihan_type"] = $this->Pelatihan_model->select_ms_pelatihan_type_mekaar();
		$data["cabang"] 		= $this->Master_model->select_ms_cabang_ulamm();		
			
		
        // echo '<pre>';
		// print_r($data['kecamatan']);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

	public function open_report()
	{
		$url = $_GET['url'];
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);		
		var_dump($data);
		// echo $data;	
		
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
		$volume_rab           		= $this->security->xss_clean(strip_image_tags($this->input->post('volume_rab')));
		$unit_cost_rab        		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_cost_rab')));
		$total_cost_rab       		= $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab')));
		$total_cost_rab_akhir 		= $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab_akhir')));

		$nama_krm			 		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_krm'))));
		$no_rek_krm 				= trim($this->security->xss_clean(strip_image_tags($this->input->post('no_rek_krm'))));

		
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
								
				if (COUNT($this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->result_array())>0){
					$no_trx .= ','.$this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->NO_TRX;					
					$this->Pelatihan_model->update_aktif_trx_reject($this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->ID);
				}else{
					$no_trx .= ','.$this->create_trx_no($param);
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
				
				if (COUNT($this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->result_array())>0){
					$no_trx .= ','.$this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->NO_TRX;					
					$this->Pelatihan_model->update_aktif_trx_reject($this->Pelatihan_model->select_trx_no_reject_find_no_trx_reject($PARAMETER."-".$value)->row()->ID);
				}else{
					$no_trx .= ','.$this->create_trx_no($param);
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



			if ($id_bisnis_pelatihan==2){
				$data_krm = array(
					'KRM' 					=> $nama_krm,
					'NO_REKENING'			=> $no_rek_krm,
					'CREATED_BY' 			=> $id_user,
					'CREATED_DATE' 			=> date('Y-m-d H:i:s')			
				);

				$this->Master_model->insert_ms_krm($data_krm);

				$id_krm = $this->db->insert_id(); //last id yang di insert		
			}else{
				$id_krm = 0;
			}


			
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
				'JUMLAH_ANGGARAN'		=> $total_cost_rab_akhir,
				'STATUS' 				=> 'draft',
				'PROVINSI' 				=> $provinsi,
				'KABKOT' 				=> $kabkot,
				'KECAMATAN'				=> $kecamatan,								
				'ALAMAT' 				=> $alamat_tempat_pelatihan,
				'PEMBICARA'				=> $pembicara_pelatihan,
				'ID_KRM'				=> $id_krm,
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
					'VOLUME' 			=> $volume_rab[$i],
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

			$db_error = $this->db->error();

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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
		
		$nama_krm			 		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_krm'))));
		$no_rek_krm 				= trim($this->security->xss_clean(strip_image_tags($this->input->post('no_rek_krm'))));		

		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);	

		try{

			if ($id_bisnis_pelatihan==2){
				$data_krm = array(
					'KRM' 					=> $nama_krm,
					'NO_REKENING'			=> $no_rek_krm,
					'CREATED_BY' 			=> $id_user,
					'CREATED_DATE' 			=> date('Y-m-d H:i:s')			
				);

				$this->Master_model->insert_ms_krm($data_krm);

				$id_krm = $this->db->insert_id(); //last id yang di insert		
			}else{
				$id_krm = 0;
			}			

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
				'ID_KRM'			=> $id_krm,
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
			);			
			$where_update	= array('ID' 	=> $pelatihan_id);
			$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);

			$where_rab = array('ID_PELATIHAN' 	=> $pelatihan_id);
			$this->Pelatihan_model->delete_t_rab($where_rab);

			for ($i=1;$i<count($deskripsi_rab);$i++){
				$rab = array(
					'ID_PELATIHAN' 		=> $pelatihan_id,
					'ID_BISNIS' 		=> $id_bisnis,
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

			$db_error = $this->db->error();			

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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
				
				$db_error = $this->db->error();

				if (!empty($db_error['message'])) {
					$output = array(
						'result'  	=> 'NG',
						'msg'		=> $db_error['message']
					);
				}

			}		
			catch (Exception $e)
			{
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $e->getMessage()
				);
			}

		}else{
			$output = array(
				'result' => 'UP',
				'msg'	 => $this->upload->display_errors().'nama->'.$nama_file
			);
		} 	
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
		$status_result				= trim($this->security->xss_clean(strip_image_tags($this->input->post('result'))));
							

		$status_approval = $this->Pelatihan_model->check_bwmp_approval_proposal($id_pelatihan,$tingkat_approval); //kolom status di T_PELATIHAN				

		$final_approval = $status_approval=='approved' ? '1' : '0';


		if ($status_result=='reject'){	 //kolom RESULT di T_APPROVAL, jika reject status_approval = status_result
			$status_approval = $status_result;
		}
		
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
				'RESULT'			=> $status_result,
				'FINAL_APPROVAL'	=> $final_approval,
				'KETERANGAN'		=> $keterangan,
				'AKTIF' 			=> '1',
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
			);
					
			$this->Pelatihan_model->insert_t_approval($data);
			
			if ($this->session->userdata('sess_user_id_user_group')=='4'){
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


			// jika status reject NO_TRX disimpan di table TRX_NO_REJECT
			if ($status_result=='reject'){		
			
				$NO_TRX = $this->Pelatihan_model->select_t_pelatihan_by_id($id_pelatihan)->row()->NO_TRX;

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

			
			$db_error = $this->db->error();

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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
	
	public function post_pelatihan_lpj()
    {
		$this->is_logged();				
		
		$id_pelatihan           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan'))));
        $lampiran	            	= trim($this->security->xss_clean(strip_image_tags($this->input->post('lampiran'))));
        $csi_final            		= trim($this->security->xss_clean(strip_image_tags($this->input->post('csi_final'))));
		$catatan_tambahan       	= trim($this->security->xss_clean(strip_image_tags($this->input->post('catatan_tambahan'))));
		$id_user					= $this->session->userdata('sess_user_idsdm');
		$durasi_pelatihan           = trim($this->security->xss_clean(strip_image_tags($this->input->post('durasi_pelatihan'))));

		$inputStartTglPelaksanaan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTglPelaksanaan'))));
        $inputStartTimePelaksanaan  = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTimePelaksanaan'))));
        $inputAkhirTglPelaksanaan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputAkhirTglPelaksanaan'))));
        $inputEndTimePelaksanaan    = trim($this->security->xss_clean(strip_image_tags($this->input->post('inputEndTimePelaksanaan'))));
        
		$deskripsi_rab        		= $this->security->xss_clean(strip_image_tags($this->input->post('deskripsi_rab')));
		$volume_rab           		= $this->security->xss_clean(strip_image_tags($this->input->post('volume_rab')));
		$unit_rab             		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_rab')));
		$unit_cost_rab        		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_cost_rab')));
		$total_cost_rab       		= $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab')));
		$total_cost_rab_akhir 		= $this->security->xss_clean(strip_image_tags($this->input->post('total_cost_rab_akhir')));				
		
		// var_dump(date("H:i", strtotime($inputStartTimePelaksanaan)));die();
		// var_dump($inputStartTglPelaksanaan);die();


		$check_kehadiran = COUNT($this->Pelatihan_model->select_temp_kehadiran($id_pelatihan));

		if ($check_kehadiran==0){
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Kehadiran nasabah belum terinput'
			);
			echo json_encode($output);
			exit;
		}
		
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);		

		$config['upload_path']	= './assets/dokumen/lampiran_lpj';
		$config['allowed_types']	= 'docx|jpg|jpeg|png|pdf';
		$config['max_size']	= '8000';
		$config['overwrite']	= TRUE;

		$nama_file	= base64_encode($id_pelatihan.'_'.date('Ymd').'at'.date('His'));
		$config['file_name']	= $nama_file;
		$this->upload->initialize($config);			

		if($this->upload->do_upload('lampiran'))
		{
			// $this->upload->data();

			$zdata = ['upload_data' => $this->upload->data()]; // get data
			$zfile = $zdata['upload_data']['full_path']; // get file path
			chmod($zfile,0777);
		
			try{
				$data = array(
					'ID_PELATIHAN' 			   => $id_pelatihan,
					'LINK_LAMPIRAN' 	   	   => 'dokumen/lampiran_lpj/'.$nama_file,
					'TANGGAL_REALISASI_MULAI'  => $inputStartTglPelaksanaan.' '.date("H:i", strtotime($inputStartTimePelaksanaan)),
					'TANGGAL_REALISASI_SELESAI'=> $inputAkhirTglPelaksanaan.' '.date("H:i", strtotime($inputEndTimePelaksanaan)),
					'DURASI_PELATIHAN' 		   => $durasi_pelatihan,				
					'JUMLAH_ANGGARAN'		   => $total_cost_rab_akhir,
					'CSI_FINAL' 			   => $csi_final,
					'CATATAN_TAMBAHAN' 		   => $catatan_tambahan,
					'AKTIF' 				   => '1',
					'CREATED_BY' 			   => $id_user,
					'CREATED_DATE' 			   => date('Y-m-d H:i:s')			
				);
				
				$this->Pelatihan_model->insert_t_pelatihan_lpj($data);
						
				
				for ($i=1;$i<count($deskripsi_rab);$i++){
					$rab = array(
						'ID_PELATIHAN' 		=> $id_pelatihan,
						'URAIAN' 			=> $deskripsi_rab[$i],
						'VOLUME' 			=> $volume_rab[$i],
						'UNIT_COST' 		=> $unit_cost_rab[$i],
						'SUB_TOTAL_COST' 	=> $total_cost_rab[$i],
						'GRAND_TOTAL' 		=> $total_cost_rab_akhir,
						'CREATED_BY' 		=> $id_user,
						'CREATED_DATE' 		=> date('Y-m-d H:i:s')
					);							
					$this->Pelatihan_model->insert_t_rab_lpj($rab);
				}

				$data_update 	= array(
					'STATUS'			=> 'lpj_draft',
					'UPDATED_BY' 		=> $id_user,
					'UPDATED_DATE' 		=> date('Y-m-d H:i:s')			
					);
				$where_update	= array(
					'ID' 	=> $id_pelatihan
					);
				$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);

				$db_error = $this->db->error();

				if (!empty($db_error['message'])) {
					$output = array(
						'result'  	=> 'NG',
						'msg'		=> $db_error['message']
					);
				}

			}

			catch (Exception $e)
			{
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $e->getMessage()
				);
			}
		}else
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $this->upload->display_errors()
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
		$status_result				= trim($this->security->xss_clean(strip_image_tags($this->input->post('result'))));
		
		$status_approval = $this->Pelatihan_model->check_bwmp_approval_lpj($id_pelatihan,$tingkat_approval);				

		$final_approval = $status_approval=='approved' ? '1' : '0';

		if ($status_result=='reject'){	 //kolom RESULT di T_APPROVAL, jika reject status_approval = status_result
			$status_approval = $status_result;
		}
		
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
				'RESULT'			=> $status_result,
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

			// jika status reject NO_TRX disimpan di table TRX_NO_REJECT
			if ($status_result=='reject'){		
			
				$NO_TRX = $this->Pelatihan_model->select_t_pelatihan_by_id($id_pelatihan)->row()->NO_TRX;

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
			
			$db_error = $this->db->error();

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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

	public function post_kehadiran()
    {
		$this->is_logged();				
		
        $id_pelatihan   = trim($this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan'))));
        $bisnis         = trim($this->security->xss_clean(strip_image_tags($this->input->post('bisnis'))));
        $ktp           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('ktp'))));
		$id_nasabah		= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_nasabah'))));
		$nama_nasabah	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_nasabah'))));
		$no_hp          = trim($this->security->xss_clean(strip_image_tags($this->input->post('no_hp'))));
		
		
        $kolektibilitas = $this->security->xss_clean(strip_image_tags($this->input->post('kolektibilitas')));
        $cabang        	= trim($this->security->xss_clean(strip_image_tags($this->input->post('cabang'))));
		$unit           = trim($this->security->xss_clean(strip_image_tags($this->input->post('unit'))));
		

		$produk         = trim($this->security->xss_clean(strip_image_tags($this->input->post('produk'))));
		$region         = trim($this->security->xss_clean(strip_image_tags($this->input->post('Region'))));
		$area		    = trim($this->security->xss_clean(strip_image_tags($this->input->post('Area'))));
		$id_user		= $this->session->userdata('sess_user_idsdm');					

		$sektor_ekonomi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('sektor_ekonomi'))));
		$tipe_kredit    = trim($this->security->xss_clean(strip_image_tags($this->input->post('tipe_kredit'))));
		$siklus_kredit  = trim($this->security->xss_clean(strip_image_tags($this->input->post('siklus_kredit'))));
		$id_tipe_kredit = '';
		


		if ($bisnis=='ULAMM'){ 
			$id_tipe_kredit = $tipe_kredit;
		}else{ //MEKAAR
			$id_tipe_kredit = $siklus_kredit;
		}
	
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);

		if ($bisnis=='NON_NASABAH'){
			$nasabah_type = $bisnis;
		}else{
			$nasabah_type = 'NASABAH';
		}
		
		if ($id_nasabah!='-'){			
			try{
				$data = array(
					'ID_PELATIHAN' 		=> $id_pelatihan,
					'BISNIS' 			=> $bisnis,
					'KTP' 				=> $ktp,
					'ID_NASABAH'		=> $id_nasabah,
					'NAMA' 				=> $nama_nasabah,
					'NASABAH_TIPE' 		=> $nasabah_type,
					'ID_SEKTOR_EKONOMI' => $sektor_ekonomi,
					'ID_TIPE_KREDIT' 	=> $id_tipe_kredit,
					'AKTIF' 			=> '1',
					'CREATED_BY' 		=> $id_user,
					'CREATED_DATE' 		=> date('Y-m-d H:i:s')			
				);
				
				$this->Pelatihan_model->insert_temp_kehadiran($data);
			
				$db_error = $this->db->error();

				if (!empty($db_error['message'])) {
					$output = array(
						'result'  	=> 'NG',
						'msg'		=> $db_error['message']
					);
				}				

			}		
			catch (Exception $e)
			{
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $e->getMessage()
				);
			}
		}
        
		echo json_encode($output);
		exit;
	}
	
	public function post_non_nasabah()
    {
		$this->is_logged();				
        $ktp   			= trim($this->security->xss_clean(strip_image_tags($this->input->post('ktp'))));
        $no_hp      	= trim($this->security->xss_clean(strip_image_tags($this->input->post('no_hp'))));
        $nama       	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama'))));
        $lokasi_pnm		= trim($this->security->xss_clean(strip_image_tags($this->input->post('lokasi_pnm'))));
		$alamat     	= trim($this->security->xss_clean(strip_image_tags($this->input->post('alamat'))));				
        $catatan 		= $this->security->xss_clean(strip_image_tags($this->input->post('catatan')));
		$id_user		= $this->session->userdata('sess_user_idsdm');					
		
		
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

			$db_error = $this->db->error();

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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

	public function post_submit()
	{
		$this->is_logged();		


		
		$pelatihanid	= trim($this->security->xss_clean(strip_image_tags($this->input->post('pelatihanid'))));
		$status			= trim($this->security->xss_clean(strip_image_tags($this->input->post('status'))));
		$id_user 		= $this->session->userdata('sess_user_idsdm');
		$approval 		= '';

		/* START SEMENTARA SAMPAI KORWIL ADA SEMUA */
		if ($this->Pelatihan_model->cek_korwil_by_id_pelatihan($pelatihanid)->num_rows() == 0){
			$approval = 'Korwil';
		}			
		/* END SEMENTARA SAMPAI KORWIL ADA SEMUA */		

		$data_update 	= array(
			'STATUS' 		=> $status,
			'APPROVAL' 		=> $approval,
			'UPDATED_BY' 	=> $id_user,
			'UPDATED_DATE' 	=> date('Y-m-d H:i:s')			
			);
		$where_update	= array(
			'ID' 	=> $pelatihanid
			);	


		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);			
			
		try
		{	
			$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);

			$db_error = $this->db->error();

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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
		
	}

    public function post_project_charter()
    {
		$this->is_logged();	

		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);			

		// var_dump($this->input->post());die();

		$no_project_charter 	= trim($this->security->xss_clean(strip_image_tags($this->input->post('no_project_charter'))));
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



		$file='';

		if ($_FILES['filename']) 
		{
			$config['upload_path']	= './assets/dokumen/projectcharter';
			$config['allowed_types']	= 'pdf';
			$config['max_size']	= '8000';
			$config['overwrite']	= TRUE;

			$nama_file	= md5($no_project_charter.'_'.date('Ymd').'at'.date('His'));
			$config['file_name']	= $nama_file;			
			$this->upload->initialize($config);

			if($this->upload->do_upload('filename'))
			{
				$this->upload->data();		
				$file = 'assets/dokumen/projectcharter/'.$nama_file;
			}else{
				$output = array(
					'result' => 'NG',
					'msg'	 => $this->upload->display_errors()
				);
				echo json_encode($output);
				exit();
			}
		}else{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'dokumen tidak ada'
			);
			echo json_encode($output);
			exit();
		}



		
		try
		{
			for ($i=1;$i<count($judul_pelatihan);$i++){
				$data = array(
					'NO_PROJECT_CHARTER'	=> $no_project_charter,					
					'ID_TIPE_PELATIHAN' 	=> $type_klasterisasi,
					'TEMA_PROJECT_CHARTER' 	=> $tema_project_charter,
					'FILE' 					=> $file,
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
					'NO_PROJECT_CHARTER'=> $no_project_charter,
					'AKTIF'=> '1',
				);
				
				$project_charter = $this->Pelatihan_model->select_t_project_charter_where($where);	

				if ($project_charter){
					$this->Pelatihan_model->update_project_charter(array('AKTIF'=>'0'),$where);
				}
				$this->Pelatihan_model->insert_t_project_charter($data);					
			}

			$db_error = $this->db->error();

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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


	public function post_pku_akbar_gabungan()
	{
		$this->is_logged();	

		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);

		$judul_gabungan     = $this->security->xss_clean(strip_image_tags($this->input->post('judul_gabungan')));
		$id_pelatihan       = $this->security->xss_clean(strip_image_tags($this->input->post('id_pelatihan')));
		$id_user			= $this->session->userdata('sess_user_idsdm');			
		$id_pelatihan_all 	= '';

		// var_dump($id_pelatihan);die();

		try
		{
			foreach($id_pelatihan as $data)
			{
				$data_pelatihan = array ('ID_TIPE' => '13');
				$where = array ('ID' => $data);

				$this->Pelatihan_model->update_t_pelatihan($data_pelatihan,$where);

				$id_pelatihan_all .= ','.$data;

			}

			$data = array(
				'ID_PELATIHAN' 		=> $id_pelatihan_all,
				'JUDUL_GABUNGAN' 	=> $judul_gabungan,
				'CREATED_BY' 		=> $id_user,
				'CREATED_DATE' 		=> date('Y-m-d H:i:s'),
			);

			$this->Pelatihan_model->insert_pelatihan_pku_akabar_gabungan($data);
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
			<td><input type="text" class="form-control" id="deskripsi_rab_'.$tipe_modal.'" name="deskripsi_rab_'.$tipe_modal.'[]" maxlength="50" value="'.$data_rab->URAIAN.'" ></td>
			<td><input type="number" class="form-control" id="volume_rab_'.$tipe_modal.'" name="volume_rab_'.$tipe_modal.'[]"  value="'.$data_rab->VOLUME.'"></td>
			<td><input type="number" class="form-control" id="unit_cost_rab_'.$tipe_modal.'" name="unit_cost_rab_'.$tipe_modal.'[]" value="'.$data_rab->UNIT_COST.'" ></td>
			<td><input type="number" class="form-control" id="total_cost_rab_'.$tipe_modal.'" name="total_cost_rab_'.$tipe_modal.'[]" value="'.$data_rab->SUB_TOTAL_COST.'" readonly="" ></td>
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


	public function get_rab_lpj()
	{
		$id_pelatihan = $_GET['pelatihanid'];
		$tipe_modal = $_GET['tipe_modal'];
		$rab = $this->Pelatihan_model->select_t_rab_lpj_by_id($id_pelatihan);					
		
		$data= '';		
		
		foreach ($rab as $data_rab) {
			$data .= '
			<tr class="">
			<td><input type="text" class="form-control" id="deskripsi_rab_'.$tipe_modal.'" name="deskripsi_rab_'.$tipe_modal.'[]" maxlength="50" value="'.$data_rab->URAIAN.'" ></td>
			<td><input type="number" class="form-control" id="volume_rab_'.$tipe_modal.'" name="volume_rab_'.$tipe_modal.'[]"  value="'.$data_rab->VOLUME.'"></td>
			<td><input type="number" class="form-control" id="unit_cost_rab_'.$tipe_modal.'" name="unit_cost_rab_'.$tipe_modal.'[]" value="'.$data_rab->UNIT_COST.'" ></td>
			<td><input type="number" class="form-control" id="total_cost_rab_'.$tipe_modal.'" name="total_cost_rab_'.$tipe_modal.'[]" value="'.$data_rab->SUB_TOTAL_COST.'" readonly="" ></td>
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
			'ID'=> $id,
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
				<input type="date" class="form-control" id="tanggal_pelatihan_edit" name="tanggal_pelatihan[]" value="'.date("Y-m-d",strtotime($data_project_charter->TANGGAL)).'" >
				<input type="time" class="form-control" id="time_pelatihan_edit" name="time_pelatihan[]" value="'.date("H:i",strtotime($data_project_charter->TANGGAL)).'" >
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
		$this->config->set_item('elastic_index', 'nasabah');	

		$sektor_ekonomi = ($_GET["columns"][0]['search']['value']!='') ? 'sid_sektor_ekonomi:'.$_GET["columns"][0]['search']['value'] : NULL;
		$jenis_pinjaman	= ($_GET["columns"][1]['search']['value']!='') ? 'kodeproduk:'.$_GET["columns"][1]['search']['value'] : NULL;
		$jenis_program	= ($_GET["columns"][2]['search']['value']!='') ? 'jenis_program:'.$_GET["columns"][2]['search']['value'] : NULL;
		$kode_cabang 	= ($_GET["columns"][3]['search']['value']!='') ? 'inisialcab:'.$_GET["columns"][3]['search']['value'] : NULL;
		$kode_unit 		= ($_GET["columns"][4]['search']['value']!='') ? 'kodeunit:'.$_GET["columns"][4]['search']['value'] : NULL;
		$tipe_kredit	= ($_GET["columns"][5]['search']['value']!='') ? 'tipekredit:'.$_GET["columns"][5]['search']['value'] : NULL;
		$search 		= ($_GET["search"]["value"]!='') ? 'namanasabah:'.$_GET["search"]["value"] : NULL ;	

		$searching = array($sektor_ekonomi,$jenis_pinjaman,$jenis_program,$kode_cabang,$kode_unit,$tipe_kredit,$search);		
		
		$start = isset($_GET["start"]) ? '&from='.$_GET["start"] : 0;
		$limit = isset($_GET["length"]) ? '&size='.$_GET["length"] : 10;		
		$filter_path 	= '&filter_path=hits.hits.*,aggregations.*';
							
		$query='';

		foreach ($searching as $searching_value){
			if($searching_value!=NULL){
				$query .= ($query=='') ? 'q=':' AND ';
				$query .= $searching_value;
			}
		}		

		$debitur = $this->elastic->call('/_search?'.$query.$start.$limit.$filter_path);
		$debitur_count = $this->elastic->call('_count?'.$query);
				
		$hide_debitur = $this->Pelatihan_model->select_temp_kehadiran($idpelatihan);
		$hide_array = array_map (function($value){
			return $value['ID_NASABAH'];
		} , $hide_debitur);

		
		if (isset($debitur->hits->hits)){
			for ($i=0;$i<count($debitur->hits->hits);$i++){
				$data["data"][$i] = $debitur->hits->hits[$i]->_source;
			}	

			for ($i=0;$i<count($debitur->hits->hits);$i++){
				if (!in_array($debitur->hits->hits[$i]->_source->nasabah_id, $hide_array)) 
				{ 
					$data["data"][$i] = $debitur->hits->hits[$i]->_source;					
				}else{
					$data["data"][$i] = (object) array('nasabah_id' => '-','noid_ktp' => '-','namanasabah'=>'-','no_hp'=>'-','kolektibilitas'=>'-','namacabang'=>'-','namaunit'=>'-','tipekredit'=>'-');					
				}				
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
		$start = isset($_GET["start"]) ? '&from='.$_GET["start"] : 0;
		$limit = isset($_GET["length"]) ? '&size='.$_GET["length"] : 10;		
		$filter_path 	= '&filter_path=hits.hits.*,aggregations.*';

		$search 		= ($_GET["search"]["value"]!='') ? 'nama:'.$_GET["search"]["value"] : NULL ;				
		$sektor_ekonomi = ($_GET["columns"][0]['search']['value']!='') ? 'sektor_ekonomi:'.$_GET["columns"][0]['search']['value'] : NULL;
		$regionid 		= ($_GET["columns"][1]['search']['value']!='') ? 'regionid:'.$_GET["columns"][1]['search']['value'] : NULL;		
		$areaid 		= ($_GET["columns"][2]['search']['value']!='' && $_GET["columns"][2]['search']['value']!='null') ? 'areaid:'.$_GET["columns"][2]['search']['value'] : NULL;
		$siklus 		= ($_GET["columns"][3]['search']['value']!='') ? 'siklus:'.$_GET["columns"][3]['search']['value'] : NULL;
		$cabangid 		= ($_GET["columns"][4]['search']['value']!='') ? 'cabangid:'.$_GET["columns"][4]['search']['value'] : NULL;

		$searching = array($sektor_ekonomi,$regionid,$areaid,$search,$siklus,$cabangid);	

		$this->config->set_item('elastic_index', 'debitur');	
		
		
		$query='';

		foreach ($searching as $searching_value){

			if($searching_value!=NULL){
				$query .= ($query=='') ? 'q=':' AND ';
				$query .= $searching_value;
			}
		}	
		
		$debitur = $this->elastic->call('/_search?'.$query.$start.$limit.$filter_path);
		$debitur_count = $this->elastic->call('_count?'.$query);					

		$hide_debitur = $this->Pelatihan_model->select_temp_kehadiran($idpelatihan);
		$hide_array = array_map (function($value){
			return $value['ID_NASABAH'];
		} , $hide_debitur);		
		
		if (isset($debitur->hits->hits)){
			for ($i=0;$i<count($debitur->hits->hits);$i++){
				if (!in_array($debitur->hits->hits[$i]->_source->nasabahid, $hide_array)) 
				{ 
					$data["data"][$i] = $debitur->hits->hits[$i]->_source;					
				}else{
					$data["data"][$i] = (object) array('nasabahid' => '-','noktp' => '-','nama' => '-','alamat'=>'-','produk'=>'-','region'=>'-','area'=>'-','siklus'=>'-');					
				}				
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

	public function get_paging_kehadiran_non_nasabah($idpelatihan)
	{										
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;		
		
		
		$hide_debitur = $this->Pelatihan_model->select_temp_kehadiran($idpelatihan);
		$hide_array = array_map (function($value){
			return $value['ID_NASABAH'];
		} , $hide_debitur);
		

		$debitur = $this->Pelatihan_model->paging_kehadiran_non_nasabah($param);	

		for ($i=0;$i<count($debitur);$i++){
			if (!in_array($debitur[$i]->ID, $hide_array)) 
			{ 
				$debitur[$i] = $debitur[$i];					
			}else{
				$debitur[$i] = (object) array('ID' => '-','NO_KTP' => '-','NAMA' => '-','NO_HP'=>'-','ALAMAT'=>'-','CABANG'=>'-','UNIT'=>'-');
			}				
		}	
			
		$data["data"] = $debitur;
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

		$data["data"] = $this->Pelatihan_model->paging_t_pelatihan($param);				
		$total = COUNT($data["data"]);
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
				$return .="<option value='$data->ID' >$data->TEMA_PROJECT_CHARTER</option>";
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

		$data["data"] = $this->Pelatihan_model->paging_t_project_charter($param);	
						
		$param['count'] = 1;				
		$total = COUNT($data["data"]);				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);			

	}



	public function get_ket_approval()
	{
		$id = $_GET['idpelatihan'];

		$where = array(
			'ID_PELATIHAN' => $id
		);

		$ket_approval = $this->Pelatihan_model->select_t_approval_where($where);
		$return= "<table class='table table-bordered table-striped' ><th>Tipe</th><th>Approval</th><th>Catatan</th><tbody>";
		foreach ($ket_approval as $data) {
			$return .= '<tr><td>'.$data->TIPE_APPROVAL.'</td><td>'.$data->APPROVAL.'</td><td>'.$data->KETERANGAN.'</td></tr>' ;
		}

		$return .='</tbody></table>';

		echo $return;	
	}


	public function get_akbar_gabungan($id)
	{

		$data_id_pelatihan = $this->Pelatihan_model->select_pelatihan_pku_akabar_gabungan($id)[0]->ID_PELATIHAN;

		$data["data"] = $this->Pelatihan_model->select_t_pelatihan_where_in_id(explode(',',$data_id_pelatihan));						
		$total = COUNT($data["data"]);				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);	
	}

	public function get_no_project_charter()
	{
		$no = $this->db->query("SELECT CONCAT('PC-',NEXT VALUE FOR PROJECT_CHARTER,'/',dbo.MONTH_TO_ROMAN(GETDATE()),'/',YEAR(GETDATE())) as NO_PROJECT_CHARTER")->row()->NO_PROJECT_CHARTER;

		echo $no;
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
			
			$this->Pelatihan_model->delete_temp_kehadiran($data);
			
			$cek_kehadiran = $this->Pelatihan_model->select_temp_kehadiran_by_idpelatihan($id_pelatihan)->num_rows();
			
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

			$db_error = $this->db->error();

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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


	public function delete_akbar_gabungan()
	{
		$this->is_logged();				
		
		$idakbargabungan = trim($this->security->xss_clean(strip_image_tags($this->input->post('idakbargabungan'))));											
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);				
		
		try{
			
			$data_id_pelatihan = $this->Pelatihan_model->select_pelatihan_pku_akabar_gabungan($idakbargabungan)[0]->ID_PELATIHAN;

			foreach (explode(',',$data_id_pelatihan) as $id_pelatihan){

				$data_update 	= array('ID_TIPE' 	=> '5',	);			
				$where_update	= array('ID' 		=> $id_pelatihan);			

				$this->Pelatihan_model->update_t_pelatihan($data_update,$where_update);
			}

			$this->Pelatihan_model->delete_akbar_gabungan(array('ID'	=> $idakbargabungan));

			$db_error = $this->db->error();

			if (!empty($db_error['message'])) {
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> $db_error['message']
				);
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

