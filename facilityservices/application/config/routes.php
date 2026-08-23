<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']   = 'Home';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

// ROUTE REQUEST (Urutan Wajib Seperti Ini)
$route['request/proses_submit']      = 'Request/proses_submit';
$route['request/fuel_options']       = 'Request/fuel_options';
$route['request/carpool_options']    = 'Request/carpool_options';
$route['request/form/(:any)/(:any)'] = 'Request/form/$1/$2';
$route['request/form/(:any)']        = 'Request/form/$1';
$route['request/form']               = 'Request/form';
$route['request/(:any)']             = 'Request/form/$1';