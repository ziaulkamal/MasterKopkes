<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_Anggota extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
        'Data_Entry/M_create' => 'mc',
        'Data_Entry/M_function' => 'mf',
    ));
  }

  public function index()
  {
    $load = $this->mv->master_view_anggota_all();

    $data = array(
      'js'    => 'dataTables',
      'title' => 'Data Anggota',
      'anggota' => $load,
      'page'  => 'page/anggota/list',
    );
    $this->load->view('main', $data);
  }

  function daftar()
  {
    $load = $this->mv->get_instansi();
    $data = array(
      'js'    => '',
      'title' => 'Daftar Anggota',
      'instansi' => $load,
      'page'  => 'page/anggota/daftar',
    );
    $this->load->view('main', $data);
  }

  function simpan_anggota()
  {
    $load = $this->mv->get_anggota_last();
    $last_id = $load->id;
    $nama_anggota = $this->input->post('nama_lengkap');
    $instansi = $this->input->post('instansi');
    $no_anggota = $instansi.($last_id+1);
    $alamat = $this->input->post('alamat');
    $status = $this->input->post('status_anggota');
    $registration = date('Y-m-d');
    $no_rekening = date('Y').$no_anggota;

    $data = array(
      'no_anggota' => $no_anggota,
      'nama_anggota' => $nama_anggota,
      'alamat' => $alamat,
      'instansi' => $instansi,
      'status' => $status,
      'registration' => $registration,
    );

    $rekening = array(
      'no_rekening' => $no_rekening,
      'anggota_no' => $no_anggota,
      'sts_pinjaman' => 0,
      'last_update' => $registration,
    );

    $this->mc->insert_anggota($data);
    $this->mc->insert_rekening($rekening);

    $this->session->set_flashdata('message', '<div class="alert alert-success"> Berhasil menambahkan anggota baru <b>'.$nama_anggota .'</b> silahkan masukan simpanan wajib terlebih dahulu. <a class="btn btn-info waves-effect waves-light" href="'.base_url('simpanan_pertama/').$no_rekening.'">Klik Disini</a> </div>');
    redirect('anggota');
  }


  function update($no_anggota)
  {
    $instansi = $this->mv->get_instansi();
    $load = $this->mf->get_anggota_by_no($no_anggota);
    if ($load) {
      $data = array(
        'no_anggota'  => set_value('no_anggota', $load->no_anggota),
        'nama_anggota'=> set_value('nama_anggota', $load->nama_anggota),
        'nik'         => set_value('nik', $load->nik),
        'nip'         => set_value('nip', $load->nip),
        'tgl_lahir'   => set_value('lahir', $load->tgl_lahir),
        'alamat'      => set_value('alamat', $load->alamat),
        'instansi'    => $instansi,
        'status'      => set_value('status', $load->status),
        'registration'=> set_value('terdaftar', $load->registration),
        'js'          => '',
        'title'       => 'Edit Anggota',
        'page'        => 'page/anggota/update',
      );
      $this->load->view('main', $data);
    }
      else {
        redirect('anggota');
      }
  }

  function update_proses()
  {
    $no_anggota = $this->input->post('no_anggota');
    $data = array(
      'no_anggota'  => $no_anggota,
      'instansi'    =>  $this->input->post('instansi'),
      'nama_anggota'=> $this->input->post('nama_anggota'),
      'nik'         => $this->input->post('nik'),
      'nip'         => $this->input->post('nip'),
      'tgl_lahir'   => $this->input->post('tgl_lahir'),
      'alamat'      => $this->input->post('alamat'),
      'registration'=> $this->input->post('registration'),
    );
    $this->mf->update_anggota($no_anggota, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data dengan nomor anggota <b>'.$no_anggota.'</b> dan nama anggota <b>'.$nama_anggota.'</b> Berhasil diubah </div>');
    redirect ('anggota');
  }

  function delete($no_anggota)
  {
    $this->mf->delete($no_anggota);
    $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data dengan nomor anggota <b>'.$no_anggota.'</b> Berhasil dihapus </div>');
    redirect('anggota');
  }
}
