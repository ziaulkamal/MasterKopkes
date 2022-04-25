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

  function get_list_pinjaman()
  {
    $this->db->order_by('kode', 'DESC');
    return $this->db->get('master_view_pinjaman')->result();
  }

  function get_anggota_by_no($no_anggota)
  {
    $this->db->where('no_anggota', $no_anggota);
    return $this->db->get('tb_anggota')->row();
  }

  function update_anggota($no_anggota, $data)
  {
    $this->db->where('no_anggota', $no_anggota);
    $this->db->update('tb_anggota', $data);
  }

  function delete($no_anggota)
    {
      $query      = $this->db->query ("SELECT status from tb_anggota WHERE no_anggota ='$no_anggota'");
      $set_update = $this->db->query("UPDATE tb_anggota SET status = 2 WHERE  no_anggota = '$no_anggota'");
      $query_hasil = $query + $set_update;
      return $query_hasil;
    }

}
