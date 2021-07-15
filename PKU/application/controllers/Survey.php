<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Survey extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
	}    

	public function index()
    {
		$this->is_logged();				
		
        $data["content"] 	= "Survey";
        $data["view"] 		= "survey_pku/survey_ulamm";
		$data["script"] 	= "survey_pku/include/survey-script-pku";
		$data["modal"] 		= array(
								"survey_pku/modal/modaladdsurvey",
								); 

        $data["menu"] 		= $this->Menu_model->select_ms_menu();
        $data["survey"]     = $this->Survey_model->select_t_survey();
		
        $this->load->view('layout/gabung', $data);
	}    


	public function post_survey()
    {
		$this->is_logged();				
		
        $pilih_nasabah   			= trim($this->security->xss_clean(strip_image_tags($this->input->post('pilih_nasabah'))));        
		$id_nasabah    				= trim($this->security->xss_clean(strip_image_tags($this->input->post('id_nasabah'))));
		$usaha_nasabah				= trim($this->security->xss_clean(strip_image_tags($this->input->post('usaha_nasabah'))));
		$nama_nasabah				= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_nasabah'))));       
		$no_hp						= trim($this->security->xss_clean(strip_image_tags($this->input->post('no_hp'))));        
        $plafond_nasabah        	= trim($this->security->xss_clean(strip_image_tags($this->input->post('plafond_nasabah'))));
        $alamat_nasabah           	= trim($this->security->xss_clean(strip_image_tags($this->input->post('alamat_nasabah'))));
        $pilih_plafon   			= trim($this->security->xss_clean(strip_image_tags($this->input->post('pilih_plafon'))));
        $pilih_prod  				= trim($this->security->xss_clean(strip_image_tags($this->input->post('pilih_prod'))));
        $pilih_pendapatan   		= trim($this->security->xss_clean(strip_image_tags($this->input->post('pilih_pendapatan'))));
        $pilih_tenaga    			= trim($this->security->xss_clean(strip_image_tags($this->input->post('pilih_tenaga'))));
        $pilih_izin        			= trim($this->security->xss_clean(strip_image_tags($this->input->post('pilih_izin'))));
		$id_user					= $this->session->userdata('sess_user_idsdm');			
		
		$output = array(
		'result'  	=> 'OK',
		'msg'		=> ''
		 );			


		$check = $this->Survey_model->select_t_survey_by_id($id_nasabah);
		
        if (COUNT($check)>0){

            $data = array(
                'AKTIF' => '0'
            );      

            $where = array(
                'ID_NASABAH' => $id_nasabah
            );      

            $this->db->trans_begin();

            $this->Survey_model->update_t_survey($data,$where);

            $db_error = $this->db->error();

            if (!empty($db_error['message']))
            {
                $this->db->trans_rollback();
                    
                $output = array(
                    'result'  	=> 'NG',
                    'msg'		=> $db_error['message']
                );

                echo json_encode($output);
                exit;
            }
            else
            {
                $this->db->trans_commit();
            }	            
        }
				
		$data = array(
			'JENIS_NASABAH' 						=> $pilih_nasabah,
			'ID_NASABAH' 							=> $id_nasabah,
			'NAMA_NASABAH' 							=> $nama_nasabah,
			'JENIS_USAHA' 							=> $usaha_nasabah,
			'ALAMAT_NASABAH'						=> $alamat_nasabah,
			'TELP_NASABAH'							=> $no_hp,
			'PLAFOND' 								=> $plafond_nasabah,
			'JUMLAH_PLAFON_MENINGKAT'				=> $pilih_plafon,
			'PRODUK_USAHA_BERTAMBAH'				=> $pilih_prod,
			'JUMLAH_PENDAPATAN_PERBULAN_MENINGKAT' 	=> $pilih_pendapatan,
			'PENAMBAHAN_SERAPAN_TENAGA_KERJA'		=> $pilih_tenaga,
			'PENAMBAHAN_IZIN_USAHA_LAIN' 			=> $pilih_izin,
			'AKTIF'						 			=> '1',
			'CREATED_BY' 							=> $id_user,
			'CREATED_DATE' 							=> date('Y-m-d H:i:s')			
		);
		
		
		$this->db->trans_begin();

		$this->Survey_model->insert_t_survey($data);		

		$db_error = $this->db->error();

		if (!empty($db_error['message']))
		{
			$this->db->trans_rollback();
				
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $db_error['message']
			);
		}
		else
		{
			$this->db->trans_commit();
			$output = array(
				'result'  	=> 'OK',
				'msg'		=> ''
			);
		}			
        
		echo json_encode($output);
		exit;
    }    

	public function get_nasabah_survey()
	{									
		$filter_path 	= '&filter_path=hits.hits.*,aggregations.*';

		$search = $_GET['column'].':'.$_GET['find'];		

		$this->config->set_item('elastic_index', $_GET['table']);	
				
		$nasabah = $this->elastic->call('/_search?q='.$search.$filter_path);
		
		if (isset($nasabah->hits->hits)){
			for ($i=0;$i<count($nasabah->hits->hits);$i++){
				$data["data"][$i] = $nasabah->hits->hits[$i]->_source;					
			}						
		}else{
			$data["data"] = array();
		}				
						
		echo json_encode($data);		
	}    
}