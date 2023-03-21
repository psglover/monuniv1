<?php

namespace Config;
use App\Controllers\AdminController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'SiteController::simple');

$routes->get("acceuil","SiteController::simple");
$routes->match(['get','post'],"enregistrer","SiteController::enregistrer");
/* $routes->get("mesinstituts","AdminController::voirInstitutions"); */
/* $routes->get("ajouter", "AdminController::ajoutInstitution"); */
/* $routes->match(['get','post'], "creer","AdminController::storeInstitution"); */
/* $routes->get('editer/(:num)', 'AdminController::editer/$1'); */
/* $routes->post('update/(:num)','AdminController::update/$1'); */
$routes->match(['get','post'],'verifier','SiteController::verifier');
/* $routes->get('supprimer/(:num)','AdminController::supprimer/$1'); */
$routes->match(['get','post'],'connexion', 'AdminController::seConnecter');
/* $routes->get("deconnection","AdminController::deconnecter"); */

$routes->group('', ['filter'=>'isLoggedIn'],function($routes){
    $routes->get('mesinstituts', 'AdminController::voirInstitutions');
    $routes->get("ajouter", "AdminController::ajoutInstitution");
    $routes->match(['get','post'], "creer","AdminController::storeInstitution");
    $routes->get('editer/(:num)', 'AdminController::editer/$1');
    $routes->post('update/(:num)','AdminController::update/$1');
    $routes->get('supprimer/(:num)','AdminController::supprimer/$1');
    $routes->get("deconnection","AdminController::deconnecter");
});

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
