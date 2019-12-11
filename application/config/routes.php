<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';

// users
$route['users'] = 'users';
$route['users/detail/(:any)'] = 'users/view/$1';
$route['users/add'] = 'users/add';
$route['users/update/(:any)'] = 'users/update/$1';
//end users

// service
$route['projects'] = 'projects';
$route['projects/detail/(:any)'] = 'projects/view/$1';
$route['projects/add'] = 'projects/add';
$route['projects/update/(:any)'] = 'projects/update/$1';
//end service

// service
$route['services'] = 'services';
$route['services/detail/(:any)'] = 'services/view/$1';
$route['services/add'] = 'services/add';
$route['services/update/(:any)'] = 'services/update/$1';
//end service

// service
$route['cntmnts'] = 'cntmnts';
$route['cntmnts/detail/(:any)'] = 'cntmnts/view/$1';
$route['cntmnts/add'] = 'cntmnts/add';
$route['cntmnts/update/(:any)'] = 'cntmnts/update/$1';
//end service

//negara
$route['negaras'] = 'negaras';
$route['negaras/detail/(:any)'] = 'negaras/view/$1';
$route['negaras/add'] = 'negaras/add';
$route['negaras/update/(:any)'] = 'negaras/update/$1';
//end negara

//stock
$route['stockreffs'] = 'stockreffs';
$route['stockreffs/detail/(:any)'] = 'stockreffs/view/$1';
$route['stockreffs/add'] = 'stockreffs/add';
$route['stockreffs/form'] = 'stockreffs/form';
$route['stockreffs/import'] = 'stockreffs/import';
$route['stockreffs/downloadexcel'] = 'stockreffs/downloadexcel';
$route['stockreffs/update/(:any)'] = 'stockreffs/update/$1';
//end stock

// service
$route['userprojects'] = 'userprojects';
$route['userprojects/detail/(:any)/(:any)'] = 'userprojects/view/$1/$2';
$route['userprojects/add'] = 'userprojects/add';
$route['userprojects/update/(:any)/(:any)'] = 'userprojects/update/$1/$2';
//end service

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
