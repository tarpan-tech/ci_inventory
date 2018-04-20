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

//Default Configuration
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
