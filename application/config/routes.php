<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['dashboard'] = 'Home';

//Anggota
$route['anggota']        = 'C_Anggota/index';
$route['daftar']         = 'C_Anggota/daftar';
$route['daftar_baru']    = 'C_Anggota/simpan_anggota';
$route['update/(:any)']  = 'C_Anggota/update/$1';
$route['update_proses']  = 'C_Anggota/update_proses';
$route['hapus/(:any)']   = 'C_Anggota/delete/$1';

//Instansi
$route['instansi']        = 'C_Instansi/index';
$route['tambah_instansi'] = 'C_Instansi/tambah_instansi';
$route['proses_instansi'] = 'C_Instansi/proses_instansi';
$route['hapus_instansi/(:any)'] = 'C_Instansi/delete/$1';
$route['update_instansi/(:any)'] = 'C_Instansi/update_instansi/$1';
$route['update_instansi'] = 'C_Instansi/proses_update_instansi';

//Simpanan
$route['simpanan_pertama/(:any)'] = 'C_Pencarian/add_simpanan/$1';
$route['simpan_rekening/(:any)'] = 'C_Akutansi/simpan_rekening/$1';
$route['simpanan'] = 'C_Akutansi/rekening';
$route['tambah_simpanan'] = 'C_Akutansi/tambah_simpanan';

//Pinjaman
$route['pinjaman'] = 'C_Akutansi/pinjaman';
$route['tambah_pinjaman'] = 'C_Akutansi/tambah_pinjaman';
$route['tambah_pinjaman/(:any)'] = 'C_Akutansi/tambah_pinjaman_dengan_norek/$1';
$route['proses_pinjaman/(:any)'] = 'C_Akutansi/simpan_pinjaman/$1';

// Angsuran
$route['angsuran'] = 'C_Akutansi/angsuran_anggota';
$route['angsuran/(:any)'] = 'C_Akutansi/bayar_angsuran/$1';
$route['meninggal/(:any)'] = 'C_Akutansi/meninggal/$1';
$route['proses_tutup_meninggal/(:any)'] = 'C_Akutansi/proses_tutup_dagoro/$1';
$route['pelunasan/(:any)'] = 'C_Akutansi/pelunasan_angsuran/$1';
$route['proses_angsuran/(:any)'] = 'C_Akutansi/proses_angsuran/$1';
$route['angsuran_tertunda'] = 'C_Akutansi/angsuran_tertunda';

// Pencarian
$route['cari_simpanan']  = 'C_Pencarian/cari_anggota_simpanan';
$route['cari_pinjaman']  = 'C_Pencarian/cari_anggota_pinjaman';


// Operasional
$route['operasional/cash_out']  = 'C_Operasional/cash_out';
$route['operasional/p_cash_out']  = 'C_Operasional/update_cash_out';
$route['operasional/cash_in']  = 'C_Operasional/cash_in';
$route['operasional/p_cash_in']  = 'C_Operasional/update_cash_in';

// Pengelolaan Dana Lainya
$route['kelola_dana/pengurus'] = 'C_Operasional/dana_pengurus';
$route['kelola_dana/pendidikan'] = 'C_Operasional/dana_pendidikan';
$route['kelola_dana/kes_pegawai'] = 'C_Operasional/dana_kes_pegawai';
$route['kelola_dana/sosial'] = 'C_Operasional/dana_sosial';
$route['kelola_dana/audit'] = 'C_Operasional/dana_audit';
$route['kelola_dana/pembangunan'] = 'C_Operasional/dana_pembangunan';
$route['kelola_dana/single_process/(:any)'] = 'C_Operasional/proses_pengelolaan_dana/$1';
$route['kelola_dana/proses_anggota_phu'] = 'C_Operasional/proses_anggota_phu';


// Neraca
$route['olah_data']  = 'C_Operasional/neraca';
$route['proses_neraca']   = 'C_Operasional/proses_neraca_tahunan';
$route['proses_jasa_usaha']   = 'C_Operasional/proses_jasa_usaha';
$route['proses_jasa_simpanan']   = 'C_Operasional/proses_jasa_simpanan';
$route['data_phu']   = 'C_Operasional/data_anggota_phu';
$route['detail_phu/(:any)']   = 'C_Operasional/detail_anggota_phu/$1';

// Cetak
$route['cetak']        = 'C_Cetak/index';
// cetak Simpanan
$route['cetak/simpanan/(:any)']        = 'C_Cetak/simpanan/$1';
$route['cetak/angsuran/(:any)']        = 'C_Cetak/angsuran/$1';
$route['cetak/pinjaman/(:any)']        = 'C_Cetak/pinjaman/$1';

// Pengaturan

$route['reset_kas'] = 'Pengaturan/reset_kas';
$route['base_config'] = 'Pengaturan/konfigurasi_dasar';
$route['result_config'] = 'Pengaturan/proses_setting';

//Instansi
$route['add_inventaris'] = 'C_Operasional/add_inventaris';
$route['list_inventaris'] = 'C_Operasional/list_inventaris';
$route['proses_inventaris'] = 'C_Operasional/proses_inventaris';
$route['edit_inventaris/(:any)'] = 'C_Operasional/update_inventaris_proses/$1';
$route['update_inventaris'] = 'C_Operasional/update_inventaris';


// Export Report
$route['export/neraca_saldo'] = 'Excel_report/export_neraca_saldo';

// $route['404_override'] = 'Pengaturan/error';
$route['translate_uri_dashes'] = FALSE;
