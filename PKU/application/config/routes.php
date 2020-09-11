<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['nama url'] = 'nama class/nama function'
/* DASHBOARD */
$route['dashboard']	= 'dashboard';



/* PELATIHAN */
$route['pelatihan/ulamm'] 			    = 'pelatihan/proposal_ulamm';
$route['pelatihan/mekaar'] 			    = 'pelatihan/proposal_mekaar';
$route['pelatihan/history_ulamm'] 		= 'pelatihan/history_ulamm';
$route['pelatihan/history_mekaar'] 		= 'pelatihan/history_mekaar';
$route['pelatihan/konfirmasi'] 		    = 'pelatihan/konfirmasi_proposal';
$route['pelatihan/konfirmasi_lpj'] 	    = 'pelatihan/konfirmasi_lpj';
$route['pelatihan/lpj/(:any)']   		= 'pelatihan/lpj/$1';

/* NASABAH */
$route['nasabah/ulamm'] 		= 'nasabah/nasabah_ulamm';
$route['nasabah/mekaar'] 		= 'nasabah/nasabah_mekaar';
$route['nasabah/non_nasabah'] 	= 'nasabah/non_nasabah_ulamm';

/* MASTER */
$route['master/user'] 	        = 'Master/user';
$route['master/user_group']     = 'Master/user_group';
$route['master/cabang_ulamm'] 	= 'Master/cabang_ulamm';
$route['master/area_mekaar'] 	= 'Master/area';
$route['master/unit_ulamm'] 	= 'Master/unit';

/* USER */
$route['check_user'] 	= 'User/cek_authorization';
$route['logout'] 		= 'User/process_signout';


/* API DATA NASABAH*/
$route['nasabah/get_paging_nasabah_ulamm']      = 'nasabah/api_nasabah_ulamm';
$route['nasabah/get_paging_nasabah_mekaar']     = 'nasabah/api_nasabah_mekaar';

/* API DATA MASTER*/
$route['master/get_unit_ulamm']                 = 'master/get_unit_ulamm';
$route['master/get_area_mekaar']                = 'master/get_area_mekaar';
$route['master/get_cabang_mekaar']              = 'master/get_cabang_mekaar';

/* API DATA PELATIHAN*/
$route['pelatihan/post_pelatihan']              = 'pelatihan/post_pelatihan_proposal';
$route['pelatihan/get_rab']                     = 'pelatihan/get_rab';
// $route['pelatihan/post_unggah_proposal']        = 'pelatihan/insert_unggah_proposal';
$route['pelatihan/post_konfirmasi_proposal']    = 'pelatihan/post_konfirmasi_proposal';
$route['pelatihan/post_pelatihan_lpj']          = 'pelatihan/post_pelatihan_lpj';
$route['pelatihan/post_konfirmasi_lpj']         = 'pelatihan/post_konfirmasi_lpj';
$route['pelatihan/post_kehadiran'] 	            = 'pelatihan/post_kehadiran';
$route['pelatihan/get_kehadiran/(:any)'] 	    = 'pelatihan/get_kehadiran/$1';
$route['pelatihan/delete_kehadiran'] 	        = 'pelatihan/delete_kehadiran';
$route['pelatihan/get_paging_kehadiran_nasabah_ulamm/(:any)']   = 'pelatihan/get_paging_kehadiran_nasabah_ulamm/$1';
$route['pelatihan/get_paging_kehadiran_nasabah_mekaar/(:any)']  = 'pelatihan/get_paging_kehadiran_nasabah_mekaar/$1';
$route['pelatihan/get_paging_kehadiran_non_nasabah']  = 'pelatihan/get_paging_kehadiran_non_nasabah';
$route['pelatihan/post_non_nasabah'] 	        = 'pelatihan/post_non_nasabah';
$route['pelatihan/post_submit_proposal']        = 'pelatihan/post_submit_proposal';
$route['pelatihan/post_change_status_pelatihan/(:any)/(:any)']= 'pelatihan/post_change_status_pelatihan/$1/$2';
$route['pelatihan/get_paging_pelatihan/(:any)/(:any)']  		= 'pelatihan/get_paging_pelatihan/$1/$2';



$route['pelatihan/post_klasterisasi']          = 'pelatihan/post_klasterisasi';
$route['pelatihan/get_klasterisasi']          = 'pelatihan/get_klasterisasi';