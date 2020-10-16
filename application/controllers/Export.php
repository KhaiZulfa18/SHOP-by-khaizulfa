<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;


class Export extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
        $this->load->model('administator');
		$this->load->helper('user_helper');
        $this->load->helper('text'); 
	}

	public function export_penjualan()
	{
        $list_penjualan = $this->administator->get_data_penjualan('id','ASC','tbl_penjualan')->result();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
        	->setCellValue('A2','No')
        	->setCellValue('B2','ID Invoice')
        	->setCellValue('C2','Total')
        	->setCellValue('D2','Tanggal Penjualan');

        $styleArray = [
		    'font' => [
		        'bold' => true,
		    ],
		    'borders' => [
		        'top' => [
		            'borderStyle' => Border::BORDER_THIN,
		        ],
		        'bottom' => [
		            'borderStyle' => Border::BORDER_THIN,
		        ],
		        'left' => [
		            'borderStyle' => Border::BORDER_THIN,
		        ],
		        'right' => [
		            'borderStyle' => Border::BORDER_THIN,
		        ],
		    ],
		];

		$spreadsheet->getActiveSheet()->getStyle('A2:D2')->applyFromArray($styleArray);

        $col = 3;
        $no = 1;
        foreach ($list_penjualan as $data) {
        	
        	$spreadsheet->setActiveSheetIndex(0)
        		->setCellValue('A'.$col, $no)
        		->setCellValue('B'.$col, $data->id_invoice)
        		->setCellValue('C'.$col, $data->total)
        		->setCellValue('D'.$col, $data->tgl_penjualan);

        	$col++;
        	$no++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
	 	header('Content-Disposition: attachment;filename="Penjualan.xlsx"');
	  	header('Cache-Control: max-age=0');

	  	$writer->save('php://output'); 
	}
}