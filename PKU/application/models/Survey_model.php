<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Survey_model extends CI_Model {

    public function select_t_survey()
    {
		$query = $this->db->query("select 
        JENIS_NASABAH
        ,ID_NASABAH
        ,NAMA_NASABAH
        ,JENIS_USAHA
        ,ALAMAT_NASABAH
        ,TELP_NASABAH
        ,PLAFOND
        ,AKTIF
        ,dbo.DESKRIPSI_SURVEY_JAWABAN(1,JUMLAH_PLAFON_MENINGKAT) P1
        ,dbo.DESKRIPSI_SURVEY_JAWABAN(2,PRODUK_USAHA_BERTAMBAH) P2
        ,dbo.DESKRIPSI_SURVEY_JAWABAN(3,JUMLAH_PENDAPATAN_PERBULAN_MENINGKAT) P3
        ,dbo.DESKRIPSI_SURVEY_JAWABAN(4,PENAMBAHAN_SERAPAN_TENAGA_KERJA) P4
        ,dbo.DESKRIPSI_SURVEY_JAWABAN(5,PENAMBAHAN_IZIN_USAHA_LAIN) P5 
        from T_SURVEY_PKU where AKTIF = '1'");
		return $query->result();
    }    

    public function insert_t_survey($data)
    {
		$this->db->insert('T_SURVEY_PKU', $data);
    }

    public function select_t_survey_by_id($id)
    {
		$query = $this->db->query("select * from T_SURVEY_PKU where ID_NASABAH = '".$id."'");
		return $query->result();
    }

    public function update_t_survey($data,$where){
        $this->db->update('T_SURVEY_PKU', $data,$where);
    }	
}