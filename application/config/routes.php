<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// authentication
$route['login/user'] = 'login/login_user';
$route['logout'] = 'login/logout';


// dashboard
$route['dashboard'] = 'dashboard';

// users
$route['users'] = 'user';
$route['user/edit'] = 'user/edit';
$route['user/update'] = 'user/update';
$route['user/create'] = 'user/create';
$route['user/delete'] = 'user/delete';
$route['user/get_lists'] = 'user/get_lists';

// equipments
$route['equipments'] = 'equipment';
$route['equipment/get_lists'] = 'equipment/get_lists';
$route['equipment/delete'] = 'equipment/delete';
$route['equipment/create'] = 'equipment/create';
$route['equipment/edit'] = 'equipment/edit';
$route['equipment/update'] = 'equipment/update';
$route['equipment/report'] = 'equipment/report';
$route['equipment/deduct'] = 'equipment/deduct';

// reports
$route['reports'] = 'report';
$route['report/get_lists'] = 'report/get_lists';

// default
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// test route  for debugging
// $route['test/:num'] = 'user/delete';