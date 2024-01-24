<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['accountsreport'] = 'Welcome/AccountsReport';
$route['AccountsDReport'] = 'Welcome/AccountsDReport';

$route['home'] = 'Welcome/index';
$route['admin'] = 'Welcome/admindashboard';
$route['counter'] = 'Welcome/counterdashboard';
$route['user'] = 'Welcome/userdashboard';

$route['newUser'] = 'Welcome/newUser';
$route['login'] = 'Welcome/login';
$route['logout'] = 'Welcome/logout';

$route['LgoCheck'] = 'Welcome/LgoCheck';
$route['RegSave'] = 'Welcome/RegSave';
$route['BookTicket'] = 'Welcome/ticket_Search';
$route['Discount'] = 'Welcome/D_ticket_Search';
$route['SitPlan'] = 'Welcome/TicketBookingService';
$route['DiscountSitPlan'] = 'Welcome/DisCountTicketBookingService';
$route['makeResurve'] = 'Welcome/makeResurve';
$route['DiscountMakeResurve'] = 'Welcome/DiscountMakeResurve';
$route['reprint/(:any)'] = 'Welcome/reprint/$1';
$route['dreprint/(:any)'] = 'Welcome/dreprint/$1';