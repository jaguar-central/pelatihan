<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_model extends CI_Model {
	public function select_ms_user()
	{
			$query = $this->db->query("select *,dbo.DESKRIPSI_USER_GROUP(IDGROUP) as USER_GROUP_DESKRIPSI,dbo.DESKRIPSI_BISNIS(IDBISNIS) as BISNIS_DESKRIPSI from MS_USER  ");
			return $query->result();
	}
	public function select_ms_cabang_ulamm()
	{
			$query = $this->db->query("select * from MS_CABANG_ULAMM where KODE_CABANG in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." )  ");
			return $query->result();
	}

	public function select_all_ms_cabang_ulamm()
	{
		$query = $this->db->query("select * from MS_CABANG_ULAMM ");
		return $query->result();		
	}

	public function select_ms_cabang_mekaar_by_id($area)
	{
			$query = $this->db->query("select * from MS_CABANG_MEKAAR where KODE_AREA='$area' ");
			return $query->result();
	}

	public function select_ms_area_mekaar()
	{
			$query = $this->db->query("select * from MS_AREA_MEKAAR  ");
			return $query->result();
	}

	public function select_ms_regional_mekaar()
	{
			$query = $this->db->query("select * from MS_REGION_MEKAAR  ");
			return $query->result();
	}

	public function select_ms_cabang_mekaar()
	{
			$query = $this->db->query("select * from MS_CABANG_MEKAAR  ");
			return $query->result();
	}

	public function select_ms_user_by_username($user)
	{
			$query = $this->db->query("select *,dbo.DESKRIPSI_USER_GROUP(IDGROUP) as NAMA_GROUP from MS_USER where USERNAME = '".$user."' ");
			return $query->result();
	}

	public function select_ms_area_mekaar_by_id($region)
	{
			$query = $this->db->query("select * from MS_AREA_MEKAAR where KODE_REGION='$region' ");
			return $query->result();
	}

	public function select_ms_region_mekaar()
	{
			$query = $this->db->query("select * from MS_REGION_MEKAAR ");
			return $query->result();
	}

	public function select_ms_unit_ulamm()
	{
			$query = $this->db->query("select * from MS_UNIT_ULAMM  ");
			return $query->result();
	}

	public function select_ms_user_group()
	{
			$query = $this->db->query("select * from MS_USER_GROUP  ");
			return $query->result();
	}
		
	public function select_ms_unit_ulamm_by_kode_cabang($kode_cabang)
	{
			$query = $this->db->query("select * from MS_UNIT_ULAMM where KODE_CABANG='".$kode_cabang."' and AKTIF = 1 ");
			//$query = $this->db->query("SELECT DISTINCT KODE_CABANG,inisial_unit,NAMA_UNIT FROM [ITD_DW].dbo.nasabah_data_vdp WHERE KODE_CABANG='".$kode_cabang."' ");
			return $query->result();
	}	

	public function select_ms_sektor_ulamm()
	{
			$query = $this->db->query("SELECT SID_SEKTOR_EKONOMI,Deskripsi_Bidang_Usaha FROM MS_SEKTOR_ULAMM WHERE ISNULL(Deskripsi_Bidang_Usaha,'')!='' ORDER BY SID_SEKTOR_EKONOMI");
			return $query->result();
	}


	public function select_dw_nasabah_mekaar_sektor_ekonomi()
	{
			$query = $this->db->query("SELECT * FROM MS_SEKTOR_MEKAAR ");
			return $query->result();
	}	

	public function select_dw_nasabah_ulamm_jenis_program()
	{
			$query = $this->db->query("SELECT DISTINCT Jenis_program FROM [ITD_DW].dbo.nasabah_data_vdp WHERE ISNULL(Jenis_program,'')<>'' order by Jenis_program");
			return $query->result();
	}		
		
	public function notification(){	
		return $this->db->query(" EXEC [GET_NOTIF] @IDUSER='".$this->session->userdata('sess_user_id')."' ")->result();									
	}

	public function notification_count(){	
		return $this->db->query(" EXEC [GET_NOTIF] @IDUSER='".$this->session->userdata('sess_user_id')."',@COUNT=1 ")->result()[0]->COUNT_NOTIF;							
	}

	public function select_trx_no_by_param($param){
		$query = $this->db->select("*,dbo.CREATE_TRX_NO(PARAMETER,PARAM1,PARAM2,ISNULL(INC_PELATIHAN,1),GETDATE()) as NO")->from("TRX_NO")->where($param);		
		return $query->get();				
	}

	public function insert_trx_no($data)
	{
		$this->db->insert('TRX_NO', $data);
	}

	public function update_trx_no($data,$where){
		$this->db->update('TRX_NO', $data,$where);
	}		


	public function select_ms_bwmp_by_approval($approval)
	{
		$query = $this->db->select("*")->from("MS_BWMP")->where("APPROVAL",$approval);
		return $query->get();
	}

	public function select_ms_pelatihan_type_by_id($id)
	{
		$query = $this->db->select("KODE")->from("MS_PELATIHAN_TYPE")->where("ID",$id);
		return $query->get();
	}    

	public function insert_ms_user($data)
	{
		$this->db->insert('MS_USER', $data);
	}

	public function insert_ms_user_cabang_region($data)
	{
		$this->db->insert('MS_USER_CABANG_REGION', $data);
	}	

	public function insert_ms_user_group($data)
	{
		$this->db->insert('MS_USER_GROUP', $data);
	}
		
	// public function select_ms_grading()
	// {
	// 	$query = $this->db->query("select * from MS_GRADING ");
	// 	return $query->result();
	// }	

	public function select_ms_grading_where($where)
	{
		$query = $this->db->get_where('MS_GRADING',$where);	
		return $query->result();		
	}	

	public function select_ms_nasabah_grading()
	{
		$query = $this->db->query("select * from MS_NASABAH_GRADING ");
		return $query->result();
	}		

	public function select_ms_provinsi()
	{
		$query = $this->db->query("select * from MS_PROVINSI ");
		return $query->result();	
	}

	public function select_ms_kabkot()
	{
		$query = $this->db->query("select * from MS_KABKOT ");
		return $query->result();	
	}
	
	public function select_ms_kecamatan()
	{
		$query = $this->db->query("select * from MS_KECAMATAN ");
		return $query->result();	
	}	

	public function select_ms_kabkot_by_id_provinsi($id)
	{
		$query = $this->db->query("select * from MS_KABKOT where MS_KODE_PROVINSI='$id' ");
		return $query->result();	
	}

	public function select_ms_kecamatan_by_id_kabkot($id)
	{
		$query = $this->db->query("select * from MS_KECAMATAN where MS_KODE_KABKOT='$id' ");
		return $query->result();	
	}

	public function insert_trx_geolocation($data)
	{
		$this->db->insert('TRX_GEOLOCATION', $data);
	}	

	public function select_trx_geolocation($where){
		$query = $this->db->get_where('TRX_GEOLOCATION',$where);	
		return $query->result();			
	}

	public function update_trx_geolocation($data,$where){
		$this->db->update('TRX_GEOLOCATION', $data,$where);
	}		

	public function insert_ms_krm($data)
	{
		$this->db->insert('MS_KRM', $data);
	}	

	public function select_ms_krm($where){
		$query = $this->db->get_where('MS_KRM',$where);	
		return $query->row();			
	}	

}
?>