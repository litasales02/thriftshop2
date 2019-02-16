<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'admin';

$route['login'] = 'admin/login';
$route['submit/login'] = 'Authen/loginsubmit';

$route['pages/new/added/sellers'] = 'admin/selleradded';
$route['pages/list/sellers'] = 'admin/sellerlist';
$route['pages/details/sellers/(:any)'] = 'admin/sellerdetails';
$route['pages/details/new/added/sellers/(:any)'] = 'admin/selleraddeddetails';
$route['pages/accept/new/added/sellers/(:any)'] = 'admin/selleraddedaccept';


$route['pages/list/buyer'] = 'admin/buyerlist';
$route['pages/list/messages'] = 'admin/messageslist';

$route['pages/client/message'] = 'admin/messagepanel';


$route['signout'] = 'admin/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
