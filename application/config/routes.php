<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['user'] = 'user';
$route['apply'] = 'apply';
$route['dashboard'] = 'dashboard';
$route['status'] = 'status/view';
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['(:any)'] = 'pages/view/$1';
