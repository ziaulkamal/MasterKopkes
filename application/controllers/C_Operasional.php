<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Operasional extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('form_validation');
    $this->load->model(array(
      'Data_Operasional/M_update' => 'mu',
      'Data_Operasional/M_function' => 'mf',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));

  }

  function cash_in()
  {
    $load = array(
      'kas'   => $this->mf->get_brangkas()->row(),
      'logs' => $this->mf->log_last_operasional_limit()->result(),
    );

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penambahan Kas Operasional',
      'action'  => 'p_cash_in',
      'kas'     =>  $this->conv->convRupiah($load['kas']->kas),
      'logs'     =>  $load['logs'],
      'page'    =>  'page/operasional/fitur'
    );
    $this->load->view('main', $data);
  }

  function cash_out()
  {
    $load = array(
      'kas'   => $this->mf->get_brangkas()->row(),
      'logs' => $this->mf->log_last_operasional_limit()->result(),
    );

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Kas Operasional',
      'action'  => 'p_cash_out',
      'kas'     =>  $this->conv->convRupiah($load['kas']->kas),
      'logs'     =>  $load['logs'],
      'page'    =>  'page/operasional/fitur'
    );
    $this->load->view('main', $data);
  }

  function update_cash_out()
  {
    $load           = $this->mf->get_brangkas()->row();
    $kas            = $load->kas;
    $jumlah         = $this->input->post('nominal');
    $jenis          = $this->input->post('jenis');
    $keterangan     = $this->input->post('keterangan');
    $last_update    = date('Y-m-d');

    if ($jenis == 1) {
      $kode_jenis = "Kebutuhan ATK";
    }elseif ($jenis == 2) {
      $kode_jenis = "Biaya Honor";
    }elseif ($jenis == 3) {
      $kode_jenis = "Biaya RAT";
    }elseif ($jenis == 4) {
      $kode_jenis = "Beban  Tunjangan Hari Raya";
    }elseif ($jenis == 5) {
      $kode_jenis = "Biaya Penghapusan";
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show"><b>Opsi yang dikirimkan harus dipilih</b></div>');
      redirect('operasional/cash_out');
    }

    $log = array(
      'nominal'       => $jumlah,
      'jenis'         => $jenis,
      'keterangan'    => 'Penggunaan Dana Kas Senilai '. $this->conv->convRupiah($jumlah) . ' Untuk ' .$kode_jenis .' Pada Tanggal '. $last_update . '( '.$keterangan.' )',
      'last_update'   => $last_update,
    );

    $brangkas['kas'] = $kas - $jumlah;
    $brangkas['last_update'] = $last_update;

    $this->mu->add_log($log);
    $this->mu->update_brangkas($brangkas);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">'.$log['keterangan'].'</div>');
    redirect('operasional/cash_out');
  }

  function update_cash_in()
  {
    $load           = $this->mf->get_brangkas()->row();
    $kas            = $load->kas;
    $jumlah         = $this->input->post('nominal');
    $jenis          = $this->input->post('jenis');
    $keterangan     = $this->input->post('keterangan');
    $last_update    = date('Y-m-d');

    if ($jenis == 6) {
      $kode_jenis = "Dana Sisa Pengembalian SHU";
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show"><b>Opsi yang dikirimkan harus dipilih</b></div>');
      redirect('operasional/cash_in');
    }

    $log = array(
      'nominal'       => $jumlah,
      'jenis'         => $jenis,
      'keterangan'    => $kode_jenis .' '. $this->conv->convRupiah($jumlah) .' Pada Tanggal '. $last_update . '( '.$keterangan.' )',
      'last_update'   => $last_update,
    );

    $brangkas['kas'] = $kas + $jumlah;
    $brangkas['last_update'] = $last_update;

    $this->mu->add_log($log);
    $this->mu->update_brangkas($brangkas);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">'.$log['keterangan'].'</div>');
    redirect('operasional/cash_in');
  }


  function cash_out_inventaris()
  {
    $load = array(
      'kas'   => $this->mf->get_brangkas()->row(),
      'logs' => $this->mf->log_last_operasional_limit()->result(),
    );

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Belanja Inventaris',
      'action'  => 'p_out_inventaris',
      'kas'     =>  $this->conv->convRupiah($load['kas']->kas),
      'logs'     =>  $load['logs'],
      'page'    =>  'page/operasional/fitur'
    );
    $this->load->view('main', $data);
  }

  function p_out_inventaris()
  {
    $load           = $this->mf->get_brangkas()->row();
    $kas            = $load->kas;
    $jumlah         = $this->input->post('nominal');
    $jenis          = $this->input->post('jenis');
    $keterangan     = $this->input->post('keterangan');
    $last_update    = date('Y-m-d');

    if ($jenis == 10) {
      $kode_jenis = "Update Belanja Inventaris";
    }else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show"><b>Opsi yang dikirimkan harus dipilih</b></div>');
      redirect('operasional/cash_out_inventaris');
    }

    $log = array(
      'nominal'       => $jumlah,
      'jenis'         => $jenis,
      'keterangan'    => $keterangan,
      'last_update'   => $last_update,
    );

    $brangkas['kas'] = $kas - $jumlah;
    $brangkas['last_update'] = $last_update;

    $this->mu->add_log($log);
    $this->mu->update_brangkas($brangkas);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">'.$log['keterangan'].'</div>');
    redirect('operasional/cash_out_inventaris');
  }

  function neraca()
  {
    $data = array(
      'js'      =>  '',
      'title'   =>  'Buat Neraca',
      'action'  =>  'proses_neraca',
      'page'    =>  'page/operasional/menu'
    );
    $this->load->view('main', $data);
  }

  function proses_neraca_tahunan()
  {
    $tahun = $this->input->post('tahun');

    $get_neraca = $this->mf->get_neraca_tahunan($tahun)->row();
    if ($tahun == $get_neraca->tahun_neraca) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Neraca Untuk Tahun Ini sudah dibuat</div>');
      redirect('neraca_tahunan');
    }else {
      require 'vendor/autoload.php';
      // $margin_saving = $this->mf->get_margin()->result();
      $akumulasi = $this->mf->sum_margin()->row()->total_margin;
      $atk = $this->mf->sum_atk()->row()->atk;
      $honor = $this->mf->sum_honor()->row()->honor;
      $rat = $this->mf->sum_rat()->row()->rat;
      $thr = $this->mf->sum_thr()->row()->thr;
      $penghapusan = $this->mf->sum_penghapusan()->row()->penghapusan;
      $brangkas = $this->mf->get_brangkas()->row();
      $last_update = date('Y-m-d');

      // IDEA: Rumus SHU
      $operasional = $atk + $honor + $rat + $thr + $penghapusan;
      $shu_sebelum_zakat = $akumulasi - ($atk + $honor + $rat + $thr + $penghapusan);
      $zakat = $shu_sebelum_zakat * 0.025;
      $shu_sesudah_zakat = $shu_sebelum_zakat - $zakat;

      $x = $shu_sesudah_zakat;

      $bagian_usaha_anggota = array(
        'jasa_usaha' => $x * (25/100),
        'jasa_simpanan' => $x * (20/100),
        'dana_cadangan' => $x * (25/100),
        'dana_pengurus' => $x * (10/100),
        'dana_kesejahteraan' => $x * (5/100),
        'dana_pendidikan' => $x * (5/100),
        'dana_sosial' => $x * (5/100),
        'dana_audit' => $x * (2.5/100),
        'dana_pembangunan' => $x * (2.5/100),
        'tahun_neraca' => date('Y'),
        'keterangan' => 'Data Telah di Create pada tanggal '.date('d-m-Y'),
        'last_update' => $last_update,
      );

      $neraca_tahunan = array(
        'pendapatan_jasa' => $akumulasi,
        'pendapatan_lain' => '-',
        'biaya_atk' => $atk,
        'biaya_honor' => $honor,
        'biaya_rat' => $rat,
        'biaya_lebaran' => $thr,
        'biaya_penghapusan' => $penghapusan,
        'jumlah_biaya_adm' => $operasional,
        'shu_sebelum_zakat' => $shu_sebelum_zakat,
        'zakat' => $zakat,
        'shu_setelah_zakat' => $shu_sesudah_zakat,
        'tahun' => date('Y'),
        'last_update' => $last_update,
      );

      $detail_neraca = array(
        'kas' => $brangkas->kas,
        'dana_gotongroyong' => $brangkas->dana_gotongroyong,
        'dana_simpok' => $brangkas->dana_simpok,
        'dana_simwa' => $brangkas->dana_simwa,
        'dana_kusus' => $brangkas->dana_kusus,
        'dana_lainya' => $brangkas->dana_lainya,
        'total_hutang' => $brangkas->total_hutang,
        'total_piutang' => $brangkas->total_piutang,
        'last_update' => $brangkas->last_update,
      );

      $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets/template/daftar-pembagian-shu.docx');
      $template->setValue('nomor_surat', $kop_head_num);


      $filename = 'Daftar Pembagian SHU Tahun'. $tahun;

      header('Content-type: application/vnd.ms-word');
      header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
    	header('Cache-Control: max-age=0');
      var_dump(header);
      die();
      $template->saveAs('php://output');
    }


  }
}
