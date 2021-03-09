<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pkm_model extends CI_Model {

    public function insert_t_pkm_bermakna($data)
    {
            $this->db->insert('T_PKM_BERMAKNA', $data);
    }

    public function insert_t_pkm_survey($data)
    {
            $this->db->insert('T_PKM_SURVEY', $data);
    }

    public function update_t_pkm_survey($data,$where)
    {
            $this->db->update('T_PKM_SURVEY', $data,$where);
    }    

}
