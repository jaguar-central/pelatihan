<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Nasabah_model extends CI_Model {
	public function paging_select_nasabah_ulamm($param)
        {							
                $query = $this->db->query("EXEC GET_NASABAH @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
				,@SEKTOR_EKONOMI = '".$param["sektor_ekonomi"]."'
				,@JENIS_PINJAMAN = '".$param["jenis_pinjaman"]."'
				,@JENIS_PROGRAM = '".$param["jenis_program"]."'
				,@CABANG = '".$param["cabang"]."'
				,@UNIT = '".$param["unit"]."'
				,@COUNT = '".$param["count"]."'
				");
                return $query->result();
        }
        
        public function paging_select_nasabah_mekaar($param)
        {							
                $query = $this->db->query("EXEC GET_DEBITUR @START = '".$param["start"]."',@LIMIT = '".$param["limit"]."',@SEARCH = '".$param["search"]."'
				,@COUNT = '".$param["count"]."'
				");
                return $query->result();
        }
		

        public function select_non_nasabah_ulamm()
        {
                $query = $this->db->query("select * from MS_NON_NASABAH ");
                return $query->result();
        }
     
}
?>