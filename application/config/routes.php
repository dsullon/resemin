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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

//Rutas para Paginas
$route['api/page']['get'] = 'api/page/pages';
$route['api/page/(:num)']['get'] = 'api/page/page/$1';
$route['api/page']['post'] = 'api/page/page';
$route['api/page/(:num)']['put'] = 'api/page/page/$1';
$route['api/page/(:num)']['delete'] = 'api/page/page/$1';

//Rutas para Publicaciones
$route['api/post']['get'] = 'api/post/index';
$route['api/post/(:num)']['get'] = 'api/post/buscar/$1';
$route['api/post']['post'] = 'api/post/index';
$route['api/post/(:num)']['put'] = 'api/post/index/$1';
$route['api/post/(:num)']['delete'] = 'api/post/index/$1';


//Rutas para Navegacion
$route['api/nav']['get'] = 'api/nav/navs';
$route['api/nav/(:num)']['get'] = 'api/nav/nav/$1';
$route['api/nav']['post'] = 'api/nav/nav';
$route['api/nav/(:num)']['put'] = 'api/nav/nav/$1';
$route['api/nav/(:num)']['delete'] = 'api/nav/nav/$1';

//Rutas para Usuarios
$route['api/user/login']['post'] = 'api/user/login';
$route['api/user']['get'] = 'api/user/users';
$route['api/user/(:num)']['get'] = 'api/user/user/$1';
$route['api/user']['post'] = 'api/user/user';
$route['api/user/(:num)']['put'] = 'api/user/user/$1';
$route['api/user/(:num)']['delete'] = 'api/user/user/$1';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
