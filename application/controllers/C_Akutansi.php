<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Akutansi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
        'Data_Entry/M_function' => 'mf',
    ));
    $this->load->helper('curency_indo_helper');
  }

  function tambah_simpanan()
  {
    // IDEA: Tangkap Penampung Data ke Array Kosong
    $q['s'] = [];
    if ($s = $this->mf->cari_anggota(htmlspecialchars($this->input->post('no_anggota')))) {
      $q['s'] = $s;
      foreach ($q['s'] as $s) { $no_rekening = $s->no_rekening;}
      $load = $this->mf->detail_anggota_simpanan($no_rekening);

      $data = array(
        'js'      => false,
        'title'   =>  'Tambah Simpanan Anggota',
        'rekening' =>  $load,
        'page'    =>  'page/rekening/simpanan_rekening'
      );
      $this->load->view('main', $data);
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data Tersebut Tidak Ada Di Sistem </div>');
      redirect('cari_simpanan');

    }

  }

  function rekening()
  {
    $load = $this->mf->list_rekening();

    $data = array(
      'js'    => 'dataTables',
      'title' => 'Simpanan Anggota',
      'rekening' => $load,
      'page'  => 'page/rekening/anggota_rekening',
    );
    $this->load->view('main', $data);
  }

  function tambah_pinjaman()
  {
    // IDEA: Tangkap Penampung Data ke Array Kosong
    $q['s'] = [];
    if ($s = $this->mf->cari_anggota(htmlspecialchars($this->input->post('no_anggota')))) {
      $q['s'] = $s;
      foreach ($q['s'] as $s) { $no_rekening = $s->no_rekening;}
      $load = $this->mf->detail_anggota_simpanan($no_rekening);


      $data = array(
        'js'      => false,
        'title'   =>  'Tambah Pinjaman Anggota',
        'rekening' =>  $load,
        'page'    =>  'page/rekening/pinjaman_rekening'
      );
      $this->load->view('main', $data);
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data Tersebut Tidak Ada Di Sistem </div>');
      redirect('cari_simpanan');

    }
  }

}
