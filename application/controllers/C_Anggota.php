<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Anggota extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
    $data = array(
      'js'    => 'anggota',
      'title' => 'Data Anggota',
      'page'  => 'page/anggota/index',
    );
    $this->load->view('main', $data);
  }

  function tambah_anggota()
  {
    $data = array(
      'js'    => '',
      'title' => 'Tambah Anggota',
      'page'  => 'page/anggota/tambah',
    );
    $this->load->view('main', $data);
  }

  function profile()
  {
    $data = array(
      'js'    => '',
      'title' => 'Profile Anggota',
      'page'  => 'page/anggota/profile',
    );
    $this->load->view('main', $data);
  }
}
