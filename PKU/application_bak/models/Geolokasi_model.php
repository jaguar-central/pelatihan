<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Geolokasi_model extends CI_Model {

    public function select_trx_geolocation()
    {
		$query = $this->db->select("*,CONCAT(LATITUDE,' ',LONGITITUDE) AS KOOR")->from("TRX_GEOLOCATION");
		return $query->get(); 
    }

}