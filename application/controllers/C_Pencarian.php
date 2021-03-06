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
    $this->load->library(array('Curency_indo_helper' => 'conv'));
    if ($this->session->userdata('masuk') != TRUE) {
      redirect('logout');
    }
  }

  function cari_anggota_simpanan()
  {
    $load = $this->mv->instansi_filter()->result();
    $data = array(
      'js'      =>  false,
      'title'   =>  'Group Anggota Berdasarkan Instansi',
      'load'    =>  $load,
      'name'    =>  'no_anggota',
      'page'    =>  'page/simpanan/cari_simpan'
    );
    $this->load->view('main', $data);
  }

  function tampil_by_instansi()
  {
    $load = $this->mv->res_instansi($this->input->post('instansi'))->result();
    $data = array(
      'js'      =>  'dataTables',
      'title'   =>  'Data Anggota Dengan Urutan Instansi',
      'load'    =>  $load,
      'page'    =>  'page/simpanan/list_simpanan_by_instansi'
    );
    $this->load->view('main', $data);
  }

  function cari_anggota_pinjaman()
  {
    $data = array(
      'js'      =>  false,
      'title'   =>  'Cari Anggota',
      'placeholder' => 'Masukkan Nomor Rekening Anggota',
      'name'    =>  'no_rekening',
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

  // function cari_by_instansi()
  // {
  //   $load = $this->
  // }
}
