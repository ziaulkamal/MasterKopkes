<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_Anggota extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_anggota');
    $this->load->model('M_rekening');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $tampil_data = $this->M_anggota->getAll();
    $data = array(
      'js'    => 'editdata',
      'title' => 'Data Anggota',
      'anggota' => $tampil_data,
      'page'  => 'page/anggota/list',
    );
    $this->load->view('main', $data);
  }

// IDEA: fungsi detail
  function detail($id)
  {

    $row = $this->M_anggota->getById($id);
    if ($row) {
      $data = array(
      'js'    => 'editdata',
      'title' => 'Detail Anggota',
      'page'  => 'page/anggota/detail',
      'id_anggota' => $row->id_anggota,
      'no_anggota' => $row->no_anggota,
      'nip' => $row->nip,
      'nik' => $row->nik,
      'nm_depan' => $row->nm_depan,
      'nm_belakang' => $row->nm_belakang,
      'nm_lengkap' => $row->nm_lengkap,
      'tp_lahir' => $row->tp_lahir,
      'tgl_lahir' => $row->tgl_lahir,
      'sts_kawin' => $row->sts_kawin,
      'alamat' => $row->alamat,
      'no_hp' => $row->no_hp,
      'instansi' => $row->instansi,
      'no_rek' => $row->no_rek,
      'd_reg' => $row->d_reg,
      'sts_anggota' => $row->sts_anggota,
        );
        $this->load->view('main', $data);
        }
        else {
        $this->load->set_flashdata('message', 'Data yang anda cari tidak ditemukan');
        redirect(base_url('C_Anggota/index'));
        }
      }

  // IDEA: fungsi daftar
   function daftar()
   {
     $a = date('Yims');
     $b = time();
     $c = $a+$b;
     $generate = substr($c, 6);
     $data = array(
     'js'    => '',
     'title' => 'Data Anggota',
     'id_anggota' => 'M-'.date('Y').$generate.date('d'),
     'page'  => 'page/anggota/daftar',
     );
     $this->load->view('main', $data);
   }

  // IDEA: daftar Anggota
  function daftar_anggota()
  {

    $b = time();
    $rekening = substr($this->input->post('no_hp'),4);
    if ($this->input->post('nip') == '' || $this->input->post('nip') == NULL ) {
      $nip = '-';
    }
    else {
      $nip = $this->input->post('nip');
    }
    $no_anggota = $this->input->post('id_anggota',TRUE);
    $nik = $this->input->post('nik',TRUE);
    $nm_depan = $this->input->post('nama_depan',TRUE);
    $nm_belakang = $this->input->post('nama_belakang',TRUE);
    $nm_lengkap = $this->input->post('nama_lengkap',TRUE);
    $tp_lahir = $this->input->post('tempat_lahir',TRUE);
    $tgl_lahir = $this->input->post('tanggal_lahir',TRUE);
    $sts_kawin = $this->input->post('sts_kawin',TRUE);
    $alamat = $this->input->post('alamat',TRUE);
    $no_hp = $this->input->post('nomor_hp',TRUE);
    $instansi = $this->input->post('instansi',TRUE);
    $d_reg = date('Y-m-d');
    $no_rek = $b + $rekening;
    $sts_anggota = $this->input->post('status_anggota',TRUE);

    $this->form_validation->set_rules('nomor_hp', 'Nomor_hp', 'required|min_length[11]|max_length[14]trim|is_unique[tb_anggota.no_hp]' , array('trim' => '', 'required' => 'wajib diisi.', 'is_unique' => 'Nomor Telepon Tersebut Sudah Pernah Terdata'));
    $this->form_validation->set_rules('nomor_induk', 'Nomor_induk', 'min_length[16]|max_length[17]trim|is_unique[tb_anggota.nik]', array('trim' => '', 'required' => 'wajib diisi.', 'is_unique' => 'Identitas NIK/SIM Tersebut Sudah Terdaftar di Sistem.'));

    if ($this->form_validation->run() == FALSE) {

      $this->daftar();
    }
    else {

      $data = array(
        'no_anggota'  => $no_anggota,
        'nik'         => $nik,
        'nip'         => $nip,
        'nm_depan'    => $nm_depan,
        'nm_belakang' => $nm_belakang,
        'nm_lengkap'  => $nm_lengkap,
        'tp_lahir'    => $tp_lahir,
        'tgl_lahir'   => $tgl_lahir,
        'sts_kawin'   => $sts_kawin,
        'alamat'      => $alamat,
        'no_hp'       => $no_hp,
        'instansi'    => $instansi,
        'd_reg'       => $d_reg,
        'no_rek'      => $no_rek,
        'sts_anggota' => $sts_anggota,
      );

      $smpnrek = $this->M_anggota->insert($data);
      $rekening = $this->M_rekening->insert($no_rek,$d_reg);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Berhasil Menambahkan Anggota baru dengan nama <strong>'.$data['nm_lengkap']. '</strong> dengan ID Anggota <strong>'.$data['no_anggota'].'<strong></div>');
      redirect(site_url('anggota'));
    }
  }

  // IDEA: fungsi update
  function update($id)
  {

    $row = $this->M_anggota->getById($id);
    if ($row) {
      $data = array(
        'js'       => '',
        'title'    => 'Edit Anggota',
        'page'     => 'page/anggota/edit',
        'id_anggota' => set_value('id_anggota', $row->id_anggota),
        'nik' => set_value('nik', $row->nik),
        'nip' => set_value('nip', $row->nip),
        'nm_depan' => set_value('nama_depan', $row->nm_depan),
        'nm_belakang' => set_value('nama_belakang', $row->nm_belakang),
        'nm_lengkap' => set_value('nama_lengkap', $row->nm_lengkap),
        'tp_lahir' => set_value('tempat_lahir', $row->tp_lahir),
        'tgl_lahir' => set_value('tanggal_lahir', $row->tgl_lahir),
        'sts_kawin' => set_value('status_kawin', $row->sts_kawin),
        'alamat' => set_value('alamat', $row->alamat),
        'no_hp' => set_value('nomor_hp', $row->no_hp),
        'instansi' => set_value('instansi', $row->instansi),
        'sts_anggota' => set_value('status_anggota', $row->sts_anggota),
        'd_reg' => set_value('d_reg', $row->d_reg),
      );
      $this->load->view('main', $data);
    }
      else {
        $this->session->set_flashdata('message', '<div class="alert-danger">Data yang Anda Cari Tidak Ditemukan</div>');
        redirect(site_url('anggota'));
      }
  }

  // IDEA: fungsi update action
   function update_action()
  {

    $date = date('Y-m-d');
    $id_anggota = $this->input->post('id_anggota');
    $data = array(
      'id_anggota'  => $id_anggota,
      'nik'         => $this->input->post('nik'),
      'nip'         => $this->input->post('nip'),
      'nm_depan'    => $this->input->post('nama_depan'),
      'nm_lengkap'    => $this->input->post('nama_lengkap'),
      'nm_belakang' => $this->input->post('nama_belakang'),
      'tp_lahir'    => $this->input->post('tempat_lahir'),
      'tgl_lahir'   => $this->input->post('tanggal_lahir'),
      'sts_kawin'   => $this->input->post('sts_kawin'),
      'alamat'      => $this->input->post('alamat'),
      'no_hp'       => $this->input->post('nomor_hp'),
      'instansi' => $this->input->post('instansi'),
      'd_reg' => $this->input->post('tanggal_daftar'),
      'sts_anggota' => $this->input->post('sts_anggota'),
    );
    $this->M_anggota->update($id_anggota, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Berhasil Menambahkan Anggota baru dengan nama <strong>'.$data['nm_lengkap']. '</strong> dengan ID Anggota <strong>'.$data['id_anggota'].'<strong></div>');
    redirect ('anggota');
  }

  // IDEA: fungsi delete
  function delete($id)
  {

    $row = $this->M_anggota->getById($id);

    if ($row) {
        $this->M_anggota->delete($id);
        $this->db->query("DELETE FROM tb_anggota WHERE id_anggota='$id'");
        $this->session->set_flashdata('message', '<div class="alert alert-danger mb-0" role="alert">Data Berhasil dihapus !</div>');
        redirect(base_url('anggota'));
    }
    else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger mb-0" role="alert">Data Tidak Ditemukan !</div>');
        redirect(base_url('anggota'));
      }
    }
  }
