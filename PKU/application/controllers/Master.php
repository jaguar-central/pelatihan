<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    public function user()    	   
    {
		$this->is_logged();		
    	
        $data["content"] = "Master";
        $data["view"] 	= "master/user";
		$data["script"] = "master/include/user-script";
		
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["t_user"] = $this->Master_model->select_ms_user();
        
        //echo '<pre>';
		//print_r($data['menu']);
		//echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function user_group()        
    {
        $this->is_logged();     
        
        $data["content"] = "Master";
        $data["view"]   = "master/user_group";
        $data["script"] = "master/include/user-group-script";
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["t_user_group"] = $this->Master_model->select_ms_user_group();
        
        //echo '<pre>';
        //print_r($data['menu']);
        //echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function cabang_ulamm()        
    {
        $this->is_logged();     
        
        $data["content"] = "Master";
        $data["view"]   = "master/cabang";
        $data["script"] = "master/include/cabang-script";
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["t_cabang_ulamm"] = $this->Master_model->select_ms_cabang_ulamm();
        
        //echo '<pre>';
        //print_r($data['menu']);
        //echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function area()        
    {
        $this->is_logged();     
        
        $data["content"] = "Master";
        $data["view"]   = "master/area";
        $data["script"] = "master/include/area-script";
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["t_area_mekaar"] = $this->Master_model->select_ms_area_mekaar();
        
        //echo '<pre>';
        //print_r($data['menu']);
        //echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function unit()        
    {
        $this->is_logged();     
        
        $data["content"] = "Master";
        $data["view"]   = "master/unit";
        $data["script"] = "master/include/unit-script";
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["t_unit_ulamm"] = $this->Master_model->select_ms_unit_ulamm();
        
        //echo '<pre>';
        //print_r($data['menu']);
        //echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function regional_mekaar()        
    {
        $this->is_logged();     
        
        $data["content"] = "Master";
        $data["view"]   = "master/regional_mekaar";
        $data["script"] = "master/include/region-script";
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["t_cabang_ulamm"] = $this->Master_model->select_ms_region_mekaar();
        
        //echo '<pre>';
        //print_r($data['menu']);
        //echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }

    public function cabang_mekaar()        
    {
        $this->is_logged();     
        
        $data["content"] = "Master";
        $data["view"]   = "master/cabang_mekaar";
        $data["script"] = "master/include/cabang-mekaar-script";
        
        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["t_cabang_ulamm"] = $this->Master_model->select_ms_cabang_mekaar();
        
        //echo '<pre>';
        //print_r($data['menu']);
        //echo '</pre>';die;
        $this->load->view('layout/gabung', $data);

    }



	public function get_unit_ulamm()
	{			
		$kode_cabang = $_GET['kode_cabang'];
		$unit = $this->Master_model->select_ms_unit_ulamm_by_kode_cabang($kode_cabang);		
		$data= '<option value="">--pilih unit--</option>';
		
		foreach ($unit as $data_unit) {
            //$data .= "<option value='".$data_unit->inisial_unit."' >".$data_unit->NAMA_UNIT." </option>";
            $data .= "<option value='".$data_unit->KODE_UNIT."' >".$data_unit->DESKRIPSI." </option>";
		} 	
				
		echo $data;
	}
	
	
	public function get_area_mekaar()
	{			
		$kode_region = $_GET['kode_region'];
		$area = $this->Master_model->select_ms_area_mekaar_by_id($kode_region);		
		$data= '<option value="">--pilih area--</option>';
		
		foreach ($area as $data_area) {
			$data .= "<option value='".$data_area->KODE_AREA."' >".$data_area->KODE_AREA.' - '.$data_area->DESKRIPSI." </option>";
		} 	
				
		echo $data;
	}	

	public function get_cabang_mekaar()
	{			
		$kode_area = $_GET['kode_area'];
		$cabang = $this->Master_model->select_ms_cabang_mekaar_by_id($kode_area);		
		$data= '<option value="">--pilih cabang--</option>';
		
		foreach ($cabang as $data_cabang) {
			$data .= "<option value='".$data_cabang->KODE_CABANG."' >".$data_cabang->KODE_CABANG.' - '.$data_cabang->DESKRIPSI." </option>";
		} 	
				
		echo $data;
	}	
}