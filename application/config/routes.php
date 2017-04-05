<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$api_sistem 				= array();
$sistem_web 				= array();
$sistem_web['administrator.pasteurtrans.co.org'] 	= "admin/dashboard";
$api_sistem['api.pasteurtrans.co.org'] 				= "api";


if(array_key_exists($_SERVER['HTTP_HOST'],$sistem_web)){


	$route['default_controller'] 											= $sistem_web[$_SERVER['HTTP_HOST']];
	$route['admin'] 																	= 'admin/dashboard';
	$route['signout'] 																= 'users/signout';
	$route['signin'] 																	= 'users/signin';
	$route['signup'] 																	= 'users/signup';
	$route['forgot_password'] 												= 'users/forgot_password';
	$route['auth/activate/(:num)/(:any)'] 						= 'users/activate/$1/$2';

}elseif(array_key_exists($_SERVER['HTTP_HOST'],$api_sistem)){
	$route['default_controller']  							= $api_sistem[$_SERVER['HTTP_HOST']];
}else{

	$route['default_controller'] = 'welcome';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	$route['home'] = 'welcome';
	


	$route['read/(:any)'] = 'posts/read/$1';

	$route['category/(:any)'] = 'posts/category/$1';
	$route['category/(:any)/(:num)'] = 'posts/category/$1/$2';

	$route['tag/(:any)'] = 'posts/tag/$1';
	$route['tag/(:any)/(:num)'] = 'posts/tag/$1/$2';

	$route['blog'] = 'posts/index';
	$route['blog/(:num)'] = 'posts/index/$1';

}
