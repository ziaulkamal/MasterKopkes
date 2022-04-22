<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_create extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  // insert data
  function insert_anggota($data)
  {
     return $this->db->insert('tb_anggota', $data);
  }

  function insert_rekening($rekening)
  {
    return $this->db->insert('tb_rekening', $rekening);
  }

  function update_rekening($no_rekening, $data)
  {
    $this->db->where('no_rekening', $no_rekening);
    $this->db->update('tb_rekening', $data);
    return;
  }

  function update_dagoro($no_rekening, $rekening)
  {
    $this->db->where('no_rekening', $no_rekening);
    $this->db->update('tb_rekening', $rekening);
    return;
  }

  function insert_pinjaman($pinjaman)
  {
     return $this->db->insert('tb_pinjaman', $pinjaman);
  }

  function log_simpanan($log)
  {
    return $this->db->insert('log_transaksi_anggota', $log);
  }
}
