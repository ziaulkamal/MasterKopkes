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

// Pencarian
$route['cari_simpanan']  = 'C_Pencarian/cari_anggota_simpanan';
$route['cari_pinjaman']  = 'C_Pencarian/cari_anggota_pinjaman';


// Operasional
$route['operasional/cash_out']  = 'C_Operasional/fitur_operasional';

// Cetak
$route['cetak']        = 'C_Cetak/index';
// cetak Simpanan
$route['cetak/simpanan/(:any)']        = 'C_Cetak/simpanan/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
