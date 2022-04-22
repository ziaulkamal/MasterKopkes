<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Cetak extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
    ));
  }

  function index()
  {
    $load = $this->mv->master_view_anggota_all();
    foreach ($load as $data) {
    $nama       = $data->nama;
    $no_anggota = $data->no;
    $tanggal    = $data->terdaftar;
  }
      $data = array(
        'nama'        => $nama,
        'no_anggota'  => $no_anggota,
        'tanggal'     => $tanggal,
        'js'      => '',
        'title'   => 'Cetak Invoice',
        );
        $this->load->view('cetak/cetak', $data);
  }
}
