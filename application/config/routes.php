<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['masuk'] = 'Pelanggan_c/masuk';
$route['daftar'] = 'Pelanggan_c/daftar';
$route['keluar'] = 'Pelanggan_c/keluar';
$route['akun_saya'] = 'Pelanggan_c/akun_saya';
$route['detil_produk'] = 'Produk_c/get_detil_produk_by_id/$1';
$route['cari_produk'] = 'Produk_c/cari_produk';
$route['checkout'] = 'Keranjang_c/checkout';
$route['keranjang'] = 'Keranjang_c/keranjang_saya';
$route['pesanan_saya'] = 'Pesanan_c/pesanan_saya';
$route['pesanan_saya/detil/(:any)'] = 'Pesanan_c/detil_pesanan/$1';
$route['beri_ulasan/(:any)'] = 'Pesanan_c/beri_ulasan/$1';
$route['login_penjual'] = 'Admin/index';
// $route['Pelanggan_c/cek_username_email'] = 'Pelanggan_c::cek_username_email';