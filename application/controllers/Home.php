<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      'Data_Entry/M_function' => 'amf',
      'Data_Entry/M_views' => 'amv',
      'Starter' => 'own',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));
    if ($this->session->userdata('masuk') != TRUE) {
      redirect('logout');
    }

  }

  function index()
  {
    $data = array(
        'js'  => 'charts',
        'title' => 'Dashboard',
        'jumlah_instansi' => $this->amf->jumlah_instansi(),
        'jumlah_anggota'  => $this->amf->jumlah_anggota(),
        'brangkas' => $this->own->get_brangkas()->row(),
        'page' => 'page/starter',
        // 'total_anggota' => $tl_anggota,
        // 'total_simpanan' => $tl_simpanan,
      );
      $this->load->view('main', $data);
  }

}
