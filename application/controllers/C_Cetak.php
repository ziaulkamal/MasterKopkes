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

    $loads = $this->mv->log_transaksi($kode_log);
    $load = $loads->row();
    if ($loads == null) {
      echo "Paramameter Salah";
    }else {
      $data = array(
        'js'      => '',
        'title'   => 'Cetak Invoice',
        'nama_anggota' => $load->nama_anggota,
        'no_rekening' => $load->no_rekening,
        'kode_log' => $load->kode_log,
        'jumlah' => $this->conv->convRupiah($load->jumlah),
        'kode_jenis' => $load->kode_jenis,
        'jenis' => $load->jenis,
        'last_update' => $load->last_update,
      );
      $this->load->view('cetak/invoice', $data);
    }

  }
}
