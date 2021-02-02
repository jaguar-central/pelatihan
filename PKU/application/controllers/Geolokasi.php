<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Geolokasi extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    	
    
    {
		$this->is_logged();		
    	
        $data["content"] = "Geolokasi";
		$data["view"] = "geolokasi/index";	
		$data["script"] = "geolokasi/include/geolokasi-script";
		
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["lokasi"] = $this->Geolokasi_model->select_trx_geolocation()->result();
     
        // echo '<pre>';
		// print_r($data['lokasi']);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);
    }
}