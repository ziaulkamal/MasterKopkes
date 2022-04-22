<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class C_Cetak extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));
  }

  function index()
  {
      $data = array(
        'js'      => '',
        'title'   => 'Cetak Invoice',
        );
      $this->load->view('cetak/invoice', $data);
  }

  function simpanan($kode_log)
  {

    $load = $this->mv->log_transaksi($kode_log);

    if ($load == null) {
      echo "Paramameter Salah";
    }else {
      $data = array(
        'js'      => '',
        'title'   => 'Cetak Invoice',
        'no_anggota' => $load->anggota_no,
        'nama_anggota' => $load->nama_anggota,
        'kode_log' => $load->kode_log,
        'jumlah' => convRupiah($load->jumlah),
        'kode_jenis' => $load->kode_jenis,
        'jenis' => $load->jenis,
        'last_update' => $load->last_update,
      );
      $this->load->view('cetak/invoice', $data);
    }

  }
}
