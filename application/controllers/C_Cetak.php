<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class C_Cetak extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(
      array(
        'Data_Entry/M_views' => 'mv',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));
    $this->load->helper('tgl_indo');
    if ($this->session->userdata('masuk') != TRUE) {
      redirect('logout');
    }
  }

  function index()
  {
      $data = array(
        'js'      => '',
        'title'   => 'Cetak Invoice',
        );
      $this->load->view('cetak/invoice', $data);
  }

  function simpanan($kode_log)
  {

    $loads = $this->mv->log_transaksi_simpanan($kode_log);
    $load = $loads->row();
    if ($loads == null) {
      echo "Paramameter Salah";
    }else {
      $data = array(
        'js'      => '',
        'set'      => 'simpanan',
        'title'   => 'Cetak Invoice',
        'nama_anggota' => $load->nama_anggota,
        'no_rekening' => $load->no_rekening,
        'kode_log' => $load->kode_log,
        'jumlah' => $this->conv->convRupiah($load->jumlah),
        'kode_jenis' => $load->kode_jenis,
        'jenis' => $load->jenis,
        'last_update' => date_indo($load->last_update),
      );
      $this->load->view('cetak/invoice', $data);
    }

  }

  function angsuran($angsur_kode)
  {
    $loads = $this->mv->log_transaksi_angsuran($angsur_kode);
    $load = $loads->row();
    if ($loads == null) {
      echo "Parameter Salah";
    }else {
      $data = array(
        'js'      => '',
        'set'      => 'angsuran',
        'title'   => 'Cetak Invoice',
        'nama_anggota' => $load->nama,
        'kode' => $load->kode,
        'pinjaman' => $load->pinjaman,
        'angsuran_ke' => $load->angsuran_ke,
        'pokok' => $load->pokok,
        'margin' => $load->margin,
        'keterangan' => $load->keterangan,
        'last_update' => date_indo($load->tgl_update),
      );
      $this->load->view('cetak/invoice', $data);
    }
  }

  function pinjaman($kode_pinjaman)
  {
    $loads = $this->mv->log_transaksi_pinjaman($kode_pinjaman);
    $load = $loads->row();
    if ($loads == null) {
      echo "Parameter Salah";
    }else {
      $data = array(
        'js'            => '',
        'set'           => 'pinjaman',
        'title'         => 'Cetak Invoice',
        'pinjaman'      => $load->kode,
        'no_rekening'   => $load->no_rekening,
        'nama_anggota'  => $load->nama,
        'plafon'        => $load->plafon,
        'margin'        => $load->margin,
        'pokok'         => $load->pokok,
        'gotong_royong' => $load->gotong_royong,
        'last_update'   => date_indo($load->last_update),
      );
      $this->load->view('cetak/invoice', $data);
    }
  }

  function anggota_keluar($no_anggota)
  {
    $loads = $this->mv->get_anggotaKeluar($no_anggota);
    $load = $loads->row();
    if ($loads == null) {
      echo "Parameter Salah";
    }else {
      $data = array(
        'js'            => '',
        'set'           => 'anggotaKeluar',
        'title'         => 'Cetak Invoice Anggota Keluar',
        'keterangan'    => $load->keterangan,
        'no_rekening'   => $load->no_rekening,
        'nama_anggota'  => $load->nama_anggota,
        'instansi'      => $load->instansi,
        'pokok'         => $load->s_pokok,
        'wajib'         => $load->s_wajib,
        'khusus'        => $load->s_khusus,
        'lain'          => $load->s_lain,
        'last_update'   => date_indo($load->last_update),
      );

      $logs['pengembalian_simpanan'] = $data['pokok']+$data['wajib']+$data['khusus']+$data['lain'];
      $this->load->view('cetak/invoice', $data);
      $this->db->where('no_anggota', $no_anggota);
      $this->db->update('log_anggota_keluar', $logs);
    }
  }
}
