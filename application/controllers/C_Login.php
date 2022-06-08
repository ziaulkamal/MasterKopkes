<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More'
    $this->load->model('Starter', 'm');
  }

  function index()
  {
    $this->load->view('login');
  }

  function logout()
  {
    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show">Silahkan Login Terlebih Dahulu !</div>');
    redirect('login');
    $this->session->sess_destroy();
  }

  function process_login()
  {
    $username = $this->input->post('username');
    $password = sha1(md5($this->input->post('password')));
    $access = $this->m->login($username, $password);

    if ($cek = $access->num_rows() > 0) {
      $data = $access->row_array();
      if ($data['level'] == 1) {
        $this->session->set_userdata('masuk', TRUE);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('level', 'Administrator');
        $this->session->set_userdata('id_lvl', '1');
        redirect('dashboard');
      }elseif ($data['level'] == 2) {
        $this->session->set_userdata('masuk', TRUE);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('level', 'Pengurus');
        $this->session->set_userdata('id_lvl', '2');
        redirect('dashboard');
      }elseif ($data['level'] == 3) {
        $this->session->set_userdata('masuk', TRUE);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('level', 'Dewas');
        $this->session->set_userdata('id_lvl', '3');
        redirect('dashboard');
      }else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show">Sesi Anda Sudah Berakhir, Silahkan Login !</div>');
        redirect('login');
        $this->session->sess_destroy();
      }
    }
    else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Username Atau Password Anda Salah</div>');
      redirect('login');
      $this->session->sess_destroy();
    }
  }


  function created_account()
  {
    if ($this->session->userdata('masuk') != TRUE && $this->session->userdata('level') != 1) {
      redirect(base_url('logout'));
    }
    $data = array(
      'js'       => '',
      'title'    => 'Buat Pengguna Baru',
      'action'   => 'sign_up/created',
      'page'     => 'page/pengaturan/daftar_akun',
    );
    $this->load->view('main', $data);
  }

  function proses_created()
  {
    if ($this->session->userdata('masuk') != TRUE && $this->session->userdata('level') != 1) {
      redirect(base_url('logout'));
    }
    $username = htmlspecialchars($this->input->post('username'));
    $password = htmlspecialchars($this->input->post('password'));
    $level    = $this->input->post('level');
    $cek_user = $this->m->get_user($username)->num_rows();
    if ($cek_user > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Pengguna Dengan Username <b>'. $username .'</b> sudah tercatat di sistem</b></div>');
      redirect('sign_up');
    }else {
      if ($level == 1 && $username != NULL && $password != NULL) {
        $data = array(
          'user_id' => 'A'.time(),
          'level' => $level,
          'username' => $username,
          'password' => SHA1(MD5($password)),
          'date_created' => date('Y-m-d'),
          'last_login' => date('Y-m-d H:i:s'),
        );
        $this->m->insert_admin($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Berhasil Menambah Pengguna Baru</b></div>');
        redirect('dashboard');
      }elseif ($level == 2 && $username != NULL && $password != NULL) {
        $data = array(
          'user_id' => 'A'.time(),
          'level' => $level,
          'username' => $username,
          'password' => SHA1(MD5($password)),
          'date_created' => date('Y-m-d'),
          'last_login' => date('Y-m-d H:i:s'),
        );
        $this->m->insert_admin($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Berhasil Menambah Pengguna Baru</b></div>');
        redirect('dashboard');
      }elseif ($level == 3 && $username != NULL && $password != NULL) {
        $data = array(
          'user_id' => 'A'.time(),
          'level' => $level,
          'username' => $username,
          'password' => SHA1(MD5($password)),
          'date_created' => date('Y-m-d'),
          'last_login' => date('Y-m-d H:i:s'),
        );
        $this->m->insert_admin($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Berhasil Menambah Pengguna Baru</b></div>');
        redirect('dashboard');
      }else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Masukan semua bidang dengan benar</b></div>');
        redirect('sign_up');
      }
    }

  }

  function list_account()
  {
    if ($this->session->userdata('masuk') != TRUE && $this->session->userdata('level') != 1) {
      redirect(base_url('logout'));
    }
    $load = $this->m->get_list_user()->result();
    $data = array(
      'js'       => '',
      'title'    => 'Pengguna Terdata',
      'load'    =>  $load,
      'page'     => 'page/pengaturan/list_akun',
    );
    $this->load->view('main', $data);
  }

  function delete_account($user_id)
  {
    if ($this->session->userdata('masuk') != TRUE && $this->session->userdata('level') != 1) {
      redirect(base_url('logout'));
    }
    $del = $this->m->del_user($user_id);
    if ($del != NULL) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Berhasil menghapus penguna</div>');
      redirect('data_akun');
    }
    else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Pengguna Tidak ditemukan</div>');
      redirect('data_akun');
    }
  }
}
