<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_views extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function master_view_anggota_all()
  {
    $this->db->order_by('no', 'DESC');
    return $this->db->get('master_view_anggota_all')->result();
  }

  function get_anggota_last()
  {
    $this->db->select('id');
    $this->db->order_by('id', 'DESC');
    return $this->db->get('tb_anggota', 1, 0)->row();
  }

  function get_instansi()
  {
    return $this->db->get('tb_instansi')->result();
  }

  function get_detail_rekening($no_rekening)
  {
    $query = $this->db->query("SELECT * FROM tb_rekening WHERE no_rekening='$no_rekening'");
    return $query->row();
  }

  function invoice_pinjaman($kode_pinjaman)
  {
    $this->db->where('kode_pinjaman', $kode_pinjaman);
    return $this->db->get('tb_pinjaman', 1, 0)->row();
  }

  function master_view_rekening($no_rekening)
  {
    $this->db->where('no', $no_rekening);
    return $this->db->get('master_view_rekening', 1, 0)->row();
  }

  function log_transaksi($log_kode)
  {
    $this->db->where('kode_log', $log_kode);
    return $this->db->get('log_transaksi_anggota', 1, 0)->row();
  }
}
