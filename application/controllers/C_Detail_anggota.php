<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Detail_anggota extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
        'Data_Entry/M_create' => 'mc',
        'Data_Entry/M_function' => 'mf',
    ));
     $this->load->helper('tgl_indo');
     $this->load->library(array(
       'Curency_indo_helper' => 'conv',
       'Parsing_bulan' => 'bulan'
     ));
  }

  function cek_detail_anggota($no_rekening)
  {

    $rekening = $this->mv->get_detail_rekening($no_rekening);
    $master_data = $this->mv->detail_cek($no_rekening);
    $no_anggota = $master_data->no_anggota;
    $pinjaman = $this->mv->detail_cek_pinjaman($no_rekening)->result();
    $angsuran = $this->mv->detail_cek_angsuran($no_anggota)->result();


    if ($rekening != NULL && $master_data != NULL) {
      $data = array(
        'js'    => '',
        'title' => 'Detail Anggota',
        'rekening' => $rekening,
        'master_data' => $master_data,
        'pinjaman' => $pinjaman,
        'angsuran' => $angsuran,
        'page'  => 'page/anggota/detail',
      );
      $this->load->view('main', $data);
    }else {
      echo "GAGAL Ambil Data";
    }
  }

  function cek_detail_simpanan($no_rekening)
  {

    $rekening = $this->mv->get_detail_rekening($no_rekening);
    $master_data = $this->mv->detail_cek($no_rekening);
    $log_simpanan = $this->mv->log_all_simpanan($no_rekening)->result();
    if ($rekening != NULL && $master_data != NULL) {
      $data = array(
        'js'    => '',
        'title' => 'Detail Anggota Simpanan',
        'rekening' => $rekening,
        'master_data' => $master_data,
        'log_simpanan' => $log_simpanan,
        'page'  => 'page/simpanan/detail',
      );
      $this->load->view('main', $data);
    }else {
      echo "GAGAL Ambil Data";
    }
  }

  function get_user_list()
  {
    $anggota = $this->mv->crawl_anggota()->result();
    $data = array(
      'js'    => '',
      'anggota'    => $anggota,
      'title' => 'Cari Dengan Nomor Rekening',
      'page'  => 'page/rekening/cari',
    );
    $this->load->view('main', $data);
  }

}
