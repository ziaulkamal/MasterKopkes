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


  function get_brangkas()
  {
    return $this->db->get('tb_brangkas');
  }

  function last_inventaris()
  {
    return $this->db->get('tb_inventaris')->result();
  }

  function insert()
  {
    $this->db->select('nama_barang');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('tb_inventaris', 1);
    return $query->row();
  }

  function insert_proses($data)
  {
    return $this->db->insert('tb_inventaris', $data);

  }

  function get_inventaris()
  {
    return $this->db->get('tb_inventaris')->result();
  }

  function edit_data($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('tb_inventaris')->row();
   }

}
