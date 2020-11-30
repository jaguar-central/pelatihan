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
		$query = $this->db->query("select * from MS_PELATIHAN_TYPE where bisnis = 'ULAMM' ");
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
        
public function insert_t_dokumen($data)
        {
                $this->db->insert('T_DOKUMEN', $data);
        }	
public function update_t_pelatihan($data,$where){
	$this->db->update('T_PELATIHAN', $data,$where);
}	

public function select_t_pelatihan_ulamm_by_status($status)
{
		$query = $this->db->select('*,CONVERT(VARCHAR(17),TANGGAL_MULAI,113) as MULAI,CONVERT(VARCHAR(17),TANGGAL_SELESAI,113) as SELESAI,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE')->from('T_PELATIHAN')->
		where('ID_BISNIS','1')->
		where(" CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ")->
		where_in('STATUS',$status)->get();				
		
		return $query->result();
}
		
public function select_t_pelatihan_mekaar_by_status($status)
        {
                $query = $this->db->select('*,CONVERT(VARCHAR(17),TANGGAL_MULAI,113) as MULAI,CONVERT(VARCHAR(17),TANGGAL_SELESAI,113) as SELESAI,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE')->from('T_PELATIHAN')->
				where('ID_BISNIS','2')->
				where(" CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ")->
				where_in('STATUS',$status)->get();				
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
		
public function select_t_pelatihan_proposal_by_approval($approval)
        {			
			if ($approval==''){ //pinca dan pic pusat mekaar
				$query = $this->db->query("select *,dbo.ID_JENIS_NASABAH(ID_GRADING) as ID_JENIS_NASABAH,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE from T_PELATIHAN where ID_BISNIS=".$this->session->userdata('sess_user_id_bisnis')." and STATUS='submitted' and ISNULL(APPROVAL,'')='".$approval."' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ");			
			}else if ($approval=='Pinca'){	//pic pusat	ulamm
				$query = $this->db->query("
				select *,dbo.ID_JENIS_NASABAH(ID_GRADING) as ID_JENIS_NASABAH,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE from T_PELATIHAN where ID_BISNIS=1 and STATUS='submitted' and ISNULL(APPROVAL,'')='".$approval."' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) 				
				");
			}else if ($approval=='PIC Pusat'){	//kabag
				$query = $this->db->query("select *,dbo.ID_JENIS_NASABAH(ID_GRADING) as ID_JENIS_NASABAH,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE from T_PELATIHAN where ID_BISNIS=".$this->session->userdata('sess_user_id_bisnis')." and STATUS='submitted' and ISNULL(APPROVAL,'')='".$approval."' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ");				
			}else{
                $query = $this->db->query("select *,dbo.ID_JENIS_NASABAH(ID_GRADING) as ID_JENIS_NASABAH,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE from T_PELATIHAN where STATUS='submitted' and ISNULL(APPROVAL,'')='".$approval."' ");				
			}
				
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
        
public function select_t_pelatihan_lpj_by_approval($approval)
        {			
			if ($approval==''){ //pinca dan pic pusat mekaar
				$query = $this->db->query("select *,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE from T_PELATIHAN where ID_BISNIS=".$this->session->userdata('sess_user_id_bisnis')." and STATUS='lpj_submitted' and ISNULL(APPROVAL,'')='".$approval."' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ");			
			}else if ($approval=='Pinca'){	//pic pusat ulamm
				$query = $this->db->query("
				select *,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE from T_PELATIHAN where ID_BISNIS=1 and STATUS='lpj_submitted' and ISNULL(APPROVAL,'')='".$approval."' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) 
				");
			}else if ($approval=='PIC Pusat'){	//kabag
				$query = $this->db->query("select *,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE from T_PELATIHAN where ID_BISNIS=".$this->session->userdata('sess_user_id_bisnis')." and STATUS='lpj_submitted' and ISNULL(APPROVAL,'')='".$approval."' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ");				
			}else{
                $query = $this->db->query("select *,dbo.MENIT_TO_JAM(DURASI_PELATIHAN) as JAM_MENIT,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE from T_PELATIHAN where STATUS='lpj_submitted' and ISNULL(APPROVAL,'')='".$approval."' ");				
			}
				
            return $query->result();			
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
	IF EXISTS (SELECT 'approved' as APPROVAL FROM T_PELATIHAN A WHERE A.ID=$idpelatihan AND A.BUDGET BETWEEN (SELECT MIN_RAB FROM MS_BWMP WHERE APPROVAL='$tingkat_approval') AND (SELECT MAX_RAB FROM MS_BWMP WHERE APPROVAL='$tingkat_approval'))
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
	");

	return $query->result();
}		

public function paging_t_project_charter($param)
{
	$query = $this->db->query("EXEC GET_PROJECT_CHARTER @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
	,@TIPE = '".$param["tipe_pelatihan"]."'
	,@IDUSER = '".$this->session->userdata('sess_user_id')."'
	");
	return $query->result();
}	

public function select_t_project_charter_where($where)
{
	$query = $this->db->get_where('T_PROJECT_CHARTER',$where);	
	return $query->result();
}

public function select_t_project_charter_by_id_project_charter($id)
{
	$query = $this->db->query("select * from T_PROJECT_CHARTER where ID_PROJECT_CHARTER='".$id."' and AKTIF=1 ");
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

}
?>