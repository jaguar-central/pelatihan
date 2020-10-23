<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report_model extends CI_Model {

    public function select_project_charter()
    {
        $query = $this->db->query("select * from T_PROJECT_CHARTER  ");
        return $query->result();
    }


    public function report_detail($bisnis)
    {
        $query = $this->db->query("select A.NASABAH_TIPE,A.ID_NASABAH,A.NAMA,B.CABANG_ULAMM,B.UNIT_ULAMM,B.ID_TIPE,B.NO_PROPOSAL,B.TITLE,B.TANGGAL_MULAI,C.TANGGAL_REALISASI,B.BUDGET,ID_GRADING
        from T_KEHADIRAN A 
        INNER JOIN T_PELATIHAN B ON A.ID_PELATIHAN=B.ID
        INNER JOIN T_PELATIHAN_LPJ C ON A.ID_PELATIHAN=C.ID_PELATIHAN
        where ID_BISNIS=$bisnis
        ");
        return $query->result();
    }

}