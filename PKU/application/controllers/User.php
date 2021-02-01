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
		

		$data = json_encode($data);

		$json = json_decode($data, true);
		


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
			
											
			//Set session userdata

			$session_array = array(

							'logged_in'					=> TRUE,

							'sess_user_idsdm'			=> $idsdm,
							
							'sess_user_lokasi'			=> $data->LOKASI,
							
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

        // redirect('dashboard');
        redirect(base_url().'login');

    }	

	public function login_pkm_bermakna()
	{	
		$cek_kelompok = $this->db->query("select * FROM [10.61.3.64].[INISEMENTARA].dbo.list_kelompok WHERE groupid='".$this->input->get('kelompokid')."' ")->row();
		if ($cek_kelompok) {
			//SET SESSION PKM START
			$session_array = array(
				'sess_cabang_id'			=> $cek_kelompok->cabangid,				
				'sess_kelompok_id'			=> $cek_kelompok->groupid,				
				'sess_nama_kelompok'		=> $cek_kelompok->groupname,				
				'sess_user_id'				=> 'FZL'

			);

			$this->session->set_userdata($session_array);
			//SET SESSION PKM END

			$data["content"] = $this->db->query(" select * FROM MS_MODUL_PKM_BERMAKNA WHERE ID=(SELECT MODUL_PKM_ID FROM MS_JADWAL_PKM_BERMAKNA WHERE TAHUN=YEAR(GETDATE()) AND BULAN=MONTH(GETDATE())) ")->row();

			$cek_minggu_ini = $this->db->query(" select * from T_PKM_BERMAKNA WHERE MODUL_PKM_ID=".$data["content"]->ID." and KELOMPOKID='".$cek_kelompok->groupid."' and MINGGU_KE=DATEPART(WEEK,GETDATE()) ORDER BY MINGGU_KE DESC ")->result();

			if ($cek_minggu_ini[0]->MINGGU_KE>4){
				$this->load->view('pkm/pkm_survey');
			}else if (count($cek_minggu_ini)){
				$this->load->view('pkm/pkm_selesai');
			}else{
				$this->load->view('pkm/pkm_bermakna',$data);
			}
			
		}else{
			echo "Kelompok tidak ditemukan";
		}			
	}


	public function login()
	{	
		$this->load->view('login/login');
	}

	public function process_login(){

		$u   = trim($this->security->xss_clean(strip_image_tags($this->input->post('username'))));        
		$p   = trim($this->security->xss_clean(strip_image_tags($this->input->post('password'))));    
		
		$a = $this->config->item('baseSSOApi').'SSO_Mobile/login.php?user='.$u.'&pass='.$p.'&app_code=MPLT';

		$c = stream_context_create(array(
            'http' => array(
                'header'  => "Authorization: Basic " . base64_encode("event:event")
            )
        ));
        
		$data = json_decode(file_get_contents($a, false, $c));				

		$data = json_encode($data);

		$json = json_decode($data, true);

		// var_dump($json['login'][0]['response']);die();

		if ($json['login'][0]['response']=='FALSE'){
			$this->session->set_flashdata('message_success', $json['login'][0]['message']);
			redirect(base_url().'login');
			exit();
		}
		

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

		// $organisasiname		=$json['login'][0]['data'][0]['organisasi_name'];

		// $organisasidesc		=$json['login'][0]['data'][0]['organisasi_desc'];

		$foto 				=$json['login'][0]['data'][0]['foto'];
						

		

		if($username){
			$data = $this->Master_model->select_ms_user_by_username($username)[0];
			
											
			//Set session userdata

			$session_array = array(

							'logged_in'					=> TRUE,

							'sess_user_idsdm'			=> $idsdm,
							
							'sess_user_lokasi'			=> $data->LOKASI,
							
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

							// 'sess_user_divisi'			=> $organisasidesc,
							
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