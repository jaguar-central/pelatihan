<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User extends MY_Controller {



	public function cek_authorization()

	{		
	
		/*====================================================================

		PARSE URL PARAMETER

		======================================================================*/

		$url= parse_url($_SERVER['REQUEST_URI']);

		parse_str($url['query'], $params);



		$pecah = explode("&", $url['query']);
		
		if($pecah[0]==""){
			$this->session->set_flashdata('error', 'Mohon maaf, anda tidak terdaftar pada sistem event management system. Hubungi IT center');		
			redirect('lock');
		}else{
		//End: Penambahan Andika 17092018

		$idsdm = $pecah[0];

		$NIK = $pecah[1];

		$username = $pecah[2];

		$nama = $pecah[3];

		$email = $pecah[4];

        

        // Get URL Host 

        $url = "http://ssowebservice.pnm.co.id/crosscheck.php";             

		$username = substr($username, strpos($username, "=") + 1);

		$idsdm = substr($idsdm, strpos($idsdm, "=") + 1);

		$secret_code=strtoupper("$3cretc0d3".$username.",MPLT,".$idsdm);

		header('Content-Type: application/json');

        $data = json_decode(file_get_contents($url.'?secret='.$secret_code.'&app_code=MPLT&username='.$username));

		//$data = json_decode(file_get_contents('http://182.23.52.249/Dummy/SSO_WebService/crosscheck.php?secret='.$secret_code.'&app_code=MPLT&username='.$username));

		$data = json_encode($data);

		$json = json_decode($data, true);
		
		// var_dump($secret_code);die();

		/*====================================================================

		GET DATA FROM API SSO

		======================================================================*/
		
		$idsdm 				=$json['login'][0]['data'][0]['idsdm'];

		$nik 				=$json['login'][0]['data'][0]['nik'];

		$username 			=$json['login'][0]['data'][0]['username'];

		$email 				=$json['login'][0]['data'][0]['email'];

		$nama 				=$json['login'][0]['data'][0]['nama'];

		$idsdm 				=$json['login'][0]['data'][0]['idsdm'];

		$posisinama			=$json['login'][0]['data'][0]['posisi_nama'];

		$posisisso			=$json['login'][0]['data'][0]['posisi_sso'];

		$posisisingkatan	=$json['login'][0]['data'][0]['posisi_singkatan'];

		$lokasikerja		=$json['login'][0]['data'][0]['lokasi_kerja'];

		$kodecabang			=$json['login'][0]['data'][0]['kode_cabang'];

		$cabang 			=$json['login'][0]['data'][0]['cabang'];

		$unit				=$json['login'][0]['data'][0]['unit'];

		$kode_unit			=$json['login'][0]['data'][0]['kode_unit'];
		
		$kode_mekaar		=$json['login'][0]['data'][0]['kode_mekaar'];

		$organisasiname		=$json['login'][0]['data'][0]['organisasi_name'];

		$organisasidesc		=$json['login'][0]['data'][0]['organisasi_desc'];

		$foto 				=$json['login'][0]['data'][0]['foto'];
						
		if($username){
			$data = $this->Master_model->select_ms_user_by_username($username)[0];
			
			$lokasi = $data->LOKASI;
											
			//Set session userdata

			$session_array = array(

							'logged_in'					=> TRUE,

							'sess_user_idsdm'			=> $idsdm,
							
							'sess_user_lokasi'			=> $lokasi,
							
							'sess_menu_user'			=> $data->MENU_USER,

							'sess_user_id'				=> $data->ID,

							'sess_user_id_user_group'	=> $data->IDGROUP,
							
							'sess_user_group'			=> $data->NAMA_GROUP,

							'sess_user_nik'       		=> $nik,

							'sess_user_nama'       		=> $nama,

							'sess_user_posisinama' 		=> $posisinama,

							'sess_user_username'       	=> $username,

							'sess_user_email'   	    => $email,

							'sess_user_nama_cabang'		=> $cabang,

							'sess_user_cabang'		    => $kodecabang,

							'sess_user_divisi'			=> $organisasidesc,
							
							'sess_user_region'		    => $kode_mekaar,							

							'sess_user_foto'  			=> $foto,
							
							'sess_user_latitude'        => '-6.205312656111862',
							
							'sess_user_longitude'       =>  '106.82113741326904',
							
							'sess_user_id_bisnis'       =>  $data->IDBISNIS

						 );               

			$this->session->set_userdata($session_array);
		}
		
		redirect(base_url().'dashboard');
		
		}		

	}

    
	
	public function process_signout()

    {

        $this->is_logged();        

		//Set session userdata

		$session_array = array(

							'logged_in'					=> '',

							'sess_user_idsdm'			=> '',

							'sess_user_id'				=> '',

							'sess_user_id_user_group'	=> '',

							'sess_user_nik'       		=> '',

							'sess_user_nama'       		=> '',

							'sess_user_posisinama' 		=> '',

							'sess_user_username'       	=> '',

							'sess_user_email'   	    => '',

							'sess_user_nama_cabang'		=> '',

							'sess_user_cabang'		    => '',

							'sess_user_divisi'			=> '',
							
							'sess_user_region'		    => '',							

							'sess_user_foto'  			=> ''

						 );                

		$this->session->set_userdata($session_array);

		

		//Unset session userdata and destroy all session userdata

        $this->session->unset_userdata($session_array);

        //$this->session->sess_destroy();

        

		//Set session flashdata

		$this->session->set_flashdata('message_success', 'Anda telah berhasil sign out!');

        redirect('dashboard');

    }	


	public function login()
	{
		
		$this->load->view('login/login');
	}
}