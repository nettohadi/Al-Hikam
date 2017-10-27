<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home.html'] = 'home';
$route['barang'] = 'barang_controller';
$route['barang/add'] = 'barang_controller/add';
$route['barang/edit/(:any).html'] = 'barang_controller/edit/$1';
$route['barang/delete.html'] = 'barang_controller/delete';
$route['barang/insert.html'] = 'barang_controller/insert';
$route['barang/update.html'] = 'barang_controller/update';
$route['reset'] = 'reset_all_controller/index';
$route['jual'] = 'penjualan_controller/index';
$route['jual/getItem/(:any)'] = 'Penjualan_controller/getItem/$1';
