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
        'Data_Entry/M_create' => 'mc',
        'Data_Entry/M_function' => 'mf',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));

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
      foreach ($q['s'] as $s) { $no_rekening = $s->no_rekening; $sts_pinjaman = $s->sts_pinjaman; }
      $load = $this->mf->detail_anggota_simpanan($no_rekening);
      if ($sts_pinjaman == 1) {
        $this->session->set_flashdata('message', '<div class="alert alert-warning"> Anggota ini tidak dapat ambil pinjaman karena masih ada pinjaman yang belum lunas </div>');
        redirect('cari_simpanan');
      }else {
        $data = array(
          'js'      => false,
          'title'   =>  'Tambah Pinjaman Anggota',
          'rekening' =>  $load,
          'page'    =>  'page/rekening/pinjaman_rekening'
        );
        $this->load->view('main', $data);
      }
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger"> Data Tersebut Tidak Ada Di Sistem </div>');
      redirect('cari_simpanan');

    }
  }

// IDEA: Proses Untuk peminjaman

  function simpan_pinjaman($no_rekening)
  {

    $kode_pinjaman	= 'P-'.time();
    $plafon	= $this->input->post('jumlah');
    $tenor	= $this->input->post('tenor');
    $margin	= 0.08;

    $rumus_margin = ($plafon*$margin)/12;
    $margin_angsur = $rumus_margin/$tenor;
    $pokok_murabahan	= $plafon/$tenor;
    $total_gotongroyong	= (0.015 * $plafon);
    $total_angsuran	= $plafon + $rumus_margin;
    $angsuran_ke	= 0;
    $tanggal_pengajuan	= date('d-m-Y');
    $last_update = date('d-m-Y');


    $pinjaman = array(
      'kode_pinjaman' => $kode_pinjaman,
      'no_rekening' => $no_rekening,
      'plafon' => $plafon,
      'tenor' => $tenor,
      'margin' => round($rumus_margin,0,PHP_ROUND_HALF_EVEN),
      'pokok_murabahan' => round($pokok_murabahan,0,PHP_ROUND_HALF_EVEN),
      'total_gotongroyong' => $total_gotongroyong,
      'total_angsuran' => round(0,0,PHP_ROUND_HALF_EVEN),
      'angsuran_ke' => $angsuran_ke,
      'sisa_angsuran' => round($total_angsuran,0,PHP_ROUND_HALF_EVEN),
      'tanggal_pengajuan' => $tanggal_pengajuan,
      'last_update' => $last_update,
    );


    $load = $this->mv->get_detail_rekening($no_rekening);
    $akumulasi_dagoro = $load->s_gotongroyong + $total_gotongroyong;

    if ($load->sts_pinjaman == 1) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning"> Anggota ini masih ada pinjaman dengan kode pinjaman <b>'.$kode_pinjaman .'</b> silahkan lunaskan terlebih dahulu. </div>');
      redirect('pinjaman');
    }else {
      $rekening = array(
        'no_rekening' => $no_rekening,
        'anggota_no' => $load->anggota_no,
        's_gotongroyong' => $akumulasi_dagoro,
        'sts_pinjaman' => 1,
      );
      $this->mc->update_dagoro($no_rekening, $rekening);
      $this->mc->insert_pinjaman($pinjaman);
      $this->session->set_flashdata('message', '<div class="alert alert-sucsess"> Pinjaman Atas Nama </div>');
      redirect('pinjaman');
    }

  }

  function pinjaman()
  {
    $load = $this->mf->get_list_pinjaman();
     // var_dump($load);die();
    $data = array(
      'js'    => 'dataTables',
      'title' => 'Pinjaman Anggota',
      'pinjaman' => $load,
      'page'  => 'page/rekening/anggota_pinjaman',
    );
    $this->load->view('main', $data);
  }

}
