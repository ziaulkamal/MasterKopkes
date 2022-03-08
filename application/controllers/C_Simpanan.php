<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Simpanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_anggota');
    $this->load->model('M_rekening');


  }

  // IDEA: cari data anggota
  function cari_simpan()
  {
    $data = array(
      'js'      =>  '',
      'title'   =>  'Cari Nasabah',
      'placeholder' => 'Masukkan ID Anggota',
      'name'    =>  'no_anggota',
      'page'    =>  'page/simpanan/cari_simpan'
    );
    $this->load->view('main', $data);
  }

// IDEA: memilih simpanan anggota
  function simpan_action()
  {
      $cari['cari'] = array();
      if ($query = $this->M_anggota->cari_anggota($this->input->post('no_anggota'))) {
        $cari['cari'] =  $query;
      }
    $data = array(
      'js'      =>  '',
      'title'   => 'Data Anggota',
      'anggota' => $cari['cari'],
      'page'    => 'page/simpanan/simpan.php',
    );
    $this->load->view('main', $data);
  }

  // IDEA: proses simpan data simpanan anggota

  function data_simpan()
  {
      $no_anggota = $this->input->post('no_anggota');
      $jml_simpan = $this->input->post('jml_simpan');
      $tgl_simpan = $this->input->post('tgl_simpan');
      $keterangan = $this->input->post('keterangan');

      $data = array(
        'no_anggota' => $no_anggota,
        'jml_simpan' => $jml_simpan,
        'tgl_simpan' => $tgl_simpan,
        'keterangan' => $keterangan,
       );
       $this->M_rekening->insertD($data);
       $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Berhasil Menambahkan Simpana baru dengan nama <strong>'.$data['nm_lengkap']. '</strong> dengan ID Anggota <strong>'.$data['no_anggota'].'<strong></div>');
       redirect('C_Simpanan/cari_simpan');
    }

    function penarikan()
    {
      $tampil_data = $this->M_rekening->data_rekening()->result();
      $data = array(
        'js' => 'editdata' ,
        'simpanan' => $tampil_data,
        'title' => 'Data Anggota',
        'page'  =>  'page/simpanan/data_simpan',
      );
      $this->load->view('main', $data);
    }

  }
