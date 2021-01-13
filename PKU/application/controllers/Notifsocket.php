<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notifsocket extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['notification_count']='';

		if ($this->session->userdata('logged_in')!=''){
		$data['notification'] = $this->Master_model->notification();		
		$data['notification_count'] = $this->Master_model->notification_count();
		}

		
		if ($data['notification_count']==''){
			$data['notification_count'] = 0;
        }
        
        echo json_encode($data);
    }

}