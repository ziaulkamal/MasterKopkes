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

  function insert($no_rek,$d_reg)
  {
      $query = "INSERT INTO tb_rekening VALUES ($no_rek,'','','','','','','','Belum Ada',$d_reg)";
      $this->db->query($query);

  }

}
