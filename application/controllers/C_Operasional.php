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
    $this->load->helper('tgl_indo');
    if ($this->session->userdata('masuk') != TRUE) {
      redirect('logout');
    }

  }

  function list_inventaris()
  {
    $load = $this->mf->get_list_inventaris()->result();
    $data = array(
      'js'         => 'dataTables',
      'title'      => 'Data Inventaris',
      'inventaris' =>  $load,
      'page'       =>  'page/inventaris/list',
     );
     $this->load->view('main', $data);
  }

  function add_inventaris()
  {
    $data = array(
      'js'          => '',
      'title'       => 'Data Inventaris',
      'action'      => 'proses_inventaris',
      'page'        => 'page/inventaris/form'
    );
    $this->load->view('main', $data);
  }

  function proses_inventaris()
  {
    $load = $this->mf->get_brangkas()->row();
    $kas = $load->kas;
    $data = array(
      'id'    => time(),
      'nama_barang' => $this->input->post('nama_barang'),
      'satuan' => $this->input->post('satuan'),
      'jumlah' => $this->input->post('jumlah'),
      'harga_beli' => str_replace('.','',$this->input->post('harga_beli')),
      'harga_sekarang' => str_replace('.','',$this->input->post('harga_beli')),
      'keterangan' => $this->input->post('keterangan'),
      'last_update' => date('Y-m-d'),
    );

    $brangkas['kas'] = $kas - $data['harga_beli'];
    $this->mu->update_brangkas($brangkas);
    $this->mu->add_inventaris($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data berhasil di tambahkan berupa '.$nama_barang.' sejumlah '.$data['jumlah'].' '. $data['satuan'].' dengan harga '. $this->conv->convRupiah($data['harga_beli']).'</div>');
    redirect('list_inventaris');
  }

  function update_inventaris_proses($id)
  {
    $id = $this->mf->get_id_inventaris($id)->row();
    $data = array(
      'js'          => '',
      'title'       => 'Data Inventaris',
      'id'          =>  $id,
      'action'      => 'update_inventaris',
      'page'        => 'page/inventaris/form'
    );
    $this->load->view('main', $data);
  }

  function update_inventaris()
  {
    $load = $this->mf->get_brangkas()->row();
    $dana_hapus = $load->dana_penghapusan;
    $id = $this->input->post('id');
    $harga_beli = str_replace('.','', $this->input->post('harga_beli'));
    $harga_terakhir = str_replace('.','', $this->input->post('harga_terakhir'));
    $harga_sekarang = str_replace('.','', $this->input->post('harga_sekarang'));
    $selisih = $harga_beli - $harga_sekarang;
    $data = array(
      'id'          => $id,
      'nama_barang' => $this->input->post('nama_barang'),
      'satuan'      => $this->input->post('satuan'),
      'jumlah'      => $this->input->post('jumlah'),
      'harga_beli'  => $harga_beli,
      'harga_sekarang' => $harga_sekarang,
      'keterangan'  => $this->input->post('keterangan'),
      'last_update' => date('Y-m-d'),

    );

    $brangkas['dana_penghapusan'] = $dana_hapus - ($harga_beli-$harga_terakhir) + $selisih;
    $this->mu->update_brangkas($brangkas);
    $this->mu->update_inventaris($data, $id);
    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data berhasil di Ubah berupa '.$data['nama_barang'].' sejumlah '.$data['jumlah'].' '. $data['satuan'].' dengan harga '. $this->conv->convRupiah($harga_sekarang).'</div>');
    redirect('list_inventaris');
  }

  function dana_pengurus()
  {
    $load = $this->mf->get_brangkas()->row();

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Dana Pengurus',
      'action'  =>  'kelola_dana/single_process',
      'tipe'    =>  'dana_pengurus',
      'load'    =>  $load,
      'page'    =>  'page/operasional/dana_lain'
    );
    $this->load->view('main', $data);
  }

  function dana_pendidikan()
  {
    $load = $this->mf->get_brangkas()->row();

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Dana Pendidikan',
      'action'  =>  'kelola_dana/single_process',
      'tipe'    =>  'dana_pendidikan',
      'load'    =>  $load,
      'page'    =>  'page/operasional/dana_lain'
    );
    $this->load->view('main', $data);
  }

  function dana_kes_pegawai()
  {
    $load = $this->mf->get_brangkas()->row();

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Dana Kesejahteraan Pegawai',
      'action'  =>  'kelola_dana/single_process',
      'tipe'    =>  'dana_kes_pegawai',
      'load'    =>  $load,
      'page'    =>  'page/operasional/dana_lain'
    );
    $this->load->view('main', $data);
  }

  function dana_sosial()
  {
    $load = $this->mf->get_brangkas()->row();
    $anggota = $this->mf->anggota()->result();
    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Dana Sosial',
      'action'  =>  'kelola_dana/single_process',
      'tipe'    =>  'dana_sosial',
      'anggota' =>  $anggota,
      'load'    =>  $load,
      'page'    =>  'page/operasional/dana_lain'
    );
    $this->load->view('main', $data);
  }

  function dana_audit()
  {
    $load = $this->mf->get_brangkas()->row();

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Dana Audit',
      'action'  =>  'kelola_dana/single_process',
      'tipe'    =>  'dana_audit',
      'load'    =>  $load,
      'page'    =>  'page/operasional/dana_lain'
    );
    $this->load->view('main', $data);
  }

  function dana_pembangunan()
  {
    $load = $this->mf->get_brangkas()->row();

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Dana Pembangunan',
      'action'  =>  'kelola_dana/single_process',
      'tipe'    =>  'dana_pembangunan',
      'load'    =>  $load,
      'page'    =>  'page/operasional/dana_lain'
    );
    $this->load->view('main', $data);
  }


  function proses_pengelolaan_dana($tipe)
  {
    $load = $this->mf->get_brangkas()->row();
    $kas = $load->kas;
    $keterangan = $this->input->post('keterangan');
    $nominal    = str_replace('.','',$this->input->post('nominal'));
    $last_update = date('Y-m-d');
    if ($tipe == 'dana_pengurus') {
      $jd = 'Dana Pengurus';
      $kd = 1;
      $p_keterangan = 'Penggunaan Dana Kas untuk diserahkan ke pengurus dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.date_indo($last_update);
      $brangkas['dana_pengurus'] = $load->dana_pengurus - $nominal;
    }elseif ($tipe == 'dana_pendidikan') {
      $jd = 'Dana Pendidikan';
      $kd = 2;
      $p_keterangan = 'Penggunaan Dana Kas untuk kebutuhan pendidikan dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.date_indo($last_update);
      $brangkas['dana_pendidikan'] = $load->dana_pendidikan - $nominal;
    }elseif ($tipe == 'dana_kes_pegawai') {
      $jd = 'Dana Kesejahteraan Pegawai';
      $kd = 3;
      $p_keterangan = 'Penggunaan Dana Kas untuk kesejahteraan Pegawai dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.date_indo($last_update);
      $brangkas['dana_kes_pegawai'] = $load->dana_kes_pegawai - $nominal;
    }elseif ($tipe == 'dana_sosial') {
      $jd = 'Dana Sosial';
      $kd = 4;
      $anggota = $this->input->post('anggota_no');
      $p_keterangan = 'Penggunaan Dana Kas untuk sosial dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.date_indo($last_update);
      $brangkas['dana_sosial'] = $load->dana_sosial - $nominal;
    }elseif ($tipe == 'dana_audit') {
      $jd = 'Dana Audit';
      $kd = 5;
      $p_keterangan = 'Penggunaan Dana Kas untuk kebutuhan Audit dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.date_indo($last_update);
      $brangkas['dana_audit'] = $load->dana_audit - $nominal;
    }elseif ($tipe == 'dana_pembangunan') {
      $jd = 'Dana Pembangunan';
      $kd = 6;
      $p_keterangan = 'Penggunaan Dana Kas untuk keutuhan pembangunan dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.date_indo($last_update);
      $brangkas['dana_pembangunan'] = $load->dana_pembangunan - $nominal;
    }

    if ($tipe == 'dana_sosial') {

      $log = array(
        'jenis_dana'  => $jd,
        'kode_dana'   => $kd,
        'keterangan'  => $keterangan,
        'dana_sosial' => 1,
        'anggota_id'  => $anggota,
        'jumlah'      => $nominal,
        'last_update' => $last_update,
      );
    }else {

      $log = array(
        'jenis_dana'  => $jd,
        'kode_dana'   => $kd,
        'keterangan'  => $keterangan,
        'dana_sosial' => 0,
        'anggota_id'  => '-',
        'jumlah'      => $nominal,
        'last_update' => $last_update,
      );
    }


    $brangkas['kas'] = $kas - $nominal;
    $brangkas['last_update'] = $last_update;

    $this->mu->add_log_pengelolaan_dana($log);
    $this->mu->update_brangkas($brangkas);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">'.$p_keterangan.'</div>');
    redirect('/');
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
    $jumlah         = str_replace('.','',$this->input->post('nominal'));
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
      'keterangan'    => 'Penggunaan Dana Kas Senilai '. $this->conv->convRupiah($jumlah) . ' Untuk ' .$kode_jenis .' Pada Tanggal '. date_indo($last_update) . '( '.$keterangan.' )',
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
    $jumlah         = str_replace('.','',$this->input->post('nominal'));
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
      'keterangan'    => $kode_jenis .' '. $this->conv->convRupiah($jumlah) .' Pada Tanggal '. date_indo($last_update) . '( '.$keterangan.' )',
      'last_update'   => $last_update,
    );

    $brangkas['kas'] = $kas + $jumlah;
    $brangkas['last_update'] = $last_update;

    $this->mu->add_log($log);
    $this->mu->update_brangkas($brangkas);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">'.$log['keterangan'].'</div>');
    redirect('operasional/cash_in');
  }

  function neraca()
  {
    $data = array(
      'js'                    =>  '',
      'title'                 =>  'Pengolahan Data Tahunan',
      'action_neraca'         =>  'proses_neraca',
      'action_jasa_usaha'     =>  'proses_jasa_usaha',
      'action_jasa_simpanan'  =>  'proses_jasa_simpanan',
      'page'                  =>  'page/operasional/menu'
    );
    $this->load->view('main', $data);
  }


  function proses_neraca_tahunan()
  {
    $tahun = date('Y');

    $get_neraca = $this->mf->get_neraca_tahunan($tahun)->row();
    //
    // var_dump($get_neraca);
    // die();
    $invent = $this->mf->get_inventaris($tahun);
    $total_anggota = $this->mf->get_anggota()->num_rows();


    if ($get_neraca != NULL) {

      // $margin_saving = $this->mf->get_margin()->result();
      $akumulasi = $this->mf->sum_margin()->row()->total_margin;
      // $akumulasi = '1022454794';
      $atk = $this->mf->sum_atk()->row()->atk;
      $honor = $this->mf->sum_honor()->row()->honor;
      $rat = $this->mf->sum_rat()->row()->rat;
      $thr = $this->mf->sum_thr()->row()->thr;
      $penghapusan = $this->mf->sum_penghapusan()->row()->dana_penghapusan;
      $brangkas = $this->mf->get_brangkas()->row();
      $last_update = date('Y-m-d');

      // IDEA: Rumus SHU
      $operasional = $atk + $honor + $rat + $thr + $penghapusan;
      $shu_sebelum_zakat = $akumulasi - $operasional;
      $zakat = round($shu_sebelum_zakat * 0.025,0,PHP_ROUND_HALF_UP);
      $shu_sesudah_zakat = $shu_sebelum_zakat - $zakat;

      $x = $shu_sesudah_zakat;

      $t_shu = array(
        'jasa_usaha'          => round($x * (25/100),0,PHP_ROUND_HALF_UP),
        'jasa_simpanan'       => round($x * (20/100),0,PHP_ROUND_HALF_UP),
        'dana_cadangan'       => round($x * (25/100),0,PHP_ROUND_HALF_UP),
        'dana_pengurus'       => round($x * (10/100),0,PHP_ROUND_HALF_UP),
        'dana_kesejahteraan'  => round($x * (5/100),0,PHP_ROUND_HALF_UP),
        'dana_pendidikan'     => round($x * (5/100),0,PHP_ROUND_HALF_UP),
        'dana_sosial'         => round($x * (5/100),0,PHP_ROUND_HALF_UP),
        'dana_audit'          => round($x * (2.5/100),0,PHP_ROUND_HALF_UP),
        'dana_pembangunan'    => round($x * (2.5/100),0,PHP_ROUND_HALF_UP),
        'tahun_neraca'        => date('Y'),
        'keterangan'          => 'Data Telah di Create pada tanggal '.date_indo(date('Y-m-d')),
        'last_update'         => $last_update,
      );

      $set_dana_cadangan    = $t_shu['dana_cadangan'];

      $neraca_tahunan = array(
        'pendapatan_jasa'       => round($akumulasi,0,PHP_ROUND_HALF_UP),
        'pendapatan_lain'       => '-',
        'biaya_atk'             => round($atk,0,PHP_ROUND_HALF_UP),
        'biaya_honor'           => round($honor,0,PHP_ROUND_HALF_UP),
        'biaya_rat'             => round($rat,0,PHP_ROUND_HALF_UP),
        'biaya_lebaran'         => round($thr,0,PHP_ROUND_HALF_UP),
        'biaya_penghapusan'     => round($penghapusan,0,PHP_ROUND_HALF_UP),
        'jumlah_biaya_adm'      => round($operasional,0,PHP_ROUND_HALF_UP),
        'shu_sebelum_zakat'     => round($shu_sebelum_zakat,0,PHP_ROUND_HALF_UP),
        'zakat'                 => round($zakat,0,PHP_ROUND_HALF_UP),
        'shu_setelah_zakat'     => round($shu_sesudah_zakat,0,PHP_ROUND_HALF_UP),
        'tahun'                 => date('Y'),
        'last_update'           => $last_update,
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

        'jasa_usaha' => $t_shu['jasa_usaha'],
        'jasa_simpanan' => $t_shu['jasa_simpanan'],
        'dana_cadangan' => $t_shu['dana_cadangan'],
        'dana_pengurus' => $t_shu['dana_pengurus'],
        'dana_pendidikan' => $t_shu['dana_pendidikan'],
        'dana_kes_pegawai' => $t_shu['dana_kesejahteraan'],
        'dana_sosial' => $t_shu['dana_sosial'],
        'dana_audit' => $t_shu['dana_audit'],
        'dana_pembangunan' => $t_shu['dana_pembangunan'],
        'dana_penghapusan' => $brangkas->dana_penghapusan
      );

      $brankas = array(
        'jasa_usaha' => $brangkas->jasa_usaha + $t_shu['jasa_usaha'],
        'jasa_simpanan' => $brangkas->jasa_simpanan + $t_shu['jasa_simpanan'],
        'dana_cadangan' => $brangkas->dana_cadangan + $t_shu['dana_cadangan'],
        'dana_pengurus' => $brangkas->dana_pengurus + $t_shu['dana_pengurus'],
        'dana_pendidikan' => $brangkas->dana_pendidikan + $t_shu['dana_pendidikan'],
        'dana_kes_pegawai' => $brangkas->dana_kes_pegawai + $t_shu['dana_kesejahteraan'],
        'dana_sosial' => $brangkas->dana_sosial + $t_shu['dana_sosial'],
        'dana_audit' => $brangkas->dana_audit + $t_shu['dana_audit'],
        'dana_pembangunan' => $brangkas->dana_pembangunan + $t_shu['dana_pembangunan'],
        'dana_penghapusan' => $brangkas->dana_penghapusan
      );


      // IDEA: Rumus Untuk Dapat Pembagian Jasa Simpanan
      $get_data_simpanan = $this->mf->sum_simpanan()->row()->simpanan;
      $jasa_simpanan = $detail_neraca['jasa_simpanan'];
      $rumus_jasa_simpanan = substr($jasa_simpanan/$get_data_simpanan,0,7);

      // IDEA: Rumus Untuk Dapat Pembagian Jasa Usaha
      $jasa_usaha = $detail_neraca['jasa_usaha'];
      $rumus_jasa_usaha = substr($jasa_usaha/$akumulasi,0,7);

      $t_shu['rumus_jasa_usaha']    = $rumus_jasa_usaha;
      $t_shu['rumus_jasa_simpanan'] = $rumus_jasa_simpanan;

      $masterKolektif = array(
        'id_master' => 'm-'.date('Ymsi'),
        'tahun_neraca' => $tahun,
        'akumulasi_kas' => $brangkas->kas,
        'dana_simpok' => $brangkas->dana_simpok,
        'dana_simwa' => $brangkas->dana_simwa,
        'dana_khusus' => $brangkas->dana_kusus,
        'dana_lainya' => $brangkas->dana_lainya,
        'dana_gotongroyong' => $brangkas->dana_gotongroyong,
        'total_piutang' => $brangkas->total_piutang,
        'jasa_simpanan' => $t_shu['jasa_simpanan'],
        'jasa_usaha' => $t_shu['jasa_usaha'],
        'dana_cadangan' => $t_shu['dana_cadangan'],
        'dana_pengurus' => $t_shu['dana_pengurus'],
        'dana_pendidikan' => $t_shu['dana_pendidikan'],
        'dana_kes_pegawai' => $t_shu['dana_kesejahteraan'],
        'dana_sosial' => $t_shu['dana_sosial'],
        'dana_audit' => $t_shu['dana_audit'],
        'dana_pembangunan' => $t_shu['dana_pembangunan'],
        'dana_penghapusan' => $brangkas->dana_penghapusan,
        'neraca_usaha' => $t_shu['jasa_usaha'],
        'neraca_simpanan' => $t_shu['jasa_simpanan'],
        'neraca_cadangan' => $brangkas->dana_cadangan,
        'neraca_pengurus' => $brangkas->dana_pengurus,
        'neraca_kesejahteraan' => $brangkas->dana_kes_pegawai,
        'neraca_pendidikan' => $brangkas->dana_pendidikan,
        'neraca_sosial' => $brangkas->dana_sosial,
        'neraca_audit' => $brangkas->dana_audit,
        'neraca_pembangunan' => $brangkas->dana_pembangunan,
        'persentase_jasa_usaha' => $rumus_jasa_usaha,
        'persentase_jasa_simpanan' => $rumus_jasa_simpanan,
        'akumulasi_margin' => $akumulasi,
        'akumulasi_lain' => '-',
        'biaya_atk' => $neraca_tahunan['biaya_atk'],
        'biaya_honor' => $neraca_tahunan['biaya_honor'],
        'biaya_rat' => $neraca_tahunan['biaya_rat'],
        'biaya_lebaran' => $neraca_tahunan['biaya_lebaran'],
        'biaya_penghapusan' => $penghapusan,
        'akumulasi_operasional' => $operasional,
        'akumulasi_shu_kotor' => $shu_sebelum_zakat,
        'akumulasi_shu_bersih' => $shu_sesudah_zakat,
        'akumulasi_zakat' => $zakat,
        'last_update' => date('Y-m-d')
      );

      // $this->mu->insert_neraca_tahunan($t_shu);
      // $this->mu->insert_neraca_phu($neraca_tahunan);
      // $this->mu->update_brangkas($brankas);
      $this->mu->insert_master_kolektif($masterKolektif);
      $rupa_dana = $brangkas->dana_pengurus + $brangkas->dana_pendidikan + $brangkas->dana_kes_pegawai + $brangkas->dana_sosial + $brangkas->dana_audit + $brangkas->dana_pembangunan;
      $inventaris_total = $invent->row()->inventaris;
      $set_danalainya = $this->mf->sum_danalain()->row()->dana_lain;
      $call_produk_inventaris = $this->mf->get_list_inventaris();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Berhasil Generate Neraca</div>');
      redirect('olah_data');
    }elseif ($get_neraca == null) {
      if ($tahun  != $get_neraca->tahun_neraca) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Neraca Gagal dibuat karena data margin masih kosong atau Neraca tahun ini sudah dibuat</div>');
        redirect('olah_data');
      }
    }
  }

  function proses_jasa_usaha()
  {
    $tahun = date('Y');
    $cek_bht = $this->mf->get_bht_data();
    if ($cek_bht->num_rows() < 1) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Data jasa simpanan belum di generate !</div>');
      redirect('olah_data');
    }else {
      $neraca_tahunan = $this->mf->get_neraca_tahunan($tahun)->row();
      $k_jasa_usaha = $neraca_tahunan->rumus_jasa_usaha;
      $margin_anggota = $this->mf->get_margin_saving($tahun);
      $parsing = $margin_anggota->result();

      // $var_dump($pars)
      $data = array();
      foreach ($parsing as $q) {
        $persen = round($q->margin_saving*$k_jasa_usaha,0,PHP_ROUND_HALF_UP);
        $data[] = $this->db->query("UPDATE tb_bht SET total_margin=$q->margin_saving, persen_jasa_usaha=$persen WHERE no_rekening=$q->no_rekening AND tahun=$tahun");
      }
        $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show">Data Pembagian Simpanan Sudah Di Generate, Silahkan Lakukan Generate Data Pembagian Usaha</div>');
        redirect('/');
    }
  }

  function proses_jasa_simpanan()
  {
    $tahun = date('Y');
    $get_neraca = $this->mf->get_neraca_tahunan($tahun)->row();
    $cek_bht = $this->mf->get_bht($tahun);
    if ($cek_bht->num_rows() > 0 || $get_neraca == NULL) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Data gagal dibuat atau neraca tahun ini sudah di generate !</div>');
      redirect('olah_data');
    }else {
      $neraca_tahunan = $this->mf->get_neraca_tahunan($tahun)->row();
      $k_simpanan = $neraca_tahunan->rumus_jasa_simpanan;
      $anggota = $this->mf->anggota();
      $margin_anggota = $this->mf->get_margin_saving($tahun);
      $parsing = $anggota->result();
      $data = array();
      foreach ($parsing as $q) {
        $data[] = $this->db->insert('tb_bht', [
          'no_anggota' => $q->no_anggota,
          'no_rekening' => $q->no_rekening,
          'nama_anggota' => $q->nama_anggota,
          'total_simpanan' => $q->total_simpanan,
          'persen_jasa_simpanan' => round($q->total_simpanan*$k_simpanan,0,PHP_ROUND_HALF_UP),
          'last_update' => date('Y-m-d'),
          'tahun' => $tahun,
        ]);
      }
      $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show">Data Pembagian Simpanan Sudah Di Generate, Silahkan Lakukan Generate Data Pembagian Usaha</div>');
      redirect('/');
    }
  }

  function data_anggota_phu()
  {
    $load = $this->mf->get_bht_data()->result();

    $data = array(
      'js'                    =>  'dataTables',
      'title'                 =>  'Tabel Pembagian Hasil Usaha',
      'load'                  =>  $load,
      'page'                  =>  'page/operasional/data_phu'
    );
    $this->load->view('main', $data);
  }

  function detail_anggota_phu($id)
  {
    $cek = $this->mf->detail_bht_data($id);

    if ($cek->num_rows() < 1) {
      echo "Parameter Salah";
    }else {
      $load = $this->mf->detail_bht_data($id)->row();
      $data = array(
        'js'                    =>  '',
        'title'                 =>  'Pembagian Jasa Untuk Anggota',
        'load'                  =>  $load,
        'page'                  =>  'page/operasional/form_phu'
      );
      $this->load->view('main', $data);
    }
  }

  function proses_anggota_phu()
  {
    $id               = $this->input->post('id');
    $nominal_sebelum  = str_replace('.','',$this->input->post('nominal_sebelum'));
    $total_diserahkan = str_replace('.','',$this->input->post('total_diserahkan'));
    $cek              = $this->mf->detail_bht_data($id);
    $pembagian        = $nominal_sebelum - $total_diserahkan;
    if ($cek->num_rows() < 1) {
      echo "Parameter Salah";
    }else {
      $data = array(
        'total_diserahkan' => $total_diserahkan,
        'sisa_pembagian'   => $pembagian,
        'sudah_diserahkan' => 1,
        'last_update'      => date('Y-m-d'),
      );
      $detail = $cek->row();
      $nama = $detail->nama_anggota;
      $this->mu->update_anggota_phu($data, $id);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">Berhasil diserahkan untuk '. $nama .' dengan sisa '. $this->conv->convRupiah($pembagian).' </div>');
      redirect('data_phu');
    }
  }

  function master_neraca_kolektif()
  {
    $load = $this->mf->get_master_kolektif()->result();
    $data = array(
      'js'                    =>  'dataTables',
      'title'                 =>  'Data Terakhir Neraca',
      'load'                  =>  $load,
      'page'                  =>  'page/neraca/list'
    );
    $this->load->view('main', $data);
  }
}
