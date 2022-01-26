<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['Dashboard'] = 'Home/index';
$route['Auth'] = 'C_Auth/index';
$route['Anggota'] = 'C_Anggota/index';
$route['tambah_anggota'] = 'C_Anggota/tambah_anggota';
$route['Profile'] = 'C_Anggota/profile';
$route['Instansi'] = 'C_Instansi/index';
$route['tambah_instansi'] = 'C_Instansi/tambah_instansi';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
