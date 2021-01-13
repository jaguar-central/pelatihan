<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed.');



class MY_Controller extends CI_Controller

{
       
	public function __construct()

    {
		parent::__construct();

		// $data_global['notification_count']='';

		// if ($this->session->userdata('logged_in')!=''){
		// $data_global['notification'] = $this->Master_model->notification();		
		// $data_global['notification_count'] = $this->Master_model->notification_count();
		// }

		
		// if ($data_global['notification_count']==''){
		// 	$data_global['notification_count'] = 0;
		// }

		// var_dump($this->db->last_query());die();
		
		// $this->load->vars($data_global);
	}		
	   

	public function is_logged()

    {

        // Get URL Host 

        // $url = 'http://ssowebservice.pnm.co.id/login.php';        
        // $url = $url."?source=".base_url()."check_user&app_code=MPLT";
		// if ($this->session->userdata('logged_in') == FALSE) redirect($url);

		if ($this->session->userdata('logged_in') == FALSE) redirect('login');;

    }
	
	public function create_trx_no($param)
	{			
		$no = isset($this->Master_model->select_trx_no_by_param($param)->result()[0]->INC_PELATIHAN) ?
		$this->Master_model->select_trx_no_by_param($param)->result()[0]->INC_PELATIHAN : 0;
		
		if ($no==0){
			$this->Master_model->insert_trx_no($param);
			$no = $this->Master_model->select_trx_no_by_param($param)->result()[0]->NO;
			$this->Master_model->update_trx_no(array("INC_PELATIHAN"=>'1'),$param);
		}else{					
			$this->Master_model->update_trx_no(array("INC_PELATIHAN"=>$no+1),$param);
			$no = $this->Master_model->select_trx_no_by_param($param)->result()[0]->NO;
		}		
			
		return $no;
	}	

   

}