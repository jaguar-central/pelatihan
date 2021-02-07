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
        
        // echo '<pre>';
		// print_r($data['TOP_MEKAAR']);
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