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
    return $this->db->get('tb_inventaris');
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
    $tahun = date('Y');
    $this->db->select("(SELECT SUM(log_operasional.nominal) FROM log_operasional WHERE log_operasional.jenis = 5 && log_operasional.last_update LIKE '%$tahun%') AS penghapusan", FALSE);
    return $this->db->get();
  }

  function sum_dagoro()
  {
    $this->db->select("(SELECT SUM(tb_pinjaman.total_gotongroyong) FROM tb_pinjaman) AS gotong_royong", FALSE);
    return $this->db->get();
  }


}
