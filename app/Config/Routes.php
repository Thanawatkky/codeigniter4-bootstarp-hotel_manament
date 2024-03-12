<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Register', 'Register::index');
$routes->post('/register', 'Register::save');
$routes->get('/Login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->post('/login','Login::auth');
$routes->group('',['filter' => 'auth'],function($routes) {
    $routes->get('/admin/(:any)', 'Admin::index/$1');
    $routes->get('/user/dashboard','User::index');
    $routes->post('/admin/addRoom',"Admin::store");
    $routes->get('/admin/editRoom/(:num)',"Admin::index/$1");
    $routes->post('/admin/editRoom',"Admin::update");
    $routes->post('/admin/delete',"Admin::delete");
    $routes->post('/admin/profile',"Admin::profile");
    $routes->post('/admin/forgetpassword',"Admin::forgetPassword");
    $routes->post('/admin/check_in',"Admin::checkIn");
    $routes->post('/admin/check_out',"Admin::checkOut");
    $routes->post('/admin/cancel',"Admin::cancel");
    
});
$routes->group('',['filter' => 'auth'],function($routes) {
    $routes->get('/user/(:any)', 'user::index/$1');
    $routes->post('/user/profile', 'user::profile');
    $routes->post('/user/forgetpassword', 'user::forgetpassword');
    $routes->get('/user/room_detail/(:num)',"user::index/$1");
    $routes->post('/user/booking','user::booking');
});
