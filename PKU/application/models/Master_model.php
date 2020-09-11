<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_model extends CI_Model {
	public function select_ms_user()
        {
                $query = $this->db->query("select * from MS_USER  ");
                return $query->result();
        }
    public function select_ms_cabang_ulamm()
        {
                $query = $this->db->query("select * from MS_CABANG_ULAMM  ");
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

    public function select_dw_nasabah_ulamm_sektor_ekonomi()
        {
                $query = $this->db->query("SELECT DISTINCT SEKTOR_EKONOMI FROM [ITD_DW].dbo.nasabah_data_vdp WHERE ISNULL(SEKTOR_EKONOMI,'')<>'' order by SEKTOR_EKONOMI");
                return $query->result();
        }

    public function select_dw_nasabah_ulamm_jenis_pinjaman()
        {
                $query = $this->db->query("SELECT DISTINCT Jenis_pinjaman FROM [ITD_DW].dbo.nasabah_data_vdp WHERE ISNULL(Jenis_pinjaman,'')<>'' order by Jenis_pinjaman");
                return $query->result();
        }

    public function select_dw_nasabah_ulamm_jenis_program()
        {
                $query = $this->db->query("SELECT DISTINCT Jenis_program FROM [ITD_DW].dbo.nasabah_data_vdp WHERE ISNULL(Jenis_program,'')<>'' order by Jenis_program");
                return $query->result();
        }		
		
    public function notification(){
			if ($this->session->userdata('sess_user_id_user_group')=='2'){
				$approval = "'''',''Kadiv''";				
                return $this->db->query(" EXEC [GET_NOTIF] @APPROVAL='".$approval."',@IDUSER='".$this->session->userdata('sess_user_id')."',@IDBINIS='".$this->session->userdata('sess_user_id_bisnis')."' ")->result();				
            }
            else if	($this->session->userdata('sess_user_id_user_group')=='3'){
				$approval = "''Pinca''";
                return $this->db->query(" EXEC [GET_NOTIF] @APPROVAL='".$approval."',@IDUSER='".$this->session->userdata('sess_user_id')."',@IDBINIS='".$this->session->userdata('sess_user_id_bisnis')."' ")->result();
            }			
            else if	($this->session->userdata('sess_user_id_user_group')=='4'){
				$approval = "''PIC Pusat''";
				return $this->db->query(" EXEC [GET_NOTIF] @APPROVAL='".$approval."' ")->result();
            }
            else if	($this->session->userdata('sess_user_id_user_group')=='5'){
				$approval = "''Kabag''";
                return $this->db->query(" EXEC [GET_NOTIF] @APPROVAL='".$approval."' ")->result();
            }
            else if	($this->session->userdata('sess_user_id_user_group')=='6'){
				$approval = "''Wakadiv''";
                return $this->db->query(" EXEC [GET_NOTIF] @APPROVAL='".$approval."' ")->result();
            }
            else if	($this->session->userdata('sess_user_id_user_group')=='7'){
				$approval = "''Kadiv''";
                return $this->db->query(" EXEC [GET_NOTIF] @APPROVAL='".$approval."' ")->result();
            }            
                	
	}
	
    public function notification_count(){
		if ($this->session->userdata('sess_user_id_user_group')=='2'){
			$approval = "'''',''Kadiv''";			
			return $this->db->query(" EXEC [GET_NOTIF] @APPROVAL='".$approval."',@IDUSER='".$this->session->userdata('sess_user_id')."',@IDBINIS='".$this->session->userdata('sess_user_id_bisnis')."',@COUNT=1 ")->result()[0]->COUNT_NOTIF;			
        }
        else if ($this->session->userdata('sess_user_id_user_group')=='3'){
			$approval = "''Pinca''";
			return $this->db->query(" EXEC [GET_NOTIF] @APPROVAL='".$approval."',@IDUSER='".$this->session->userdata('sess_user_id')."',@IDBINIS='".$this->session->userdata('sess_user_id_bisnis')."',@COUNT=1 ")->result()[0]->COUNT_NOTIF;
        }		
        else if ($this->session->userdata('sess_user_id_user_group')=='4'){
			$approval = "''PIC Pusat''";
			return $this->db->query("EXEC [GET_NOTIF] @APPROVAL='".$approval."',@COUNT=1 ")->result()[0]->COUNT_NOTIF;
        }
        else if ($this->session->userdata('sess_user_id_user_group')=='5'){
			$approval = "''Kabag''";
			return $this->db->query("EXEC [GET_NOTIF] @APPROVAL='".$approval."',@COUNT=1 ")->result()[0]->COUNT_NOTIF;
        }
        else if ($this->session->userdata('sess_user_id_user_group')=='6'){
			$approval = "''Wakadiv''";
			return $this->db->query("EXEC [GET_NOTIF] @APPROVAL='".$approval."',@COUNT=1 ")->result()[0]->COUNT_NOTIF;
        }
        else if ($this->session->userdata('sess_user_id_user_group')=='7'){
			$approval = "''Kadiv''";
			return $this->db->query("EXEC [GET_NOTIF] @APPROVAL='".$approval."',@COUNT=1 ")->result()[0]->COUNT_NOTIF;
        }        
                
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
}
?>