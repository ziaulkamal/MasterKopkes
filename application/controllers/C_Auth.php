<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');

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
// ENT_QUOTES : Mengkodekan tanda kutip ganda dan tunggal
  function login()
  {
    $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
    $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

    $validasi = $this->M_admin->login($username,$password);
    if ($validasi->num_rows() > 0) {
      $data = $validasi->row_array();
      if ($data['level'] == 'manajer') {
        $this->session->set_userdata('masuk', TRUE);
        $this->session->set_userdata('user', $data['nama']);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('password', $data['pass']);
        $this->session->set_userdata('lvl', 'Manajer');
        $this->session->set_userdata('id_lvl', '1');
        redirect('Home');

      }
      elseif ($data['level'] == 'operasional') {
        $this->session->set_userdata('masuk', TRUE);
        $this->session->set_userdata('user', $data['nama']);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('password', $data['pass']);
        $this->session->set_userdata('lvl', 'Kabag. Operasional');
        $this->session->set_userdata('id_lvl', '2');
        redirect('Home');
      }
      elseif ($data['level'] == 'pembiayaan') {
        $this->session->set_userdata('masuk', TRUE);
        $this->session->set_userdata('user', $data['nama']);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('password', $data['pass']);
        $this->session->set_userdata('lvl', 'Kabag. Pembiayaan');
        $this->session->set_userdata('id_lvl', '3');
        redirect('Home');
      }
      elseif ($data['level'] == 'teller') {
        $this->session->set_userdata('masuk', TRUE);
        $this->session->set_userdata('user', $data['nama']);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('password', $data['pass']);
        $this->session->set_userdata('lvl', 'Teller');
        $this->session->set_userdata('id_lvl', '4');
        redirect('Home');
      }

    }
    else {
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Usernam Atau Password Salah!</div>' );
      redirect(base_url('C_Auth'));
    }
  }

  function logout()
  {
    $this->session->set_flashdata('message','Berhasil Logout');
    $this->session->sess_destroy();
    redirect(base_url('C_Auth'));
  }


}
