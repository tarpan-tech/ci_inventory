<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'public_controller';
//Front Page Routes
$route['/']                 = 'public_controller/index';
$route['(:any)']            = 'public_controller/publicPage/$1';
//Auth Controller
$route['auth/register']     = 'auth_controller/register';
$route['auth/login']        = 'auth_controller/login';
$route['auth/logout']       = 'auth_controller/logout';
//Admin Page Routes 
$route['admin/index']       = 'admin_controller/index';
$route['admin/(:any)']      = 'admin_controller/adminPage/$1';
//Data Barang Routes
$route['admin/(:any)/add']           = 'admin_controller/add/$1';
$route['admin/(:any)/update/(:num)'] = 'admin_controller/update/$1/$2';
$route['admin/(:any)/delete/(:num)'] = 'admin_controller/delete/$1/$2';
//Default Configuration
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
