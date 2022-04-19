<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_Anggota extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
        'Data_Entry/M_create' => 'mc',
        'Data_Entry/M_function' => 'mf',
    ));
  }

  public function index()
  {
    $load = $this->mv->master_view_anggota_all();

    $data = array(
      'js'    => 'dataTables',
      'title' => 'Data Anggota',
      'anggota' => $load,
      'page'  => 'page/anggota/list',
    );
    $this->load->view('main', $data);
  }
}
