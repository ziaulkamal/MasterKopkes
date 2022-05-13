<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Controller_excel extends CI_Controller{

  function excel_angsuran_all()
  {
    $query = $this->db->query("SELECT * FROM laporan_angsuran_member ORDER BY id_a DESC");
    $result = $query->result();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $date = date('d-m-Y');
    $sheet->setCellValue('A1', 'Laporan Angsuran Pada Periode '. longdate_indo($date).' Dicetak Otomatis Oleh Sistem');
    $sheet->setCellValue('A3', 'No');
    $sheet->setCellValue('B3', 'No Angsuran');
    $sheet->setCellValue('C3', 'ID Nasabah');
    $sheet->setCellValue('D3', 'Nomor Pinjaman');
    $sheet->setCellValue('E3', 'Nama Nasabah');
    $sheet->setCellValue('F3', 'Nilai Angsuran');
    $sheet->setCellValue('G3', 'Tanggal Angsuran');
    $no = 1;
    $x = 4;
    foreach ($result as $data) {
      $sheet->setCellValue('A'.$x, $no++);
      $sheet->setCellValue('B'.$x, $data->id_a);
      $sheet->setCellValue('C'.$x, $data->id_m);
      $sheet->setCellValue('D'.$x, $data->id_p);
      $sheet->setCellValue('E'.$x, $data->nama);

      $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->nominal_angsuran,2,",","."));
      $sheet->setCellValue('G'.$x, longdate_indo($data->last_update));
      $x++;
    }

    $writer = new Xlsx($spreadsheet);
		$filename = 'Laporan Angsuran Total'.' '.date_indo($date);

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
			header('Cache-Control: max-age=0');
			$writer->save('php://output');
      // redirect('beranda');
  }

  function cari_nasabah()
  {
    $data = array(
      'head'          => 'Cari Angsuran',
      'title'         => '<strong>Cari</strong> Nasabah',
      'placeholder'   => 'Masukan ID Nasabah',
      'action'        => 'laporan/angsuran_nasabah/excel',
      'name'          => 'id_nasabah',
      'konten'        => 'excel/search_nasabah.php'
    );
    $this->load->view('main', $data);
  }


  function proses_angsuran_nasabah()
  {
    $id_nasabah = $this->input->post('id_nasabah');
    $startdate  = $this->input->post('startdate');
    $enddate  = $this->input->post('enddate');
    $sql = "SELECT * FROM excel_cari_member WHERE (tanggal BETWEEN '$startdate' AND '$enddate') AND (id_member='$id_nasabah')";
    $query = $this->db->query($sql);
    $result = $query->result();

    if ($query->num_rows() != 0) {
      foreach ($result as $data) { $nama = $data->nama; }
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $date = date('d-m-Y');
      $sheet->setCellValue('A1', 'Laporan Angsuran '.$nama.'. Pada Periode '.date_indo($startdate).' sampai dengan '.date_indo($enddate).' Dicetak Otomatis Oleh Sistem');
      $sheet->setCellValue('A3', 'No');
      $sheet->setCellValue('B3', 'No Angsuran');
      $sheet->setCellValue('C3', 'ID Nasabah');
      $sheet->setCellValue('D3', 'Nomor Pinjaman');
      $sheet->setCellValue('E3', 'Nilai Angsuran');
      $sheet->setCellValue('F3', 'Tanggal Angsuran');

      $no = 1;
      $x = 4;
      foreach ($result as $data) {
        $sheet->setCellValue('A'.$x, $no++);
        $sheet->setCellValue('B'.$x, $data->id_angsuran);
        $sheet->setCellValue('C'.$x, $data->id_member);
        $sheet->setCellValue('D'.$x, $data->no_pinjaman);
        $sheet->setCellValue('E'.$x, 'Rp. '.number_format($data->angsuran,2,",","."));
        $sheet->setCellValue('F'.$x, longdate_indo($data->tanggal));
        $x++;
      }
      $writer = new Xlsx($spreadsheet);
  		$filename = 'Rekap Angsuran Nasabah '.$nama.' '.date('d-m-Y');

  			header('Content-Type: application/vnd.ms-excel');
  			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
  			header('Cache-Control: max-age=0');
  			$writer->save('php://output');
    }else {
    $this->session->set_flashdata('message', '<div class="alert-danger">ID Nasabah tidak sesuai dengan Sistem atau di range tanggal tersebut tidak ada Angsuran</div>');
    redirect('search/angsuran_nasabah/cari');
   }
  }

  function angsuran_filter_date()
  {
    $data = array(
      'head'          => 'Cari Angsuran',
      'title'         => '<strong>Cari</strong> Nasabah',
      'placeholder'   => 'Masukan ID Nasabah',
      'action'        => 'laporan/angsuran_tanggal/excel',
      'konten'        => 'excel/search_nasabah.php'
    );
    $this->load->view('main', $data);
  }

  function proses_angsuran_filter()
  {
    $startdate  = $this->input->post('startdate');
    $enddate  = $this->input->post('enddate');
    $sql = "SELECT * FROM excel_cari_member WHERE tanggal BETWEEN '$startdate' AND '$enddate'";
    $query = $this->db->query($sql);
    $result = $query->result();

    if ($query->num_rows() != 0) {
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $date = date('d-m-Y');
      $sheet->setCellValue('A1', 'Laporan Angsuran Pada Periode '.date_indo($startdate).' sampai dengan '.date_indo($enddate).' Dicetak Otomatis Oleh Sistem');
      $sheet->setCellValue('A3', 'No');
      $sheet->setCellValue('B3', 'No Angsuran');
      $sheet->setCellValue('C3', 'ID Nasabah');
      $sheet->setCellValue('D3', 'Nomor Pinjaman');
      $sheet->setCellValue('E3', 'Nama Nasabah');
      $sheet->setCellValue('F3', 'Nilai Angsuran');
      $sheet->setCellValue('G3', 'Tanggal Angsuran');

      $no = 1;
      $x = 4;
      foreach ($result as $data) {
        $sheet->setCellValue('A'.$x, $no++);
        $sheet->setCellValue('B'.$x, $data->id_angsuran);
        $sheet->setCellValue('C'.$x, $data->id_member);
        $sheet->setCellValue('D'.$x, $data->no_pinjaman);
        $sheet->setCellValue('E'.$x, $data->nama);
        $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->angsuran,2,",","."));
        $sheet->setCellValue('G'.$x, longdate_indo($data->tanggal));
        $x++;
      }
      $writer = new Xlsx($spreadsheet);
      $filename = 'Rekap Angsuran Periode tanggal '.date_indo($startdate).' sampai dengan '.date_indo($enddate);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }else {
    $this->session->set_flashdata('message', '<div class="alert-danger">Range tanggal tersebut tidak ada Angsuran</div>');
    redirect('search/angsuran_nasabah/cari');
   }
  }

  function angsuran_bulanan()
  {
    $date = date('Y-m-d');
    $sebulan  = date("Y-m-d", strtotime("$date - 1 month"));
    $query = $this->db->query("SELECT * FROM laporan_angsuran_member WHERE last_update BETWEEN '$date' AND '$sebulan' ORDER BY id_a DESC");
    $result = $query->result();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $date = date('d-m-Y');
    $sheet->setCellValue('A1', 'Laporan Angsuran Pada Periode '.date_indo($sebulan).' sampai dengan '.date_indo($date).' Dicetak Otomatis Oleh Sistem');
    $sheet->setCellValue('A3', 'No');
    $sheet->setCellValue('B3', 'No Angsuran');
    $sheet->setCellValue('C3', 'ID Nasabah');
    $sheet->setCellValue('D3', 'Nomor Pinjaman');
    $sheet->setCellValue('E3', 'Nama Nasabah');
    $sheet->setCellValue('F3', 'Nilai Angsuran');
    $sheet->setCellValue('G3', 'Tanggal Angsuran');
    $no = 1;
    $x = 4;
    foreach ($result as $data) {
      $sheet->setCellValue('A'.$x, $no++);
      $sheet->setCellValue('B'.$x, $data->id_a);
      $sheet->setCellValue('C'.$x, $data->id_m);
      $sheet->setCellValue('D'.$x, $data->id_p);
      $sheet->setCellValue('E'.$x, $data->nama);
      $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->nominal_angsuran,2,",","."));
      $sheet->setCellValue('G'.$x, longdate_indo($data->last_update));
      $x++;
    }

    $writer = new Xlsx($spreadsheet);
		$filename = 'Laporan Angsuran Bulanan Sejak '.date_indo($sebulan). ' sampai dengan '.date_indo($date);

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
			header('Cache-Control: max-age=0');
			$writer->save('php://output');
      // redirect('beranda');
  }

  function excel_pinjaman_all()
  {
    $query = $this->db->query("SELECT * FROM laporan_pinjaman_member ORDER BY id_p DESC");
    $result = $query->result();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $date = date('d-m-Y');
    $sheet->setCellValue('A1', 'Laporan Pinjaman Keseluruhan Tanggal '.date_indo($date).' Dicetak Otomatis Oleh Sistem');
    $sheet->setCellValue('A3', 'No.');
    $sheet->setCellValue('B3', 'Nomor Pinjaman');
    $sheet->setCellValue('C3', 'ID Nasabah');
    $sheet->setCellValue('D3', 'Nama Nasabah');
    $sheet->setCellValue('E3', 'Total Pinjaman');
    $sheet->setCellValue('F3', 'Harga Padi');
    $sheet->setCellValue('G3', 'Proyeksi Panen');
    $sheet->setCellValue('H3', 'Bagi Hasil BQGM');
    $sheet->setCellValue('I3', 'Akad Rahn');
    $sheet->setCellValue('J3', 'Akad Mudharabah');
    $sheet->setCellValue('K3', 'Angsuran Perpanen');
    $sheet->setCellValue('L3', 'Angsuran Keseluruhan');
    $sheet->setCellValue('M3', 'Masa Panen');
    $sheet->setCellValue('N3', 'Account Officer');
    $sheet->setCellValue('O3', 'Tanggal');
    $no = 1;
    $x = 4;
    foreach ($result as $data) {
      $sheet->setCellValue('A'.$x, $no++);
      $sheet->setCellValue('B'.$x, $data->id_p);
      $sheet->setCellValue('C'.$x, $data->id_m);
      $sheet->setCellValue('D'.$x, $data->nama);
      $sheet->setCellValue('E'.$x, 'Rp. '.number_format($data->total_pinjam,2,",","."));
      $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->harga_padi,2,",","."));
      $sheet->setCellValue('G'.$x, $data->nilai_proyeksi.' Kg');
      $sheet->setCellValue('H'.$x, ($data->persentase*100).'%');
      $sheet->setCellValue('I'.$x, 'Rp. '.number_format($data->p_rahn,2,",","."));
      $sheet->setCellValue('J'.$x, 'Rp. '.number_format($data->p_mudharabah,2,",","."));
      $sheet->setCellValue('K'.$x, 'Rp. '.number_format($data->trx_p_panen,2,",","."));
      $sheet->setCellValue('L'.$x, 'Rp. '.number_format($data->trx_p_total,2,",","."));
      $sheet->setCellValue('M'.$x, $data->masa_bayar.'x Panen');
      $sheet->setCellValue('N'.$x, $data->nama_ao);
      $sheet->setCellValue('O'.$x, longdate_indo($data->tanggal));
      $x++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'Laporan Pinjaman Keseluruhan Nasabah'.' '.date_indo($date);

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
      header('Cache-Control: max-age=0');
      $writer->save('php://output');
      // redirect('beranda');
  }

  function cari_ao()
  {
    $data = array(
      'head'          => 'Cari Account Officer',
      'title'         => '<strong>Cari</strong> Account Officer',
      'action'        => 'laporan/pinjaman_ao/excel',
      'daftar'          => '',
      'name'          => 'nama_ao',
      'konten'        => 'excel/search_ao.php'
    );
    $this->load->view('main', $data);
  }

    function excel_by_ao()
    {
      $startdate  = $this->input->post('startdate');
      $enddate  = $this->input->post('enddate');
      $nama_ao  = $this->input->post('nama_ao');

      // die($nama_ao.'===='.$startdate.'====='.$enddate);
      if ($nama_ao == NULL || $nama_ao = '') {
        $query = $this->db->query("SELECT * FROM laporan_pinjaman_member WHERE tanggal BETWEEN '$startdate' AND '$enddate' ORDER BY id_p DESC");
        $result = $query->result();
        if ($query->num_rows() != 0) {
          $spreadsheet = new Spreadsheet();
          $sheet = $spreadsheet->getActiveSheet();
          $date = date('d-m-Y');
          $sheet->setCellValue('A1', 'Laporan Pinjaman Nasabah di periode Tanggal '.date_indo($startdate).' sampai dengan '.date_indo($enddate).'. Dicetak Otomatis Oleh Sistem');
          $sheet->setCellValue('A3', 'No.');
          $sheet->setCellValue('B3', 'Nomor Pinjaman');
          $sheet->setCellValue('C3', 'ID Nasabah');
          $sheet->setCellValue('D3', 'Nama Nasabah');
          $sheet->setCellValue('E3', 'Total Pinjaman');
          $sheet->setCellValue('F3', 'Harga Padi');
          $sheet->setCellValue('G3', 'Proyeksi Panen');
          $sheet->setCellValue('H3', 'Bagi Hasil BQGM');
          $sheet->setCellValue('I3', 'Akad Rahn');
          $sheet->setCellValue('J3', 'Akad Mudharabah');
          $sheet->setCellValue('K3', 'Angsuran Perpanen');
          $sheet->setCellValue('L3', 'Angsuran Keseluruhan');
          $sheet->setCellValue('M3', 'Masa Panen');
          $sheet->setCellValue('N3', 'Account Officer');
          $sheet->setCellValue('O3', 'Tanggal');
          $no = 1;
          $x = 4;
          foreach ($result as $data) {
            $sheet->setCellValue('A'.$x, $no++);
            $sheet->setCellValue('B'.$x, $data->id_p);
            $sheet->setCellValue('C'.$x, $data->id_m);
            $sheet->setCellValue('D'.$x, $data->nama);
            $sheet->setCellValue('E'.$x, 'Rp. '.number_format($data->total_pinjam,2,",","."));
            $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->harga_padi,2,",","."));
            $sheet->setCellValue('G'.$x, $data->nilai_proyeksi.' Kg');
            $sheet->setCellValue('H'.$x, ($data->persentase*100).'%');
            $sheet->setCellValue('I'.$x, 'Rp. '.number_format($data->p_rahn,2,",","."));
            $sheet->setCellValue('J'.$x, 'Rp. '.number_format($data->p_mudharabah,2,",","."));
            $sheet->setCellValue('K'.$x, 'Rp. '.number_format($data->trx_p_panen,2,",","."));
            $sheet->setCellValue('L'.$x, 'Rp. '.number_format($data->trx_p_total,2,",","."));
            $sheet->setCellValue('M'.$x, $data->masa_bayar.'x Panen');
            $sheet->setCellValue('N'.$x, $data->nama_ao);
            $sheet->setCellValue('O'.$x, longdate_indo($data->tanggal));
            $x++;
          }

          $writer = new Xlsx($spreadsheet);
          $filename = 'Laporan Pinjaman Nasabah Dari Tanggal '.date_indo($startdate).' sampai dengan '.date_indo($enddate);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            // redirect('beranda');
        }else {
          $this->session->set_flashdata('message', '<div class="alert-danger">Range tanggal tersebut tidak ada Pinjaman</div>');
          redirect('search/pinjaman_ao/cari');
        }
      }else {
        $query = $this->db->query("SELECT * FROM laporan_pinjaman_member WHERE (tanggal BETWEEN '$startdate' AND '$enddate') AND (nama_ao='$nama_ao') ORDER BY id_p DESC");
        $result = $query->result();
        if ($query->num_rows() != 0) {
          $spreadsheet = new Spreadsheet();
          $sheet = $spreadsheet->getActiveSheet();
          $date = date('d-m-Y');
          $sheet->setCellValue('A1', 'Laporan Pinjaman Nasabah Dengan Account Officer '.$nama_ao.' di periode Tanggal '.date_indo($startdate).' sampai dengan '.date_indo($enddate).'. Dicetak Otomatis Oleh Sistem');
          $sheet->setCellValue('A3', 'No.');
          $sheet->setCellValue('B3', 'Nomor Pinjaman');
          $sheet->setCellValue('C3', 'ID Nasabah');
          $sheet->setCellValue('D3', 'Nama Nasabah');
          $sheet->setCellValue('E3', 'Total Pinjaman');
          $sheet->setCellValue('F3', 'Harga Padi');
          $sheet->setCellValue('G3', 'Proyeksi Panen');
          $sheet->setCellValue('H3', 'Bagi Hasil BQGM');
          $sheet->setCellValue('I3', 'Akad Rahn');
          $sheet->setCellValue('J3', 'Akad Mudharabah');
          $sheet->setCellValue('K3', 'Angsuran Perpanen');
          $sheet->setCellValue('L3', 'Angsuran Keseluruhan');
          $sheet->setCellValue('M3', 'Masa Panen');
          $sheet->setCellValue('N3', 'Account Officer');
          $sheet->setCellValue('O3', 'Tanggal');
          $no = 1;
          $x = 4;
          foreach ($result as $data) {
            $sheet->setCellValue('A'.$x, $no++);
            $sheet->setCellValue('B'.$x, $data->id_p);
            $sheet->setCellValue('C'.$x, $data->id_m);
            $sheet->setCellValue('D'.$x, $data->nama);
            $sheet->setCellValue('E'.$x, 'Rp. '.number_format($data->total_pinjam,2,",","."));
            $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->harga_padi,2,",","."));
            $sheet->setCellValue('G'.$x, $data->nilai_proyeksi.' Kg');
            $sheet->setCellValue('H'.$x, ($data->persentase*100).'%');
            $sheet->setCellValue('I'.$x, 'Rp. '.number_format($data->p_rahn,2,",","."));
            $sheet->setCellValue('J'.$x, 'Rp. '.number_format($data->p_mudharabah,2,",","."));
            $sheet->setCellValue('K'.$x, 'Rp. '.number_format($data->trx_p_panen,2,",","."));
            $sheet->setCellValue('L'.$x, 'Rp. '.number_format($data->trx_p_total,2,",","."));
            $sheet->setCellValue('M'.$x, $data->masa_bayar.'x Panen');
            $sheet->setCellValue('N'.$x, $data->nama_ao);
            $sheet->setCellValue('O'.$x, longdate_indo($data->tanggal));
            $x++;
          }

          $writer = new Xlsx($spreadsheet);
          $filename = 'Laporan Pinjaman AO '.$nama_ao.' Dari Tanggal '.date_indo($startdate).' sampai dengan '.date_indo($enddate);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        }else {
          $this->session->set_flashdata('message', '<div class="alert-danger">Account Officer Atau Range tanggal tersebut tidak ada Pinjaman</div>');
          redirect('search/pinjaman_ao/cari');
        }
      }
    }

    function excel_operasional_all()
    {
      $query = $this->db->query("SELECT * FROM tb_kas_operasional WHERE approval_manajer='1' ORDER BY id_kas DESC");
      $result = $query->result();

      $query_brangkas = $this->db->query("SELECT * FROM tb_brangkas");
      $result_brangkas  = $query_brangkas->result();
      foreach ($result_brangkas as $data) { $keterangan       = $data->kategori; $saldo_brangkas   = $data->saldo; $tanggal_terakhir = $data->last_update; }
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $date = date('d-m-Y');
      $sheet->setCellValue('A1', 'Laporan Operasional Pada Periode '. longdate_indo($date).' Dicetak Otomatis Oleh Sistem');
      $sheet->setCellValue('A2', $keterangan);
      $sheet->setCellValue('B2', 'Rp. '.number_format($saldo_brangkas,2,",","."));
      $sheet->setCellValue('C2', 'Tanggal Update Brangkas: '.longdate_indo($tanggal_terakhir));

      $sheet->setCellValue('A4', 'No');
      $sheet->setCellValue('B4', 'Jenis');
      $sheet->setCellValue('C4', 'Nominal');
      $sheet->setCellValue('D4', 'Keterangan');
      $sheet->setCellValue('E4', 'Tanggal');
      $no = 1;
      $x = 5;
      foreach ($result as $data) {
        $sheet->setCellValue('A'.$x, $no++);
        if ($data->jenis_kas == 1) {
          $jenis = 'Dana Masuk';
        }elseif ($data->jenis_kas == 2) {
          $jenis = 'Dana Keluar';
        }
        $sheet->setCellValue('B'.$x, $jenis);
        $sheet->setCellValue('C'.$x, 'Rp. '.number_format($data->saldo_kas,2,",","."));
        $sheet->setCellValue('D'.$x, $data->keterangan);
        $sheet->setCellValue('E'.$x, longdate_indo($data->last_update));
        $x++;
      }

      $writer = new Xlsx($spreadsheet);
      $filename = 'Laporan Operasional '.date_indo($date);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        // redirect('beranda');
    }

    function filter_op_tanggal()
    {
      $data = array(
        'head'          => 'Operasional Set By Tanggal',
        'title'         => '<strong>Tentukan</strong> Tanggal',
        'action'        => 'laporan/operasional_tanggal/excel',
        'konten'        => 'excel/search_operasional.php'
      );
      $this->load->view('main', $data);
    }

    function excel_operasional_tanggal()
    {
      $startdate  = $this->input->post('startdate');
      $enddate  = $this->input->post('enddate');

      $query = $this->db->query("SELECT * FROM tb_kas_operasional WHERE (last_update BETWEEN '$startdate' AND '$enddate') AND (approval_manajer='1') ORDER BY id_kas DESC");
      $result = $query->result();

      $query_brangkas = $this->db->query("SELECT * FROM tb_brangkas");
      $result_brangkas  = $query_brangkas->result();
      foreach ($result_brangkas as $data) { $keterangan       = $data->kategori; $saldo_brangkas   = $data->saldo; $tanggal_terakhir = $data->last_update; }

      if ($query->num_rows() != 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $date = date('d-m-Y');
        $sheet->setCellValue('A1', 'Laporan Operasional Pada Periode '. date_indo($startdate).' sampai dengan '.date_indo($enddate).' Dicetak Otomatis Oleh Sistem');
        $sheet->setCellValue('A2', $keterangan);
        $sheet->setCellValue('B2', 'Rp. '.number_format($saldo_brangkas,2,",","."));
        $sheet->setCellValue('C2', 'Tanggal Update Brangkas: '.longdate_indo($tanggal_terakhir));

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Jenis');
        $sheet->setCellValue('C4', 'Nominal');
        $sheet->setCellValue('D4', 'Keterangan');
        $sheet->setCellValue('E4', 'Tanggal');
        $no = 1;
        $x = 5;
        foreach ($result as $data) {
          $sheet->setCellValue('A'.$x, $no++);
          if ($data->jenis_kas == 1) {
            $jenis = 'Dana Masuk';
          }elseif ($data->jenis_kas == 2) {
            $jenis = 'Dana Keluar';
          }
          $sheet->setCellValue('B'.$x, $jenis);
          $sheet->setCellValue('C'.$x, 'Rp. '.number_format($data->saldo_kas,2,",","."));
          $sheet->setCellValue('D'.$x, $data->keterangan);
          $sheet->setCellValue('E'.$x, longdate_indo($data->last_update));
          $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Operasional Range Tanggal '.date_indo($startdate).' sampai dengan '.date_indo($enddate);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
          header('Cache-Control: max-age=0');
          $writer->save('php://output');
      }else {
        $this->session->set_flashdata('message', '<div class="alert-danger">Tidak ada laporan di range tanggal tersebut</div>');
        redirect('search/operasional_tanggal/cari');
      }
    }

    function excel_simpanan_all()
    {
      $query = $this->db->query("SELECT tb_simpan.kode_simpan AS kode_simpan,tb_member.nama AS nama,tb_simpan.id_member AS id_member,tb_simpan.jenis_simpanan AS jenis,tb_simpan.jml_simpanan AS jml_simpanan, tb_simpan.keterangan AS keterangan, tb_simpan.last_update AS tanggal FROM tb_simpan INNER JOIN tb_member ON tb_member.id_member=tb_simpan.id_member ORDER BY tb_simpan.last_update DESC");
      $result = $query->result();
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $date = date('d-m-Y');
      $sheet->setCellValue('A1', 'Laporan Simpanan Pada Periode '. longdate_indo($date).' Dicetak Otomatis Oleh Sistem');

      $sheet->setCellValue('A4', 'No');
      $sheet->setCellValue('B4', 'Kode Simpanan');
      $sheet->setCellValue('C4', 'ID Nasabah');
      $sheet->setCellValue('D4', 'Nama Nasabah');
      $sheet->setCellValue('E4', 'Jenis Simpanan');
      $sheet->setCellValue('F4', 'Jumlah Simpanan');
      $sheet->setCellValue('G4', 'Keterangan');
      $sheet->setCellValue('H4', 'Tanggal');
      $no = 1;
      $x = 5;
      foreach ($result as $data) {
        $sheet->setCellValue('A'.$x, $no++);
        $sheet->setCellValue('B'.$x, $data->kode_simpan);
        $sheet->setCellValue('C'.$x, $data->id_member);
        $sheet->setCellValue('D'.$x, $data->nama);

        $sheet->setCellValue('E'.$x, $data->jenis);

        $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->jml_simpanan,2,",","."));
        $sheet->setCellValue('G'.$x, $data->keterangan);
        $sheet->setCellValue('H'.$x, longdate_indo($data->tanggal));
        $x++;
      }

      $writer = new Xlsx($spreadsheet);
      $filename = 'Laporan Simpanan Keseluruhan '.date_indo($date);

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
      header('Cache-Control: max-age=0');
      $writer->save('php://output');
    }
    function excel_simpanan_bulan()
    {
      $date = date('Y-m-d');
      $sebulan  = date("Y-m-d", strtotime("$date -1 month"));
      $query = $this->db->query("SELECT * FROM laporan_simpanan_member WHERE (tanggal BETWEEN '$sebulan' AND '$date') ORDER BY tanggal DESC");
      $result = $query->result();

      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'Laporan Simpanan Pada Periode '. date_indo($date).' sampai dengan '.date_indo($sebulan).' Dicetak Otomatis Oleh Sistem');

      $sheet->setCellValue('A4', 'No');
      $sheet->setCellValue('B4', 'Kode Simpanan');
      $sheet->setCellValue('C4', 'ID Nasabah');
      $sheet->setCellValue('D4', 'Nama Nasabah');
      $sheet->setCellValue('E4', 'Jenis Simpanan');
      $sheet->setCellValue('F4', 'Jumlah Simpanan');
      $sheet->setCellValue('G4', 'Keterangan');
      $sheet->setCellValue('H4', 'Tanggal');
      $no = 1;
      $x = 5;
      foreach ($result as $data) {
        $sheet->setCellValue('A'.$x, $no++);
        $sheet->setCellValue('B'.$x, $data->kode_simpan);
        $sheet->setCellValue('C'.$x, $data->id_member);
        $sheet->setCellValue('D'.$x, $data->nama);

        $sheet->setCellValue('E'.$x, $data->jenis_simpanan);

        $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->jml_simpanan,2,",","."));
        $sheet->setCellValue('G'.$x, $data->keterangan);
        $sheet->setCellValue('H'.$x, longdate_indo($data->tanggal));
        $x++;
      }

      $writer = new Xlsx($spreadsheet);
      $filename = 'Laporan Simpanan 1 Bulan Sebelumnya '.date_indo($date);

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
      header('Cache-Control: max-age=0');
      $writer->save('php://output');
    }

    function simpanan_filter_date()
    {
      $data = array(
        'head'          => 'Cari Simpanan',
        'title'         => '<strong>Cari</strong> Simpanan Range Tanggal',
        'placeholder'   => 'Masukan ID Nasabah',
        'name'          => 'id_member',
        'action'        => 'laporan/simpanan_tanggal/excel',
        'konten'        => 'excel/search_nasabah.php'
      );
      $this->load->view('main', $data);
    }
    function excel_filter_tanggal()
    {
      $startdate  = $this->input->post('startdate');
      $enddate  = $this->input->post('enddate');
      $id_member = $this->input->post('id_member');
      if ($startdate == NULL || $enddate == NULL) {
        $this->session->set_flashdata('message', '<div class="alert-danger">Tanggal tidak boleh kosong</div>');
        redirect('search/simpanan_tanggal/cari');
      }
      if ($id_member == NULL) {

        $query = $this->db->query("SELECT * FROM laporan_simpanan_member WHERE (tanggal BETWEEN '$startdate' AND '$enddate') ORDER BY tanggal DESC");
        $result = $query->result();

        if ($query->num_rows() != 1) {
          $this->session->set_flashdata('message', '<div class="alert-danger">Tidak ada data di tanggal tersebut</div>');
          redirect('search/simpanan_tanggal/cari');
        }
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Laporan Simpanan Pada Periode '. date_indo($startdate).' sampai dengan '.date_indo($enddate).' Dicetak Otomatis Oleh Sistem');

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Kode Simpanan');
        $sheet->setCellValue('C4', 'ID Nasabah');
        $sheet->setCellValue('D4', 'Nama Nasabah');
        $sheet->setCellValue('E4', 'Jenis Simpanan');
        $sheet->setCellValue('F4', 'Jumlah Simpanan');
        $sheet->setCellValue('G4', 'Keterangan');
        $sheet->setCellValue('H4', 'Tanggal');
        $no = 1;
        $x = 5;
        foreach ($result as $data) {
          $sheet->setCellValue('A'.$x, $no++);
          $sheet->setCellValue('B'.$x, $data->kode_simpan);
          $sheet->setCellValue('C'.$x, $data->id_member);
          $sheet->setCellValue('D'.$x, $data->nama);

          $sheet->setCellValue('E'.$x, $data->jenis_simpanan);

          $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->jml_simpanan,2,",","."));
          $sheet->setCellValue('G'.$x, $data->keterangan);
          $sheet->setCellValue('H'.$x, longdate_indo($data->tanggal));
          $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Simpanan periode '.date_indo($startdate).' sampai dengan '.date_indo($enddate);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
      }else {

        $query = $this->db->query("SELECT * FROM laporan_simpanan_member WHERE (tanggal BETWEEN '$startdate' AND '$enddate') AND id_member='$id_member' ORDER BY tanggal DESC");
        $result = $query->result();
        if ($query->num_rows() != 1) {
          $this->session->set_flashdata('message', '<div class="alert-danger">Tidak ada data di tanggal tersebut</div>');
          redirect('search/simpanan_tanggal/cari');
        }
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Laporan Simpanan Pada Periode '. date_indo($startdate).' sampai dengan '.date_indo($enddate).' Dicetak Otomatis Oleh Sistem');

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Kode Simpanan');
        $sheet->setCellValue('C4', 'ID Nasabah');
        $sheet->setCellValue('D4', 'Nama Nasabah');
        $sheet->setCellValue('E4', 'Jenis Simpanan');
        $sheet->setCellValue('F4', 'Jumlah Simpanan');
        $sheet->setCellValue('G4', 'Keterangan');
        $sheet->setCellValue('H4', 'Tanggal');
        $no = 1;
        $x = 5;
        foreach ($result as $data) {
          $sheet->setCellValue('A'.$x, $no++);
          $sheet->setCellValue('B'.$x, $data->kode_simpan);
          $sheet->setCellValue('C'.$x, $data->id_member);
          $sheet->setCellValue('D'.$x, $data->nama);

          $sheet->setCellValue('E'.$x, $data->jenis_simpanan);

          $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->jml_simpanan,2,",","."));
          $sheet->setCellValue('G'.$x, $data->keterangan);
          $sheet->setCellValue('H'.$x, longdate_indo($data->tanggal));
          $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Simpanan Nasabah '.$data->nama.' periode '.date_indo($startdate).' sampai dengan '.date_indo($enddate);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
      }
    }


        function excel_rekening_all()
        {
          $query = $this->db->query("SELECT * FROM tb_rekening ORDER BY id_member DESC");
          $result = $query->result();
          $spreadsheet = new Spreadsheet();
          $sheet = $spreadsheet->getActiveSheet();
          $date = date('d-m-Y');
          $sheet->setCellValue('A1', 'Laporan Rekening Tabungan Pada Periode '. longdate_indo($date).' Dicetak Otomatis Oleh Sistem');

          $sheet->setCellValue('A4', 'No');
          $sheet->setCellValue('B4', 'Nomor Rekening');
          $sheet->setCellValue('C4', 'ID Nasabah');
          $sheet->setCellValue('D4', 'Nama Nasabah');
          $sheet->setCellValue('E4', 'Simpanan Pokok');
          $sheet->setCellValue('F4', 'Simpanan Wajib');
          $sheet->setCellValue('G4', 'Simpanan Sukarela');
          $sheet->setCellValue('H4', 'Total Tabungan');
          $sheet->setCellValue('I4', 'Tanggal Update');
          $no = 1;
          $x = 5;
          foreach ($result as $data) {
            $sheet->setCellValue('A'.$x, $no++);
            $sheet->setCellValue('B'.$x, $data->no_rekening);
            $sheet->setCellValue('C'.$x, $data->id_member);
            $sheet->setCellValue('D'.$x, $data->nama);
            $sheet->setCellValue('E'.$x, 'Rp. '.number_format($data->s_pokok,2,",","."));
            $sheet->setCellValue('F'.$x, 'Rp. '.number_format($data->s_wajib,2,",","."));
            $sheet->setCellValue('G'.$x, 'Rp. '.number_format($data->s_sukarela,2,",","."));
            $sheet->setCellValue('H'.$x, 'Rp. '.number_format($data->total_saldo,2,",","."));
            $sheet->setCellValue('I'.$x, longdate_indo($data->last_update));
            $x++;
          }

          $writer = new Xlsx($spreadsheet);
          $filename = 'Laporan Rekening Tabungan Nasabah '.date_indo($date);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
          header('Cache-Control: max-age=0');
          $writer->save('php://output');
        }
}
