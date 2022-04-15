<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_dashboard');
  }

  //total anggota
  //total Simpanan
  //total kas
  //total simpok
  //total simwa
  //total simka
  //total dagoro
  //total Pinjaman
  //total angsuran
  //Pembayaran  Tertunda

  function index()
  {
    $tl_anggota  = $this->M_dashboard->total_anggota();
    $tl_simpanan = $this->M_dashboard->total_simpanan();
    $data = array(
        'js'  => 'charts',
        'title' => 'Dashboard',
        'page' => 'page/starter',
        'total_anggota' => $tl_anggota,
        'total_simpanan' => $tl_simpanan,
      );
      $this->load->view('main', $data);
  }

}
