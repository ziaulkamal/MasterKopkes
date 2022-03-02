<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model{

  public function __construct()
  {
    parent::__construct();


  }


  function getAll()
  {
    return $this->db->get('pengaturan')->result();
  }

  function getData()
  {
    return $this->db->get('pengaturan')->row();
  }

  function update($data)
  {
      $this->db->update('pengaturan', $data);
  }

}
