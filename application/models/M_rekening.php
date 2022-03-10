<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekening extends CI_Model{

  public $table = 'tb_rekening';
  public function __construct()
  {
    parent::__construct();

  }
  // no_rek
  // saldo
  // debit
  // kredit
  // simpok
  // simwa
  // simka
  // dagoro
  // sts_pinjam
  // tgl_update

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
    // tb_anggota.no_anggota, tb_anggota.nm_lengkap, tb_rekening.simpok, tb_rekening.simwa, tb_rekening.simka
    $this->db->FROM ('tb_rekening');
    $this->db->JOIN ('tb_anggota','tb_anggota.no_rek = tb_rekening.no_rek');
    // tb_anggota ON tb_rekening.no_anggota=tb_rekening.no_anggota;
    $query = $this->db->get();
     return $query;
  }


// IDEA: tambah data awal pendaftaran anggota
  function insert($no_rek,$d_reg)
  {
      $query = "INSERT INTO tb_rekening VALUES ($no_rek,'','','','','','','','Belum Ada',$d_reg)";
      $this->db->query($query);

  }

  // function cek_data_rek($id)
  // {
  //   $this->db->select('*');
  //   $this->db->from($table);
  //   $this->db->where('no_anggota', $id);
  //   return $this->db->get()->result();
  //
  // }

  // IDEA: tambah data simpana anggota
  function insertD($data)
  {
    return $this->db->insert('tb_simpanan', $data);
  }

}
