<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function agenda_klasterisasi()    	    
    {
        $this->is_logged();		
        
        
    	
        $data["content"] = "Report";
		$data["view"] = "report/agenda_klasterisasi";	
        $data["script"] = "report/include/agenda_klasterisasi-script";
        
        

        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["latihan"] = $this->Dashboard_model->select_t_pelatihan();
        $data["kehadiran"] = $this->Dashboard_model->select_t_kehadiran();
        $data["nasabah"] = $this->Dashboard_model->select_t_jumlah_nasabah();
        $data["non_nasabah"] = $this->Dashboard_model->select_t_non_nasabah();        
        $data["project_charter"] =$this->Report_model->select_project_charter();

        // echo '<pre>';
		// print_r($data['agenda']);
        // echo '</pre>';die;
        
        // var_dump($data);die();
        $this->load->view('layout/gabung', $data);
    }    
}