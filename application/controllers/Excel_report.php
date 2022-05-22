<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_report extends CI_Controller{
  // Include librari PhpSpreadsheet
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  use PhpOffice\PhpSpreadsheet\IOFactory;
  
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

  }

}
