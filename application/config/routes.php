<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']         = 'public_controller';
//Front Page Routes
$route['/']                          = 'public_controller/index';
$route['(:any)']                     = 'public_controller/publicPage/$1';
//Auth Controller
$route['auth/register']              = 'auth_controller/register';
$route['auth/login']                 = 'auth_controller/login';
$route['auth/logout']                = 'auth_controller/logout';
//Admin Page Routes 
$route['admin/dashboard']            = 'admin_controller/index';
$route['admin/(:any)']               = function($page){
    $page = strtolower($page);    
    return "{$page}_controller/index";
};
//Data Barang Routes
$route['admin/(:any)/add']           = function($page){
    $page = strtolower($page);
    return "{$page}_controller/add";
};
$route['admin/(:any)/update/(:num)'] = function($page, $id){
    $page = strtolower($page);
    return "{$page}_controller/update/{$id}";
};
$route['admin/(:any)/delete/(:num)'] = function($page, $id){
    $page = strtolower($page);
    return "{$page}_controller/delete/{$id}";
};
//Report Routes
$route['admin/(:any)/report/(:any)'] = function($page, $reportType){
    $page = strtolower($page);
    return "{$page}_controller/report/{$reportType}";
};
$route['api/jumlah_masuk/(:num)']    = 'api/getJumlahMasuk/$1';
$route['api/jumlah_keluar/(:num)']   = 'api/getJumlahKeluar/$1';
//Default Configuration
$route['404_override']               = '';
$route['translate_uri_dashes']       = FALSE;
