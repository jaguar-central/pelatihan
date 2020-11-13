<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report_model extends CI_Model {

    public function select_project_charter()
    {
            $query = $this->db->query("select * from T_PROJECT_CHARTER  ");
            return $query->result();
    }

}