<?php

// Routes Recruiter
$routes->group('workspace', [
    'namespace' => 'App\Controllers\Recruiter',
    'filter'    => ['auth', 'role:recruiter']
], static function($routes) {
    $routes->get('/', 'DashboardController::index', ['as' => 'recruiter.home']);
    $routes->get('dashboard', 'DashboardController::index', ['as' => 'recruiter.dashboard']);
    $routes->get('offers', 'OffersController::index', ['as' => 'recruiter.offers']);
    $routes->get('applications', 'ApplicationsController::index', ['as' => 'recruiter.applications']);
    $routes->get('team', 'TeamController::index', ['as' => 'recruiter.team']);
    $routes->get('settings', 'SettingsController::index', ['as' => 'recruiter.settings']);

});