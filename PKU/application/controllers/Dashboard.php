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
}