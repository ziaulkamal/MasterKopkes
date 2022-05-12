<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_function extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function last_instansi()
  {
    $this->db->select('kode_instansi');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('tb_instansi', 1);
    return $query->row();
  }

  function jumlah_instansi()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_instansi');
    return $query->row();
  }


  function jumlah_anggota()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_anggota');
    return $query->row();
  }

  function jumlah_anggota_pinjam()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_pinjaman');
    return $query->row();
  }

  function jumlah_anggota_angsur()
  {
    $query = $this->db->query('SELECT COUNT(*) AS total FROM tb_angsuran');
    return $query->row();
  }

  function jumlah_simpanan()
  {
    $query = $this->db->query('SELECT sum(total_akumulasi) AS total FROM tb_rekening');
    return $query->row();

  }

  function list_rekening()
  {
    $this->db->select('no_rekening, anggota_no AS no_anggota, nama_anggota AS nama, s_pokok AS pokok, s_wajib AS wajib, s_khusus AS kusus, s_lain AS lain, s_gotongroyong AS gotong_royong, total_akumulasi AS total, sts_pinjaman AS status_pinjam, status AS keanggotaan, last_update AS update_terakhir');
    $this->db->from('tb_rekening');
    $this->db->join('tb_anggota', 'tb_anggota.no_anggota = tb_rekening.anggota_no');
    $this->db->order_by('update_terakhir', 'DESC');
    return $this->db->get();
  }

  function cari_anggota($no_anggota)
  {
    $this->db->where('anggota_no', $no_anggota);
    return $this->db->get('tb_rekening')->result();
  }

  function cari_rekening($no_rekening)
  {
    $this->db->where('no_rekening', $no_rekening);
    return $this->db->get('tb_rekening')->result();
  }

  function detail_anggota_simpanan($no_rekening)
  {
    $this->db->where('no', $no_rekening);
    return $this->db->get('master_view_rekening')->row();
  }

  function detail_anggota_personal($no_anggota)
  {
    $this->db->where('no', $no_anggota);
    return $this->db->get('master_view_anggota_all')->row();
  }

  function get_format_daftar()
  {
    $this->db->select('id');
    $this->db->order_by('id','DESC');
    return $this->db->get('tb_anggota', 1)->row();
  }

  function get_list_pinjaman()
  {
    $this->db->order_by('kode', 'DESC');
    return $this->db->get('master_view_pinjaman')->result();
  }

  function get_pinjaman_kode($kode_pinjaman)
  {
    $this->db->where('kode_pinjaman', $kode_pinjaman);
    return $this->db->get('tb_pinjaman')->row();
  }

  function get_angsuran_kode($kode_pinjaman)
  {
    $this->db->where('kode_pinjaman', $kode_pinjaman);
    $this->db->order_by('last_update', 'DESC');
    $this->db->limit('6');
    return $this->db->get('tb_angsuran');
  }

  function get_detail_rekening($no_rekening)
  {
    $this->db->where('no_rekening', $no_rekening);
    return $this->db->get('tb_rekening')->row();
  }

  function get_id_margin($no_rekening, $tahun)
  {
    $data = array(
      'no_rekening' => $no_rekening,
      'tahun' => $tahun,
    );
    $this->db->where($data);
    return $this->db->get('tb_margin_saving')->row();
  }

  function get_anggota_by_no($no_anggota)
  {
    $this->db->where('no_anggota', $no_anggota);
    return $this->db->get('tb_anggota')->row();
  }

  function update_anggota($no_anggota, $data)
  {
    $this->db->where('no_anggota', $no_anggota);
    $this->db->update('tb_anggota', $data);
  }

  function delete($no_anggota)
  {
    $query      = $this->db->query ("SELECT status from tb_anggota WHERE no_anggota ='$no_anggota'");
    $set_update = $this->db->query("UPDATE tb_anggota SET status = 2 WHERE  no_anggota = '$no_anggota'");
    $query_hasil = $query + $set_update;
    return $query_hasil;
  }
}
