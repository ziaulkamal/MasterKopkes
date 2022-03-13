<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekening extends CI_Model{

  public $table = 'tb_rekening';

  public function data_rekening(){
     $this->db->SELECT('*');
     $this->db->from('tb_rekening');
     $this->db->JOIN ('tb_anggota','tb_anggota.no_rek = tb_rekening.no_rek');
     $query = $this->db->get();
     return $query;
  }

  function getDataTable()
  {
    $this->db->SELECT('*');
    $this->db->FROM ('tb_rekening');
    $this->db->JOIN ('tb_anggota','tb_anggota.no_rek = tb_rekening.no_rek');
    $query = $this->db->get();
     return $query;
  }

// IDEA: tambah data awal pendaftaran anggota -> Di Model Anggota

  function insert($no_rek,$d_reg)
  {
      $query = "INSERT INTO tb_rekening VALUES ($no_rek,'','','','','','','','Belum Ada',$d_reg)";
      $this->db->query($query);
  }

  // IDEA: tambah data simpana anggota
  function proses_simpanan($data)
  {
    return $this->db->insert('tb_simpanan', $data);
  }

  function baca_rekening($no_anggota)
  {
    $this->db->select('*');
    $this->db->where('no_anggota', $no_anggota);
    return $this->db->get('master_anggota')->result();
  }


}
