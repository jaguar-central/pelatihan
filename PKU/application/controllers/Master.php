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
		
        $data["menu"]		 	= $this->Menu_model->select_ms_menu();
        $data["t_user"] 		= $this->Master_model->select_ms_user();
        $data["user_group"] 	= $this->Master_model->select_ms_user_group();
		$data["cabang"] 		= $this->Master_model->select_all_ms_cabang_ulamm();
        
        // echo '<pre>';
		// print_r($data['cabang']);
		// echo '</pre>';die;
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
        $data["t_cabang_ulamm"] = $this->Master_model->select_all_ms_cabang_ulamm();
        
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


	public function get_kabkot()
	{			
		$kode_provinsi = $_GET['kode_provinsi'];
		// $select = $_GET['select'];
		$kabkot = $this->Master_model->select_ms_kabkot_by_id_provinsi($kode_provinsi);		
		$data= '<option value="">--pilih kabupaten/kota--</option>';
		
		foreach ($kabkot as $data_kabkot) {
			// if ($select==$data_kabkot->MS_KODE_KABKOT){
			// 	$data .= "<option value='".$data_kabkot->MS_KODE_KABKOT."' selected >".$data_kabkot->MS_KABKOT." </option>";
			// }else{
				$data .= "<option value='".$data_kabkot->MS_KODE_KABKOT."' >".$data_kabkot->MS_KABKOT." </option>";
			// }
		} 	
				
		echo $data;
	}		

	public function get_kecamatan()
	{			
		$kode_kabkot = $_GET['kode_kabkot'];
		// $select = $_GET['select'];
		$kecamatan = $this->Master_model->select_ms_kecamatan_by_id_kabkot($kode_kabkot);		
		$data= '<option value="">--pilih kecamatan--</option>';
		
		foreach ($kecamatan as $data_kecamatan) {
			// if ($select==$data_kecamatan->MS_KODE_KECAMATAN){
			// 	$data .= "<option value='".$data_kecamatan->MS_KODE_KECAMATAN."' selected >".$data_kecamatan->MS_KECAMATAN." </option>";
			// }else{
				$data .= "<option value='".$data_kecamatan->MS_KODE_KECAMATAN."' >".$data_kecamatan->MS_KECAMATAN." </option>";
			// }
		} 	
				
		echo $data;
	}			

	
	public function get_sso_karyawan()

	{

		$username = 'event';

		$password = 'event';

        

        // Get URL Host 

        $url = 'http://10.61.3.37/WebService/SSO_Mobile/getSSObyAppCode.php';

        

	    // Set up and execute the curl process

	    $curl_handle = curl_init();

	    curl_setopt($curl_handle, CURLOPT_URL, $url.'?app_code=MPLT');

	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

	    curl_setopt($curl_handle, CURLOPT_POST, 1);

	     

	    // Optional, delete this line if your API is open

	    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);

	     

	    $buffer = curl_exec($curl_handle);

	    curl_close($curl_handle);

	     

	    $result = json_decode($buffer);
		//count total data
		$total = 0;
		$data = [];

		foreach ($result->profile[0]->data as $row) {
			$check = $this->Master_model->select_ms_user_by_username($row->profile_username);
			if (!$check){
				$data[$total] = $row;
				$total ++;
			}
		    
		};

		//sent data to datatables

		$oleh = array(

					'draw' 				=> 1,

					'recordsTotal' 		=> $total,

					'recordsFiltered' 	=> $total,

					// 'data'				=> $result->profile[0]->data

					'data'				=> $data

			);

		echo json_encode($oleh);

		exit;

	}	





	public function post_user(){
		$username   	= trim($this->security->xss_clean(strip_image_tags($this->input->post('username'))));
        $role     		= trim($this->security->xss_clean(strip_image_tags($this->input->post('role'))));
        $bisnis     	= trim($this->security->xss_clean(strip_image_tags($this->input->post('bisnis'))));       
		$cabang_ulamm   = $this->security->xss_clean(strip_image_tags($this->input->post('cabang_ulamm')));
        $aktif     		= trim($this->security->xss_clean(strip_image_tags($this->input->post('aktif'))));
		$id_user		= $this->session->userdata('sess_user_idsdm');
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);		


		switch ($role) {
		  case "1":
			$menu_user = 'INPUT';
			$lokasi = 'CABANG';
			break;
		  case "2":
			$menu_user = 'APPROVAL';
			$lokasi = 'CABANG';
			break;
		  case "3":
			$menu_user = 'APPROVAL_INPUT';
			$lokasi = 'PUSAT';
			break;		  
		  case "4":
			$menu_user = 'APPROVAL';
			$lokasi = 'PUSAT';
			break;	
		  case "5":
			$menu_user = 'APPROVAL';
			$lokasi = 'PUSAT';
			break;	
		  case "6":
			$menu_user = 'APPROVAL';
			$lokasi = 'PUSAT';
			break;	
		  case "7":
			$menu_user = 'APPROVAL';
			$lokasi = 'PUSAT';
			break;			
		}		
		
		try
		{
			$data_user = array(
				'USERNAME' 		=> $username,
				'IDBISNIS' 		=> $bisnis,
				'IDGROUP' 		=> $role,
				'LOKASI' 		=> $lokasi,
				'MENU_USER' 	=> $menu_user,
				'AKTIF' 		=> '1',
				'CREATED_BY' 	=> $id_user,
				'CREATED_DATE' 	=> date('Y-m-d H:i:s')			
			);
			
			$this->Master_model->insert_ms_user($data_user);
			
			$last_id_user = $this->db->insert_id(); //last id yang di insert				
			
			for ($i=0;$i<count($cabang_ulamm);$i++){
				$data_cabang = array(
					'ID_USER' 				=> $last_id_user,
					'ID_GROUP' 				=> $bisnis,
					'ID_BISNIS' 			=> $role,
					'KODE_CABANG_REGION' 	=> $cabang_ulamm[$i],
					'AKTIF' 				=> '1',
					'CREATED_BY' 			=> $id_user,
					'CREATED_DATE' 			=> date('Y-m-d H:i:s')			
				);		
				$this->Master_model->insert_ms_user_cabang_region($data_cabang);
			}
		}
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}
        
		echo json_encode($output);
		exit;
	}



	public function post_user_group(){
		$nama   	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama'))));
		$id_user	= $this->session->userdata('sess_user_idsdm');	
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);		

		try
		{
			$data = array(
				'NAMA' 			=> $nama,
				'AKTIF' 		=> '1',
				'CREATED_BY' 	=> $id_user,
				'CREATED_DATE' 	=> date('Y-m-d H:i:s')			
			);

			$this->Master_model->insert_ms_user_group($data);
		}
		catch (Exception $e)
		{
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> $e->getMessage()
			);
		}		

		echo json_encode($output);
		exit;		
	}


	public function get_grading(){
		$idjenisnasabah = $_GET['idjenisnasabah'] ? (int)$_GET['idjenisnasabah'] : 0;
		$idgrading = $_GET['idgrading'] ? (int)$_GET['idgrading'] : 0;

		$where = array(
			'ID_JENIS_NASABAH' => $idjenisnasabah
		);				
				
		$grading = $this->Master_model->select_ms_grading_where($where);

		$data= '<option value="">--pilih grade--</option>';
		
		foreach ($grading as $data_grade) {
			if ($data_grade->ID==$idgrading){
				$data .= "<option value='".$data_grade->ID."' selected>".$data_grade->GRADING_DESKRIPSI." </option>";
			}else{
				$data .= "<option value='".$data_grade->ID."' >".$data_grade->GRADING_DESKRIPSI." </option>";
			}	
		} 	
				
		echo $data;
	}

	public function get_list_nasabah_grading(){
		$id = $_GET['id_jenis_nasabah'];

		$where = array(
			'ID_JENIS_NASABAH' => $id
		);

		$data = $this->Master_model->select_ms_grading_where($where);
		$return = '';
		foreach ($data as $value) {
			$return .="<option value='$value->ID' >Kelas $value->KELAS - ( $value->KATEGORI_STAR_MODEL ) - $value->TEMA_PELATIHAN </option>";
		}

		echo $return;		
	}	

	public function post_geolocation(){
		$latitude     = $this->security->xss_clean(strip_image_tags($this->input->post('latitude')));
        $longititude  = $this->security->xss_clean(strip_image_tags($this->input->post('longititude')));
		$username	  = $this->session->userdata('sess_user_username');	
		
		$data = array(
			'USERNAME' => $username,
			'LATITUDE' => $latitude,
			'LONGITITUDE' => $longititude,
			'TIMESTAMP' => date('Y-m-d H:i:s'),
		);

		$where = array(
			'USERNAME' => $username
		);

		$check = $this->Master_model->select_trx_geolocation($where);

		if (count($check)==0){
			$this->Master_model->insert_trx_geolocation($data);
		}else{
			$this->Master_model->update_trx_geolocation($data,$where);
		}
	}
}
