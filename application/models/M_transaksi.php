<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

  function trx_simpan($rekening)
  {
    $query = "UPDATE tb_rekening SET saldo='$saldo', debit='$debit', kredit='$kredit', simpok='$simpok', simwa='$simwa', simka='$simka', dagoro='$dagoro', tgl_update='$tgl'";
    return $this->db->query($query);
  }

  function get_data_cetak()
  {
    $this->db->SELECT('*');
    $this->db->FROM ('tb_simpanan');
    $this->db->JOIN ('tb_anggota','tb_anggota.no_anggota = tb_simpanan.no_anggota');
    $query = $this->db->get();
     return $query;
  }


}
