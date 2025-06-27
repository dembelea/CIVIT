<?php

// Routes Admin
$routes->group('admin', [
    'namespace' => 'App\Controllers\Admin',
    'filter'    => ['auth', 'role:platform']
], static function($routes) {
    $routes->get('/', 'DashboardController::index', ['as' => 'admin.home']);
    $routes->get('dashboard', 'DashboardController::index', ['as' => 'admin.dashboard']);
    $routes->get('users', 'UsersController::index', ['as' => 'admin.users']);
});
