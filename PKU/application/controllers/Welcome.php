<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    	
    
    {
    	
        $data["content"] = "selamat";
        $data["menu"] = $this->Menu_model->select_ms_menu();

        //echo '<pre>';
		//print_r($data['menu']);
		//echo '</pre>';die;
        $this->load->view('layout/gabung', $data);
    }
    
}

?>