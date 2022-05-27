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
     $this->load->helper('tgl_indo');
     $this->load->library(array(
       'Curency_indo_helper' => 'conv',
       'Parsing_bulan' => 'bulan'
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
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
    $this->form_validation->set_rules('instansi', 'instansi', 'required');
    $this->form_validation->set_rules('status_anggota', 'status_anggota', 'required');

    $load = $this->mv->get_anggota_last();
    $last_id = $load->id;
    $nama_anggota = $this->input->post('nama_lengkap');
    $instansi = $this->input->post('instansi');
    $no_anggota = $instansi.($last_id+1);
    $alamat = $this->input->post('alamat');
    $status = $this->input->post('status_anggota');
    $registration = date('Y-m-d');
    $no_rekening = date('Y').$no_anggota;

    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Semua bidang wajib di isi </div>');
      redirect('daftar');
    }
    else
    {
      $data = array(
        'no_anggota' => $no_anggota,
        'nama_anggota' => htmlspecialchars($nama_anggota),
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

  }


  function update($no_anggota)
  {
    $instansi = $this->mv->get_instansi();
    $load = $this->mf->get_anggota_by_no($no_anggota);
    if ($load) {

      $data = array(
        'js'          => '',
        'load'        => $load,
        'instansi'    => $instansi,
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
    $this->form_validation->set_rules('nama_anggota', 'nama_anggota', 'required');
    $this->form_validation->set_rules('instansi', 'instansi', 'required');

    $no_anggota = $this->input->post('no_anggota');
    $u_anggota = array(
      'instansi'    =>  $this->input->post('instansi'),
      'nama_anggota'=> htmlspecialchars($this->input->post('nama_anggota')),
      'alamat'      => $this->input->post('alamat'),
      'registration'=> date('Y-m-d'),
    );
    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Semua bidang wajib di isi </div>');
      redirect('update/'.$no_anggota);
    }
    else
    {
      $this->mc->update_anggota($no_anggota, $u_anggota);
      $this->session->set_flashdata('message', '<div class="alert alert-success"> Data dengan nomor anggota <b>'.$no_anggota.'</b> dan nama anggota <b>'.$u_anggota['nama_anggota'].'</b> Berhasil diubah </div>');
      redirect ('anggota');
    }

  }

  function delete($no_anggota)
  {
    $rekening = $this->mf->delete_load_rekening($no_anggota);
    $brangkas_get = $this->mf->get_brangkas();

    $brangkas['kas'] = $brangkas_get->kas - $rekening->total_akumulasi;
    $brangkas['dana_simpok'] = $brangkas_get->dana_simpok - $rekening->s_pokok;
    $brangkas['dana_simwa'] = $brangkas_get->dana_simwa - $rekening->s_wajib;
    $brangkas['dana_kusus'] = $brangkas_get->dana_kusus - $rekening->s_khusus;
    $brangkas['dana_lainya'] = $brangkas_get->dana_lainya - $rekening->s_lain;
    $brangkas['last_update'] = date('Y-m-d');

    $this->mf->delete_rekening($no_anggota);
    $this->mc->update_brangkas($brangkas);
    $this->mf->delete($no_anggota);
    $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data dengan nomor anggota <b>'.$no_anggota.'</b> Berhasil Keluarkan. <br />
    Simpanan yang dikembalikan sebagai berikut : <ul>
    <li>Simpanan Pokok ['.$this->conv->convRupiah($rekening->s_pokok).']</li>
    <li>Simpanan Wajib ['.$this->conv->convRupiah($rekening->s_wajib).']</li>
    <li>Simpanan Khusus ['.$this->conv->convRupiah($rekening->s_khusus).']</li>
    <li>Simpanan Lainya ['.$this->conv->convRupiah($rekening->s_lain).']</li>
    </ul><br>
    Total Akumulasi : ['.$this->conv->convRupiah($rekening->total_akumulasi).']
    </div>');
    redirect('anggota');
  }
}
