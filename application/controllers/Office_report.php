<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_report extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array(
      'Data_Operasional/M_function' => 'operasional_function',
    ));
    $this->load->library(array('Curency_indo_helper' => 'conv'));
    if ($this->session->userdata('masuk') != TRUE) {
      redirect('logout');
    }
  }

  function index()
  {
    if ($this->session->userdata('level') != 'PROGRAMMER') {
      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show">Anda tidak dibenarkan akses fitur ini !</div>');
      redirect('dashboard');
    }
  }

  function export_docs($id)
  {
    require 'vendor/autoload.php';
    $total_anggota = $this->operasional_function->jumlah_anggota();
    $load = $this->operasional_function->get_master_by_id($id)->row();
    $inventaris = $this->operasional_function->invetaris_data();

    $total_asset = $inventaris->num_rows();
    $sum_asset = $this->operasional_function->get_inventaris_sum()->row();

    $rupa_dana = $load->neraca_pengurus + $load->neraca_kesejahteraan + $load->neraca_pendidikan + $load->neraca_sosial + $load->neraca_audit + $load->neraca_pembangunan;

    $sisa_shu = $this->operasional_function->sum_sisa_shu()->row();

    $asset = $this->operasional_function->get_list_inventaris();

    $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets/template/daftar-pembagian-shu.docx');

    // IDEA: Page 3

    $template->setValue('jml_aggota', $total_anggota);
    $template->setValue('kas', $this->conv->convRupiah($load->akumulasi_kas));
    $template->setValue('piutang', $this->conv->convRupiah($load->total_piutang));
    $template->setValue('piutang_lain', '-');
    $template->setValue('inventaris_total', $this->conv->convRupiah($sum_asset));
    $template->setValue('gotong_royong', $this->conv->convRupiah($load->dana_gotongroyong));
    $template->setValue('rupa_dana', $this->conv->convRupiah($rupa_dana));

    $template->setValue('t_dana_pengurus', $this->conv->convRupiah($load->neraca_pengurus));
    $template->setValue('t_dana_pendidikan', $this->conv->convRupiah($load->neraca_pendidikan));
    $template->setValue('t_dana_kes_pegawai', $this->conv->convRupiah($load->neraca_kesejahteraan));
    $template->setValue('t_dana_sosial', $this->conv->convRupiah($load->neraca_sosial));
    $template->setValue('t_dana_audit', $this->conv->convRupiah($load->neraca_audit));
    $template->setValue('t_dana_pembangunan', $this->conv->convRupiah($load->neraca_pembangunan));

    $template->setValue('dana_lainya', $this->conv->convRupiah($load->dana_lainya));
    $template->setValue('sisa_shu_anggota', $this->conv->convRupiah($sisa_shu));
    $template->setValue('simpok', $this->conv->convRupiah($load->dana_simpok));
    $template->setValue('simwa', $this->conv->convRupiah($load->dana_simwa));
    $template->setValue('simkusus', $this->conv->convRupiah($load->dana_khusus));
    $template->setValue('dana_cadangan', $this->conv->convRupiah($load->neraca_cadangan));
    $template->setValue('tahun_sebelum', date('Y') -1);


    $d_in = $asset->result();

    $start = 0;
    if ($asset->num_rows() == 0) {
      $i = '';
    }else {
      foreach ($d_in as $data) {
          $i[$start++] = array(
            'harga_inventaris' => $this->conv->convRupiah($data->harga_sekarang),
            'inventaris_item' => $data->jumlah . ' '. $data->satuan . ' ' . $data->nama_barang
          );
      }
    }

    $template->cloneBlock('inventaris_block', 0, true, false, $i);


    // IDEA: Page 2
    $template->setValue('total_adm', $this->conv->convRupiah($load->akumulasi_operasional));
    $template->setValue('total_shu_bersih', $this->conv->convRupiah($load->akumulasi_shu_bersih));
    $template->setValue('total_shu_kotor', $this->conv->convRupiah($load->akumulasi_shu_kotor));
    $template->setValue('zakat', $this->conv->convRupiah($load->akumulasi_zakat));
    $template->setValue('total_pendapatan_lain', '-');
    $template->setValue('total_pendapatan_jumlah', $this->conv->convRupiah($load->akumulasi_margin));
    $template->setValue('atk', $this->conv->convRupiah($load->biaya_atk));
    $template->setValue('honor', $this->conv->convRupiah($load->biaya_honor));
    $template->setValue('rat', $this->conv->convRupiah($load->biaya_rat));
    $template->setValue('thr', $this->conv->convRupiah($load->biaya_lebaran));
    $template->setValue('penghapusan', $this->conv->convRupiah($load->dana_penghapusan));


    // IDEA: Page 1
    $template->setValue('jasa_usaha', $this->conv->convRupiah($load->jasa_usaha));
    $template->setValue('jasa_simpanan', $this->conv->convRupiah($load->jasa_simpanan));
    $template->setValue('set_dana_cadangan', $this->conv->convRupiah($load->dana_cadangan));
    $template->setValue('dana_pengurus', $this->conv->convRupiah($load->dana_pengurus));
    $template->setValue('dana_kesejahteraan', $this->conv->convRupiah($load->dana_kes_pegawai));
    $template->setValue('dana_pendidikan', $this->conv->convRupiah($load->dana_pendidikan));
    $template->setValue('dana_sosial', $this->conv->convRupiah($load->dana_sosial));
    $template->setValue('dana_audit', $this->conv->convRupiah($load->dana_audit));
    $template->setValue('dana_pembangunan', $this->conv->convRupiah($load->dana_pembangunan));
    $template->setValue('tahun_neraca', date('Y'));
    $template->setValue('last_update', date('Y-m-d'));
    $template->setValue('tanggal', date('d'));

    $filename = 'Daftar Pembagian SHU Tahun'. date('Y');

    header('Content-type: application/vnd.ms-word');
    header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
    header('Cache-Control: max-age=0');
    $template->saveAs('php://output');



  }
}
