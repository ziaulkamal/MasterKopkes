<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class C_Inventaris extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(
      array(
        'Data_Operasional/M_update' => 'mu',
        'Data_Operasional/M_function' => 'mf',
    ));

  }

  function index()
  {
    $load = $this->mf->get_inventaris();
    $data = array(
      'js'         => 'dataTables',
      'title'      => 'Data Inventaris',
      'inventaris' =>  $load,
      'page'       =>  'page/inventaris/index',
     );
     $this->load->view('main', $data);
  }

  function insert()
  {
    $load = $this->mf->insert();
    $data = array(
      'js'          => '',
      'title'       => 'Data Inventaris',
      'inventaris'  => $load->nama_barang,
      'page'        => 'page/inventaris/daftar'
    );
    $this->load->view('main', $data);
  }

  function proses_insert()
  {
    $id = date("h:i:sa");
    $nama_barang  = $this->input->post('nama_barang');
    $satuan       = $this->input->post('satuan');
    $jumlah       = $this->input->post('jumlah');
    $harga_beli   = $this->input->post('harga_beli');
    $harga_barang = $this->input->post('harga_barang');
    $selisih_harga= $harga_beli - $harga_barang;
    $keterangan   = $this->input->post('keterangan');
    $last_update  = date('Y-m-d');
    $data = array(
      'id'           => $id,
      'nama_barang'  => $nama_barang,
      'satuan'       => $satuan,
      'jumlah'       => $jumlah,
      'harga_beli'   => $harga_beli,
      'harga_barang' => $harga_barang,
      'selisih_harga'=> $selisih_harga,
      'keterangan'   => $keterangan,
      'last_update'  => $last_update,
    );
    $this->mf->insert_proses($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data Berhasil Di Tambahkan </div>');
    redirect('inventaris');
  }

  function edit_inventaris($id)
  {
    $load = $this->mf->edit_data($id);
    if ($load) {
      $data = array(
        'id'          => set_value('id',$load->id),
        'nama_barang' => set_value('nama_barang',$load->nama_barang),
        'satuan'      => set_value('satuan',$load->satuan),
        'jumlah'      => set_value('jumlah',$load->jumlah),
        'jumlah'      => set_value('jumlah',$load->jumlah),
        'harga_beli'  => set_value('harga_beli',$load->harga_beli),
        'harga_barang'=> set_value('harga_barang',$load->harga_barang),
        'selisih_harga'=> set_value('selisih_harga',$load->selisih_harga),
        'keterangan'   => set_value('keterangan',$load->keterangan),
        'js'          => '',
        'title'       => 'Data Inventaris',
        'page'        => 'page/inventaris/edit'
      );

      $this->load->view('main', $data);
    }
    else {
      redirect('inventaris');
    }
  }

  function proses_edit()
  {
    $id           = $this->input->post('id');
    $harga_beli   = $this->input->post('harga_beli');
    $harga_barang = $this->input->post('harga_barang');
    $nama_barang  = $this->input->post('nama_barang');
    $keterangan   = $this->input->post('keterangan');
    $selisih_harga= $harga_beli - $harga_barang;
    $last_update  = date('Y-m-d');
    $data = array(
      'id'            => $id,
      'harga_barang'  => $harga_barang,
      'selisih_harga' => $selisih_harga,
      'last_update'   => $last_update,
      'keterangan'   => $keterangan,
    );
    $this->mu->update_inventaris($id, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data Barang Inventaris Berhasil diubah </div>');
    redirect ('inventaris');
  }

}
