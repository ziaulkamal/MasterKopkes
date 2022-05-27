<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_create extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function update_brangkas($brangkas)
  {
    return $this->db->update('tb_brangkas', $brangkas);
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

  function update_anggota($no_anggota, $u_anggota)
  {
    $this->db->where('no_anggota', $no_anggota);
    return $this->db->update('tb_anggota', $u_anggota);

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

  function insert_angsuran($data)
  {
     return $this->db->insert('tb_angsuran', $data);
  }

  function add_log_simpanan($logs)
  {
    return $this->db->insert('log_transaksi_anggota', $logs);
  }

  function update_angsuran_bulanan($kode_pinjaman, $update_p)
  {
    $this->db->where('kode_pinjaman', $kode_pinjaman);
    $this->db->update('tb_pinjaman', $update_p);
    return;
  }

  function update_status_rekening($no_rekening, $status_pinjaman)
  {
    $this->db->where('no_rekening', $no_rekening);
    $this->db->update('tb_rekening', $status_pinjaman);
    return;
  }

  function update_margin($id, $is_margin)
  {
    $this->db->where('id_margin', $id);
    $this->db->update('tb_margin_saving', $is_margin);
    return;
  }

  function insert_margin($is_margin)
  {
    return $this->db->insert('tb_margin_saving', $is_margin);
  }

  function insert_instansi($data)
  {
    return $this->db->insert('tb_instansi', $data);
  }

  function update_instansi($kode_instansi, $data)
  {
    $this->db->where('kode_instansi', $kode_instansi);
    return $this->db->update('tb_instansi', $data);
  }

  function update_margin_edit($kode, $data)
  {
    $this->db->where('kode_pinjaman', $kode);
    return $this->db->update('tb_pinjaman', $data);
  }
}
