<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Menampilkan data berdasrkan id
// Menampilkan data secara keseluruhan
// Menyimpan data Anggota
// Edit data Anggota
// Hapus data Anggota

class M_anggota extends CI_Model
{

  public $table = 'tb_anggota';
  public $id = 'id_anggota';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();

  }
  function getAll()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function getById($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function cari_anggota($no_anggota)
  {
    $this->db->like('no_anggota', $no_anggota);
    $query = $this->db->get($this->table);
    return $query->result();
  }


  // insert data
  function insert($data)
  {
      $this->db->insert($this->table, $data);
  }

  // update data
  function update($id, $data)
  {
      $this->db->where($this->id, $id);
      $this->db->update($this->table, $data);
  }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
