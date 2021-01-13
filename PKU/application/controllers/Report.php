<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function agenda_klasterisasi_ulamm()    	    
    {
        $this->is_logged();		
        
        
    	
        $data["content"] = "Report";
		$data["view"] = "report/agenda/agenda_klasterisasi_ulamm";	
        $data["script"] = "report/agenda/include/agenda_klasterisasi-script";
        
        

        $data["menu"] = $this->Menu_model->select_ms_menu();       
        $data["project_charter"] =$this->Report_model->select_project_charter_ulamm();

        // echo '<pre>';
		// print_r($data['agenda']);
        // echo '</pre>';die;
        
        // var_dump($data);die();
        $this->load->view('layout/gabung', $data);
    }    

    public function agenda_klasterisasi_mekaar()    	    
    {
        $this->is_logged();		
        
        
    	
        $data["content"] = "Report";
		$data["view"] = "report/agenda/agenda_klasterisasi_mekaar";	
        $data["script"] = "report/agenda/include/agenda_klasterisasi-script";
        
        

        $data["menu"] = $this->Menu_model->select_ms_menu();       
        $data["project_charter"] =$this->Report_model->select_project_charter_mekaar();

        // echo '<pre>';
		// print_r($data['agenda']);
        // echo '</pre>';die;
        
        // var_dump($data);die();
        $this->load->view('layout/gabung', $data);
    }
    
    
    public function agenda_tunu()    	    
    {
        $this->is_logged();		
        
        
    	
        $data["content"] = "Report";
		$data["view"] = "report/agenda/agenda_tunu";	
        $data["script"] = "report/agenda/include/agenda-tunu-script";
        
        

        $data["menu"] = $this->Menu_model->select_ms_menu();       
        $data["project_charter"] =$this->Report_model->select_agenda_tunu();

        // echo '<pre>';
		// print_r($data['agenda']);
        // echo '</pre>';die;
        
        // var_dump($data);die();
        $this->load->view('layout/gabung', $data);
    }


    public function agenda_tunm()    	    
    {
        $this->is_logged();		
        
        
    	
        $data["content"] = "Report";
		$data["view"] = "report/agenda/agenda_tunm";	
        $data["script"] = "report/agenda/include/agenda-tunm-script";
        
        

        $data["menu"] = $this->Menu_model->select_ms_menu();       
        $data["project_charter"] =$this->Report_model->select_agenda_tunm();

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