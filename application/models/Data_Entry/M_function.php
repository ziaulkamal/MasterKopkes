<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_function extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function last_instansi()
  {
    $query = $this->db->query('SELECT kode_instansi FROM tb_instansi ORDER BY id DESC LIMIT 1');
    return $query->row();
  }

  function jumlah_instansi()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_instansi');
    return $query->row();
  }


  function jumlah_anggota()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_anggota');
    return $query->row();
  }

  function jumlah_anggota_pinjam()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_pinjaman');
    return $query->row();
  }

  function jumlah_anggota_angsur()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_angsuran');
    return $query->row();
  }

  function jumlah_simpanan()
  {
    $query = $this->db->query('SELECT sum(total_akumulasi) AS total FROM tb_rekening');
    return $query->row();

  }

  function list_rekening()
  {
    $this->db->order_by('no', 'DESC');
    return $this->db->get('master_view_rekening')->result();
  }

  function cari_anggota($no_anggota)
  {
    $this->db->where('anggota_no', $no_anggota);
    return $this->db->get('tb_rekening')->result();
  }

  function detail_anggota_simpanan($no_rekening)
  {
    $this->db->where('no', $no_rekening);
    return $this->db->get('master_view_rekening')->row();
  }

  function get_format_daftar()
  {
    $query = $this->db->query('SELECT id FROM tb_anggota ORDER BY id DESC LIMIT 1');
    return $query->row();
  }



}
