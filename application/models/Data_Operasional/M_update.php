<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function update_brangkas($brangkas)
  {
    return $this->db->update('tb_brangkas', $brangkas);
  }
}
