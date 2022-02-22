<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Simpanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      }

  function index()
  {
    $data = array(
      'js'    =>  'editdata',
      'title' => 'Simpanan Pokok',
      'page'  => 'page/simpanan/sim_pokok/index',
    );
    $this->load->view('main', $data);
  }
  function detail_simpanan()
  {
    $data = array(
      'js'    =>  'editdata',
      'title' =>  'Detail Simpanan Pokok',
      'page'  =>  'page/simpanan/sim_pokok/detail_simpanan'
    );
    $this->load->view('main', $data);
  }
  function tambah_simpanan()
  {
    $data = array(
      'js'    =>  '',
      'title' =>  'Tambah Simpanan Pokok',
      'page'  =>  'page/simpanan/sim_pokok/tambah'
    );
    $this->load->view('main', $data);
  }
public function sim_wajib()
{
  $data = array(
    'js'    => 'editdata',
    'title' => 'Simpanan Wajib',
    'page'  => 'page/simpanan/sim_wajib/index',
  );
  $this->load->view('main', $data);
 }
public function detail_simwajib()
{
  $data = array(
    'js'    => '',
    'title' => 'Detail Simpanan Wajib',
    'page'  => 'page/simpanan/sim_wajib/detail_simwajib',
  );
  $this->load->view('main', $data);
 }
public function tambah_simwajib()
{
  $data = array(
    'js'    => '',
    'title' => 'Tambah Simpanan Wajib',
    'page'  => 'page/simpanan/sim_wajib/tambah',
  );
  $this->load->view('main', $data);
 }
public function sim_sukarela()
{
  $data = array(
    'js'    => 'editdata',
    'title' => 'Simpanan Sukarela',
    'page'  => 'page/simpanan/sim_sukarela/index',
  );
  $this->load->view('main', $data);
 }
public function detail_simsukarela()
{
  $data = array(
    'js'    => '',
    'title' => 'Detail Simpanan Sukarela',
    'page'  => 'page/simpanan/sim_sukarela/detail_simsukarela',
  );
  $this->load->view('main', $data);
 }
public function tambah_simsukarela()
{
  $data = array(
    'js'    => '',
    'title' => 'Tambah Simpanan Sukarela',
    'page'  => 'page/simpanan/sim_sukarela/tambah',
  );
  $this->load->view('main', $data);
 }
}
