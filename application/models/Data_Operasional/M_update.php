<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_brangkas()
  {
    return $this->db->get('tb_brangkas');
  }

  function update_brangkas($brangkas)
  {
    return $this->db->update('tb_brangkas', $brangkas);
  }

  function log_last_operasional_limit()
  {
    $query = $this->db->query('SELECT * FROM tb_operasional ORDER BY id DESC LIMIT 4');
    return $query->result();
  }

  function add_log($log)
  {
    return $this->db->insert('log_operasional', $log);
  }

  function add_inventaris($data)
  {
    return $this->db->insert('tb_inventaris', $data);
  }

  function update_inventaris($data, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('tb_inventaris', $data);
  }
}
