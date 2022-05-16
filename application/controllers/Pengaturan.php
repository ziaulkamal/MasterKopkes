<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array(
      'Data_Operasional/M_update' => 'mu',
      'Data_Operasional/M_function' => 'mf',
    ));
  }

  function reset_kas()
  {
    $last_update = date('Y-m-d');

    $brangkas = array(
      'kas' => 0,
      'dana_gotongroyong' => 0,
      'dana_simpok' => 0,
      'dana_simwa' => 0,
      'dana_kusus' => 0,
      'dana_lainya' => 0,
      'total_hutang' => 0,
      'total_piutang' => 0,
      'jasa_usaha' => 0,
      'jasa_simpanan' => 0,
      'dana_cadangan' => 0,
      'dana_pengurus' => 0,
      'dana_pendidikan' => 0,
      'dana_kes_pegawai' => 0,
      'dana_sosial' => 0,
      'dana_audit' => 0,
      'dana_pembangunan' => 0,
      'dana_penghapusan' => 0,
      'last_update' => $last_update,
    );

    $this->mu->update_brangkas($brangkas);
    redirect('/');
  }

  function konfigurasi_dasar()
  {
    $data = array(
      'js'      =>  '',
      'title'   =>  'Pengaturan Set Data Brangkas Awal',
      'action'  =>  'result_config',
      'page'    =>  'page/pengaturan/tabel'
    );
    $this->load->view('main', $data);
  }

  function proses_setting()
  {
    $last_update = date('Y-m-d');

    $brangkas = array(
      'kas' => $this->input->post('kas'),
      'dana_gotongroyong' => $this->input->post('dana_gotongroyong'),
      'dana_simpok' => $this->input->post('dana_simpok'),
      'dana_simwa' => $this->input->post('dana_simwa'),
      'dana_kusus' => $this->input->post('dana_kusus'),
      'dana_lainya' => $this->input->post('dana_lainya'),
      'total_hutang' => $this->input->post('total_hutang'),
      'total_piutang' => $this->input->post('total_piutang'),
      'jasa_usaha' => $this->input->post('jasa_usaha'),
      'jasa_simpanan' => $this->input->post('jasa_simpanan'),
      'dana_cadangan' => $this->input->post('dana_cadangan'),
      'dana_pengurus' => $this->input->post('dana_pengurus'),
      'dana_pendidikan' => $this->input->post('dana_pendidikan'),
      'dana_kes_pegawai' => $this->input->post('dana_kes_pegawai'),
      'dana_sosial' => $this->input->post('dana_sosial'),
      'dana_audit' => $this->input->post('dana_audit'),
      'dana_pembangunan' => $this->input->post('dana_pembangunan'),
      'dana_penghapusan' => $this->input->post('dana_penghapusan'),
      'last_update' => $last_update,
    );

    $this->mu->update_brangkas($brangkas);
    redirect('/');
  }

}
