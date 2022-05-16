<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_office extends CI_Controller{

  function cetak_akad_mudharabah($no_trx)
  {
    $sql_surat = "SELECT * FROM tb_surat WHERE no_pinjaman='$no_trx'";
    $query_surat  = $this->db->query($sql_surat);
    $result_surat = $query_surat->result();

    foreach ($result_surat as $data) {
      $kop_head_num = $data->id_surat;
      $set_tanggal_romawi = $data->last_update;
    }

    $ttd_tanggal = longdate_indo($set_tanggal_romawi);
    $bulan_rm = substr($set_tanggal_romawi, 5, -3);
    if ($bulan_rm == '01') {
      $bulan_set = 'I';
    }elseif ($bulan_rm == '02') {
      $bulan_set = 'II';
    }elseif ($bulan_rm == '03') {
      $bulan_set = 'III';
    }elseif ($bulan_rm == '04') {
      $bulan_set = 'IV';
    }elseif ($bulan_rm == '05') {
      $bulan_set = 'V';
    }elseif ($bulan_rm == '06') {
      $bulan_set = 'VI';
    }elseif ($bulan_rm == '07') {
      $bulan_set = 'VII';
    }elseif ($bulan_rm == '08') {
      $bulan_set = 'VIII';
    }elseif ($bulan_rm == '09') {
      $bulan_set = 'IX';
    }elseif ($bulan_rm == '10') {
      $bulan_set = 'X';
    }elseif ($bulan_rm == '11') {
      $bulan_set = 'XI';
    }elseif ($bulan_rm == '12') {
      $bulan_set = 'XII';
    }
    $tahun_set = substr($set_tanggal_romawi,0,-6);

    $sql_pinjaman = "SELECT * FROM tb_pinjaman WHERE no_pinjaman='$no_trx'";
    $query_pinjaman = $this->db->query($sql_pinjaman);
    $data_pinjaman  = $query_pinjaman->result();

    foreach ($data_pinjaman as $data) {
      $no_pinjaman = $data->no_pinjaman;
      $no_berkas   = $data->no_berkas;
      $id_member   = $data->id_member;
      $biaya_op    = $data->biaya_operasional;
      $penghasilan = number_format($data->penghasilan_lain,0,",",".");
      $total_pinjam= number_format($data->jumlah_pinjaman,0,",",".");
      $harga_gabah = number_format($data->harga_gabah,0,",",".");
      $set_gbh     = $data->harga_gabah;
      $proyeksi    = $data->proyeksi_panen;
      $bunga       = $data->bunga;
      $tenor       = $data->tenor;
      $rahn        = number_format($data->pokok_rahn,0,",",".");
      $mudharabah  = number_format($data->pokok_mudharabah,0,",",".");
      $angsuran    = number_format($data->angsuran_total,0,",",".");
      $total_ansur = number_format($data->bagi_hasil,0,",",".");
      $masa_panen  = $data->tenor;
      $nama_ao     = $data->nama_cs;
      $bagihasil   = $data->net_bagihasil;
    }
    if ($tenor == 1) {
      $tahun_tenor = 'Setengah';
    }
    if ($tenor == 2) {
      $tahun_tenor = 1;
    }
    if ($tenor == 3) {
      $tahun_tenor = 1.5;
    }
    if ($tenor == 4) {
      $tahun_tenor = 2;
    }
    if ($tenor == 5) {
      $tahun_tenor = 2.5;
    }
    $sql_member = "SELECT * FROM tb_member WHERE id_member='$id_member'";
    $query_member = $this->db->query($sql_member);
    $data_member  = $query_member->result();

    foreach ($data_member as $data) {
      $nama               = strtoupper($data->nama);
      $alamat_ktp         = strtoupper($data->alamat_ktp);
      $alamat_sekarang    = strtoupper($data->alamat_sekarang);
      $tempat_lahir       = strtoupper($data->tempat_lahir);
      $tanggal_lahir      = date_indo($data->tanggal_lahir);
      $jenis_kelamin      = strtoupper($data->jenis_kelamin);
      $status_kawin       = strtoupper($data->status_kawin);
      $masa_ktp           = strtoupper($data->masa_ktp);
      $no_hp              = $data->no_hp;
      $nik                = $data->nik;
      $pekerjaan          = strtoupper($data->pekerjaan);
      $penghasilan        = $data->penghasilan;
      $jumlah_tanggungan  = $data->jumlah_tanggungan;
      $nama_ibu           = strtoupper($data->nama_ibu);
      $nama_pasangan      = strtoupper($data->nama_pasangan);
      $nik_pasangan       = $data->nik_pasangan;
      $tl_pasangan        = strtoupper($data->tl_pasangan);
      $tgl_pasangan       = date_indo($data->tgl_pasangan);
      $no_hplain          = $data->no_hplain;
    }

    $bruto = number_format(($set_gbh*$proyeksi),0,",",".");
    $akumulasi = $proyeksi*$set_gbh;
    $zakat = 1080;
    if ($proyeksi > $zakat || $proyeksi == $zakat) {
      // NOTE: OPT = Nilai Setelah Zakat Atau Tampa Zakat
      $opt = ($akumulasi)*(5/100);
      $setelah_zakat = $akumulasi - $opt;
    }
    else {
      $setelah_zakat = $proyeksi*$biaya_op;
    }
    $neto = $setelah_zakat-$biaya_op;
    $set_neto = number_format($neto,0,",",".");
    $persen_bqgm = 20/100;
    $persen_nasabah = 80/100;
    $bqgm = number_format($neto*$persen_bqgm,0,",",".");
    $net_nasabah = number_format($neto*$persen_nasabah,0,",",".");

    $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets/template/word/akad-mudharabah-template.docx');
    $template->setValue('nomor_surat', $kop_head_num);
    $template->setValue('bulan_romawi', $bulan_set);
    $template->setValue('tahun', $tahun_set);

    $template->setValue('nama_nasabah', $nama);
    $template->setValue('tl_nasabah', $tempat_lahir);
    $template->setValue('tgl_nasabah', $tanggal_lahir);
    $template->setValue('alamat_nasabah', $alamat_sekarang);
    $template->setValue('nik_nasabah', $nik);

    $template->setValue('nama_pasangan', $nama_pasangan);
    $template->setValue('tl_pasangan', $tl_pasangan);
    $template->setValue('tgl_pasangan', $tgl_pasangan);
    $template->setValue('alamat_pasangan', $alamat_sekarang);
    $template->setValue('nik_pasangan', $nik_pasangan);

    $template->setValue('palfond', $total_pinjam);
    $template->setValue('proyeksi', $proyeksi);
    $template->setValue('harga_gabah', $harga_gabah);
    $template->setValue('bruto', $bruto);
    $template->setValue('neto', $set_neto);

    $template->setValue('bqgm', $bqgm);
    $template->setValue('net_nasabah', $net_nasabah);
    $template->setValue('tenor', $tenor);
    $template->setValue('tahun_tenor', $tahun_tenor);

    $template->setValue('tanggal_cetak', $ttd_tanggal);
    $template->setValue('ttd_nasabah', $nama);
    $template->setValue('ttd_pasangan', $nama_pasangan);
    $template->setValue('tanggal_pj', $ttd_tanggal);


    $filename = 'Akad Mudharabah '.$nama.' '.date_indo($set_tanggal_romawi);

    header("Content-type: application/vnd.ms-word");
    header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
  	header('Cache-Control: max-age=0');
    $template->saveAs('php://output');
  }

  function cetak_akad_rahn($no_trx)
  {
    $sql_surat = "SELECT * FROM tb_surat WHERE no_pinjaman='$no_trx'";
    $query_surat  = $this->db->query($sql_surat);
    $result_surat = $query_surat->result();

    foreach ($result_surat as $data) {
      $kop_head_num = $data->id_surat;
      $set_tanggal_romawi = $data->last_update;
      $id_member = $data->id_member;
    }

    $sql_member = "SELECT * FROM tb_member WHERE id_member='$id_member'";
    $query_member = $this->db->query($sql_member);
    $data_member  = $query_member->result();

    foreach ($data_member as $data) {
      $nama               = strtoupper($data->nama);
      $alamat_ktp         = strtoupper($data->alamat_ktp);
      $alamat_sekarang    = strtoupper($data->alamat_sekarang);
      $tempat_lahir       = strtoupper($data->tempat_lahir);
      $tanggal_lahir      = date_indo($data->tanggal_lahir);
      $jenis_kelamin      = strtoupper($data->jenis_kelamin);
      $status_kawin       = strtoupper($data->status_kawin);
      $masa_ktp           = strtoupper($data->masa_ktp);
      $no_hp              = $data->no_hp;
      $nik                = $data->nik;
      $pekerjaan          = strtoupper($data->pekerjaan);
      $penghasilan        = $data->penghasilan;
      $jumlah_tanggungan  = $data->jumlah_tanggungan;
      $nama_ibu           = strtoupper($data->nama_ibu);
      $nama_pasangan      = strtoupper($data->nama_pasangan);
      $nik_pasangan       = $data->nik_pasangan;
      $tl_pasangan        = strtoupper($data->tl_pasangan);
      $tgl_pasangan       = date_indo($data->tgl_pasangan);
      $no_hplain          = $data->no_hplain;
    }

    $ttd_tanggal = longdate_indo($set_tanggal_romawi);
    $waktu = date('H:i');
    $bulan_rm = substr($set_tanggal_romawi, 5, -3);
    if ($bulan_rm == '01') {
      $bulan_set = 'I';
    }elseif ($bulan_rm == '02') {
      $bulan_set = 'II';
    }elseif ($bulan_rm == '03') {
      $bulan_set = 'III';
    }elseif ($bulan_rm == '04') {
      $bulan_set = 'IV';
    }elseif ($bulan_rm == '05') {
      $bulan_set = 'V';
    }elseif ($bulan_rm == '06') {
      $bulan_set = 'VI';
    }elseif ($bulan_rm == '07') {
      $bulan_set = 'VII';
    }elseif ($bulan_rm == '08') {
      $bulan_set = 'VIII';
    }elseif ($bulan_rm == '09') {
      $bulan_set = 'IX';
    }elseif ($bulan_rm == '10') {
      $bulan_set = 'X';
    }elseif ($bulan_rm == '11') {
      $bulan_set = 'XI';
    }elseif ($bulan_rm == '12') {
      $bulan_set = 'XII';
    }
    $tahun_set = substr($set_tanggal_romawi,0,-6);

    $sql_pinjaman = "SELECT * FROM tb_pinjaman WHERE no_pinjaman='$no_trx'";
    $query_pinjaman = $this->db->query($sql_pinjaman);
    $data_pinjaman  = $query_pinjaman->result();

    foreach ($data_pinjaman as $data) {
      $tenor       = $data->tenor;
      $no_berkas   = $data->no_berkas;
      $rahn        = number_format($data->pokok_rahn,0,",",".");
    }

    if ($tenor == 1) {
      $tahun_tenor = 'Setengah';
    }
    if ($tenor == 2) {
      $tahun_tenor = 1;
    }
    if ($tenor == 3) {
      $tahun_tenor = 1.5;
    }
    if ($tenor == 4) {
      $tahun_tenor = 2;
    }
    if ($tenor == 5) {
      $tahun_tenor = 2.5;
    }

    $sql_berkas = "SELECT * FROM tb_berkas_sawah WHERE no_berkas='$no_berkas'";
    $query_berkas = $this->db->query($sql_berkas);
    $data_berkas  = $query_berkas->result();

    foreach ($data_berkas as $data) {
      $tanggal_survey      = $data->tanggal_survey;
      $dokumen_jaminan     = strtoupper($data->dokumen_jaminan);
      $nomor_surat         = strtoupper($data->nomor_surat);
      $luas                = strtoupper($data->luas);
      $kepemilikan         = strtoupper($data->kepemilikan);
      $nama_pemilik        = strtoupper($data->nama_pemilik);
      $alamat_jaminan      = strtoupper($data->alamat_jaminan);
      $lokasi_usaha        = strtoupper($data->lokasi_usaha);
      $luas_sawah_lain     = strtoupper($data->luas_sawah_lain);
      $luas_sawah_gadai    = strtoupper($data->luas_sawah_gadai);
      $kelola_sawah        = strtoupper($data->kelola_sawah);
      $luas_dikelola       = strtoupper($data->luas_dikelola);
      $fakta_data          = strtoupper($data->fakta_data);
    }

    $terbilang = substr($rahn,0, -8);
    if ($terbilang == 1) {
      $set_terbilang = 'Satu Juta Rupiah';
    }

    if ($terbilang == 2) {
      $set_terbilang = 'Dua Juta Rupiah';
    }

    if ($terbilang == 3) {
      $set_terbilang = 'Tiga Juta Rupiah';
    }

    if ($terbilang == 4) {
      $set_terbilang = 'Empat Juta Rupiah';
    }

    if ($terbilang == 5) {
      $set_terbilang = 'Lima Juta Rupiah';
    }

    if ($terbilang == 6) {
      $set_terbilang = 'Enam Juta Rupiah';
    }

    if ($terbilang == 7) {
      $set_terbilang = 'Tujuh Juta Rupiah';
    }

    if ($terbilang == 8) {
      $set_terbilang = 'Delapan Juta Rupiah';
    }

    if ($terbilang == 9) {
      $set_terbilang = 'Sembilan Juta Rupiah';
    }

    if ($terbilang == 10) {
      $set_terbilang = 'Sepuluh Juta Rupiah';
    }

    $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets/template/word/akad-rahn-template.docx');
    $template->setValue('nomor_surat', $kop_head_num);
    $template->setValue('bulan_romawi', $bulan_set);
    $template->setValue('tahun', $tahun_set);
    $template->setValue('full_tanggal_indo', $ttd_tanggal);
    $template->setValue('set_waktu', $waktu);
    $template->setValue('nama_nasabah', $nama);
    $template->setValue('nama_pasangan', $nama_pasangan);
    $template->setValue('ttd_nasabah', $nama);
    $template->setValue('akad_rahn', $rahn);
    $template->setValue('rahn_rupiah', $set_terbilang);
    $template->setValue('alamat_sawah', $alamat_jaminan);
    $template->setValue('no_surat_tanah', $nomor_surat);
    $template->setValue('luas_tanah', $luas);
    $template->setValue('alamat_sawah', $alamat_jaminan);
    $template->setValue('atas_nama', $nama_pemilik);
    $template->setValue('set_tahun', $tahun_tenor);

    $filename = 'Akad Rahn '.$nama.' '.date_indo($set_tanggal_romawi);

    header("Content-type: application/vnd.ms-word");
    header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
    header('Cache-Control: max-age=0');
    $template->saveAs('php://output');
  }

  function cetak_sanggup_bayar($no_trx)
  {
    $sql_surat = "SELECT * FROM tb_surat WHERE no_pinjaman='$no_trx'";
    $query_surat  = $this->db->query($sql_surat);
    $result_surat = $query_surat->result();

    foreach ($result_surat as $data) {
      $kop_head_num = $data->id_surat;
      $set_tanggal  = date_indo($data->last_update);
      $id_member    = $data->id_member;
    }

    $sql_member = "SELECT * FROM tb_member WHERE id_member='$id_member'";
    $query_member = $this->db->query($sql_member);
    $data_member  = $query_member->result();

    foreach ($data_member as $data) {
      $nama               = strtoupper($data->nama);
      $alamat_ktp         = strtoupper($data->alamat_ktp);
      $nik                = $data->nik;
      $alamat_sekarang    = strtoupper($data->alamat_sekarang);
      $tempat_lahir       = strtoupper($data->tempat_lahir);
      $tanggal_lahir      = date_indo($data->tanggal_lahir);
      $jenis_kelamin      = strtoupper($data->jenis_kelamin);
    }

    $sql_pinjaman = "SELECT * FROM tb_pinjaman WHERE no_pinjaman='$no_trx'";
    $query_pinjaman = $this->db->query($sql_pinjaman);
    $data_pinjaman  = $query_pinjaman->result();

    foreach ($data_pinjaman as $data) {
      $tenor       = $data->tenor;
      $no_berkas   = $data->no_berkas;
      $pinjaman    = number_format($data->jumlah_pinjaman,0,",",".");
      $angsuran    = number_format($data->net_bagihasil,0,",",".");
      $tenor       = $data->tenor;
    }

    if ($tenor == 1) {
      $tahun_tenor = 'Setengah';
    }
    if ($tenor == 2) {
      $tahun_tenor = 1;
    }
    if ($tenor == 3) {
      $tahun_tenor = 1.5;
    }
    if ($tenor == 4) {
      $tahun_tenor = 2;
    }
    if ($tenor == 5) {
      $tahun_tenor = 2.5;
    }

    $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets/template/word/surat-janji-bayar-template.docx');
    $template->setValue('nama_nasabah', $nama);
    $template->setValue('jenis_kelamin', $jenis_kelamin);
    $template->setValue('nik', $nik);
    $template->setValue('tempat_lahir', $tempat_lahir);
    $template->setValue('tanggal_lahir', $tanggal_lahir);
    $template->setValue('alamat', $alamat_sekarang);
    $template->setValue('total_pinjaman', $pinjaman);
    $template->setValue('tempo_panen', $tahun_tenor);
    $template->setValue('tenor', $tenor);
    $template->setValue('angsuran', $angsuran);
    $template->setValue('ttd_tanggal', $set_tanggal);

    $filename = 'Surat Pernyataan kesanggupan Membayar '.$nama.' '.$set_tanggal;

    header("Content-type: application/vnd.ms-word");
    header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
    header('Cache-Control: max-age=0');
    $template->saveAs('php://output');
  }

  function cetak_tanda_terima($no_trx)
  {
    $sql_surat = "SELECT * FROM tb_surat WHERE no_pinjaman='$no_trx'";
    $query_surat  = $this->db->query($sql_surat);
    $result_surat = $query_surat->result();

    foreach ($result_surat as $data) {
      $kop_head_num = $data->id_surat;
      $set_tanggal  = date_indo($data->last_update);
      $id_member    = $data->id_member;
    }

    $sql_pinjaman = "SELECT * FROM tb_pinjaman WHERE no_pinjaman='$no_trx'";
    $query_pinjaman = $this->db->query($sql_pinjaman);
    $data_pinjaman  = $query_pinjaman->result();

    foreach ($data_pinjaman as $data) {
      $no_berkas   = $data->no_berkas;
    }

    $sql_member = "SELECT * FROM tb_member WHERE id_member='$id_member'";
    $query_member = $this->db->query($sql_member);
    $data_member  = $query_member->result();

    foreach ($data_member as $data) {
      $nama               = ucwords($data->nama);
    }

    $sql_berkas = "SELECT * FROM tb_berkas_sawah WHERE no_berkas='$no_berkas'";
    $query_berkas = $this->db->query($sql_berkas);
    $data_berkas  = $query_berkas->result();

    foreach ($data_berkas as $data) {

      $nomor_surat         = ucwords($data->nomor_surat);
      $luas                = strtoupper($data->luas);
      $nama_pemilik        = ucwords($data->nama_pemilik);
      $alamat_jaminan      = ucwords($data->alamat_jaminan);
    }

    $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets/template/word/tanda-terima-jaminan-template.docx');
    $template->setValue('nama_nasabah', $nama);
    $template->setValue('alamat_sawah', $alamat_jaminan);
    $template->setValue('pemilik', $nama_pemilik);
    $template->setValue('tanggal', $set_tanggal);
    $template->setValue('luas_tanah', $luas);
    $template->setValue('no_surat', $nomor_surat);


    $filename = 'Tanda Terima Jaminan '.$nama.' '.$set_tanggal;

    header("Content-type: application/vnd.ms-word");
    header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
    header('Cache-Control: max-age=0');
    $template->saveAs('php://output');
  }

  function tabel_angsuran($no_trx)
  {
    $sql_pinjaman = "SELECT * FROM tb_pinjaman WHERE no_pinjaman='$no_trx'";
    $query_pinjaman = $this->db->query($sql_pinjaman);
    $result_pinjaman = $query_pinjaman->result();
    foreach ($result_pinjaman as $data) {
      $id_member   = $data->id_member;
      $biaya_op    = $data->biaya_operasional;
      $penghasilan = $data->penghasilan_lain;
      $total_pinjam= $data->jumlah_pinjaman;
      $harga_gabah = $data->harga_gabah;
      $proyeksi    = $data->proyeksi_panen;
      $bunga       = $data->bunga;
      $tenor       = $data->tenor;
      $rahn        = $data->pokok_rahn;
      $mudharabah  = $data->pokok_mudharabah;
      $angsuran    = $data->angsuran_total;
      $total_ansur = $data->bagi_hasil;
      $bagihasil   = $data->net_bagihasil;
    }

    $bruto = $harga_gabah*$proyeksi;
    $akumulasi = $proyeksi*$harga_gabah;
    $zakat = 1080;
    if ($proyeksi > $zakat || $proyeksi == $zakat) {
      // NOTE: OPT = Nilai Setelah Zakat Atau Tampa Zakat
      $opt = ($akumulasi)*(5/100);
      $setelah_zakat = $akumulasi - $opt;
    }
    else {
      $setelah_zakat = $proyeksi*$biaya_op;
    }
    $neto = $setelah_zakat-$biaya_op;
    $persen_bqgm = 20/100;
    $persen_nasabah = 80/100;
    $bqgm = $neto*$persen_bqgm;
    $net_nasabah = $neto*$persen_nasabah;

    $sql_member = "SELECT * FROM tb_member WHERE id_member='$id_member'";
    $query_member = $this->db->query($sql_member);
    $result_member = $query_member->result();
    foreach ($result_member as $data) {
      $nama_nasabah = $data->nama;
      $nama_pasangan = $data->nama_pasangan;
      $alamat_ktp = $data->alamat_sekarang;
    }

    $pertama = $total_pinjam - ($rahn/$tenor) - ($mudharabah/$tenor);
    $kedua = $pertama  - ($rahn/$tenor) - ($mudharabah/$tenor);
    $ketiga = $kedua  - ($rahn/$tenor) - ($mudharabah/$tenor);
    $keempat = $ketiga  - ($rahn/$tenor) - ($mudharabah/$tenor);
    $kelima = $keempat  - ($rahn/$tenor) - ($mudharabah/$tenor);

    $data = array(
      'tanggal_transaksi'   => date_indo(date('Y-m-d')),
      'nama_nasabah'        => $nama_nasabah,
      'no_pinjaman'         => $no_trx,
      'nama_pasangan'       => $nama_pasangan,
      'alamat'              => $alamat_ktp,
      'total_pinjaman'      => $total_pinjam,
      'rahn'                => $rahn,
      'mudharabah'          => $mudharabah,
      'tenor'               => $tenor,
      'bqgm'                => $bqgm,
      'net_nasabah'         => $net_nasabah,
      'angsuran'            => $angsuran,
      'kelima'              => $kelima,
      'keempat'             => $keempat,
      'ketiga'              => $ketiga,
      'kedua'               => $kedua,
      'pertama'             => $pertama,
      'head'                => 'Print Tabel Angsuran',
      'title'               => '<strong>Cetak</strong> Tabel Angsuran',
      'konten'              => 'surat/tabel_angsuran.php',
    );
    $this->load->view('main', $data);
  }
}
