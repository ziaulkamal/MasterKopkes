<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Operasional extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('form_validation');
    $this->load->model(array(
      'Data_Operasional/M_update' => 'mu',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));

  }

  function index()
  {

  }

  function fitur_operasional()
  {
    $load = $this->mu->log_last_operasional_limit();
    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Kas Operasional',
      'kas'     =>  $load,
      'page'    =>  'page/operasional/fitur'
    );
    $this->load->view('main', $data);
  }
}
