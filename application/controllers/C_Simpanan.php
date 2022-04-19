<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Simpanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      'Data_Entry/M_create' => 'mc',
      'Data_Entry/M_views' => 'mv',
    ));

  }

  function simpan_rekening($no_rekening)
  {
    $load = $this->mv->get_detail_rekening($no_rekening);
    $p = $load->s_pokok;
    $w = $load->s_wajib;
    $k = $load->s_khusus;
    $l = $load->s_lain;
    $t = $load->total_akumulasi;
    $last_update = date('d-m-Y');
    $no_rekening = $load->no_rekening;
    $jumlah = $this->input->post('jml_simpan');

    if ($this->input->post('jenis_simpanan') == 1) {
      $data = array(
          's_pokok' => $p + $jumlah,
          'total_akumulasi' => $t + $jumlah,
          'last_update' => $last_update,
      );
    }elseif ($this->input->post('jenis_simpanan') == 2) {
      $data = array(
          's_wajib' => $w + $jumlah,
          'total_akumulasi' => $t + $jumlah,
          'last_update' => $last_update,
      );
    }elseif ($this->input->post('jenis_simpanan') == 3) {
      $data = array(
          's_khusus' => $k + $jumlah,
          'total_akumulasi' => $t + $jumlah,
          'last_update' => $last_update,
      );
    }elseif ($this->input->post('jenis_simpanan') == 4) {
      $data = array(
          's_lain' => $l + $jumlah,
          'total_akumulasi' => $t + $jumlah,
          'last_update' => $last_update,
      );
    }else {
      $data = array(
          's_lain' => $l + $jumlah,
          'total_akumulasi' => $t + $jumlah,
          'last_update' => $last_update,
      );
    }

    $this->mc->update_rekening($no_rekening, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Berhasil Mengupdate Simpanan</div>');
    redirect('simpanan');
  }

}
