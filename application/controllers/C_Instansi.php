<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Instansi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
    $data = array(
      'js'    => 'instansi',
      'title' => 'Instansi',
      'page'  =>  'page/instansi/index',
     );
     $this->load->view('main', $data);
  }
  function tambah_instansi()
  {
    $data = array(
      'js'    => '',
      'title' => 'Tambah Instansi',
      'page'  => 'page/instansi/tambah',
    );
    $this->load->view('main', $data);
  }

}
