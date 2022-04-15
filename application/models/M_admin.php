<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{

  public $table = 'tb_admin';
  public $id = 'id';
  public $order = 'DESC';

  public function __construct()
  {
    parent::__construct();

  }

  // get all
  function get_all()
  {
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
  }

  // get data by id
  function get_by_id($id)
  {
      $this->db->where($this->id, $id);
      return $this->db->get($this->table)->row();
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

  function login($username,$password)
  {
    $query = $this->db->query("SELECT * FROM tb_admin WHERE username='$username' AND pass=sha1('$password') LIMIT 1");
    return $query;
  }

}
