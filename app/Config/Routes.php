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
$list = $model->select('roles.url,roles.controller,roles.name,user_role.*')->join('user_role','user_role.id_role=roles.id','left')->where('url is not',null)->where('id_user =',Session()->get("id"))->get()->getResult();
foreach($list as $item)
{
    if($item->allow_view ==1)
        $routes->get($item->url.'', $item->controller.'::index/$1',['filter' => 'auth:'.$item->id_role]);
    if($item->allow_add ==1)
        $routes->add($item->url.'/add', $item->controller.'::add/$1',['filter' => 'auth']);
    if($item->allow_edit ==1)
    $routes->add($item->url.'/edit/(:num)', $item->controller.'::edit/$1',['filter' => 'auth']);
        if($item->allow_delete ==1)
    $routes->add($item->url.'/delete/(:num)', $item->controller.'::delete/$1',['filter' => 'auth']);
        if($item->allow_print ==1)
    $routes->add($item->url.'/print', $item->controller.'::print',['filter' => 'auth']);
        if($item->allow_custom ==1)
    $routes->add($item->url.'/custom', $item->controller.'::custom',['filter' => 'auth']);
}
$routes->add('/appdashboard/adminsystem/user/resetpassword/(:num)', 'User::resetpassword/$1');

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
