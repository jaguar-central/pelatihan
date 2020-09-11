<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu_model extends CI_Model {
	public function select_ms_menu()
        {
			$menu_user = $this->session->userdata('sess_menu_user');
			$query = $this->db->query("SELECT * FROM MS_MENU WHERE MENU_USER = '".$menu_user."' ");
			return $query->result();
        }
        
        public function select_ms_sub_menu_by_id($menuid)
        {
                $query = $this->db->query("select * from MS_SUB_MENU where ID_MS_MENU = '".$menuid."' ");
                return $query->result();
        }
}
?>