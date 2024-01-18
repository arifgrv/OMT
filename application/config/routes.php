<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['newUser'] = 'Welcome/newUser';
$route['login'] = 'Welcome/login';

$route['LgoCheck'] = 'Welcome/LgoCheck';
$route['RegSave'] = 'Welcome/RegSave';
$route['BookTicket'] = 'Welcome/ticket_Search';
$route['SitPlan'] = 'Welcome/TicketBookingService';
$route['makeResurve'] = 'Welcome/makeResurve';
$route['reprint/(:any)'] = 'Welcome/reprint/$1';