<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pkm extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}


	public function login_pkm_bermakna()
	{
		//penambahan parameter CABANGID dan AOM
		$cek_kelompok = $this->db->query("select OurBranchID,GroupID,GroupName FROM [10.61.3.15].[PKMMobile].[dbo].[PKM_LPM] WHERE GroupID='" . $this->input->get('kelompokid') . "' ")->row();
		if ($cek_kelompok) {
			//SET SESSION PKM START
			$session_array = array(
				'sess_cabang_id'			=> $cek_kelompok->OurBranchID,
				'sess_kelompok_id'			=> $cek_kelompok->GroupID,
				'sess_nama_kelompok'		=> $cek_kelompok->GroupName,
				'sess_user_id'				=> $this->input->get('nip')

			);

			$this->session->set_userdata($session_array);
			//SET SESSION PKM END

			$data["content"] = $this->db->query(" select *,REPLACE(KONTEN,'font-size:16px','') as KONTEN2 FROM MS_MODUL_PKM_BERMAKNA WHERE ID=(SELECT MODUL_PKM_ID FROM MS_JADWAL_PKM_BERMAKNA WHERE TAHUN=YEAR(GETDATE()) AND BULAN=MONTH(GETDATE())) ")->row();

			$cek_minggu_ke = $this->db->query("select MINGGU_KE FROM CEK_MINGGU_KE_PER_BULAN()")->row()->MINGGU_KE;
			
			if ($cek_minggu_ke==2){				
				$cek_survey = $this->db->query("select * from T_PKM_SURVEY WHERE  KELOMPOK_ID='".$cek_kelompok->GroupID."' AND CAST(CREATED_DATE as DATE)=CAST(GETDATE() as DATE)")->result();
				if (count($cek_survey)==0){
					$this->load->view('pkm/pkm_survey');
				}else{
					$this->pkm_selesai_survey();
				}				
			}else{
				$cek_pkm_bermakna = $this->db->query("select * from T_PKM_BERMAKNA WHERE  KELOMPOKID='".$cek_kelompok->GroupID."' AND CAST(CREATED_DATE as DATE)=CAST(GETDATE() as DATE)")->result();
				if (count($cek_pkm_bermakna)==0){
					$this->load->view('pkm/pkm_bermakna', $data);
				}else{
					$this->pkm_selesai();
				}
			}
		} else {
			echo "Kelompok tidak ditemukan";
		}
	}

	public function post_pkm_bermakna()
	{
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);

		try {

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
		} catch (Exception $e) {
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}

		echo json_encode($output);
		exit;
	}


	public function post_pkm_survey()
	{
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);


		$kelompokid				= $this->session->userdata('sess_kelompok_id');
		$id_user				= $this->session->userdata('sess_user_id');
		$survey_materi 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_materi')));
		$survey_tenaga_kerja 	= $this->security->xss_clean(strip_image_tags($this->input->post('survey_tenaga_kerja')));
		$survey_aset 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_aset')));
		$survey_ijin 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_ijin')));
		$survey_produk 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_produk')));
		$survey_plafond			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_plafond')));
		$survey_omset 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_omset')));

		$survey_materi_detail 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_materi_detail')));
		$survey_tenaga_kerja_detail 	= $this->security->xss_clean(strip_image_tags($this->input->post('survey_tenaga_kerja_detail')));
		$survey_aset_detail 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_aset_detail')));
		$survey_ijin_detail 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_ijin_detail')));
		$survey_produk_detail 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_produk_detail')));
		$survey_plafond_detail 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_plafond_detail')));
		$survey_omset_detail 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_omset_detail')));

		$survey_materi_detail 		= ($survey_materi=="0") ? "0" : $survey_materi_detail;
		$survey_tenaga_kerja_detail = ($survey_tenaga_kerja=="0") ? "0" : $survey_tenaga_kerja_detail;
		$survey_aset_detail 		= ($survey_aset=="0") ? "0" : $survey_aset_detail;
		$survey_ijin_detail 		= ($survey_ijin=="0") ? "0" : $survey_ijin_detail;
		$survey_produk_detail 		= ($survey_produk=="0") ? "0" : $survey_produk_detail;
		$survey_plafond_detail 		= ($survey_plafond=="0") ? "0" : $survey_plafond_detail;
		$survey_omset_detail 		= ($survey_omset=="0") ? "0" : $survey_omset_detail;


		$this->db->trans_begin();

		$data_u = array(
			'AKTIF'				=> '0'
		);
		$where = array(
			'KELOMPOK_ID'				=> $kelompokid
		);

		$this->Pkm_model->update_t_pkm_survey($data_u,$where);

		$data = array(
			'KELOMPOK_ID'				=> $kelompokid,
			'NILAI_SURVEY_MATERI' 	    => $survey_materi_detail,
			'NILAI_SURVEY_TENAGA_KERJA' => $survey_tenaga_kerja_detail,
			'NILAI_ASET' 				=> $survey_aset_detail,
			'NILAI_IJIN' 				=> $survey_ijin_detail,
			'NILAI_PRODUK' 				=> $survey_produk_detail,
			'NILAI_PLAFOND'				=> $survey_plafond_detail,
			'NILAI_OMSET' 				=> $survey_omset_detail,
			'AKTIF'						=> '1',
			'CREATED_BY' 				=> $id_user,
			'CREATED_DATE' 				=> date('Y-m-d H:i:s')
		);

		$this->Pkm_model->insert_t_pkm_survey($data);

		$db_error = $this->db->error();

		if (!empty($db_error['message'])) {
			$this->db->trans_rollback();

			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $db_error['message']
			);
		} else {
			$this->db->trans_commit();
			$output = array(
				'result'  	=> 'OK',
				'msg'		=> ''
			);
		}

		echo json_encode($output);
		exit;
	}


	public function pkm_selesai()
	{

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

	public function pkm_selesai_survey()
	{

		$data["SURVEY"] = $this->db->query("select TOP 1 * from T_PKM_SURVEY WHERE KELOMPOK_ID='".$this->session->userdata('sess_kelompok_id')."' ORDER BY CREATED_DATE DESC")->result();

		$session_destroy = array(
		'sess_cabang_id'			=> '',				
		'sess_kelompok_id'			=> '',				
		'sess_nama_kelompok'		=> '',				
		'sess_user_id'				=> ''
		);                

		$this->session->set_userdata($session_destroy);
		$this->session->unset_userdata($session_destroy);

		$this->load->view('pkm/pkm_selesai',$data);
	}
}
