<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Start::index');
$routes->get('/register', 'Start::register');
$routes->get('/login', 'Start::login');


$routes->get('/home', 'Home::index');

$routes->post('/auth/valid_register', 'Auth::valid_register');
$routes->post('/auth/valid_login', 'Auth::valid_login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/create', 'Start::create');
$routes->post('/create/save', 'Start::save');
$routes->get('/profile', 'Start::profile');
$routes->get('/editprofile', 'Start::editprofile');
$routes->post('/editprofile/save', 'Start::editprofilesave');

$routes->get('/galeri/(:num)', 'Start::galeri/$1');
$routes->post('/galeri/edit/(:num)', 'Start::edit/$1');
$routes->post('/galeri/update/(:num)', 'Start::updategaleri/$1');
$routes->post('/galeri/like/(:num)', 'Start::like/$1');
$routes->post('/galeri/unlike/(:num)', 'Start::unlike/$1');
$routes->post('/galeri/delete/(:num)', 'Start::delete/$1');
$routes->post('/galeri/download/(:num)', 'Start::download/$1');
$routes->post('/komen/save/(:num)', 'Start::savekomen/$1');
$routes->post('/album/save/', 'Start::albumsave');
$routes->post('/album/saveto/(:num)', 'Start::savetoalbum/$1');
$routes->post('/album/delfrom/(:num)', 'Start::deletealbum/$1');
$routes->get('/album/(:num)', 'Start::album/$1');
$routes->get('/profilelike', 'Start::profilelike');
$routes->get('/profilepost', 'Start::profilepost');