<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['dashboard'] = 'Home/index';
//Auth
$route['Auth'] = 'C_Auth/index';
//Anggota
$route['anggota'] = 'C_Anggota/index';
$route['daftar'] = 'C_Anggota/daftar';
$route['detail/(:any)'] = 'C_Anggota/detail/$1';
$route['edit/(:any)'] = 'C_Anggota/update/$1';
$route['hapus/(:any)'] = 'C_Anggota/delete/$1';
$route['update_anggota'] = 'C_Anggota/update_action';
$route['Profile'] = 'C_Anggota/profile';
//Instansi
$route['Instansi'] = 'C_Instansi/index';
$route['tambah_instansi'] = 'C_Instansi/tambah_instansi';
// simpanan Pokok
$route['sim_pokok'] = 'C_Simpanan/index';
$route['detail_simpanan'] = 'C_Simpanan/detail_simpanan';
$route['tambah_simpanan'] = 'C_Simpanan/tambah_simpanan';
// simpanan Wajib
$route['sim_wajib'] = 'C_Simpanan/sim_wajib';
$route['detail_simwajib'] = 'C_Simpanan/detail_simwajib';
$route['tambah_simwajib'] = 'C_Simpanan/tambah_simwajib';
// Simpanan Sukarela
$route['sim_sukarela'] = 'C_Simpanan/sim_sukarela';
$route['detail_simsukarela'] = 'C_Simpanan/detail_simsukarela';
$route['tambah_simsukarela'] = 'C_Simpanan/tambah_simsukarela';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
