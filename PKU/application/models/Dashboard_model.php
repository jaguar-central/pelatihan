<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model {

	public function select_t_pelatihan()
        {
                $query = $this->db->query("select count(*) as pelatihan_selesai from T_PELATIHAN where STATUS = 'lpj_approved' ");
                return $query->row()->pelatihan_selesai;
        }

        public function select_t_kehadiran()
        {
                $query = $this->db->query("select count(*) as jumlah_kehadiran from T_KEHADIRAN ");
                return $query->row()->jumlah_kehadiran;
        }

        public function select_t_jumlah_nasabah()
        {
                $query = $this->db->query("select count(*) as jumlah_nasabah from T_KEHADIRAN where NASABAH_TIPE = 'NASABAH' ");
                return $query->row()->jumlah_nasabah;
        }

        public function select_t_non_nasabah()
        {
                $query = $this->db->query("select count(*) as jumlah_non_nasabah from T_KEHADIRAN where NASABAH_TIPE = 'NON_NASABAH' ");
                return $query->row()->jumlah_non_nasabah;
        }
     
}
?>