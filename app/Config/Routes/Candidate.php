<?php

// Routes Candidate
$routes->group('candidate', [
    'namespace' => 'App\Controllers\Candidate',
    'filter'    => ['auth', 'role:candidate']
], static function($routes) {
    $routes->get('/', 'DashboardController::index', ['as' => 'candidate.home']);
    $routes->get('dashboard', 'DashboardController::index', ['as' => 'candidate.dashboard']);
    $routes->get('profile', 'ProfileController::index', ['as' => 'candidate.profile']);
});