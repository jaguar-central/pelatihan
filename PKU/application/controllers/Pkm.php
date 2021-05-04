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
		$cek_kelompok = $this->db->query("select OurBranchID,GroupID,GroupName FROM ".$this->config->item('server_pkm').".[PKMMobile].[dbo].[PKM_LPM] WHERE GroupID='" . $this->input->get('kelompokid') . "' ")->row();
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

			$cek_minggu_ke = $this->db->query("select MINGGU_KE FROM CEK_MINGGU_KE_PER_BULAN()")->row()->MINGGU_KE;
			
			if ($cek_minggu_ke==1){								
				$this->pkm_survey_pilih_nasabah();
			}else{
				$cek_pkm_bermakna = $this->db->query("select * from T_PKM_BERMAKNA WHERE  KELOMPOKID='".$cek_kelompok->GroupID."' AND CAST(CREATED_DATE as DATE)=CAST(GETDATE() as DATE)")->result();
				if (count($cek_pkm_bermakna)==0){
					$data["content"] = $this->db->query(" select *,REPLACE(KONTEN,'font-size:16px','') as KONTEN2 FROM MS_MODUL_PKM_BERMAKNA WHERE ID=(SELECT MODUL_PKM_ID FROM MS_JADWAL_PKM_BERMAKNA WHERE TAHUN=YEAR(GETDATE()) AND BULAN=MONTH(GETDATE())) ")->row();
					$this->load->view('pkm/pkm_bermakna', $data);
				}else{
					$this->pkm_bermakna_selesai();
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

		$kelompokid						= $this->session->userdata('sess_kelompok_id');
		$id_user						= $this->session->userdata('sess_user_id');
		$id_nasabah						= $this->security->xss_clean(strip_image_tags($this->input->post('nasabah_id')));
		$survey_menabung 				= $this->security->xss_clean(strip_image_tags($this->input->post('survey_menabung')));
		$survey_pengelolaan_keuangan 	= $this->security->xss_clean(strip_image_tags($this->input->post('survey_pengelolaan_keuangan')));
		$survey_omset 					= $this->security->xss_clean(strip_image_tags($this->input->post('survey_omset')));
		$survey_strategi_penjualan 		= $this->security->xss_clean(strip_image_tags($this->input->post('survey_strategi_penjualan')));
		$survey_aset					= $this->security->xss_clean(strip_image_tags($this->input->post('survey_aset')));
		$survey_ijin 					= $this->security->xss_clean(strip_image_tags($this->input->post('survey_ijin')));
		$survey_diversifikasi 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_diversifikasi')));
		$survey_serapan_tenaga 			= $this->security->xss_clean(strip_image_tags($this->input->post('survey_serapan_tenaga')));		

		$this->db->trans_begin();

		$data_u = array(
			'AKTIF'			=> '0'
		);
		$where = array(
			'KELOMPOK_ID'	=> $kelompokid,
			'NASABAH_ID'	=> $id_nasabah
		);

		$this->Pkm_model->update_t_pkm_survey($data_u,$where);

		$data = array(
			'KELOMPOK_ID'						=> $kelompokid,
			'NASABAH_ID'						=> $id_nasabah,
			'NILAI_SURVEY_MENABUNG' 	    	=> $survey_menabung,
			'NILAI_SURVEY_PENGELOLAAN_KEUANGAN' => $survey_pengelolaan_keuangan,
			'NILAI_SURVEY_OMSET' 				=> $survey_omset,
			'NILAI_STRATEGI_PENJUALAN' 			=> $survey_strategi_penjualan,
			'NILAI_SURVEY_ASSET' 				=> $survey_aset,
			'NILAI_SURVEY_IJIN'					=> $survey_ijin,
			'NILAI_SURVEY_DIVERSIFIKASI'		=> $survey_diversifikasi,
			'NILAI_SURVEY_TENAGA_KERJA' 		=> $survey_serapan_tenaga,
			'AKTIF'								=> '1',
			'CREATED_BY' 						=> $id_user,
			'CREATED_DATE' 						=> date('Y-m-d H:i:s')
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


	public function pkm_bermakna_selesai()
	{

		$session_destroy = array(
		'sess_cabang_id'			=> '',				
		'sess_kelompok_id'			=> '',				
		'sess_nama_kelompok'		=> '',				
		'sess_user_id'				=> ''
		);                

		$this->session->set_userdata($session_destroy);
		$this->session->unset_userdata($session_destroy);

		$this->load->view('pkm/pkm_bermakna_selesai');
	}	

	public function pkm_survey_pilih_nasabah()
	{		
		$data['nasabah'] = $this->db->query("select a.ClientID,a.ClientName,b.NILAI_SURVEY_MENABUNG,b.NILAI_SURVEY_PENGELOLAAN_KEUANGAN,b.NILAI_SURVEY_OMSET,b.NILAI_STRATEGI_PENJUALAN,b.NILAI_SURVEY_ASSET,b.NILAI_SURVEY_IJIN,b.NILAI_SURVEY_DIVERSIFIKASI,b.NILAI_SURVEY_TENAGA_KERJA FROM ".$this->config->item('server_pkm').".[PKMMobile].[dbo].[PKM_LPM] a LEFT JOIN T_PKM_SURVEY b
		ON a.GroupID=b.KELOMPOK_ID COLLATE DATABASE_DEFAULT AND a.ClientID=b.NASABAH_ID COLLATE DATABASE_DEFAULT AND b.AKTIF=1 WHERE a.GroupID='" . $this->session->userdata('sess_kelompok_id') . "' ORDER BY b.AKTIF ")->result();

		// var_dump($this->db->last_query());die();
		$this->load->view('pkm/pkm_survey_pilih_nasabah', $data);
	}

	public function pkm_survey()
	{

		$nasabah = $this->db->query("select ClientID,ClientName FROM ".$this->config->item('server_pkm').".[PKMMobile].[dbo].[PKM_LPM] WHERE ClientID='" . $this->uri->segment(3) . "' ")->row();
		$data['kategori_plafond'] = $this->db->query("select * FROM ".$this->config->item('server_pkm').".[PKMMobile].[dbo].[Kategori_plafond_survey] WHERE ClientID='" . $this->uri->segment(3) . "'")->row()->KategoriPlafond;
		$data['nasabah_id'] = $nasabah->ClientID;
		$data['nama_nasabah'] = $nasabah->ClientName;
		$this->load->view('pkm/pkm_survey',$data);
	}
}
