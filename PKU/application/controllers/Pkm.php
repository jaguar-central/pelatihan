<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pkm extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }


	public function login_pkm_bermakna()
	{	
		//penambahan parameter CABANGID dan AOM
		$cek_kelompok = $this->db->query("select * FROM [10.61.3.64].[INISEMENTARA].dbo.list_kelompok WHERE groupid='".$this->input->get('kelompokid')."' ")->row();
		if ($cek_kelompok) {
			//SET SESSION PKM START
			$session_array = array(
				'sess_cabang_id'			=> $cek_kelompok->cabangid,				
				'sess_kelompok_id'			=> $cek_kelompok->groupid,				
				'sess_nama_kelompok'		=> $cek_kelompok->groupname,				
				'sess_user_id'				=> $this->input->get('nip')

			);

			$this->session->set_userdata($session_array);
			//SET SESSION PKM END

			$data["content"] = $this->db->query(" select * FROM MS_MODUL_PKM_BERMAKNA WHERE ID=(SELECT MODUL_PKM_ID FROM MS_JADWAL_PKM_BERMAKNA WHERE TAHUN=YEAR(GETDATE()) AND BULAN=MONTH(GETDATE())) ")->row();

			$cek_minggu_ini = $this->db->query(" select * from T_PKM_BERMAKNA WHERE MODUL_PKM_ID=".$data["content"]->ID." and KELOMPOKID='".$cek_kelompok->groupid."' AND MINGGU_KE=(SELECT MINGGU_KE FROM CEK_MINGGU_KE_PER_BULAN()) ORDER BY MINGGU_KE DESC ")->result();

			// var_dump($cek_minggu_ini);die();
			if (count($cek_minggu_ini)){
				if ($cek_minggu_ini[0]->MINGGU_KE==$cek_minggu_ini[0]->MINGGU_TERAKHIR)
				{
					$this->load->view('pkm/pkm_survey');
				}else{

					$session_destroy = array(
					'sess_cabang_id'			=> '',				
					'sess_kelompok_id'			=> '',				
					'sess_nama_kelompok'		=> '',				
					'sess_user_id'				=> ''
					);                

					$this->session->set_userdata($session_destroy);
					$this->session->unset_userdata($session_destroy);

					$this->load->view('pkm/pkm_selesai');
				}
			}else{
				$this->load->view('pkm/pkm_bermakna',$data);
			}
			
		}else{
			echo "Kelompok tidak ditemukan";
		}			
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