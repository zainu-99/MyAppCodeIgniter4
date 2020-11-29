<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index',['filter' => 'auth']);
$routes->get('/login', 'Login::index');
$routes->get('/login/auth', 'Login::auth');
use App\Models\RoleModel;
$model = new RoleModel();
$list = $model->select('roles.url,roles.controller,roles.name,user_role.id')->where('url is not',null)->join('user_role','user_role.id_role=roles.id','left')->where('user_role.allow_view',1)->join('users','users.id=user_role.id_user','left')->get()->getResult();
foreach($list as $item)
{
    $routes->get($item->url.'', $item->controller.'::index');
    $routes->add($item->url.'/add', $item->controller.'::add');
    $routes->add($item->url.'/edit/(:num)', $item->controller.'::edit/$1');
    $routes->add($item->url.'/delete/(:num)', $item->controller.'::delete/$1');
    $routes->add($item->url.'/print', $item->controller.'::print');
    $routes->add($item->url.'/custom', $item->controller.'::custom');
}

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
