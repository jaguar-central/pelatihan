<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "third_party/PHPExcel.php";
// require_once APPPATH . "third_party/Spout/src/Spout/Autoloader/autoload.php";

// use Box\Spout\Reader\ReaderFactory;
// use Box\Spout\Common\Type;

class Report extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function agenda_klasterisasi_ulamm()
    {
        $this->is_logged();



        $data["content"] = "Report";
        $data["view"] = "report/agenda/agenda_klasterisasi_ulamm";
        $data["script"] = "report/agenda/include/agenda_klasterisasi-script";



        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["project_charter"] = $this->Report_model->select_project_charter_ulamm();

        // echo '<pre>';
        // print_r($data['agenda']);
        // echo '</pre>';die;

        // var_dump($data);die();
        $this->load->view('layout/gabung', $data);
    }

    public function agenda_klasterisasi_mekaar()
    {
        $this->is_logged();



        $data["content"] = "Report";
        $data["view"] = "report/agenda/agenda_klasterisasi_mekaar";
        $data["script"] = "report/agenda/include/agenda_klasterisasi-script";



        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["project_charter"] = $this->Report_model->select_project_charter_mekaar();

        // echo '<pre>';
        // print_r($data['agenda']);
        // echo '</pre>';die;

        // var_dump($data);die();
        $this->load->view('layout/gabung', $data);
    }


    public function agenda_tunu()
    {
        $this->is_logged();



        $data["content"] = "Report";
        $data["view"] = "report/agenda/agenda_tunu";
        $data["script"] = "report/agenda/include/agenda-tunu-script";



        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["project_charter"] = $this->Report_model->select_agenda_tunu();

        // echo '<pre>';
        // print_r($data['agenda']);
        // echo '</pre>';die;

        // var_dump($data);die();
        $this->load->view('layout/gabung', $data);
    }


    public function agenda_tunm()
    {
        $this->is_logged();



        $data["content"] = "Report";
        $data["view"] = "report/agenda/agenda_tunm";
        $data["script"] = "report/agenda/include/agenda-tunm-script";



        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["project_charter"] = $this->Report_model->select_agenda_tunm();

        // echo '<pre>';
        // print_r($data['agenda']);
        // echo '</pre>';die;

        // var_dump($data);die();
        $this->load->view('layout/gabung', $data);
    }


    public function report_detail_ulamm()
    {
        $this->is_logged();

        $data["content"] = "Report";
        $data["view"] = "report/detail_ulamm/detail_ulamm";
        $data["script"] = "report/detail_ulamm/include/detail-ulamm-script";

        $data["menu"] = $this->Menu_model->select_ms_menu();
        // $data["report"] = $this->Report_model->report_detail(1);        

        $this->load->view('layout/gabung', $data);
    }

    public function report_detail_mekaar()
    {
        $this->is_logged();

        $data["content"] = "Report";
        $data["view"] = "report/detail_mekaar/detail_mekaar";
        $data["script"] = "report/detail_mekaar/include/detail-mekaar-script";

        $data["menu"] = $this->Menu_model->select_ms_menu();
        // $data["report"] = $this->Report_model->report_detail(2);        

        $this->load->view('layout/gabung', $data);
    }

    public function report_summary_ulamm()
    {
        $this->is_logged();

        $data["content"] = "Report";
        $data["view"] = "report/summary_ulamm/summary_ulamm";
        $data["script"] = "report/summary_ulamm/include/summary-ulamm-script";

        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["report"] = $this->Report_model->report_summary(1);        

        $this->load->view('layout/gabung', $data);
    }

    public function report_summary_mekaar()
    {
        $this->is_logged();

        $data["content"] = "Report";
        $data["view"] = "report/summary_mekaar/summary_mekaar";
        $data["script"] = "report/summary_mekaar/include/summary-mekaar-script";

        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["report"] = $this->Report_model->report_summary(2);        

        $this->load->view('layout/gabung', $data);
    }

    public function report_rekap_ulamm()
    {
        $this->is_logged();

        $data["content"] = "Report";
        $data["view"] = "report/rekap_ulamm/rekap_ulamm";
        $data["script"] = "report/rekap_ulamm/include/rekap-ulamm-script";

        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["report"] = $this->Report_model->report_rekap_ulamm();

        $this->load->view('layout/gabung', $data);
    }

    public function report_rekap_mekaar()
    {
        $this->is_logged();

        $data["content"] = "Report";
        $data["view"] = "report/rekap_mekaar/rekap_mekaar";
        $data["script"] = "report/rekap_mekaar/include/rekap-mekaar-script";

        $data["menu"] = $this->Menu_model->select_ms_menu();
        $data["report"] = $this->Report_model->report_rekap_mekaar();

        $this->load->view('layout/gabung', $data);
    }

    public function get_paging_report_detail()
    {
        $param["start"] = isset($_POST["start"]) ? $_POST["start"] : 0;
        $param["limit"] = isset($_POST["length"]) ? $_POST["length"] : 10;
        $param["tipe_bisnis"]         = $_POST["tipe_bisnis"];

        $data["data"] = $this->db->query('EXEC [GET_REPORT_DETAIL] @TIPEBISNIS=' . $param["tipe_bisnis"] . ',@START=' . $param["start"] . ',@LIMIT=' . $param["limit"] . ' ')->result();

        $total = $this->db->query('EXEC [GET_REPORT_DETAIL] @TIPEBISNIS=' . $param["tipe_bisnis"] . ',@COUNT=1 ')->row()->COUNT_DATA;

        $data["recordsTotal"] = $total;
        $data["recordsFiltered"] = $total;

        echo json_encode($data);
    }

    //set redis
    public function set_redis_report_detail()
    {

        $this->load->driver('cache');

        $second = $this->uri->segment(3);

        $ulamm = $this->Report_model->report_detail(1);
        $mekaar = $this->Report_model->report_detail(2);

        $db_error = $this->db->error();

		if (!empty($db_error['message']))
		{		
            echo date('Y-m-d H:i:s')." Data gagal di simpan di redis";
		}      

        $this->cache->redis->save('report_detail_ulamm', $ulamm, $second);
        $this->cache->redis->save('report_detail_mekaar', $mekaar, $second);

        echo date('Y-m-d H:i:s')." Data berhasil di simpan di redis";
        exit;
    }

    public function download_excel_report_detail_ulamm()
    {

        $objPHPExcel = PHPExcel_IOFactory::load("./assets/template/report_detail_ulamm.xlsx");

        $objPHPExcel->setActiveSheetIndex(0);

        $h = $this->Report_model->report_detail(1);		

        // $h = $this->Report_model->get_redis_report_detail_ulamm();

        $rowStart = 5;

        if ($h) {
            for ($i = 0; $i < count($h); $i++) {
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('B' . ($i + $rowStart), $h[$i]->NASABAH_TIPE, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('C' . ($i + $rowStart), $h[$i]->ID_NASABAH, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('D' . ($i + $rowStart), $h[$i]->NAMA, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('E' . ($i + $rowStart), $h[$i]->PLAFOND, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('F' . ($i + $rowStart), $h[$i]->WILAYAH, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('G' . ($i + $rowStart), $h[$i]->DESKRIPSI_CABANG_ULAMM, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('H' . ($i + $rowStart), $h[$i]->DESKRIPSI_UNIT_ULAMM, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('I' . ($i + $rowStart), $h[$i]->TIPE_PELATIHAN_DESKRIPSI, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('J' . ($i + $rowStart), $h[$i]->NO_PROPOSAL, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('K' . ($i + $rowStart), $h[$i]->NO_PROPOSAL, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('L' . ($i + $rowStart), $h[$i]->TEMA_PELATIHAN, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('M' . ($i + $rowStart), $h[$i]->TITLE, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('N' . ($i + $rowStart), $h[$i]->SEKTOR_EKONOMI, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('O' . ($i + $rowStart), $h[$i]->TIPE_KREDIT, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('P' . ($i + $rowStart), $h[$i]->TANGGAL_MULAI, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('Q' . ($i + $rowStart), $h[$i]->TANGGAL_REALISASI_MULAI, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('R' . ($i + $rowStart), $h[$i]->BUDGET, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('S' . ($i + $rowStart), $h[$i]->GRADING, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('T' . ($i + $rowStart), $h[$i]->KELAS_WARNA, PHPExcel_Cell_DataType::TYPE_STRING);
            }
        }

        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ),
            'font' => array(
                'size' => 8
            ),
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'wrap' => true
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('B' . $rowStart . ':T' . ($rowStart + count($h) - 1))->applyFromArray($styleArray);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="report_detail_ulamm.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit();
    }


    public function download_excel_report_detail_mekaar()
    {

        $objPHPExcel = PHPExcel_IOFactory::load("./assets/template/report_detail_mekaar.xlsx");

        $objPHPExcel->setActiveSheetIndex(0);

        $h = $this->Report_model->report_detail(2);			

        // $h = $this->Report_model->get_redis_report_detail_mekaar();

        $rowStart = 5;

        if ($h) {
            for ($i = 0; $i < count($h); $i++) {
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('B' . ($i + $rowStart), $h[$i]->NASABAH_TIPE, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('C' . ($i + $rowStart), $h[$i]->ID_NASABAH, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('D' . ($i + $rowStart), $h[$i]->NAMA, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('E' . ($i + $rowStart), $h[$i]->PLAFOND, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('F' . ($i + $rowStart), $h[$i]->WILAYAH, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('G' . ($i + $rowStart), $h[$i]->DESKRIPSI_CABANG_ULAMM, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('H' . ($i + $rowStart), $h[$i]->DESKRIPSI_REGION_MEKAAR, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('I' . ($i + $rowStart), $h[$i]->DESKRIPSI_CABANG_MEKAAR, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('J' . ($i + $rowStart), $h[$i]->TIPE_PELATIHAN_DESKRIPSI, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('K' . ($i + $rowStart), $h[$i]->NO_PROPOSAL, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('L' . ($i + $rowStart), $h[$i]->NO_PROPOSAL, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('M' . ($i + $rowStart), $h[$i]->TEMA_PELATIHAN, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('N' . ($i + $rowStart), $h[$i]->TITLE, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('O' . ($i + $rowStart), $h[$i]->SEKTOR_EKONOMI, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('P' . ($i + $rowStart), $h[$i]->TANGGAL_MULAI, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('Q' . ($i + $rowStart), $h[$i]->TANGGAL_REALISASI_MULAI, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('R' . ($i + $rowStart), $h[$i]->BUDGET, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('S' . ($i + $rowStart), $h[$i]->GRADING, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit('T' . ($i + $rowStart), $h[$i]->KELAS_WARNA, PHPExcel_Cell_DataType::TYPE_STRING);
            }
        }

        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ),
            'font' => array(
                'size' => 8
            ),
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'wrap' => true
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle('B' . $rowStart . ':T' . ($rowStart + count($h) - 1))->applyFromArray($styleArray);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="report_detail_mekaar.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit();
    }


    // public function readExcelFile()
    // {

    //     try {

    //         //Lokasi file excel	      
    //         $file_path = "/var/www/html/phpsxcelspout";
    //         $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
    //         $reader->open($file_path); //open the file	  	      

    //         echo "<pre>";
    //         $i = 0;

    //         /**                  
    //          * Sheets Iterator. Kali aja multiple sheets                  
    //          **/
    //         foreach ($reader->getSheetIterator() as $sheet) {

    //             //Rows iterator	               
    //             foreach ($sheet->getRowIterator() as $row) {

    //                 print_r($row);

    //                 ++$i;
    //             }
    //         }

    //         echo "<br> Total Rows : " . $i . " <br>";
    //         $reader->close();


    //         echo "Peak memory:", (memory_get_peak_usage(true) / 1024 / 1024), " MB", "<br>";
    //     } catch (Exception $e) {

    //         echo $e->getMessage();
    //         exit;
    //     }
    // } 



    // public function set_redis_hash_report_detail()
    // {

    //     $this->load->driver('cache');
    //     $redis = new Redis();
    //     $redis->connect('some-redis', 6379); 

    //     $ulamm = $this->Report_model->report_detail(1);        

    //     foreach ($ulamm as $val){
    //         #pattern hset for searching/filter data
    //         #<nama_table:id inc table> <nilai> <kolom:id inc table>
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->NASABAH_TIPE, 'NASABAH_TIPE:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->ID_NASABAH, 'ID_NASABAH:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->NAMA, 'NAMA:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->WILAYAH, 'WILAYAH:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->CABANG_ULAMM, 'CABANG_ULAMM:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->UNIT_ULAMM, 'UNIT_ULAMM:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->REGIONAL_MEKAAR, 'REGIONAL_MEKAAR:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->AREA_MEKAAR, 'AREA_MEKAAR:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->CABANG_MEKAAR, 'CABANG_MEKAAR:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->TIPE_PELATIHAN_DESKRIPSI, 'TIPE_PELATIHAN_DESKRIPSI:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->NO_PROPOSAL, 'NO_PROPOSAL:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->TITLE, 'TITLE:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->TANGGAL_MULAI, 'TANGGAL_MULAI:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->TANGGAL_REALISASI_MULAI, 'TANGGAL_REALISASI_MULAI:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->BUDGET, 'BUDGET:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->GRADING, 'GRADING:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->KELAS_WARNA, 'KELAS_WARNA:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->TEMA_PELATIHAN, 'TEMA_PELATIHAN:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->SEKTOR_EKONOMI, 'SEKTOR_EKONOMI:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->TIPE_KREDIT, 'TIPE_KREDIT:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->PLAFOND, 'PLAFOND:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->DESKRIPSI_CABANG_ULAMM, 'DESKRIPSI_CABANG_ULAMM:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->DESKRIPSI_REGION_MEKAAR, 'DESKRIPSI_REGION_MEKAAR:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->DESKRIPSI_CABANG_MEKAAR, 'DESKRIPSI_CABANG_MEKAAR:'.$val->ID);
    //         $redis->hset('detail_ulamm:'.$val->ID, $val->DESKRIPSI_UNIT_ULAMM, 'DESKRIPSI_UNIT_ULAMM:'.$val->ID);

    //         #pattern zadd for paging ambil id aja
    //         #<nama_table> <nilai> <nama_table:inc table>
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //         $redis->zadd('detail_ulamm_page', '', 'detail_ulamm:'.$val->ID);
    //     }
        

    //     echo date('Y-m-d H:i:s')." Data berhasil di simpan di redis";
    //     exit;
    // }        


    // public function get_redis_hash_report_detail()
    // {

    //     $this->load->driver('cache');
    //     $redis = new Redis();
    //     $redis->connect('some-redis', 6379);     

    //     $page = $redis->zrange('detail_ulamm_page',0,10);
    //     $data = array();
        
    //     for ($x=0; $x<=10; $x++){
    //         $row = $redis->hgetall($page[$x]);
    //         if (COUNT($row)>0){
    //             $data[$x] = $row;
    //         }
    //     }

    //     echo '<pre>';
	// 	print_r($data);
	// 	echo '</pre>';die;
    // }

}

