<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['portfolio/(:any)'] = 'portfolio/index/$1';
$route['portfolio/get_portfolio_list'] = 'portfolio/get_portfolio_list';
$route['portfolio/get_photo_list'] = 'portfolio/get_photo_list';
$route['default_controller'] = 'home';
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */