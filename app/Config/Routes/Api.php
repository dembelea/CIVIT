<?php

$routes->group('api', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
    $routes->get('users', 'UserApiController::index');
    $routes->get('users/(:num)', 'UserApiController::show/$1');
    $routes->post('users', 'UserApiController::store');
    $routes->put('users/(:num)', 'UserApiController::update/$1');
    $routes->delete('users/(:num)', 'UserApiController::destroy/$1');
});
