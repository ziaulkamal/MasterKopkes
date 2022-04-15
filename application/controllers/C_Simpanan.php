<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Simpanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_anggota');
    $this->load->model('M_rekening');
    $this->load->model('M_transaksi');
  }

  // IDEA: cari data anggota
  function cari_simpan()
  {
    $data = array(
      'js'      =>  '',
      'title'   =>  'Cari Nasabah',
      'placeholder' => 'Masukkan ID Anggota',
      'name'    =>  'no_anggota',
      'page'    =>  'page/simpanan/cari_simpan'
    );
    $this->load->view('main', $data);
  }

// IDEA: memilih simpanan anggota
  function simpan_action()
  {
      $cari['cari'] = array();
      if ($query = $this->M_anggota->cari_anggota($this->input->post('no_anggota'))) {
        $cari['cari'] =  $query;
      }
      else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger mb-0" role="alert">Data Yang Anda Cari Tidak ditemukan !</div>');
        redirect(site_url('C_Simpanan/cari_simpan'));
      }
    $data = array(
      'js'      =>  '',
      'title'   => 'Data Anggota',
      'anggota' => $cari['cari'],
      'page'    => 'page/simpanan/form_simpanan',
    );
    $this->load->view('main', $data);
  }

  // IDEA: proses simpan data simpanan anggota
  function data_simpan()
  {
    $no_anggota = $this->input->post('no_anggota');
    $tgl_simpan = $this->input->post('tgl_simpan');
    if ($tgl_simpan != NULL) {
      $set_tanggal = $this->input->post('tgl_simpan');
    }else {
      $set_tanggal = date('Y-m-d');
    }
    $keterangan = $this->input->post('keterangan');
    $rekening   = $this->input->post('x');
    $jml_simpan = str_replace(".","",$this->input->post('jml_simpan'));

// HACK: Panggil Data Awal Dari Master View
    $data_rekening = $this->M_rekening->baca_rekening($no_anggota);
    foreach ($data_rekening as $key) {
      $norek = $key->no_rek;
      $saldo_awal   = $key->saldo;
      $debit_awal   = $key->saldo;
      $kredi_awal   = $key->saldo;
      $simpok_awal  = $key->saldo;
      $simwa_awal   = $key->saldo;
      $simka_awal   = $key->saldo;
      $dagoro_awal  = $key->saldo;
    }



// IDEA: SIMPOK = SPO, SIMWA = SWA, SIMKA = SKS, DAGORO = DGR
    $pilih_simpan  = $this->input->post('jn_simpanan');
    if ($pilih_simpan == 1) {
      $saldo_akhir = $saldo_awal + $jml_simpan;
      $simpan_akhir = $simpok_awal + $jml_simpan;
      $kode_trx = 'SPO-'.time();
      $ket_simpan = 'Berhasil Menambahkan Simpana Baru Sejumlah'.$jml_simpan;
      $this->db->query("INSERT INTO log_transaksi (id_log, no_anggota, jenis_trx, keterangan, tanggal) VALUES ('','$no_anggota','$kode_trx','$ket_simpan','$tgl_simpan')");
      $this->db->query("UPDATE tb_rekening SET saldo='$saldo_akhir', simpok='$simpan_akhir', tgl_update='$set_tanggal', sts_pinjam='Ada' WHERE no_rek='$norek'");
    }elseif ($pilih_simpan == 2) {
      $saldo_akhir = $saldo_awal + $jml_simpan;
      $simpan_akhir = $simwa_awal + $jml_simpan;
      $kode_trx = 'SWA-'.time();
      $ket_simpan = 'Berhasil Menambahkan Simpana Baru Sejumlah'.$jml_simpan;
      $this->db->query("INSERT INTO log_transaksi (id_log, no_anggota, jenis_trx, keterangan, tanggal) VALUES ('','$no_anggota','$kode_trx','$ket_simpan','$tgl_simpan')");
      $this->db->query("UPDATE tb_rekening SET saldo='$saldo_akhir', simpok='$simpan_akhir', tgl_update='$set_tanggal', sts_pinjam='Ada' WHERE no_rek='$norek'");
    }elseif ($pilih_simpan == 3) {
      $saldo_akhir = $saldo_awal + $jml_simpan;
      $simpan_akhir = $simka_awal + $jml_simpan;
      $kode_trx = 'SKS-'.time();
      $ket_simpan = 'Berhasil Menambahkan Simpana Baru Sejumlah'.$jml_simpan;
      $this->db->query("INSERT INTO log_transaksi (id_log, no_anggota, jenis_trx, keterangan, tanggal) VALUES ('','$no_anggota','$kode_trx','$ket_simpan','$tgl_simpan')");
      $this->db->query("UPDATE tb_rekening SET saldo='$saldo_akhir', simpok='$simpan_akhir', tgl_update='$set_tanggal', sts_pinjam='Ada' WHERE no_rek='$norek'");
    }elseif ($pilih_simpan == 4) {
      $saldo_akhir = $saldo_awal + $jml_simpan;
      $simpan_akhir = $dagoro_awal + $jml_simpan;
      $kode_trx = 'DGR-'.time();
      $ket_simpan = 'Berhasil Menambahkan Simpana Baru Sejumlah'.$jml_simpan;
      $this->db->query("INSERT INTO log_transaksi (id_log, no_anggota, jenis_trx, keterangan, tanggal) VALUES ('','$no_anggota','$kode_trx','$ket_simpan','$tgl_simpan')");
      $this->db->query("UPDATE tb_rekening SET saldo='$saldo_akhir', simpok='$simpan_akhir', tgl_update='$set_tanggal', sts_pinjam='Ada' WHERE no_rek='$norek'");
    }else {
      $pilih_simpan == NULL;
    }

      $data = array(
        'no_anggota' => $no_anggota,
        'trx_simpan' => $kode_trx,
        'jml_simpan' => $jml_simpan,
        'tgl_simpan' => $tgl_simpan,
        'keterangan' => $ket_simpan,
       );
       $this->M_rekening->proses_simpanan($data);
       $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Berhasil Menambahkan Simpana Baru dengan ID Anggota <strong>'.$data['no_anggota'].'<strong></div>');
       redirect('C_Simpanan/invoice');
    }

    function list_simpanan()
    {
      $tampil_data = $this->M_rekening->data_rekening()->result();
      $data = array(
        'js' => 'editdata' ,
        'simpanan' => $tampil_data,
        'title' => 'Data Anggota',
        'page'  =>  'page/simpanan/list_simpanan',
      );
      $this->load->view('main', $data);
    }

    function penarikan()
    {
      $data = array(
        'js' => '',
        'title' => 'Penarikan',
        'page'  => 'page/simpanan/penarikan'
      );
      $this->load->view('main', $data);
    }

    function invoice()
    {
      $tampil_data = $this->M_transaksi->get_data_cetak()->result();
      foreach ($tampil_data as $data) {
      $nama = $data->nm_lengkap;
      $no_anggota = $data->no_anggota;
      $jml_simpan = $data->jml_simpan;
      $keterangan = $data->keterangan;
      $invoice_no = $data->trx_simpan;
      $tanggal    = $data->tgl_simpan;
    }
      $data = array(
        'nama'        => $nama,
        'no_anggota'  => $no_anggota,
        'jml_simpan'  => $jml_simpan,
        'keterangan'  => $keterangan,
        'invoice_no'  => $invoice_no,
        'tanggal'     => $tanggal,
        'js'    => '',
        'title' => 'Cetak Invoice',
        'page'  => 'page/simpanan/cetak_invoice'
      );
      $this->load->view('main', $data);
  }
}
