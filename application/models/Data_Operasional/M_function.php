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
    $query = $this->db->query('SELECT * FROM tb_operasional ORDER BY id DESC LIMIT 4');
    return $query->result();
  }


  function get_brangkas()
  {
    return $this->db->get('tb_brangkas');
  }

}
