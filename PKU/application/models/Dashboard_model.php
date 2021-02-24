<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model {

	public function select_t_pelatihan()
        {
                $query = $this->db->query("select count(*) as pelatihan_selesai from T_PELATIHAN where STATUS = 'lpj_approved' and CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ");
                return $query->row()->pelatihan_selesai;
        }

        // public function select_t_kehadiran()
        // {
        //         $query = $this->db->query("select count(*) as jumlah_kehadiran from T_KEHADIRAN where ID_PELATIHAN in (SELECT ID FROM T_PELATIHAN WHERE CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ) ");
        //         return $query->row()->jumlah_kehadiran;
        // }

        // public function select_t_jumlah_nasabah()
        // {
        //         $query = $this->db->query("select count(*) as jumlah_nasabah from T_KEHADIRAN where NASABAH_TIPE = 'NASABAH' and ID_PELATIHAN in (SELECT ID FROM T_PELATIHAN WHERE CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ) ");
        //         return $query->row()->jumlah_nasabah;
        // }

        public function select_non_nasabah()
        {
                $query = $this->db->query("select count(*) as jumlah_non_nasabah from T_KEHADIRAN where NASABAH_TIPE = 'NON_NASABAH' and ID_PELATIHAN in (SELECT ID FROM T_PELATIHAN WHERE CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ) ");
                return $query->row()->jumlah_non_nasabah;
        }

        public function select_nasabah_ulamm()
        {
                $query = $this->db->query("select count(*) as jumlah_kehadiran from T_KEHADIRAN where BISNIS = 'ULAMM' and ID_PELATIHAN in (SELECT ID FROM T_PELATIHAN WHERE CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ) ");
                return $query->row()->jumlah_kehadiran;
        }        

        public function select_nasabah_mekaar()
        {
                $query = $this->db->query("select count(*) as jumlah_kehadiran from T_KEHADIRAN where BISNIS = 'MEKAAR' and ID_PELATIHAN in (SELECT ID FROM T_PELATIHAN WHERE CABANG_ULAMM in (SELECT KODE_CABANG_REGION FROM MS_USER_CABANG_REGION WHERE ID_USER=".$this->session->userdata('sess_user_id')." ) ) ");
                return $query->row()->jumlah_kehadiran;
        }        

        public function select_top_ten_sektor_mekaar($kode_cabang)
        {
                $query = $this->db->query("EXEC dbo.GET_TOP_SUBSEKTOR_MEKAAR_BY_KODE_CABANG_ULAMM '".$kode_cabang."' ");
                return $query->result_array();                
        }        

        public function select_top_ten_sektor_ulamm($kode_cabang)
        {
                $query = $this->db->query("EXEC dbo.GET_TOP_SUBSEKTOR_ULAMM '".$kode_cabang."' ");
                return $query->result_array();                
        }   
        
        public function select_index_pemberdayaan_ulamm($param,$count)
        {
                if ($count==1){
                        $query = $this->db->query("select COUNT(*) AS JML_DATA FROM T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=1 ");
                }else{
                        $query = $this->db->query("select * from T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=1 ORDER BY ID DESC OFFSET ".$param['start']." ROWS FETCH NEXT ".$param['limit']." ROWS ONLY");                
                }
               
                return $query->result(); 
        }

        public function select_index_pemberdayaan_mekaar($param,$count)
        {
                if ($count==1){
                        $query = $this->db->query("select COUNT(*) AS JML_DATA FROM T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=2 AND NILAI_GRADING!=0 ");
                }else{
                        $query = $this->db->query("select * from T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=2 AND NILAI_GRADING!=0 ORDER BY ID DESC OFFSET ".$param['start']." ROWS FETCH NEXT ".$param['limit']." ROWS ONLY");                
                }
               
                return $query->result(); 
        }
     
}

