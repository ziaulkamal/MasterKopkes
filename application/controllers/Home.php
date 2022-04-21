<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      'Data_Entry/M_function' => 'mf',
      'Data_Entry/M_views' => 'mv',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));

  }

  function index()
  {

    $data = array(
        'js'  => 'charts',
        'title' => 'Dashboard',
        'jumlah_instansi' => $this->mf->jumlah_instansi(),
        'jumlah_anggota'  => $this->mf->jumlah_anggota(),
        'jumlah_simpanan'  => $this->mf->jumlah_simpanan(),
        'total_pinjaman'  => $this->mf->jumlah_anggota_pinjam(),
        'total_angsuran'  => $this->mf->jumlah_anggota_angsur(),
        'page' => 'page/starter',
        // 'total_anggota' => $tl_anggota,
        // 'total_simpanan' => $tl_simpanan,
      );
      $this->load->view('main', $data);
  }

}
