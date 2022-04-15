<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['dashboard'] = 'Home/index';

//Auth
$route['Auth'] = 'C_Auth/index';

//Anggota
$route['anggota']        = 'C_Anggota/index';
$route['daftar']         = 'C_Anggota/daftar';
$route['detail/(:any)']  = 'C_Anggota/detail/$1';
$route['edit/(:any)']    = 'C_Anggota/update/$1';
$route['hapus/(:any)']   = 'C_Anggota/delete/$1';
$route['update_anggota'] = 'C_Anggota/update_action';
$route['Profile']        = 'C_Anggota/profile';

//Instansi
$route['Instansi']        = 'C_Instansi/index';
$route['tambah_instansi'] = 'C_Instansi/tambah_instansi';

//Simpana



// Proses Simpan
$route['p_simpan']  = 'C_Simpanan/simpan_action';



//Daftar Petugas
$route['edit/(:any)']    = 'C_Admin/update/$1';
$route['hapus/(:any)']   = 'C_Admin/delete/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
