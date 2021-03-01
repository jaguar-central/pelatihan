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
		$data["script"] = "dashboard/include/dashboard-script";
		
        $data["menu"] = $this->Menu_model->select_ms_menu();	
        $data["TOTAL_ULAMM"] = $this->db->query("select SUM(TOTAL_NILAI)/COUNT(*) as TOTAL from T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=1")->row()->TOTAL;
        $data["TOTAL_MEKAAR"] = $this->db->query("select SUM(TOTAL_NILAI)/COUNT(*) as TOTAL from T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=2")->row()->TOTAL;        
        $data["TOP_ULAMM"] = $this->db->query("select TOP 10 PROVINSI,KABUPATEN,ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) AS TOTAL FROM T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=1 GROUP BY PROVINSI,KABUPATEN ORDER BY ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) DESC")->result();
        $data["BOTTOM_ULAMM"] = $this->db->query("select TOP 10 PROVINSI,KABUPATEN,ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) AS TOTAL FROM T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=1 GROUP BY PROVINSI,KABUPATEN ORDER BY ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) ASC")->result();
        $data["TOP_MEKAAR"] = $this->db->query("select TOP 10 PROVINSI,KABUPATEN,ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) AS TOTAL FROM T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=2 GROUP BY PROVINSI,KABUPATEN ORDER BY ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) DESC")->result();
        $data["BOTTOM_MEKAAR"] = $this->db->query("select TOP 10 PROVINSI,KABUPATEN,ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) AS TOTAL FROM T_INDEX_PEMBERDAYAAN WHERE ID_BISNIS=2 GROUP BY PROVINSI,KABUPATEN ORDER BY ROUND(SUM(TOTAL_NILAI)/COUNT(*),4) ASC")->result();



        $data["CABANG_ULAMM"] = $this->db->query("select TOP 10 (SELECT DESKRIPSI FROM MS_CABANG_ULAMM WHERE KODE_CABANG=A.KODE_CABANG_ULAMM) as CABANG,SUM(A.TOTAL_NILAI)/COUNT(A.TOTAL_NILAI) as TOTAL FROM T_INDEX_PEMBERDAYAAN A where A.ID_BISNIS=1
        GROUP BY A.KODE_CABANG_ULAMM ORDER BY SUM(A.TOTAL_NILAI)/COUNT(A.TOTAL_NILAI) DESC")->result();
        
        $data["CABANG_MEKAAR"] = $this->db->query("select TOP 10 (SELECT DESKRIPSI FROM MS_CABANG_MEKAAR WHERE KODE_CABANG=A.KODE_CABANG_MEKAAR) as CABANG,SUM(A.TOTAL_NILAI)/COUNT(A.TOTAL_NILAI) as TOTAL FROM T_INDEX_PEMBERDAYAAN A where A.ID_BISNIS=2
        GROUP BY A.KODE_CABANG_MEKAAR ORDER BY SUM(A.TOTAL_NILAI)/COUNT(A.TOTAL_NILAI) DESC")->result();

        $tahun = date('Y');

        $data["U1"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_01_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_01_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U2"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_02_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_02_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U3"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_03_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_03_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U4"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_04_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_04_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U5"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_05_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_05_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U6"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_06_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_06_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U7"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_07_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_07_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U8"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_08_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_08_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U9"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_09_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_09_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U10"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_10_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_10_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U11"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_11_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_11_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["U12"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_12_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_12_2021 WHERE ID_BISNIS=1 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        

        $data["M1"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_01_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_01_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M2"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_02_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_02_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M3"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_03_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_03_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M4"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_04_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_04_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M5"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_05_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_05_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M6"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_06_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_06_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M7"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_07_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_07_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M8"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_08_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_08_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M9"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_09_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_09_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M10"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_10_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_10_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M11"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_11_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_11_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["M12"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_12_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_12_2021 WHERE ID_BISNIS=2 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;



        $data["P1"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_01_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_01_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P2"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_02_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_02_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P3"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_03_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_03_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P4"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_04_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_04_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P5"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_05_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_05_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P6"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_06_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_06_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P7"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_07_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_07_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P8"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_08_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_08_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P9"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_09_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_09_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P10"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_10_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_10_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P11"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_11_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_11_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;
        $data["P12"] = $this->db->query("IF OBJECT_ID ('Z_INDEX_PEMBERDAYAAN_12_".$tahun."', 'U') IS NOT NULL select SUM(TOTAL_NILAI)/COUNT(*) AS TOTAL FROM Z_INDEX_PEMBERDAYAAN_12_2021 ELSE SELECT 0 AS TOTAL")->row()->TOTAL;



        // echo '<pre>';
		// print_r($data['ULAMM_1']);
		// echo '</pre>';die;
        // $this->load->view('layout/gabung', $data);

                                                  
        $this->load->view('dashboard/index_pemberdayaan',$data);        
                                        
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