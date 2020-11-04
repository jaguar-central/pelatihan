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
		$data["view"] = "report/agenda/agenda_klasterisasi";	
        $data["script"] = "report/agenda/include/agenda_klasterisasi-script";
        
        

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

    public function report_detail_ulamm()    	    
    {
        $this->is_logged();	

        $data["content"] = "Report";
		$data["view"] = "report/detail_ulamm/detail_ulamm";	
        $data["script"] = "report/detail_ulamm/include/detail-ulamm-script";     
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["report"] = $this->Report_model->report_detail(1);        

        $this->load->view('layout/gabung', $data);
    }    

    public function report_detail_mekaar()    	    
    {
        $this->is_logged();	

        $data["content"] = "Report";
		$data["view"] = "report/detail_mekaar/detail_mekaar";	
        $data["script"] = "report/detail_mekaar/include/detail-mekaar-script";     
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["report"] = $this->Report_model->report_detail(2);        

        $this->load->view('layout/gabung', $data);
    }     

    public function report_rekap_ulamm()    	    
    {
        $this->is_logged();	

        $data["content"] = "Report";
		$data["view"] = "report/rekap_ulamm/rekap_ulamm";	
        $data["script"] = "report/rekap_ulamm/include/rekap-ulamm-script";     
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["report"] = $this->Report_model->report_rekap_ulamm();        

        $this->load->view('layout/gabung', $data);
    }      

    public function report_rekap_mekaar()    	    
    {
        $this->is_logged();	

        $data["content"] = "Report";
		$data["view"] = "report/rekap_mekaar/rekap_mekaar";	
        $data["script"] = "report/rekap_mekaar/include/rekap-mekaar-script";     
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["report"] = $this->Report_model->report_rekap_mekaar();        

        $this->load->view('layout/gabung', $data);
    }      
}