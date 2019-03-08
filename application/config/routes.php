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

// default
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// test route  for debugging
// $route['test/:num'] = 'user/delete';