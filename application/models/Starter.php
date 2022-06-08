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

  function insert_admin($data)
  {
    return $this->db->insert('tb_administrator', $data);
  }

  function get_user($username)
  {
    $this->db->where('username', $username);
    return $this->db->get('tb_administrator');
  }

  function get_list_user()
  {
    $this->db->order_by('date_created', 'DESC');
    return $this->db->get('tb_administrator');
  }

  function del_user($user_id)
  {
    $this->db->where('user_id', $user_id);
    return $this->db->delete('tb_administrator');
  }

  function login($username,$password)
  {
    $data = array('username' => $username, 'password' => $password );
    $this->db->where($data);
    return $this->db->get('tb_administrator', 1);
  }
}
