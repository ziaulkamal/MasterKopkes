<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model{

  function trx_simpan($rekening)
  {
    $query = "UPDATE tb_rekening SET saldo='$saldo', debit='$debit', kredit='$kredit', simpok='$simpok', simwa='$simwa', simka='$simka', dagoro='$dagoro', tgl_update='$tgl'";

    return $this->db->query($query);
  }

}
