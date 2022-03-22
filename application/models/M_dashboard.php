<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }


  public function total_anggota()
  {
    $this->db->select('*');
    $this->db->from('tb_anggota');
    return $this->db->get()->num_rows();
  }

  public function total_simpanan()
  {
    $this->db->select('sum(saldo)');
    $this->db->from('tb_rekening');
    return $this->db->get()->num_rows();

  }


}
