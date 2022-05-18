<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Starter extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_brangkas()
  {
    return $this->db->get('tb_brangkas');
  }


}
