<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report_model extends CI_Model {

    public function select_project_charter_ulamm()
    {
        $query = $this->db->query("select * from T_PROJECT_CHARTER where ID_TIPE_PELATIHAN IN (select ID from MS_PELATIHAN_TYPE where BISNIS='ULAMM') AND AKTIF=1 ");  
        return $query->result();
    }

    public function select_project_charter_mekaar()
    {
        $query = $this->db->query("select * from T_PROJECT_CHARTER where ID_TIPE_PELATIHAN IN (select ID from MS_PELATIHAN_TYPE where BISNIS='MEKAAR') AND AKTIF=1 ");
        return $query->result();
    } 
    
    public function select_agenda_tunm()
    {
        $query = $this->db->query(" select *,dbo.DESKRIPSI_CABANG_MEKAAR (CABANG_MEKAAR) as cabang_mekaar from T_PELATIHAN where ID_TIPE = 9 AND STATUS <> 'reject' ");
        return $query->result();
    }

    public function select_agenda_tunu()
    {
        $query = $this->db->query(" select * from T_PELATIHAN where ID_TIPE = 1 AND STATUS <> 'reject' ");
        return $query->result();
    }


    public function report_detail($bisnis)
    {
        $query = $this->db->query("select A.NASABAH_TIPE,A.ID_NASABAH,A.NAMA,dbo.WILAYAH_BY_KODE_CABANG(B.CABANG_ULAMM) as WILAYAH,B.CABANG_ULAMM,B.UNIT_ULAMM,B.REGIONAL_MEKAAR,B.AREA_MEKAAR,B.CABANG_MEKAAR,dbo.DESKRIPSI_PELATIHAN_TYPE(B.ID_TIPE) TIPE_PELATIHAN_DESKRIPSI,B.NO_PROPOSAL,B.TITLE,B.TANGGAL_MULAI,C.TANGGAL_REALISASI_MULAI,B.BUDGET,dbo.DESKRIPSI_GRADING(ID_GRADING) as GRADING,dbo.GRADING_KELAS_WARNA(B.ID_GRADING) as KELAS_WARNA
        ,dbo.GET_TEMA_PELATIHAN(B.ID_GRADING) AS TEMA_PELATIHAN
        ,dbo.DESKRIPSI_SEKTOR_EKONOMI(A.ID_SEKTOR_EKONOMI,BISNIS) AS SEKTOR_EKONOMI
        ,A.ID_TIPE_KREDIT AS TIPE_KREDIT
        ,A.PLAFOND
        from T_KEHADIRAN A 
        INNER JOIN T_PELATIHAN B ON A.ID_PELATIHAN=B.ID
        INNER JOIN T_PELATIHAN_LPJ C ON A.ID_PELATIHAN=C.ID_PELATIHAN
        where ID_BISNIS=$bisnis and B.STATUS='lpj_approved'
        ");
        return $query->result();
    }

    public function report_rekap_ulamm()
    {
        $query = $this->db->query("
        SELECT A.KODE_CABANG,A.DESKRIPSI,B1.TUNU_PELATIHAN,B.TUNU_PESERTA,C1.TUNCA_PELATIHAN,C.TUNCA_PESERTA,D1.SEKTORAL_PELATIHAN,D.SEKTORAL_PESERTA,E1.TERITORIAL_PELATIHAN,E.TERITORIAL_PESERTA,F1.PAMERAN_PELATIHAN,F.PAMERAN_PESERTA,G1.AKBAR_PELATIHAN,G.AKBAR_PESERTA,H1.AKBAR_W_PELATIHAN,H.AKBAR_W_PESERTA,I1.AKBAR_N_PELATIHAN,I.AKBAR_N_PESERTA,K1.REALISASI_BERJALAN_PELATIHAN,J1.REALISASI_AKUMULASI_PELATIHAN,K.REALISASI_BERJALAN_PESERTA,J.REALISASI_AKUMULASI_PESERTA,L.AKBAR_G_PESERTA,L1.AKBAR_G_PELATIHAN FROM MS_CABANG_ULAMM A 
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) TUNU_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=1			 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) B ON A.KODE_CABANG=B.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) TUNCA_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=2			 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) C ON A.KODE_CABANG=C.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) SEKTORAL_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=3	 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) D ON A.KODE_CABANG=D.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) TERITORIAL_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=4 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) E ON A.KODE_CABANG=E.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) PAMERAN_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=6		 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) F ON A.KODE_CABANG=F.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) AKBAR_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=5			 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) G ON A.KODE_CABANG=G.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) AKBAR_W_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=5		 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) H ON A.KODE_CABANG=H.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) AKBAR_N_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=5		 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) I ON A.KODE_CABANG=I.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) REALISASI_AKUMULASI_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE in (1,2,3,4,5,6)		and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) J ON A.KODE_CABANG=J.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) REALISASI_BERJALAN_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE in (1,2,3,4,5,6) and T_PELATIHAN.TANGGAL_MULAI=GETDATE()	and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) K ON A.KODE_CABANG=K.CABANG_ULAMM      
        
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) TUNU_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=1 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) B1 ON A.KODE_CABANG=B1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) TUNCA_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=2 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) C1 ON A.KODE_CABANG=C1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) SEKTORAL_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=3 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) D1 ON A.KODE_CABANG=D1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) TERITORIAL_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=4 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) E1 ON A.KODE_CABANG=E1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) PAMERAN_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=6 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) F1 ON A.KODE_CABANG=F1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) AKBAR_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=5 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) G1 ON A.KODE_CABANG=G1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) AKBAR_W_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=5 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) H1 ON A.KODE_CABANG=H1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) AKBAR_N_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=5 and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) I1 ON A.KODE_CABANG=I1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) REALISASI_AKUMULASI_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE in (1,2,3,4,5,6) and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) J1 ON A.KODE_CABANG=J1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) REALISASI_BERJALAN_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE in (1,2,3,4,5,6) and T_PELATIHAN.ID_BISNIS=1 and T_PELATIHAN.STATUS='lpj_approved' and T_PELATIHAN.TANGGAL_MULAI=GETDATE() GROUP BY T_PELATIHAN.CABANG_ULAMM) K1 ON A.KODE_CABANG=K1.CABANG_ULAMM      

        LEFT JOIN (SELECT 'PUSAT' as KODE_CABANG,COUNT(ID) AKBAR_G_PESERTA FROM T_KEHADIRAN WHERE ID_PELATIHAN in (SELECT * FROM dbo.Split(',',(SELECT TOP 1 ID = STUFF((SELECT '' +ID_PELATIHAN FROM T_PELATIHAN_AKBAR_GABUNGAN FOR XML PATH('')), 1, 1, '') FROM T_PELATIHAN_AKBAR_GABUNGAN)))) L ON A.KODE_CABANG=L.KODE_CABANG
        LEFT JOIN (SELECT 'PUSAT' as KODE_CABANG,COUNT(ID) AKBAR_G_PELATIHAN  FROM T_PELATIHAN_AKBAR_GABUNGAN) L1 ON A.KODE_CABANG=L1.KODE_CABANG
        
        ");
        return $query->result();
    }      

    public function report_rekap_mekaar()
    {
        $query = $this->db->query("
        SELECT A.KODE_CABANG,A.DESKRIPSI,B1.PPNM_PELATIHAN,B.PPNM_PESERTA,C1.TUNM_PELATIHAN,C.TUNM_PESERTA,D1.SEKTORAL_PELATIHAN,D.SEKTORAL_PESERTA,E1.TERITORIAL_PELATIHAN,E.TERITORIAL_PESERTA,F1.SINERGI_PELATIHAN,F.SINERGI_PESERTA,H1.REALISASI_BERJALAN_PELATIHAN,G1.REALISASI_AKUMULASI_PELATIHAN,H.REALISASI_BERJALAN_PESERTA,G.REALISASI_AKUMULASI_PESERTA FROM MS_CABANG_ULAMM A 
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) PPNM_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=8			  and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) B ON A.KODE_CABANG=B.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) TUNM_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=9			  and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) C ON A.KODE_CABANG=C.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) SEKTORAL_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=11	  and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) D ON A.KODE_CABANG=D.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) TERITORIAL_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=10 and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) E ON A.KODE_CABANG=E.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) SINERGI_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=12		  and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) F ON A.KODE_CABANG=F.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) REALISASI_AKUMULASI_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE in (8,9,10,11,12)		and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) G ON A.KODE_CABANG=G.CABANG_ULAMM
        LEFT JOIN (SELECT COUNT(T_KEHADIRAN.ID) REALISASI_BERJALAN_PESERTA,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN LEFT JOIN T_KEHADIRAN ON T_PELATIHAN.ID=T_KEHADIRAN.ID_PELATIHAN WHERE T_PELATIHAN.ID_TIPE in (8,9,10,11,12) and T_PELATIHAN.TANGGAL_MULAI=GETDATE()	and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) H ON A.KODE_CABANG=H.CABANG_ULAMM
        
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) PPNM_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=8 and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) B1 ON A.KODE_CABANG=B1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) TUNM_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=9 and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) C1 ON A.KODE_CABANG=C1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) SEKTORAL_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=11 and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) D1 ON A.KODE_CABANG=D1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) TERITORIAL_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=10 and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) E1 ON A.KODE_CABANG=E1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) SINERGI_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE=12 and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) F1 ON A.KODE_CABANG=F1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) REALISASI_AKUMULASI_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE in (8,9,10,11,12) and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) G1 ON A.KODE_CABANG=G1.CABANG_ULAMM      
        LEFT JOIN (SELECT COUNT(T_PELATIHAN.ID) REALISASI_BERJALAN_PELATIHAN,T_PELATIHAN.CABANG_ULAMM FROM T_PELATIHAN WHERE T_PELATIHAN.ID_TIPE in (8,9,10,11,12) and T_PELATIHAN.ID_BISNIS=2 and T_PELATIHAN.TANGGAL_MULAI=GETDATE() and T_PELATIHAN.STATUS='lpj_approved' GROUP BY T_PELATIHAN.CABANG_ULAMM) H1 ON A.KODE_CABANG=H1.CABANG_ULAMM      
        
        ");
        return $query->result();
    }    
    


}