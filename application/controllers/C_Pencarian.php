<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pencarian extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
        'Data_Entry/M_function' => 'mf',
    ));
    $this->load->helper('curency_indo_helper');
  }

  function cari_anggota_simpanan()
  {
    $data = array(
      'js'      =>  false,
      'title'   =>  'Cari Anggota',
      'placeholder' => 'Masukkan ID Anggota',
      'name'    =>  'no_anggota',
      'page'    =>  'page/rekening/search_anggota_simpanan'
    );
    $this->load->view('main', $data);
  }

  function cari_anggota_pinjaman()
  {
    $data = array(
      'js'      =>  false,
      'title'   =>  'Cari Anggota',
      'placeholder' => 'Masukkan ID Anggota',
      'name'    =>  'no_anggota',
      'page'    =>  'page/rekening/search_anggota_pinjaman'
    );
    $this->load->view('main', $data);
  }

  function add_simpanan($no_rekening)
  {
    $load = $this->mf->detail_anggota_simpanan($no_rekening);
    if ($load == null) {
      $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show">Anda Tidak Dibenarkan Akses Halaman Ini</div>');
      redirect('anggota');
    }else {
      $data = array(
        'js'      => false,
        'title'   =>  'Tambah Simpanan Anggota',
        'rekening' =>  $load,
        'page'    =>  'page/rekening/simpanan_rekening'
      );
      $this->load->view('main', $data);
    }
  }
}
