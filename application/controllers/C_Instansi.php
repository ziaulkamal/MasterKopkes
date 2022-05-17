<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Instansi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
        'Data_Entry/M_function' => 'mf',
        'Data_Entry/M_create' => 'mc',
    ));

  }

  function index()
  {
    $load = $this->mv->get_instansi();
    $data = array(
      'js'    => 'dataTables',
      'title' => 'Data Instansi',
      'instansi' => $load,
      'page'  =>  'page/instansi/index',
     );
     $this->load->view('main', $data);
  }

  function tambah_instansi()
  {
    $load = $this->mf->last_instansi();
    $data = array(
      'js'    => '',
      'title' => 'Tambah Instansi Baru',
      'instansi' => $load->kode_instansi,
      'page'  =>  'page/instansi/daftar',
     );
     $this->load->view('main', $data);
  }

  function update_instansi($kode_instansi)
  {

    $load = $this->mf->get_instansi($kode_instansi);
    if ($load) {
      $data = array(
        'kode_instansi'  => set_value('kode_instansi', $load->kode_instansi),
        'nama_instansi'  => set_value('nama_instansi', $load->nama_instansi),
        'alamat_instansi'=> set_value('alamat_instansi', $load->alamat_instansi),
        'js'             => '',
        'title'          => 'Edit Instansi',
        'page'           => 'page/instansi/update'
      );
      $this->load->view('main', $data);
    }
      else {
        redirect('instansi');
      }
  }

  function proses_instansi()
  {
    $data = array(
      'kode_instansi'  => '0'.$this->input->post('kode_instansi'),
      'nama_instansi'  => $this->input->post('nama_instansi'),
      'alamat_instansi'=> $this->input->post('alamat_instansi'),
      'registration'   => date('Y-m-d'),
    );

    $this->mc->insert_instansi($data);

    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data dengan kode instansi<b>'.$data['kode_instansi'].'</b> Berhasil Ditambahkan </div>');
    redirect ('instansi');
  }

  function proses_update_instansi()
  {
    $kode_instansi = $this->input->post('kode_instansi');
    $data = array(
      'nama_instansi'  => $this->input->post('nama_instansi'),
      'alamat_instansi'=> $this->input->post('alamat_instansi'),
      'registration'   => date('Y-m-d'),
    );

    $this->mc->update_instansi($kode_instansi,$data);

    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data dengan kode instansi<b>'.$kode_instansi.'</b> Berhasil di ubah </div>');
    redirect ('instansi');
  }

  function delete($kode_instansi)
  {
    $this->mf->delete_instansi($kode_instansi,$data);
    $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data dengan kode instansi <b>'.$kode_instansi.'</b> Berhasil dihapus </div>');
    redirect('instansi');
  }

}
