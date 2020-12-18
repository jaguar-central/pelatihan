<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Nasabah extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    public function nasabah_ulamm()    	    
    {		
		$this->is_logged();		
		
		
    	
        $data["content"] = "Nasabah";
        $data["view"] = "nasabah/ulamm";
		$data["script"] = "nasabah/include/ulamm-script";
        $data["menu"] = $this->Menu_model->select_ms_menu();
        

        //echo '<pre>';
		//print_r($data['menu']);
		//echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

	}
	
	public function nasabah_mekaar()    	    
    {		
		$this->is_logged();		
		
		
    	
        $data["content"] = "Nasabah";
        $data["view"] = "nasabah/mekaar";
		$data["script"] = "nasabah/include/mekaar-script";
        $data["menu"] = $this->Menu_model->select_ms_menu();
        
		

        // echo '<pre>';
		// print_r($nasabahx);
		// echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function non_nasabah_ulamm()          
    {
        $this->is_logged();     
        
        $data["content"] = "Nasabah";
        $data["view"] = "nasabah/non_nasabah";
		$data["script"] = "nasabah/include/non-nasabah-script";
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["ulamm"] = $this->Nasabah_model->select_non_nasabah_ulamm();
        

        //echo '<pre>';
        //print_r($data['menu']);
        //echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }


	public function api_nasabah_ulamm()
	{					
		$this->config->set_item('elastic_index', 'nasabah');			
		$search 		= ($_GET["search"]["value"]!='') ? 'namanasabah:'.$_GET["search"]["value"] : NULL ;					
		
		$start = isset($_GET["start"]) ? '&from='.$_GET["start"] : 0;
		$limit = isset($_GET["length"]) ? '&size='.$_GET["length"] : 10;		
		$filter_path 	= '&filter_path=hits.hits.*,aggregations.*';
						
				
		if ($search!=NULL){
			$debitur = $this->elastic->call('/_search?q='.$search.$start.$limit.$filter_path);
			$debitur_count = $this->elastic->call('_count?q='.$search);
		}else{
			$debitur = $this->elastic->call('/_search?'.$start.$limit.$filter_path);
			$debitur_count = $this->elastic->call('_count?');
		}

		if (isset($debitur->hits->hits)){
			for ($i=0;$i<count($debitur->hits->hits);$i++){
				$data["data"][$i] = $debitur->hits->hits[$i]->_source;
			}	
			$data["recordsTotal"] = $debitur_count->count;	
			$data["recordsFiltered"] = $debitur_count->count;			
		}else{
			$data["data"] = array();
			$data["recordsTotal"] = 0;	
			$data["recordsFiltered"] = 0;
		}		
		
						
		echo json_encode($data);			
	}

	public function api_nasabah_mekaar()
	{				
		$this->config->set_item('elastic_index', 'debitur');			
		$search 		= ($_GET["search"]["value"]!='') ? 'nama:'.$_GET["search"]["value"] : NULL ;					
		
		$start = isset($_GET["start"]) ? '&from='.$_GET["start"] : 0;
		$limit = isset($_GET["length"]) ? '&size='.$_GET["length"] : 10;		
		$filter_path 	= '&filter_path=hits.hits.*,aggregations.*';
						
				
		if ($search!=NULL){
			$debitur = $this->elastic->call('/_search?q='.$search.$start.$limit.$filter_path);
			$debitur_count = $this->elastic->call('_count?q='.$search);
		}else{
			$debitur = $this->elastic->call('/_search?'.$start.$limit.$filter_path);
			$debitur_count = $this->elastic->call('_count?');
		}

		if (isset($debitur->hits->hits)){
			for ($i=0;$i<count($debitur->hits->hits);$i++){
				$data["data"][$i] = $debitur->hits->hits[$i]->_source;
			}	
			$data["recordsTotal"] = $debitur_count->count;	
			$data["recordsFiltered"] = $debitur_count->count;			
		}else{
			$data["data"] = array();
			$data["recordsTotal"] = 0;	
			$data["recordsFiltered"] = 0;
		}		
		
						
		echo json_encode($data);	
	}
}