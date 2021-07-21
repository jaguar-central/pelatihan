<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    	
    
    {
        $this->is_logged();	        
    	
        $data["content"] = "Dashboard";
		$data["view"] = "dashboard/index";				
		$data["script"] = "dashboard/include/dashboard-script";
		
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["pelatihan"] = $this->Dashboard_model->select_t_pelatihan();
        $data["nasabah_ulamm"] = $this->Dashboard_model->select_nasabah_ulamm();
        $data["nasabah_mekaar"] = $this->Dashboard_model->select_nasabah_mekaar();
        $data["non_nasabah"] = $this->Dashboard_model->select_non_nasabah();				        
        $data["top_ten_sub_sektor_mekaar"] = $this->Dashboard_model->select_top_ten_sektor_mekaar($this->session->userdata('sess_user_cabang'));				        
        $data["top_ten_sub_sektor_ulamm"] = $this->Dashboard_model->select_top_ten_sektor_ulamm($this->session->userdata('sess_user_cabang'));				        
        
        
        // echo '<pre>';
		// print_r($data['top_ten_sub_sektor']);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);
    }

    public function dashboard_index_pemberdayaan()    	    
    {    
    	
        $data["content"] = "Dashboard";		
		$data["script"] = "dashboard/include/dashboard-script-2";
		
        $data["menu"] = $this->Menu_model->select_ms_menu();	
        $data["TOTAL_ULAMM"] = $this->db->query("select SUM(TOTAL_NILAI)/COUNT(*) as TOTAL,COUNT(*) as TOTAL_NASABAH from T_INDEX_PEMBERDAYAAN_ULAMM ")->result()[0];
        $data["TOTAL_MEKAAR"] = $this->db->query("select SUM(TOTAL_NILAI)/COUNT(*) as TOTAL,COUNT(*) as TOTAL_NASABAH from T_INDEX_PEMBERDAYAAN_MEKAAR ")->result()[0];        
        $data["PROVINSI_ULAMM"] = $this->db->query("select TOP 5 PROVINSI,KABUPATEN,ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) AS TOTAL FROM T_INDEX_PEMBERDAYAAN_ULAMM GROUP BY PROVINSI,KABUPATEN ORDER BY ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) DESC")->result();
        $data["PROVINSI_MEKAAR"] = $this->db->query("select TOP 5 PROVINSI,KABUPATEN,ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) AS TOTAL FROM T_INDEX_PEMBERDAYAAN_MEKAAR GROUP BY PROVINSI,KABUPATEN ORDER BY ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) DESC")->result();

        $data["DATA_ULAMM"] = $this->db->query("select TOP 5 * from T_INDEX_PEMBERDAYAAN_ULAMM ORDER BY TOTAL_NILAI DESC")->result();
        $data["DATA_MEKAAR"] = $this->db->query("select TOP 5 * from T_INDEX_PEMBERDAYAAN_MEKAAR ORDER BY TOTAL_NILAI DESC")->result();

        $data["DETAIL_ULAMM"] = $this->db->query("
        SELECT PERTANYAAN,NILAI
        FROM ( 
            SELECT
            SUM(IKUT_PELATIHAN_GRADING) AS IKUT_PELATIHAN_GRADING
            ,SUM(PEMBAYARAN_ANGSURAN) AS PEMBAYARAN_ANGSURAN
            ,SUM(SERAPAN_TENAGA_KERJA) AS SERAPAN_TENAGA_KERJA
            ,SUM(IJIN_USAHA) AS IJIN_USAHA
            ,SUM(DIVERSIFIKASI) AS DIVERSIFIKASI
            ,SUM(STRATEGI_PENJUALAN) AS STRATEGI_PENJUALAN
            ,SUM(JARINGAN_KELOMPOK_USAHA) AS JARINGAN_KELOMPOK_USAHA
            ,SUM(PENGELOLAAN_KEUANGAN) AS PENGELOLAAN_KEUANGAN
            ,SUM(PEMBELIAN_ASSET) AS PEMBELIAN_ASSET
            FROM T_INDEX_PEMBERDAYAAN_ULAMM 
        ) P
        UNPIVOT
        (
        NILAI
        for PERTANYAAN in (IKUT_PELATIHAN_GRADING
        , PEMBAYARAN_ANGSURAN, SERAPAN_TENAGA_KERJA,IJIN_USAHA
        ,DIVERSIFIKASI,STRATEGI_PENJUALAN,JARINGAN_KELOMPOK_USAHA
        ,PENGELOLAAN_KEUANGAN,PEMBELIAN_ASSET)
        ) U;
        ")->result();

        $data["DETAIL_MEKAAR"] = $this->db->query("
        SELECT PERTANYAAN,NILAI
        FROM ( 
            SELECT
            SUM(NILAI_GRADING) AS NILAI_GRADING
            ,SUM(MENABUNG) AS MENABUNG
            ,SUM(PENGELOLAAN_KEUANGAN) AS PENGELOLAAN_KEUANGAN
            ,SUM(OMSET) AS OMSET
            ,SUM(STRATEGI_PENJUALAN) AS STRATEGI_PENJUALAN
            ,SUM(ASSET) AS ASSET
            ,SUM(PERIJINAN_USAHA) AS PERIJINAN_USAHA
            ,SUM(DIVERSIFIKASI) AS DIVERSIFIKASI
            ,SUM(TENAGA_KERJA) AS TENAGA_KERJA
            FROM T_INDEX_PEMBERDAYAAN_MEKAAR
        ) P
        UNPIVOT
        (
          NILAI
          for PERTANYAAN in (NILAI_GRADING
          , MENABUNG, PENGELOLAAN_KEUANGAN,OMSET
          ,STRATEGI_PENJUALAN,ASSET,PERIJINAN_USAHA
          ,DIVERSIFIKASI,TENAGA_KERJA)
        ) U;        
        ")->result();

        $data["CABANG_ULAMM"] = $this->db->query("select TOP 5 (SELECT DESKRIPSI FROM MS_CABANG_ULAMM WHERE KODE_CABANG=A.KODE_CABANG_ULAMM) as CABANG,SUM(A.TOTAL_NILAI)/COUNT(A.TOTAL_NILAI) as TOTAL FROM T_INDEX_PEMBERDAYAAN_ULAMM A 
        GROUP BY A.KODE_CABANG_ULAMM ORDER BY SUM(A.TOTAL_NILAI)/COUNT(A.TOTAL_NILAI) DESC")->result();
        
        $data["CABANG_MEKAAR"] = $this->db->query("select TOP 5 (SELECT DESKRIPSI FROM MS_CABANG_MEKAAR WHERE KODE_CABANG=A.KODE_CABANG_MEKAAR) as CABANG,SUM(A.TOTAL_NILAI)/COUNT(A.TOTAL_NILAI) as TOTAL FROM T_INDEX_PEMBERDAYAAN_MEKAAR A 
        GROUP BY A.KODE_CABANG_MEKAAR ORDER BY SUM(A.TOTAL_NILAI)/COUNT(A.TOTAL_NILAI) DESC")->result();

        $tahun = date('Y');

        $data["U1"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_01_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_01_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U2"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_02_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_02_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U3"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_03_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_03_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U4"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_04_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_04_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U5"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_05_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_05_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U6"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_06_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_06_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U7"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_07_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_07_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U8"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_08_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_08_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U9"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_09_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_09_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U10"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_10_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_10_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U11"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_11_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_11_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U12"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_ULAMM_12_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_ULAMM_12_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        

        $data["M1"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_01_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_01_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M2"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_02_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_02_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M3"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_03_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_03_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M4"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_04_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_04_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M5"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_05_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_05_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M6"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_06_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_06_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M7"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_07_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_07_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M8"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_08_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_08_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M9"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_09_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_09_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M10"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_10_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_10_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M11"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_11_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_11_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M12"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_MEKAAR_12_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_MEKAAR_12_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;


        $data['U_START_MODEL'] = $this->db->query("select C.KATEGORI_STAR_MODEL,COUNT(C.KATEGORI_STAR_MODEL) AS TOTAL FROM T_KEHADIRAN a 
        LEFT JOIN T_PELATIHAN b ON a.ID_PELATIHAN=b.ID 
        LEFT JOIN MS_GRADING c ON b.ID_GRADING=c.ID
        WHERE b.ID_BISNIS='1'
        GROUP BY C.KATEGORI_STAR_MODEL")->result();

        $data['M_START_MODEL'] = $this->db->query("select C.KATEGORI_STAR_MODEL,COUNT(C.KATEGORI_STAR_MODEL) AS TOTAL FROM T_KEHADIRAN a 
        LEFT JOIN T_PELATIHAN b ON a.ID_PELATIHAN=b.ID 
        LEFT JOIN MS_GRADING c ON b.ID_GRADING=c.ID
        WHERE b.ID_BISNIS='2'
        GROUP BY C.KATEGORI_STAR_MODEL")->result();        
        

        // echo '<pre>';
		// print_r($data['ULAMM_1']);
		// echo '</pre>';die;
        // $this->load->view('layout/gabung', $data);

                                                  
        $this->load->view('dashboard/index_pemberdayaan_2',$data);        
                                        
    }


    public function get_index_pemberdayaan_ulamm()
    {
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						
        $data["data"] = $this->Dashboard_model->select_index_pemberdayaan_ulamm($param,0);                
		$param['count'] = 1;				
        $total = $this->Dashboard_model->select_index_pemberdayaan_ulamm($param,1)[0]->JML_DATA;				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);
    }

    public function get_index_pemberdayaan_mekaar()
    {
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						
        $data["data"] = $this->Dashboard_model->select_index_pemberdayaan_mekaar($param,0);                
		$param['count'] = 1;				
        $total = $this->Dashboard_model->select_index_pemberdayaan_mekaar($param,1)[0]->JML_DATA;				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);
    }
}