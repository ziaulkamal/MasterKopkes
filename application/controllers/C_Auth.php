<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
    $data = array(
      'title' => 'Login Page!',
     );
     $this->load->view('page/auth/login', $data);
     $this->load->view('page/auth/auth_header');
     $this->load->view('page/auth/auth_footer');

  }

}
