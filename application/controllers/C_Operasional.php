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
    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data berhasil di tambahkan berupa '.$nama_barang.' sejumlah '.$jumlah.' '. $satuan.' dengan harga '. $this->conv->convRupiah($harga_beli).'</div>');
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

    $id = $this->input->post('id');
    $harga_beli = $this->input->post('harga_beli');
    $harga_sekarang = $this->input->post('harga_sekarang');
    $data = array(
      'id'          => $id,
      'nama_barang' => $this->input->post('nama_barang'),
      'satuan'      => $this->input->post('satuan'),
      'jumlah'      => $this->input->post('jumlah'),
      'harga_beli'  => str_replace('.','', $harga_beli),
      'harga_sekarang' => str_replace('.','', $harga_sekarang),
      'keterangan'  => $this->input->post('keterangan'),
      'last_update' => date('Y-m-d'),
    );

    $brangkas['dana_penghapusan'] = $harga_beli - $harga_sekarang;
    $this->mu->update_brangkas($brangkas);
    $this->mu->update_inventaris($data, $id);
    $this->session->set_flashdata('message', '<div class="alert alert-success"> Data berhasil di Ubah berupa '.$nama_barang.' sejumlah '.$jumlah.' '. $satuan.' dengan harga '. $this->conv->convRupiah($harga).'</div>');
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

    $data = array(
      'js'      =>  '',
      'title'   =>  'Update Penggunaan Dana Sosial',
      'action'  =>  'kelola_dana/single_process',
      'tipe'    =>  'dana_sosial',
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
    if ($tipe == 'dana_pengurus') {
      $p_keterangan = 'Penggunaan Dana Kas untuk diserahkan ke pengurus dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.$last_update;
      $brangkas['dana_pengurus'] = $load->dana_pengurus - $nominal;
    }elseif ($tipe == 'dana_pendidikan') {
      $p_keterangan = 'Penggunaan Dana Kas untuk kebutuhan pendidikan dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.$last_update;
      $brangkas['dana_pendidikan'] = $load->dana_pendidikan - $nominal;
    }elseif ($tipe == 'dana_kes_pegawai') {
      $p_keterangan = 'Penggunaan Dana Kas untuk kesejahteraan Pegawai dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.$last_update;
      $brangkas['dana_kes_pegawai'] = $load->dana_kes_pegawai - $nominal;
    }elseif ($tipe == 'dana_sosial') {
      $p_keterangan = 'Penggunaan Dana Kas untuk sosial dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.$last_update;
      $brangkas['dana_sosial'] = $load->dana_sosial - $nominal;
    }elseif ($tipe == 'dana_audit') {
      $p_keterangan = 'Penggunaan Dana Kas untuk kebutuhan Audit dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.$last_update;
      $brangkas['dana_audit'] = $load->dana_audit - $nominal;
    }elseif ($tipe == 'dana_pembangunan') {
      $p_keterangan = 'Penggunaan Dana Kas untuk keutuhan pembangunan dengan keterangan ('. $keterangan.') senilai '.$this->conv->convRupiah($nominal).' Pada tanggal '.$last_update;
      $brangkas['dana_pembangunan'] = $load->dana_pembangunan - $nominal;
    }

    $log = array(
      'nominal'       => $nominal,
      'jenis'         => 20,
      'keterangan'    => $p_keterangan,
      'last_update'   => $last_update,
    );

    $brangkas['kas'] = $kas - $nominal;
    $brangkas['last_update'] = $last_update;

    $this->mu->add_log($log);
    $this->mu->update_brangkas($brangkas);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">'.$log['keterangan'].'</div>');
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
    $invent = $this->mf->get_inventaris($tahun);


    if ($get_neraca == null) {
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

      // IDEA: Page 3

      $template->setValue('kas', $this->conv->convRupiah('0'));
      $template->setValue('piutang', $this->conv->convRupiah('0'));
      $template->setValue('piutang_lain', $this->conv->convRupiah('0'));
      $template->setValue('inventaris_total', $this->conv->convRupiah('0'));
      $template->setValue('gotong_royong', $this->conv->convRupiah('0'));
      $template->setValue('rupa_dana', $this->conv->convRupiah('0'));

      $template->setValue('t_dana_pengurus', $this->conv->convRupiah('0'));
      $template->setValue('t_dana_pendidikan', $this->conv->convRupiah('0'));
      $template->setValue('t_dana_kes_pegawai', $this->conv->convRupiah('0'));
      $template->setValue('t_dana_sosial', $this->conv->convRupiah('0'));
      $template->setValue('t_dana_audit', $this->conv->convRupiah('0'));
      $template->setValue('t_dana_pembangunan', $this->conv->convRupiah('0'));

      $template->setValue('dana_lainya', $this->conv->convRupiah('0'));
      $template->setValue('sisa_shu_anggota', $this->conv->convRupiah('0'));
      $template->setValue('simpok', $this->conv->convRupiah('0'));
      $template->setValue('simwa', $this->conv->convRupiah('0'));
      $template->setValue('simkusus', $this->conv->convRupiah('0'));
      $template->setValue('dana_cadangan', $this->conv->convRupiah('0'));
      $template->setValue('tahun_sebelum', $tahun -1);


      $d_in = $invent->result();
      $start = 0;
      if ($invent->num_rows() == 0) {
        $i = '';
      }else {
        foreach ($d_in as $data) {
            $i[$start++] = array(
              'harga_inventaris' => $this->conv->convRupiah($data->nominal),
              'inventaris_item' => $data->keterangan
            );
        }
      }

      $template->cloneBlock('inventaris_block', 0, true, false, $i);


      // IDEA: Page 2
      $template->setValue('total_adm', $this->conv->convRupiah('0'));
      $template->setValue('total_shu_bersih', $this->conv->convRupiah('0'));
      $template->setValue('total_shu_kotor', $this->conv->convRupiah('0'));
      $template->setValue('zakat', $this->conv->convRupiah('0'));
      $template->setValue('total_pendapatan_lain', $this->conv->convRupiah('0'));
      $template->setValue('total_pendapatan_jumlah', $this->conv->convRupiah('0'));
      $template->setValue('atk', $this->conv->convRupiah('0'));
      $template->setValue('honor', $this->conv->convRupiah('0'));
      $template->setValue('rat', $this->conv->convRupiah('0'));
      $template->setValue('thr', $this->conv->convRupiah('0'));
      $template->setValue('penghapusan', $this->conv->convRupiah('0'));
      $template->setValue('total_adm', $this->conv->convRupiah('0'));


      // IDEA: Page 1
      $template->setValue('jasa_usaha', $this->conv->convRupiah('0'));
      $template->setValue('jasa_simpanan', $this->conv->convRupiah('0'));
      $template->setValue('dana_cadangan', $this->conv->convRupiah('0'));
      $template->setValue('dana_pengurus', $this->conv->convRupiah('0'));
      $template->setValue('dana_kesejahteraan', $this->conv->convRupiah('0'));
      $template->setValue('dana_pendidikan', $this->conv->convRupiah('0'));
      $template->setValue('dana_sosial', $this->conv->convRupiah('0'));
      $template->setValue('dana_audit', $this->conv->convRupiah('0'));
      $template->setValue('dana_pembangunan', $this->conv->convRupiah('0'));
      $template->setValue('tahun_neraca', $tahun);
      $template->setValue('last_update', $last_update);
      $template->setValue('tanggal', date('d'));



      $filename = 'Daftar Pembagian SHU Tahun'. $tahun;

      header('Content-type: application/vnd.ms-word');
      header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
    	header('Cache-Control: max-age=0');
      $template->saveAs('php://output');
    }elseif ($get_neraca != null) {
      if ($tahun == $get_neraca->tahun_neraca) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">Neraca Untuk Tahun Ini sudah dibuat</div>');
        redirect('neraca_tahunan');
      }
    }



  }
}
