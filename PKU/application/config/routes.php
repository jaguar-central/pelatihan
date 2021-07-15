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
// $route['default_controller'] = 'dashboard';

$route['default_controller']        = 'User/login';
$route['login']                     = 'User/login';
$route['user/process_login']        = 'User/process_login';

$route['404_override']              = '';
$route['translate_uri_dashes']      = FALSE;

// $route['nama url'] = 'nama class/nama function'
/* DASHBOARD */
$route['dashboard']	                    = 'dashboard';
$route['dashboard_index_pemberdayaan']	= 'dashboard/dashboard_index_pemberdayaan';
$route['get_index_pemberdayaan_ulamm']	= 'dashboard/get_index_pemberdayaan_ulamm';
$route['get_index_pemberdayaan_mekaar']	= 'dashboard/get_index_pemberdayaan_mekaar';

/* PELATIHAN */
$route['pelatihan/ulamm'] 			        = 'pelatihan/proposal_ulamm';
$route['pelatihan/mekaar'] 			        = 'pelatihan/proposal_mekaar';
$route['pelatihan/history_ulamm'] 		    = 'pelatihan/history_ulamm';
$route['pelatihan/history_mekaar'] 		    = 'pelatihan/history_mekaar';

$route['pelatihan/konfirmasi'] 		        = 'pelatihan/konfirmasi_proposal';
$route['pelatihan/konfirmasi_lpj'] 	        = 'pelatihan/konfirmasi_lpj';
$route['pelatihan/lpj/(:any)']   		    = 'pelatihan/lpj/$1';
$route['pelatihan/gabungan']   		        = 'pelatihan/gabungan';
$route['pelatihan/project_charter_ulamm']   = 'pelatihan/project_charter_ulamm';
$route['pelatihan/project_charter_mekaar'] 	= 'pelatihan/project_charter_mekaar';

/* NASABAH */
$route['nasabah/ulamm'] 		= 'nasabah/nasabah_ulamm';
$route['nasabah/mekaar'] 		= 'nasabah/nasabah_mekaar';
$route['nasabah/non_nasabah'] 	= 'nasabah/non_nasabah_ulamm';

/* MASTER */
$route['master/user'] 	            = 'Master/user';
$route['master/user_group']         = 'Master/user_group';
$route['master/cabang_ulamm'] 	    = 'Master/cabang_ulamm';
$route['master/area_mekaar'] 	    = 'Master/area';
$route['master/unit_ulamm'] 	    = 'Master/unit';
$route['master/post_user'] 		    = 'Master/post_user';
$route['master/post_user_group'] 	= 'Master/post_user_group';

/*SURVEY*/
$route['survey'] 		                    = 'survey';

/* USER */
$route['check_user'] 	= 'User/cek_authorization';
$route['logout'] 		= 'User/process_signout';

/* REPORT */
$route['report/agenda_klasterisasi_ulamm'] 		= 'Report/agenda_klasterisasi_ulamm';
$route['report/agenda_klasterisasi_mekaar'] 	= 'Report/agenda_klasterisasi_mekaar';
$route['report/report_detail_ulamm'] 		    = 'Report/report_detail_ulamm';
$route['report/report_detail_mekaar'] 		    = 'Report/report_detail_mekaar';
$route['report/report_rekap_ulamm'] 		    = 'Report/report_rekap_ulamm';
$route['report/report_rekap_mekaar'] 		    = 'Report/report_rekap_mekaar';
$route['report/summary_ulamm'] 		            = 'Report/report_summary_ulamm';
$route['report/summary_mekaar'] 		        = 'Report/report_summary_mekaar';
$route['report/proposal_belum_lpj'] 		    = 'Report/proposal_belum_lpj';







/* API DATA NASABAH*/
$route['nasabah/get_paging_nasabah_ulamm']      = 'nasabah/api_nasabah_ulamm';
$route['nasabah/get_paging_nasabah_mekaar']     = 'nasabah/api_nasabah_mekaar';

/* API DATA MASTER*/
$route['master/get_unit_ulamm']                 = 'master/get_unit_ulamm';
$route['master/get_unit_inisial_ulamm']         = 'master/get_unit_inisial_ulamm';
$route['master/get_area_mekaar']                = 'master/get_area_mekaar';
$route['master/get_cabang_mekaar']              = 'master/get_cabang_mekaar';
$route['master/get_grading']              		= 'master/get_grading';
$route['master/get_kabkot']              		= 'master/get_kabkot';
$route['master/get_kabkot_select']              = 'master/get_kabkot_select';
$route['master/get_kecamatan']              	= 'master/get_kecamatan';
$route['master/get_kecamatan_select']           = 'master/get_kecamatan_select';
$route['master/get_list_nasabah_grading']       = 'master/get_list_nasabah_grading';

/* API DATA SURVEY*/
$route['survey/post_survey']                                    = 'survey/post_survey';

/* API DATA PELATIHAN*/
$route['pelatihan/post_pelatihan']                              = 'pelatihan/post_pelatihan_proposal';
$route['pelatihan/update_pelatihan']                            = 'pelatihan/update_pelatihan_proposal';
$route['pelatihan/update_pelatihan']                            = 'pelatihan/update_pelatihan_proposal';
$route['pelatihan/get_rab']                                     = 'pelatihan/get_rab';
$route['pelatihan/get_rab_lpj']                                 = 'pelatihan/get_rab_lpj';
$route['pelatihan/post_konfirmasi_proposal']                    = 'pelatihan/post_konfirmasi_proposal';
$route['pelatihan/post_pelatihan_lpj']                          = 'pelatihan/post_pelatihan_lpj';
$route['pelatihan/post_konfirmasi_lpj']                         = 'pelatihan/post_konfirmasi_lpj';
$route['pelatihan/post_kehadiran'] 	                            = 'pelatihan/post_kehadiran';
$route['pelatihan/get_kehadiran/(:any)'] 	                    = 'pelatihan/get_kehadiran/$1';
$route['pelatihan/delete_kehadiran'] 	                        = 'pelatihan/delete_kehadiran';
$route['pelatihan/get_paging_kehadiran_nasabah_ulamm/(:any)']   = 'pelatihan/get_paging_kehadiran_nasabah_ulamm/$1';
$route['pelatihan/get_paging_kehadiran_nasabah_mekaar/(:any)']  = 'pelatihan/get_paging_kehadiran_nasabah_mekaar/$1';
$route['pelatihan/get_paging_kehadiran_non_nasabah']            = 'pelatihan/get_paging_kehadiran_non_nasabah';
$route['pelatihan/post_non_nasabah'] 	                        = 'pelatihan/post_non_nasabah';
$route['pelatihan/post_submit']                                 = 'pelatihan/post_submit';

// $route['pelatihan/post_change_status_pelatihan/(:any)/(:any)']  = 'pelatihan/post_change_status_pelatihan/$1/$2';
$route['pelatihan/get_paging_pelatihan/(:any)/(:any)']  		= 'pelatihan/get_paging_pelatihan/$1/$2';

$route['pelatihan/post_project_charter']                        = 'pelatihan/post_project_charter';
$route['pelatihan/get_list_project_charter']                    = 'pelatihan/get_list_project_charter';
$route['pelatihan/get_data_project_charter']                    = 'pelatihan/get_data_project_charter';
$route['pelatihan/get_pelatihan_project_charter']               = 'pelatihan/get_pelatihan_project_charter';
$route['pelatihan/get_paging_project_charter/(:any)']           = 'pelatihan/get_paging_project_charter/$1';

$route['pelatihan/get_project_charter']                         = 'pelatihan/get_project_charter';
$route['pelatihan/get_ket_approval']                            = 'pelatihan/get_ket_approval';
$route['pelatihan/post_pku_akbar_gabungan']                     = 'pelatihan/post_pku_akbar_gabungan';
$route['pelatihan/get_akbar_gabungan/(:any)']                   = 'pelatihan/get_akbar_gabungan/$1';

$route['pelatihan/delete_akbar_gabungan'] 	                    = 'pelatihan/delete_akbar_gabungan';


/* GEOLOCATION */ 
$route['master/post_geolocation']                              = 'master/post_geolocation';
$route['geolokasi/post_geolocation']                           = 'geolokasi';


$route['pelatihan/open_report'] 		                       = 'pelatihan/open_report';


/* Notif Socket */
$route['notifsocket'] 		                                    = 'notifsocket';




/* PKM Bermakna */
$route['pkm/pkm_bermakna'] 		        = 'pkm/login_pkm_bermakna';
$route['pkm/post_pkm_bermakna'] 		= 'pkm/post_pkm_bermakna';
$route['pkm/post_pkm_survey'] 		    = 'pkm/post_pkm_survey';
$route['pkm/pkm_bermakna_selesai'] 		= 'pkm/pkm_bermakna_selesai';
$route['pkm/pkm_survey_pilih_nasabah']  = 'pkm/pkm_survey_pilih_nasabah';
$route['pkm/pkm_survey']                = 'pkm/pkm_survey';


