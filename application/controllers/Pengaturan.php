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
      'Starter' => 'own',
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
    $load = $this->own->get_brangkas()->row();
    $data = array(
      'js'      =>  '',
      'title'   =>  'Pengaturan Set Data Brangkas Awal',
      'action'  =>  'result_config',
      'load'    =>  $load,
      'page'    =>  'page/pengaturan/tabel'
    );
    $this->load->view('main', $data);
  }

  function proses_setting()
  {
    $last_update = date('Y-m-d');

    $brangkas = array(
      'kas' => str_replace('.','',$this->input->post('kas')),
      'dana_gotongroyong' => str_replace('.','',$this->input->post('dana_gotongroyong')),
      'dana_simpok' => str_replace('.','',$this->input->post('dana_simpok')),
      'dana_simwa' => str_replace('.','',$this->input->post('dana_simwa')),
      'dana_kusus' => str_replace('.','',$this->input->post('dana_kusus')),
      'dana_lainya' => str_replace('.','',$this->input->post('dana_lainya')),
      'total_hutang' => str_replace('.','',$this->input->post('total_hutang')),
      'total_piutang' => str_replace('.','',$this->input->post('total_piutang')),
      'jasa_usaha' => str_replace('.','',$this->input->post('jasa_usaha')),
      'jasa_simpanan' => str_replace('.','',$this->input->post('jasa_simpanan')),
      'dana_cadangan' => str_replace('.','',$this->input->post('dana_cadangan')),
      'dana_pengurus' => str_replace('.','',$this->input->post('dana_pengurus')),
      'dana_pendidikan' => str_replace('.','',$this->input->post('dana_pendidikan')),
      'dana_kes_pegawai' => str_replace('.','',$this->input->post('dana_kes_pegawai')),
      'dana_sosial' => str_replace('.','',$this->input->post('dana_sosial')),
      'dana_audit' => str_replace('.','',$this->input->post('dana_audit')),
      'dana_pembangunan' => str_replace('.','',$this->input->post('dana_pembangunan')),
      'dana_penghapusan' => str_replace('.','',$this->input->post('dana_penghapusan')),
      'last_update' => $last_update,
    );

    $this->mu->update_brangkas($brangkas);
    redirect('/');
  }

  function error()
  {
    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Parameter yang di input tidak dikenal</div>');
    redirect('/');

  }
}
