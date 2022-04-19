<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['dashboard'] = 'Home/index';


//Anggota
$route['anggota']        = 'C_Anggota/index';
$route['daftar']         = 'C_Anggota/daftar';

//Instansi
$route['Instansi']        = 'C_Instansi/index';
$route['tambah_instansi'] = 'C_Instansi/tambah_instansi';

//Simpanan
$route['simpanan_pertama/(:any)'] = 'C_Pencarian/add_simpanan/$1';
$route['simpan_rekening/(:any)'] = 'C_Simpanan/simpan_rekening/$1';
$route['simpanan'] = 'C_Akutansi/rekening';
$route['tambah_simpanan'] = 'C_Akutansi/tambah_simpanan';

//Pinjaman
$route['pinjaman'] = 'C_Akutansi/pinjaman';
$route['tambah_pinjaman'] = 'C_Akutansi/tambah_pinjaman';

// Pencarian
$route['cari_simpanan']  = 'C_Pencarian/cari_anggota_simpanan';
$route['cari_pinjaman']  = 'C_Pencarian/cari_anggota_pinjaman';


// Operasional
$route['operasional/cash_out']  = 'C_Operasional/fitur_operasional';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
