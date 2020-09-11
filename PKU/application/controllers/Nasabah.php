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
		$param['sektor_ekonomi'] = $_GET["columns"][0]['search']['value'];
		$param['jenis_pinjaman'] = $_GET["columns"][1]['search']['value'];
		$param['jenis_program'] = $_GET["columns"][2]['search']['value'];
		$param['cabang'] = $_GET["columns"][3]['search']['value'];
		$param['unit'] = $_GET["columns"][4]['search']['value'];
						
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL ;			
		$param['count'] = 0;						
		$data["data"] = $this->Nasabah_model->paging_select_nasabah_ulamm($param);				
		$param['count'] = 1;				
		$total = $this->Nasabah_model->paging_select_nasabah_ulamm($param)[0]->COUNT_DATA;				
		$data["recordsTotal"] = $total;	
		$data["recordsFiltered"] = $total;		
		
		echo json_encode($data);
	}

	public function api_nasabah_mekaar()
	{				
		$param["start"] = isset($_GET["start"]) ? $_GET["start"] : 0;
		$param["limit"] = isset($_GET["length"]) ? $_GET["length"] : 10;		
		$param["search"] = isset($_GET["search"]["value"]) ? str_replace(' ','%20',$_GET["search"]["value"]) : NULL ;			
		// $param['count'] = 0;						
		// $data["data"] = $this->Nasabah_model->paging_select_nasabah_mekaar($param);														
		
		// $param['count'] = 1;				
		// $total = $this->Nasabah_model->paging_select_nasabah_mekaar($param)[0]->COUNT_DATA;				
		// $data["recordsTotal"] = $total;	
		// $data["recordsFiltered"] = $total;		
		
		if ($param["search"]!=NULL){
			$debitur = $this->Elasticsearch->call_debitur('/_search?q=nama:'.$param["search"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->Elasticsearch->call_debitur('_count?q=nama:'.$param["search"]);			
		}else{
			$debitur = $this->Elasticsearch->call_debitur('_search?from='.$param["start"].'&size='.$param["limit"].'&filter_path=hits.hits.*,aggregations.*');
			$debitur_count = $this->Elasticsearch->call_debitur('_count');
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