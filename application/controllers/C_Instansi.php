<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Instansi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
        'Data_Entry/M_function' => 'mf',
    ));

  }

  function index()
  {
    $load = $this->mv->get_instansi();
    $data = array(
      'js'    => 'dataTables',
      'title' => 'Data Instansi',
      'instansi' => $load,
      'page'  =>  'page/instansi/index',
     );
     $this->load->view('main', $data);
  }

  function tambah_instansi()
  {
    $load = $this->mf->last_instansi();
    $data = array(
      'js'    => '',
      'title' => 'Tambah Instansi Baru',
      'instansi' => $load->kode_instansi,
      'page'  =>  'page/instansi/daftar',
     );
     $this->load->view('main', $data);
  }

}
