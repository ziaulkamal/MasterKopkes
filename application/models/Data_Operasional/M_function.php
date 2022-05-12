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

}
