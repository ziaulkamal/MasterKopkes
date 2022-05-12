<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Operasional extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('form_validation');
    $this->load->model(array(
      'Data_Operasional/M_update' => 'mu',
      'Data_Operasional/M_function' => 'mf',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));

  }

  function cash_in()
  {
    $load = array(
      'kas'   => $this->mf->get_brangkas()->row(),
      'logs' => $this->mf->log_last_operasional_limit()->result(),
    );

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penambahan Kas Operasional',
      'action'  => 'p_cash_in',
      'kas'     =>  $this->conv->convRupiah($load['kas']->kas),
      'logs'     =>  $load['logs'],
      'page'    =>  'page/operasional/fitur'
    );
    $this->load->view('main', $data);
  }

  function cash_out()
  {
    $load = array(
      'kas'   => $this->mf->get_brangkas()->row(),
      'logs' => $this->mf->log_last_operasional_limit()->result(),
    );

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Kas Operasional',
      'action'  => 'p_cash_out',
      'action'  => 'p_cash_out',
      'kas'     =>  $this->conv->convRupiah($load['kas']->kas),
      'logs'     =>  $load['logs'],
      'page'    =>  'page/operasional/fitur'
    );
    $this->load->view('main', $data);
  }

  function update_cash_out()
  {
    $load           = $this->mf->get_brangkas()->row();
    $kas            = $load->kas;
    $jumlah         = $this->input->post('nominal');
    $jenis          = $this->input->post('jenis');
    $keterangan     = $this->input->post('keterangan');
    $last_update    = date('Y-m-d');

    if ($jenis == 1) {
      $kode_jenis = "Kebutuhan ATK";
    }elseif ($jenis == 2) {
      $kode_jenis = "Biaya Honor";
    }elseif ($jenis == 3) {
      $kode_jenis = "Biaya RAT";
    }elseif ($jenis == 4) {
      $kode_jenis = "Beban  Tunjangan Hari Raya";
    }elseif ($jenis == 5) {
      $kode_jenis = "Biaya Penghapusan";
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show"><b>Opsi yang dikirimkan harus dipilih</b></div>');
      redirect('operasional/cash_out');
    }

    $log = array(
      'nominal'       => $jumlah,
      'jenis'         => $jenis,
      'keterangan'    => 'Penggunaan Dana Kas Senilai '. $this->conv->convRupiah($jumlah) . ' Untuk ' .$kode_jenis .' Pada Tanggal '. $last_update . '( '.$keterangan.' )',
      'last_update'   => $last_update,
    );

    $brangkas['kas'] = $kas - $jumlah;
    $brangkas['last_update'] = $last_update;

    $this->mu->add_log($log);
    $this->mu->update_brangkas($brangkas);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">'.$log['keterangan'].'</div>');
    redirect('operasional/cash_out');
  }

  function update_cash_in()
  {
    $load           = $this->mf->get_brangkas()->row();
    $kas            = $load->kas;
    $jumlah         = $this->input->post('nominal');
    $jenis          = $this->input->post('jenis');
    $keterangan     = $this->input->post('keterangan');
    $last_update    = date('Y-m-d');

    if ($jenis == 6) {
      $kode_jenis = "Dana Sisa Pengembalian SHU";
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show"><b>Opsi yang dikirimkan harus dipilih</b></div>');
      redirect('operasional/cash_in');
    }

    $log = array(
      'nominal'       => $jumlah,
      'jenis'         => $jenis,
      'keterangan'    => $kode_jenis .' '. $this->conv->convRupiah($jumlah) .' Pada Tanggal '. $last_update . '( '.$keterangan.' )',
      'last_update'   => $last_update,
    );

    $brangkas['kas'] = $kas + $jumlah;
    $brangkas['last_update'] = $last_update;

    $this->mu->add_log($log);
    $this->mu->update_brangkas($brangkas);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">'.$log['keterangan'].'</div>');
    redirect('operasional/cash_in');
  }

  function neraca()
  {
    // code...
  }
}
