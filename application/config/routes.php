<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['dashboard'] = 'Home/index';


//Anggota
$route['anggota']        = 'C_Anggota/index';
$route['daftar']         = 'C_Anggota/daftar';
$route['daftar_baru']    = 'C_Anggota/simpan_anggota';

//Instansi
$route['Instansi']        = 'C_Instansi/index';
$route['tambah_instansi'] = 'C_Instansi/tambah_instansi';

//Simpanan
$route['simpanan_pertama/(:any)'] = 'C_Pencarian/add_simpanan/$1';
$route['simpan_rekening/(:any)'] = 'C_Akutansi/simpan_rekening/$1';
$route['simpanan'] = 'C_Akutansi/rekening';
$route['tambah_simpanan'] = 'C_Akutansi/tambah_simpanan';

//Pinjaman
$route['pinjaman'] = 'C_Akutansi/pinjaman';
$route['tambah_pinjaman'] = 'C_Akutansi/tambah_pinjaman';
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
$route['operasional/cash_out']  = 'C_Operasional/fitur_operasional';
$route['operasional/p_cash_out']  = 'C_Operasional/update_cash_out';

// Cetak
$route['cetak']        = 'C_Cetak/index';
// cetak Simpanan
$route['cetak/simpanan/(:any)']        = 'C_Cetak/simpanan/$1';
$route['cetak/angsuran/(:any)']        = 'C_Cetak/angsuran/$1';
$route['cetak/pinjaman/(:any)']        = 'C_Cetak/pinjaman/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
