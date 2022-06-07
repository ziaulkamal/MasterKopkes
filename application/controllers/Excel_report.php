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
      'Data_Operasional/M_function' => 'operasional_function',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));

  }

  function index()
  {
    echo "valid";
  }

  function export_neraca_saldo($id)
  {
    $tagLine = 'NERACA SALDO PER '.date('d').' DESEMBER '.date('Y');
    $tagLineBawah = 'Blangpidie, '.date('d').' Desember '. date('Y');
    $load = $this->operasional_function->get_master_by_id($id)->row();
    $inventaris_sekarang = $this->operasional_function->get_inventaris_sum()->row()->inventaris;
    $inventaris_beli = $this->operasional_function->get_inventaris_sum_beli()->row()->inventaris_beli;
    $akumulasi_penyusutan = $inventaris_sekarang - $inventaris_beli;

    $sum_shu = $this->operasional_function->sum_sisa_shu()->row()->sisa_shu;
    if ($sum_shu == null) {
      $sisa_bagian = 1868022;
    }else {
      $sisa_bagian = (1868022 + $sum_shu);
    }

    $inputFileName = './assets/template/neraca-saldo-tahunan.xlsx';
    $reader = new Xlsx();
    $spreadsheet = $reader->load($inputFileName);

    // IDEA: Grouping Load Data Untuk Sheet 1
    $sheet_1 = $spreadsheet->getSheet(0);
    $sheet_2 = $spreadsheet->getSheet(1);

    $sheet_1->setCellValue('A4', $tagLine);
    $sheet_1->setCellValue('D43', $tagLineBawah);
    $sheet_1->setCellValue('C8', $load->akumulasi_kas);
    $sheet_1->setCellValue('C9', $load->total_piutang);
    $sheet_1->setCellValue('C10', 0);
    $sheet_1->setCellValue('C12', $inventaris_sekarang);
    $sheet_1->setCellValue('C29', $load->biaya_atk);
    $sheet_1->setCellValue('C30', $load->biaya_honor);
    $sheet_1->setCellValue('C31', $load->biaya_lebaran);
    $sheet_1->setCellValue('C32', $load->biaya_rat);
    $sheet_1->setCellValue('C35', $load->biaya_penghapusan);
    $sheet_1->setCellValue('D15', $load->dana_lainya);
    $sheet_1->setCellValue('D16', $load->neraca_pengurus);
    $sheet_1->setCellValue('D17', $load->neraca_pendidikan);
    $sheet_1->setCellValue('D18', $load->neraca_kesejahteraan);
    $sheet_1->setCellValue('D19', $load->neraca_sosial);
    $sheet_1->setCellValue('D20', $load->neraca_audit);
    $sheet_1->setCellValue('D21', $load->neraca_pembangunan);
    $sheet_1->setCellValue('D22', $sisa_bagian);
    $sheet_1->setCellValue('D23', $load->dana_simpok);
    $sheet_1->setCellValue('D24', $load->dana_simwa);
    $sheet_1->setCellValue('D25', $load->dana_khusus);
    $sheet_1->setCellValue('D26', $load->neraca_cadangan);
    $sheet_1->setCellValue('D28', $load->akumulasi_margin);
    $sheet_1->setCellValue('D33', $load->dana_gotongroyong);
    $sheet_1->setCellValue('D36', $load->dana_penghapusan);
    $sheet_1->setCellValue('D39', $load->akumulasi_zakat);
    $sheet_1->setCellValue('E38', $load->akumulasi_shu_kotor);
    $sheet_1->setCellValue('H40', $load->akumulasi_shu_bersih);


    $sheet_2->setCellValue('A4', 'NERACA PER '.date('d').' DESEMBER '.date('Y'));
    $sheet_2->setCellValue('C38', $tagLineBawah);

    $sheet_2->setCellValue('C9', $load->akumulasi_kas);
    $sheet_2->setCellValue('C11', $load->total_piutang);
    $sheet_2->setCellValue('C13', 0);

    $sheet_2->setCellValue('C25', $inventaris_beli);
    $sheet_2->setCellValue('C26', $akumulasi_penyusutan);
    $sheet_2->setCellValue('F10', $load->neraca_pengurus);
    $sheet_2->setCellValue('F11', $load->neraca_pendidikan);
    $sheet_2->setCellValue('F12', $load->neraca_sosial);
    $sheet_2->setCellValue('F13', $load->neraca_pembangunan);
    $sheet_2->setCellValue('F14', $load->neraca_audit);
    $sheet_2->setCellValue('F15', $load->neraca_kesejahteraan);
    $sheet_2->setCellValue('F16', $load->dana_lainya);
    $sheet_2->setCellValue('F17', $load->dana_gotongroyong);
    $sheet_2->setCellValue('F18', $load->sisa_bagian);

    $sheet_2->setCellValue('F23', $load->akumulasi_zakat);
    $sheet_2->setCellValue('F28', $load->dana_simpok);
    $sheet_2->setCellValue('F29', $load->dana_simwa);
    $sheet_2->setCellValue('F30', $load->dana_khusus);
    $sheet_2->setCellValue('F31', $load->neraca_cadangan);
    $sheet_2->setCellValue('F33', $load->akumulasi_shu_bersih);
    $sheet_2->setCellValue('C38', $tagLineBawah);







    // IDEA: End Grouping Load Data Untuk Sheet 1
    $fileName = 'Neraca Saldo '. date('d') .' Desember '. date('Y');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('php://output');
  }

  function export_laporan_single()
  {
    // code...
  }


}
