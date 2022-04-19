<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Akutansi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
        'Data_Entry/M_function' => 'mf',
    ));
    $this->load->helper('curency_indo_helper');
  }

// IDEA: Menampilkan Opsi Data Rekening Anggota ( Data Simpanan )
  function rekening()
  {
    $load = $this->mf->list_rekening();

    $data = array(
      'js'    => 'dataTables',
      'title' => 'Simpanan Anggota',
      'rekening' => $load,
      'page'  => 'page/rekening/anggota_rekening',
    );
    $this->load->view('main', $data);
  }

// IDEA: Mencari Data Anggota Berdasarkan Nomor Anggota
  function tambah_simpanan()
  {
    // IDEA: Tangkap Penampung Data ke Array Kosong
    $q['s'] = [];
    if ($s = $this->mf->cari_anggota(htmlspecialchars($this->input->post('no_anggota')))) {
      $q['s'] = $s;
      foreach ($q['s'] as $s) { $no_rekening = $s->no_rekening;}
      $load = $this->mf->detail_anggota_simpanan($no_rekening);

      $data = array(
        'js'      => false,
        'title'   =>  'Tambah Simpanan Anggota',
        'rekening' =>  $load,
        'page'    =>  'page/rekening/simpanan_rekening'
      );
      $this->load->view('main', $data);
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data Tersebut Tidak Ada Di Sistem </div>');
      redirect('cari_simpanan');
    }

// IDEA: Menyimpan Data Simpanan
  function simpan_rekening($no_rekening)
  {
    $load = $this->mv->get_detail_rekening($no_rekening);
    $p = $load->s_pokok;
    $w = $load->s_wajib;
    $k = $load->s_khusus;
    $l = $load->s_lain;
    $t = $load->total_akumulasi;
    $last_update = date('d-m-Y');
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

// IDEA: Cari Pinjaman Berdasarkan ID anggota
  function tambah_pinjaman()
  {
    // IDEA: Tangkap Penampung Data ke Array Kosong
    $q['s'] = [];
    if ($s = $this->mf->cari_anggota(htmlspecialchars($this->input->post('no_anggota')))) {
      $q['s'] = $s;
      foreach ($q['s'] as $s) { $no_rekening = $s->no_rekening;}
      $load = $this->mf->detail_anggota_simpanan($no_rekening);

      $data = array(
        'js'      => false,
        'title'   =>  'Tambah Pinjaman Anggota',
        'rekening' =>  $load,
        'page'    =>  'page/rekening/pinjaman_rekening'
      );
      $this->load->view('main', $data);
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data Tersebut Tidak Ada Di Sistem </div>');
      redirect('cari_simpanan');

    }
  }

// IDEA: Proses Untuk peminjaman

  function simpan_pinjaman($no_rekening)
  {

    $kode_pinjaman	= 'P-'.$no_rekening.date('mY');
    $plafon	= $this->input->post('jumlah');
    $tenor	= $this->input->post('tenor');
    $margin	= 0.08;

    $rumus_margin = (0.08 * $plafon);
    $margin_angsur = $rumus_margin/$tenor;
    $pokok_murabahan	= $plafon/$tenor;
    $total_gotongroyong	= (0.015 * $plafon);
    $total_angsuran	= $plafon + $rumus_margin;
    $angsuran_ke	= 0;
    $tanggal_pengajuan	= date('d-m-Y');
    $last_update = date('d-m-Y');
    $load = $this->mv->get_detail_rekening($no_rekening);

    $data = array(
      'kode_pinjaman' => $kode_pinjaman,
      'no_rekening' => $no_rekening,
      'plafon' => $plafon,
      'tenor' => $tenor,
      'margin' => $rumus_margin,
      'pokok_murabahan' => ceil($pokok_murabahan),
      'total_gotongroyong' => $total_gotongroyong,
      'total_angsuran' => $total_angsuran,
      'angsuran_ke' => $angsuran_ke,
      'sisa_angsuran' => $total_angsuran,
      'tanggal_pengajuan' => $tanggal_pengajuan,
      'last_update' => $last_update,
    );

    echo "<pre>";
    var_dump($data);
    echo "</pre>";
  }

}
