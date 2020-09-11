<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelatihan_model extends CI_Model {
public function select_t_pelatihan()
{
		$query = $this->db->query("select * from T_PELATIHAN  ");
		return $query->result();
}
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

public function insert_t_klasterisasi($data)
{
		$this->db->insert('T_KLASTERISASI', $data);
}

public function insert_t_pelatihan($data)
{
		$this->db->insert('T_PELATIHAN', $data);
}
		
public function insert_t_rab($data)
{
		$this->db->insert('T_RAB', $data);
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
                $query = $this->db->select('*,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE')->from('T_PELATIHAN')->
				where('TIPE_BISNIS','ULAMM')->
				where_in('STATUS',$status)->get();				
                return $query->result();
        }
		
public function select_t_pelatihan_mekaar_by_status($status)
        {
                $query = $this->db->select('*,dbo.DESKRIPSI_PELATIHAN_TYPE(ID_TIPE) as DESKRIPSI_PELATIHAN_TYPE')->from('T_PELATIHAN')->
				where('TIPE_BISNIS','MEKAAR')->
				where_in('STATUS',$status)->get();				
                return $query->result();
        }
		
		
public function insert_t_approval($data)
        {
                $this->db->insert('T_APPROVAL', $data);
        }
		
public function select_t_pelatihan_proposal_by_approval($approval)
        {			
			if ($approval=='' || $approval=='Pinca'){	
                $query = $this->db->query("select * from T_PELATIHAN where STATUS='submitted' and ISNULL(APPROVAL,'')='".$approval."' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ");
			}else{
                $query = $this->db->query("select * from T_PELATIHAN where STATUS='submitted' and ISNULL(APPROVAL,'')='".$approval."' ");				
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
			if ($approval=='' || $approval=='Pinca'){	
                $query = $this->db->query("select * from T_PELATIHAN where STATUS='lpj_submitted' and ISNULL(APPROVAL,'')='".$approval."' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ");			
			}else{				
                $query = $this->db->query("select * from T_PELATIHAN where STATUS='lpj_submitted' and ISNULL(APPROVAL,'')='".$approval."' ");
			}
            return $query->result();
        }

public function insert_t_kehadiran($data)
        {
                $this->db->insert('T_KEHADIRAN', $data);
        }

public function paging_select_kehadiran($param)
        {							
                $query = $this->db->query("EXEC GET_KEHADIRAN @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
				,@COUNT = '".$param["count"]."'
				,@ID_PELATIHAN = '".$param["id_pelatihan"]."'
				");
                return $query->result();
        }
        
public function delete_t_kehadiran($data)
        {
                $this->db->delete('T_KEHADIRAN', $data);
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
public function select_t_kehadiran_by_idpelatihan($idpelatihan)
        {
                $query = $this->db->query("select * from T_KEHADIRAN where ID_PELATIHAN='".$idpelatihan."' ");
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
	IF EXISTS (SELECT 'approved' as APPROVAL FROM T_PELATIHAN A WHERE A.ID=$idpelatihan AND A.BUDGET BETWEEN (SELECT MIN_RAB FROM MS_BWMP WHERE APPROVAL='$tingkat_approval') AND (SELECT MAX_RAB FROM MS_BWMP WHERE APPROVAL='$tingkat_approval'))
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
	,@COUNT = '".$param["count"]."'
	");
	return $query->result();
}		

public function select_t_klasterisasi_by_tipe($tipe)
{
	$query = $this->db->query("select * from T_KLASTERISASI where ID_TIPE_PELATIHAN='".$tipe."' ");
	return $query->result();
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
        $query = $this->db->select("*")->from("T_PELATIHAN")->where("ID",$id);
        return $query->get();     
}

public function update_aktif_trx_reject($id){
	$this->db->update('TRX_NO_REJECT',array("AKTIF"=>"0"),array("ID"=>$id));
}	

}
?>