<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['default_controller'] = 'pages/view';
$route['default_controller'] = 'posts';

$route['posts'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/edit/(:num)'] = 'posts/edit/$1';
$route['posts/delete/(:num)'] = 'posts/delete/$1';

//$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;