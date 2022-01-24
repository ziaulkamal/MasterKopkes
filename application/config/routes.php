<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['Dashboard'] = 'Home/index';
$route['Anggota'] = 'C_Anggota/index';
$route['tambah_anggota'] = 'C_Anggota/tambah_anggota';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
