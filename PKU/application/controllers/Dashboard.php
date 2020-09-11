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
		//$data["script"] = "pelatihan/include/list-script";
		
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["latihan"] = $this->Dashboard_model->select_t_pelatihan();
        $data["kehadiran"] = $this->Dashboard_model->select_t_kehadiran();
        $data["nasabah"] = $this->Dashboard_model->select_t_jumlah_nasabah();
        $data["non_nasabah"] = $this->Dashboard_model->select_t_non_nasabah();		
		
        //$data["nasabah"] = $this->Dashboard_model->trpelatihanparticipant();

        //echo '<pre>';
		//print_r($data['menu']);
		//echo '</pre>';die;
        $this->load->view('layout/gabung', $data);
    }
}