<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller{

   function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $petugas = $this->M_admin->get_all();
    $data = array(
      'js'     => 'editdata',
      'title'  => 'List Data Petugas',
      'page'   => 'page/petugas/list_petugas',
      'petugas'=> $petugas
    );
    $this->load->view('main', $data);
  }

  public function daftar()
  {
    $data = array(
      'js'    => '',
      'title' => 'Daftar Petugas',
      'page'  =>  'page/petugas/daftar_petugas'
    );
    $this->load->view('main', $data);
  }

  public function proses_petugas()
  {
    $this->form_validation->set_rules('username', 'nama', 'trim|is_unique[tb_admin.username]');

    if ($this->form_validation->run() == FALSE) {
      $this->daftar();
    } else {
      $data = array(
        'nama'      => $this->input->post('nama', TRUE),
        'username'  => $this->input->post('username', TRUE),
        'pass'      => sha1($this->input->post('pass', TRUE)),
        'level'     => $this->input->post('level', TRUE),
        'status'    => 'Aktif',
        'terdaftar' => date('Y-m-d'),
       );
       $this->M_admin->insert($data);
       $this->session->set_flashdata('message', 'Daftar Petugas Berhasil Ditambahkan');
       redirect(site_url('C_Admin'));
    }

  }

  public function update($id)
  {
    $row = $this->M_admin->get_by_id($id);
    if ($row) {
      $data = array(
        'id'        => set_value('id', $row->id),
        'nama'      => set_value('nama', $row->nama),
        'username'  => set_value('username', $row->username),
        'pass'      => set_value('pass', $row->pass),
        'level'     => set_value('level', $row->level),
        'js'        => 'editdata',
        'action'    => 'update_petugas',
        'title'     => 'Update Data Petugas',
        'page'      => 'page/petugas/update_petugas'
        );
        $this->load->view('main', $data);
    } else {
      $this->session->set_flashdata('message', 'Data Petugas Berhasil Diupdate');
      redirect(site_url('C_Admin'));
    }
  }

  public function proses_update()
  {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('pass', 'pass', 'trim|required');
    $this->form_validation->set_rules('level', 'level', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
        $this->Update($this->input->post('id', TRUE));
    } else {
      $data = array(
        'nama'      => $this->input->post('nama', TRUE),
        'username'  => $this->input->post('username', TRUE),
        'pass'      => $this->input->post('pass', TRUE),
        'level'     => $this->input->post('level', TRUE),
      );
      $this->M_admin->update($this->input->post('id', TRUE), $data);
      $this->session->set_flashdata('message', 'Data Berhasil di Update');
      redirect(site_url('C_Admin/index'));
    }
  }


  public function update_pass($username)
  {
      $sql = "SELECT * FROM tb_admin WHERE username='$username'";
      $query = $this->db->query($sql);
      $row = $query->row_array();
      if ($row) {
        $data = array(
        'id'        => set_value('id', $row['id']),
        'nama'      => set_value('nama', $row['nama']),
        'username'  => set_value('username', $row['username']),
        'pass'      => set_value('pass', $row['pass']),
        'level'     => set_value('level', $row['level']),
        'head'      => 'Update Password',
        'daftar'    => 'Update Password',
        'action'    =>'update_pass_petugas',
        'title'     => 'Edit Password',
        'konten'    => 'petugas/edit-petugas.php',
    );
    $this->load->view('main', $data);
      } else {
    $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
    redirect(site_url('C_Admin/index'));
    }
  }

  public function update_pass_action()
  {
      $this->form_validation->set_rules('pass', 'pass', 'trim|required');
      $this->form_validation->set_rules('nama', 'nama', 'trim|required');
      $this->form_validation->set_rules('username', 'username', 'trim|required');
      $this->form_validation->set_rules('level', 'level', 'trim|required');

      if ($this->form_validation->run() == FALSE) {
          $this->update($this->input->post('id', TRUE));
      } else {
          $data = array(
          'nama'      => $this->input->post('nama',TRUE),
          'username'  => $this->input->post('username',TRUE),
          'pass'      => $this->input->post('pass',TRUE),
          'level'     => $this->input->post('level',TRUE),

    );
          $this->load->view('main', $data);
          $this->Model_admin->update($this->input->post('id', TRUE), $data);
          $this->session->set_flashdata('message', 'Password Berhasil Diperbaharui');
          redirect(site_url('C_Admin/index'));
      }
  }

  function delete($id)
  {

    $row = $this->M_admin->get_by_id($id);

    if ($row) {
        $this->M_admin->delete($id);
        $this->db->query("DELETE FROM tb_admin WHERE id='$id'");
        $this->session->set_flashdata('message', '<div class="alert alert-danger mb-0" role="alert">Data Berhasil dihapus !</div>');
        redirect(base_url('C_Admin'));
    }
    else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger mb-0" role="alert">Data Tidak Ditemukan !</div>');
        redirect(base_url('C_Admin'));
      }
    }

}
