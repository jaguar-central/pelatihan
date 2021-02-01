<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelatihan_model extends CI_Model {

public function select_ms_pelatihan_type()
{
		$query = $this->db->query("select * from MS_PELATIHAN_TYPE  ");
		return $query->result();
}

public function select_ms_pelatihan_type_ulamm()
{
		$query = $this->db->query("select * from MS_PELATIHAN_TYPE where bisnis = 'ULAMM' and KODE<>'AKBAR-G' ");
		return $query->result();
}

public function select_ms_pelatihan_type_mekaar()
{
		$query = $this->db->query("select * from MS_PELATIHAN_TYPE where bisnis = 'MEKAAR' ");
		return $query->result();
}

public function insert_t_project_charter($data)
{
		$this->db->insert('T_PROJECT_CHARTER', $data);
}

public function insert_t_pelatihan($data)
{
		$this->db->insert('T_PELATIHAN', $data);
}
		
public function insert_t_rab($data)
{
		$this->db->insert('T_RAB', $data);
}	

public function delete_t_rab($id)
{
		$this->db->delete('T_RAB', $id);
}

public function select_t_rab_by_id($id)
{
		$query = $this->db->query("select * from T_RAB where ID_PELATIHAN = '".$id."'");
		return $query->result();
}

public function select_t_rab_lpj_by_id($id)
{
		$query = $this->db->query("select * from T_RAB_LPJ where ID_PELATIHAN = '".$id."'");
		return $query->result();
}
        
public function insert_t_dokumen($data)
        {
                $this->db->insert('T_DOKUMEN', $data);
        }	
public function update_t_pelatihan($data,$where){
	$this->db->update('T_PELATIHAN', $data,$where);
}	

public function update_t_pelatihan_lpj($data,$where){
	$this->db->update('T_PELATIHAN_LPJ', $data,$where);
}

public function update_t_rab_lpj($data,$where){
	$this->db->update('T_RAB_LPJ', $data,$where);
}

public function select_t_pelatihan_ulamm_by_status($status)
{
		$query = $this->db->select('T_PELATIHAN.*
		,CONVERT(VARCHAR(17),T_PELATIHAN.TANGGAL_MULAI,113) as MULAI
		,CONVERT(VARCHAR(17),T_PELATIHAN.TANGGAL_SELESAI,113) as SELESAI
		,dbo.DESKRIPSI_PELATIHAN_TYPE(T_PELATIHAN.ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE
		,CONVERT(VARCHAR(17),T_PELATIHAN_LPJ.TANGGAL_REALISASI_MULAI,113) as LPJ_MULAI
		,CONVERT(VARCHAR(17),T_PELATIHAN_LPJ.TANGGAL_REALISASI_SELESAI,113) as LPJ_SELESAI
		,T_PELATIHAN_LPJ.DURASI_PELATIHAN as DURASI_LPJ
		,T_PELATIHAN_LPJ.CSI_FINAL
		,T_PELATIHAN_LPJ.CATATAN_TAMBAHAN
		,dbo.URL_LAMPIRAN_LPJ(T_PELATIHAN.ID) as URL_LAMPIRAN
		')->
		from('T_PELATIHAN')->
		join('T_PELATIHAN_LPJ','T_PELATIHAN.ID = T_PELATIHAN_LPJ.ID_PELATIHAN AND T_PELATIHAN_LPJ.AKTIF=1','LEFT')->
		where('T_PELATIHAN.ID_BISNIS','1')->
		where(" T_PELATIHAN.CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ")->
		where_in('T_PELATIHAN.STATUS',$status)->get();				
		
		return $query->result();
}
		
public function select_t_pelatihan_mekaar_by_status($status)
        {
			$query = $this->db->select('T_PELATIHAN.*
			,CONVERT(VARCHAR(17),T_PELATIHAN.TANGGAL_MULAI,113) as MULAI
			,CONVERT(VARCHAR(17),T_PELATIHAN.TANGGAL_SELESAI,113) as SELESAI
			,dbo.DESKRIPSI_PELATIHAN_TYPE(T_PELATIHAN.ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE
			,CONVERT(VARCHAR(17),T_PELATIHAN_LPJ.TANGGAL_REALISASI_MULAI,113) as LPJ_MULAI
			,CONVERT(VARCHAR(17),T_PELATIHAN_LPJ.TANGGAL_REALISASI_SELESAI,113) as LPJ_SELESAI
			,T_PELATIHAN_LPJ.DURASI_PELATIHAN as DURASI_LPJ
			,T_PELATIHAN_LPJ.CSI_FINAL
			,T_PELATIHAN_LPJ.CATATAN_TAMBAHAN
			,dbo.DESKRIPSI_REGION(REGIONAL_MEKAAR) as DESKRIPSI_REGION
			,dbo.DESKRIPSI_AREA(AREA_MEKAAR) as DESKRIPSI_AREA
			,dbo.DESKRIPSI_CABANG_MEKAAR(CABANG_MEKAAR) as DESKRIPSI_CABANG	
			,dbo.URL_LAMPIRAN_LPJ(T_PELATIHAN.ID) as URL_LAMPIRAN			
			')->
			from('T_PELATIHAN')->
			join('T_PELATIHAN_LPJ','T_PELATIHAN.ID = T_PELATIHAN_LPJ.ID_PELATIHAN AND T_PELATIHAN_LPJ.AKTIF=1','LEFT')->
			where('T_PELATIHAN.ID_BISNIS','2')->
			where(" T_PELATIHAN.CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ")->
			where_in('T_PELATIHAN.STATUS',$status)->get();	

			return $query->result();
        }
		
		
public function insert_t_approval($data)
        {
                $this->db->insert('T_APPROVAL', $data);
		}
		
public function select_t_approval_where($where)
{
		$query = $this->db->get_where('T_APPROVAL',$where);	
		return $query->result();		
}		

	
public function select_t_pelatihan_by_approval($status)
        {					
			if ($this->session->userdata('sess_user_id_bisnis')==0){
				$BISNIS = " in (SELECT BISNIS FROM MS_FLOW_APPROVAL WHERE ID_GROUP=".$this->session->userdata('sess_user_id_user_group').")";				
			}else{
				$BISNIS = " = ".$this->session->userdata('sess_user_id_bisnis');
			}

			$q = "select *,dbo.ID_JENIS_NASABAH(ID_GRADING) as ID_JENIS_NASABAH
			,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT
			,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE 
			,dbo.URL_LAMPIRAN_LPJ(ID) as URL_LAMPIRAN_LPJ
			from T_PELATIHAN 
			where ID_BISNIS $BISNIS 
			and STATUS='$status' 
			";

			if ($this->session->userdata('sess_user_id_user_group')<6){
				$q .=" and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ";
			}
			
			//sementara sampe korwil ada semua
			if ($this->session->userdata('sess_user_id_user_group')==4){
				$q .= "
				AND APPROVAL in (SELECT * FROM dbo.[sementara_pic_pusat](".$this->session->userdata('sess_user_id').",CABANG_ULAMM)) ";
			}else{
				$q .="and ISNULL(APPROVAL,'') in (SELECT APPROVAL_BY FROM MS_FLOW_APPROVAL WHERE ID_GROUP=".$this->session->userdata('sess_user_id_user_group').")";
			}				

			$query = $this->db->query($q);			

            return $query->result();
        }
        
public function insert_t_pelatihan_lpj($data)
        {
                $this->db->insert('T_PELATIHAN_LPJ', $data);
        }
        
public function insert_t_rab_lpj($data)
        {
                $this->db->insert('T_RAB_LPJ', $data);
        }        
		
		public function insert_temp_kehadiran($data)
        {
                $this->db->insert('TEMP_KEHADIRAN', $data);
		}	
		
		public function select_temp_kehadiran($id_pelatihan)
		{
			$query = $this->db->query("select ID_NASABAH from TEMP_KEHADIRAN where ID_PELATIHAN=$id_pelatihan ");

			return $query->result_array();
			
		}

public function paging_select_kehadiran($param)
        {							
                $query = $this->db->query("EXEC GET_KEHADIRAN @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
				,@COUNT = '".$param["count"]."'
				,@ID_PELATIHAN = '".$param["id_pelatihan"]."'
				");
                return $query->result();
        }
        
public function delete_temp_kehadiran($data)
        {
                $this->db->delete('TEMP_KEHADIRAN', $data);
        }

		public function delete_akbar_gabungan($data)
        {
				$this->db->delete('T_PELATIHAN_AKBAR_GABUNGAN', $data);				
        }

public function paging_kehadiran_select_nasabah_ulamm($param)
        {							
                $query = $this->db->query("EXEC GET_NASABAH @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
				,@SEKTOR_EKONOMI = '".$param["sektor_ekonomi"]."'
				,@JENIS_PINJAMAN = '".$param["jenis_pinjaman"]."'
				,@JENIS_PROGRAM = '".$param["jenis_program"]."'
				,@CABANG = '".$param["cabang"]."'
				,@UNIT = '".$param["unit"]."'
				,@COUNT = '".$param["count"]."'
				,@IDPELATIHAN = '".$param["idpelatihan"]."'
				");
                return $query->result();
        }
public function select_temp_kehadiran_by_idpelatihan($idpelatihan)
        {
                $query = $this->db->query("select * from TEMP_KEHADIRAN where ID_PELATIHAN='".$idpelatihan."' ");
                return $query;
        }
        
public function paging_kehadiran_select_nasabah_mekaar($param)
        {							
                $query = $this->db->query("EXEC GET_DEBITUR @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
				,@COUNT = '".$param["count"]."'
				,@IDPELATIHAN = '".$param["idpelatihan"]."'
				");
                return $query->result();
        }

public function insert_t_non_nasabah($data)
        {
                $this->db->insert('MS_NON_NASABAH', $data);
        }

public function paging_kehadiran_non_nasabah($param)
        {							
                $query = $this->db->query("EXEC GET_NON_NASABAH @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
			    ,@COUNT = '".$param["count"]."'
				");
                return $query->result();
        }
		
public function check_bwmp_approval_proposal($idpelatihan,$tingkat_approval)
{
	$query = $this->db->query("
	IF EXISTS (SELECT 'approved' as APPROVAL FROM T_PELATIHAN A WHERE A.ID=$idpelatihan AND A.JUMLAH_ANGGARAN BETWEEN (SELECT MIN_RAB FROM MS_BWMP WHERE APPROVAL='$tingkat_approval') AND (SELECT MAX_RAB FROM MS_BWMP WHERE APPROVAL='$tingkat_approval'))
	BEGIN
		SELECT 'approved' as APPROVAL 
	END 
	ELSE
	BEGIN
		SELECT 'submitted' as APPROVAL 
	END
	");
	return $query->result()[0]->APPROVAL;
}

public function check_bwmp_approval_lpj($idpelatihan,$tingkat_approval)
{
	$query = $this->db->query("
	IF EXISTS (SELECT 'approved' as APPROVAL FROM T_PELATIHAN_LPJ A WHERE A.ID_PELATIHAN=$idpelatihan AND A.JUMLAH_ANGGARAN BETWEEN (SELECT MIN_RAB FROM MS_BWMP WHERE APPROVAL='$tingkat_approval') AND (SELECT MAX_RAB FROM MS_BWMP WHERE APPROVAL='$tingkat_approval'))
	BEGIN
		SELECT 'lpj_approved' as APPROVAL 
	END 
	ELSE
	BEGIN
		SELECT 'lpj_submitted' as APPROVAL 
	END
	");
	return $query->result()[0]->APPROVAL;
}
		
public function paging_t_pelatihan($param)
{		
	$query = $this->db->query("EXEC GET_PELATIHAN @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
	,@TIPEPELATIHAN = '".$param["tipe_pelatihan"]."'
	,@TIPEBISNIS = '".$param["tipe_bisnis"]."'
	,@IDUSER = '".$this->session->userdata('sess_user_id')."'
	,@COUNT='".$param["count"]."'
	");

	return $query->result();
}		

public function paging_t_project_charter($param)
{
	$query = $this->db->query("EXEC GET_PROJECT_CHARTER @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
	,@TIPE = '".$param["tipe_pelatihan"]."'
	,@IDUSER = '".$this->session->userdata('sess_user_id')."'");
	return $query->result();
}	

public function select_t_project_charter_where($where)
{
	$query = $this->db->get_where('T_PROJECT_CHARTER',$where);	
	return $query->result();
}

public function select_t_project_charter_per_tema($where)
{
	$query = $this->db->distinct()->select('NO_PROJECT_CHARTER,TEMA_PROJECT_CHARTER')->from('T_PROJECT_CHARTER')->where($where);	
	return $query->get()->result();
}

public function select_t_project_charter_by_no_project_charter($no)
{
	$query = $this->db->query("select * from T_PROJECT_CHARTER where NO_PROJECT_CHARTER='".$no."' and AKTIF=1 ");
	return $query->result();
}

public function select_t_project_charter_by_id($id)
{
	$query = $this->db->query("select * from T_PROJECT_CHARTER where ID='".$id."' and AKTIF=1 ");
	return $query->result();
}

public function update_project_charter($data,$where){
	$this->db->update('T_PROJECT_CHARTER', $data,$where);
}	

public function delete_project_charter($where){
	$this->db->delete('T_PROJECT_CHARTER',$where);
}	

public function select_trx_no_reject_find_no_trx_reject($param)
{
        $query = $this->db->select("ID,NO_TRX")->from("TRX_NO_REJECT")->where("AKTIF","1")->like("NO_TRX",$param)->order_by("ID","ASC")->limit(1);
	return $query->get();
}

public function insert_trx_no_reject($data)
{
        $this->db->insert('TRX_NO_REJECT', $data);
}

public function select_t_pelatihan_by_id($id)
{
		$query = $this->db->select("*,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_TIPE,dbo.DESKRIPSI_PROVINSI(PROVINSI) as DESKRIPSI_PROVINSI
		,dbo.DESKRIPSI_REGION(REGIONAL_MEKAAR) as DESKRIPSI_REGION
		,dbo.DESKRIPSI_AREA(AREA_MEKAAR) as DESKRIPSI_AREA
		,dbo.DESKRIPSI_CABANG_MEKAAR(CABANG_MEKAAR) as DESKRIPSI_CABANG_MEKAAR
		,dbo.DESKRIPSI_CABANG_ULAMM(CABANG_ULAMM) as DESKRIPSI_CABANG_ULAMM
		,dbo.DESKRIPSI_UNIT(UNIT_ULAMM) as DESKRIPSI_UNIT
		")->from("T_PELATIHAN")->where("ID",$id);
        return $query->get();     
}

public function select_t_lpj_by_id($id)
{
		$query = $this->db->select("*")->from("T_PELATIHAN_LPJ")->where("ID_PELATIHAN",$id);
		return $query->get();     
}

public function update_aktif_trx_reject($id){
	$this->db->update('TRX_NO_REJECT',array("AKTIF"=>"0"),array("ID"=>$id));
}	



public function cek_korwil_by_id_pelatihan($id){
	$query = $this->db->query("select * FROM MS_USER_CABANG_REGION WHERE ID_GROUP=2 AND KODE_CABANG_REGION=(select CABANG_ULAMM from T_PELATIHAN where ID=$id ) ");
	return $query;   
}	



public function select_pelatihan_pku_akabar_gabungan()
{
		$query = $this->db->select('*')->
		from('T_PELATIHAN_AKBAR_GABUNGAN')->get();				
		
		return $query->result();
}

public function insert_pelatihan_pku_akabar_gabungan($data)
{
		$this->db->insert('T_PELATIHAN_AKBAR_GABUNGAN', $data);
}

public function select_pelatihan_pku_akabar()
{
		$query = $this->db->select('*')->
		from('T_PELATIHAN')->
		where('ID_TIPE=5')->where("STATUS='lpj_approved'")->get();				
		
		return $query->result();
}


public function select_t_pelatihan_where_in_id($id)
{
		$query = $this->db->select('*')->
		from('T_PELATIHAN')->	
		where_in('ID',$id)->get();				
		
		return $query->result();
}

}



?>