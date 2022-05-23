<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Excel_report extends CI_Controller{
  // Include librari PhpSpreadsheet

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array(
      'Data_Entry/M_create' => 'demc',
      'Data_Entry/M_function' => 'demf',
      'Data_Entry/M_views' => 'demv',
      'Data_Operasional/M_function' => 'domf',
      'Data_Operasional/M_function' => 'domu'
    ));
    
  }

  function index()
  {
    echo "valid";
  }

  function export_neraca_saldo()
  {
    $tagLine = 'NERACA SALDO PER '.date('d').' DESEMBER '.date('Y');


    $inputFileName = './assets/template/neraca-saldo-tahunan.xlsx';
    $reader = new Xlsx();
    $spreadsheet = $reader->load($inputFileName);
    // IDEA: Grouping Load Data Untuk Sheet 1
    $sheet_1 = $spreadsheet->getSheet(0);

    $sheet_1->setCellValue('A4', $tagLine);

    // IDEA: End Grouping Load Data Untuk Sheet 1
    $fileName = 'Neraca Saldo '. date('d') .' Desember '. date('Y');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('php://output');

  }

}
