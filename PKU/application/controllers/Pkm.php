<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pkm extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

	public function post_pkm_bermakna()
	{
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
        );	
        
		try
		{        

            $id_konten                  = $this->security->xss_clean(strip_image_tags($this->input->post('id_konten')));
            $id_user					= $this->session->userdata('sess_user_id');
            $cabangid					= $this->session->userdata('sess_cabang_id');
            $kelompokid					= $this->session->userdata('sess_kelompok_id');
            $namakelompok				= $this->session->userdata('sess_nama_kelompok');
            $data = array(
                'CABANGID'	            => $cabangid,					
                'KELOMPOKID' 	        => $kelompokid,
                'NAMA_KELOMPOK' 	    => $namakelompok,
                'MODUL_PKM_ID' 			=> $id_konten,
                'CREATED_BY' 			=> $id_user,
                'CREATED_DATE' 			=> date('Y-m-d H:i:s')			
            );

            $this->Pkm_model->insert_t_pkm_bermakna($data);


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