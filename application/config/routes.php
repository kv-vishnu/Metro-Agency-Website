<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['404_override'] = 'error404';

$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'Home';
$route['(:any)'] = 'Home/viewPage/$1';
$route['certification-training/(:any)'] = 'Home/certifications/$1';
$route['certification-training/(:any)/(:any)'] = 'Home/levels/$1/$2';
$route['certification-training/(:any)/(:any)/(:any)'] = 'Home/course/$1/$2/$3';
$route['certification-training/(:any)/(:any)/(:any)/(:any)'] = 'Home/level_course/$1/$2/$3/$4';
$route['enquiry'] = 'Home/enquiry';


$route['login'] = 'Login/index';
$route['admin'] = 'Login';
$route['admin/pages'] = 'admin/PageBuilder/index';

$route['admin/batches'] = 'admin/PageBuilder/batches';
$route['admin/testimonials'] = 'admin/PageBuilder/testimonials';
$route['admin/experts'] = 'admin/PageBuilder/experts';
$route['admin/gallery'] = 'admin/PageBuilder/gallery';

$route['admin/pages/create'] = 'admin/PageBuilder/create_page';
$route['admin/categories'] = 'admin/Categories/index';
$route['admin/categories/create'] = 'admin/Categories/create';
$route['admin/subcategories'] = 'admin/Subcategories/index';
$route['admin/subcategories/create'] = 'admin/Subcategories/create';
$route['admin/level2'] = 'admin/Subsubcategories/index'; //Sub sub categories only url is level2
$route['admin/level2/create'] = 'admin/Subsubcategories/create';
$route['admin/courses'] = 'admin/Courses/index';
$route['admin/Location_courses'] = 'admin/Location_Courses/index';
$route['admin/enquiries'] = 'admin/Enquiry/index';
$route['admin/courses/create'] = 'admin/Courses/create';
$route['admin/location'] = 'admin/location/index';
$route['admin/location/create'] = 'admin/location/create';


$route['admin/pages/view_page/(:num)'] = 'admin/PageBuilder/viewPage/$1';

$route['admin/pages/delete/(:num)'] = 'admin/pageBuilder/delete_page/$1';
$route['admin/pages/edit/(:num)'] = 'admin/pageBuilder/edit_page/$1';

$route['admin/categories/edit/(:num)'] = 'admin/categories/edit/$1';

$route['courses/subject_course/(:any)'] = 'admin/courses/subject_course/$1';
$route['product/(:any)'] = 'product/index/$1';


