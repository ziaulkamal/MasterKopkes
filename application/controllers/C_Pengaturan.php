<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pengaturan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_setting');
  }
  // nama_app
  // versi_app
  // modul
  // conf_sts
  // zona_waktu
  // set_petugas
  // modul_active
  // last_update
  // access_token

   function index()
  {
      $tampil_data = $this->M_setting->getAll();
      $data = array(
        'js' => '',
        'title' => 'Pengaturan',
        'setting' => $tampil_data,
        'page'  => 'page/pengaturan/set_app',
      );
      $this->load->view('main', $data);
  }

  function detail_app()
  {
    $row = $this->M_setting->getData();
    if ($row) {

    $data = array(
      'js' => 'edit',
      'page' => 'page/pengaturan/detail',
      'nama_app' => $row->nama_app,
      'versi_app' => $row->versi_app,
      'modul' => $row->modul,
      'conf_sts' => $row->conf_sts,
      'zona_waktu' => $row->zona_waktu,
      'set_petugas' => $row->set_petugas,
      'modul_active' => $row->modul_active,
      'last_update' => $row->last_update,
      'access_token' => $row->access_token,
    );
    $this->load->view('main', $data);
  }
    else {
      $this->session->set_flashdata('message', '<div class="alert-danger">Data yang Anda Cari Tidak Ditemukan</div>');
      redirect('C_Pengaturan/index');
    }
  }
  function edit_app()
  {
    $row = $this->M_setting->getData();
    if ($row) {
      $data = array(
        'js' => '',
        'page' => 'page/pengaturan/edit_app',
        'nama_app' => set_value('nama_app', $row->nama_app),
        'versi_app' => set_value('versi_app', $row->versi_app),
        'modul' => set_value('modul', $row->modul),
        'conf_sts' => set_value('conf_sts', $row->conf_sts),
        'zona_waktu' => set_value('zona_waktu', $row->zona_waktu),
        'set_petugas' => set_value('set_petugas', $row->set_petugas),
        'modul_active' => set_value('modul_active', $row->modul_active),
        'last_update' => set_value('last_update', $row->last_update),
        'access_token' => set_value('access_token', $row->access_token),
      );
      $this->load->view('main', $data);
    }
    else {
      $this->session->set_flashdata('message', '<div class="alert-danger">Data yang Anda Cari Tidak Ditemukan</div>');
      redirect ('C_Pengaturan/index');
    }
  }

  function edit_action()
  {

      $data = array(
        'nama_app'    => $this->input->post('nama_app'),
        'versi_app'   => $this->input->post('versi_app'),
        'modul'       => $this->input->post('modul'),
        'conf_sts'    => $this->input->post('conf_sts'),
        'zona_waktu'  => $this->input->post('zona_waktu'),
        'set_petugas' => $this->input->post('set_petugas'),
        'modul_active'=> $this->input->post('modul_active'),
        'last_update' => $this->input->post('last_update'),
        'access_token'=> $this->input->post('access_token'),
      );
      $this->M_setting->update($data);
      $this->session->set_flashdata('message', '<div  class="alert alert-primary" role="alert">Pengaturan App Beshasil di Perbaharui.</div>');
      redirect ('C_Pengaturan/index');
  }

}
