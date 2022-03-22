<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Instansi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_anggota');

  }

  function index()
  {
    $tampil_data = $this->M_anggota->getAll();
    $data = array(
      'js'    => 'instansi',
      'title' => 'Instansi',
      'anggota' => $tampil_data,
      'page'  =>  'page/instansi/index',
     );
     $this->load->view('main', $data);
  }

}
