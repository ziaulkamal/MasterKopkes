<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_function extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  function log_last_operasional_limit()
  {
    $this->db->order_by('id','DESC');
    return $this->db->get('log_operasional', 4);
  }

// IDEA: Update Penambahan Inventaris

  function get_list_inventaris()
  {
    $this->db->order_by('id', 'DESC');
    return $this->db->get('tb_inventaris');
  }

  function get_inventaris($tahun)
  {
    $this->db->select("(SELECT SUM(tb_inventaris.harga_sekarang) FROM tb_inventaris WHERE tb_inventaris.last_update LIKE '%$tahun%') AS inventaris", FALSE);
    return $this->db->get();
  }

  function get_inventaris_sum()
  {
    $this->db->select("(SELECT SUM(tb_inventaris.harga_sekarang) FROM tb_inventaris) AS inventaris", FALSE);
    return $this->db->get();
  }

  function get_inventaris_sum_beli()
  {
    $this->db->select("(SELECT SUM(tb_inventaris.harga_beli) FROM tb_inventaris) AS inventaris_beli", FALSE);
    return $this->db->get();
  }

  function sum_sisa_shu()
  {
    $this->db->select("(SELECT SUM(tb_bht.sisa_pembagian) FROM tb_bht) AS sisa_shu", FALSE);
    return $this->db->get();
  }

  function get_id_inventaris($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('tb_inventaris');
  }
// IDEA: End Update Penambahan Inventaris


  function get_brangkas()
  {
    return $this->db->get('tb_brangkas');
  }

  function get_neraca_tahunan($tahun)
  {
    $this->db->where('tahun_neraca', $tahun);
    return $this->db->get('tb_neraca_tahunan');
  }

  function get_margin()
  {
    $tahun = date('Y');
    $this->db->where('tahun', $tahun);
    return $this->db->get('tb_margin_saving');
  }

  function sum_margin()
  {
    $tahun = date('Y');
    $this->db->select("(SELECT SUM(tb_margin_saving.margin_saving) FROM tb_margin_saving WHERE tb_margin_saving.tahun=$tahun) AS total_margin", FALSE);
    return $this->db->get();
  }

  function sum_atk()
  {
    $tahun = date('Y');
    $this->db->select("(SELECT SUM(log_operasional.nominal) FROM log_operasional WHERE log_operasional.jenis = 1 && log_operasional.last_update LIKE '%$tahun%') AS atk", FALSE);
    return $this->db->get();
  }

  function sum_honor()
  {
    $tahun = date('Y');
    $this->db->select("(SELECT SUM(log_operasional.nominal) FROM log_operasional WHERE log_operasional.jenis = 2 && log_operasional.last_update LIKE '%$tahun%') AS honor", FALSE);
    return $this->db->get();
  }

  function sum_rat()
  {
    $tahun = date('Y');
    $this->db->select("(SELECT SUM(log_operasional.nominal) FROM log_operasional WHERE log_operasional.jenis = 3 && log_operasional.last_update LIKE '%$tahun%') AS rat", FALSE);
    return $this->db->get();
  }

  function sum_thr()
  {
    $tahun = date('Y');
    $this->db->select("(SELECT SUM(log_operasional.nominal) FROM log_operasional WHERE log_operasional.jenis = 4 && log_operasional.last_update LIKE '%$tahun%') AS thr", FALSE);
    return $this->db->get();
  }

  function sum_penghapusan()
  {
    $this->db->select('dana_penghapusan');
    $this->db->from('tb_brangkas');
    return $this->db->get();
  }

  function sum_dagoro()
  {
    $this->db->select("(SELECT SUM(tb_pinjaman.total_gotongroyong) FROM tb_pinjaman) AS gotong_royong", FALSE);
    return $this->db->get();
  }

  function sum_danalain()
  {
    $this->db->select("(SELECT SUM(tb_rekening.s_lain) FROM tb_rekening) AS dana_lain", FALSE);
    return $this->db->get();
  }

  function get_anggota()
  {
    return $this->db->get('tb_anggota');
  }

  function sum_simpanan()
  {
    $this->db->select("(SELECT SUM(tb_rekening.total_akumulasi) FROM tb_rekening) AS simpanan", FALSE);
    return $this->db->get();
  }

  function get_margin_saving($tahun)
  {
    $this->db->where('tahun', $tahun);
    return  $this->db->get('tb_margin_saving');
  }

  function anggota()
  {
    return $this->db->get('anggota_master_data');
  }

  function get_bht($tahun)
  {
    $this->db->where('tahun', $tahun);
    return $this->db->get('tb_bht');
  }

  function get_bht_data()
  {
    $this->db->order_by('no_anggota', 'ASC');
    return $this->db->get('tb_bht');
  }

  function detail_bht_data($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('tb_bht');
  }

  function get_master_kolektif()
  {
    return $this->db->get('master_kolektif');
  }

  function get_master_by_id($id)
  {
    $this->db->where('id_master', $id);
    return $this->db->get('master_kolektif');
  }

  function jumlah_anggota()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_anggota');
    return $query->row();
  }

  function invetaris_data()
  {
    return $this->db->get('tb_inventaris');
  }
}
