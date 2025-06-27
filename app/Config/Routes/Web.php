<?php

// Page d'accueil publique
$routes->get('/', 'HomeController::index', [
    'namespace' => 'App\Controllers\Public',
    'as' => 'home'
]);

// Groupe Auth complet
$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], static function ($routes) {
    // Connexion
    $routes->get('login', 'LoginController::loginForm', ['as' => 'login.form']);
    $routes->post('login', 'LoginController::login', ['as' => 'login.submit']);
    $routes->post('logout', 'LoginController::logout', ['as' => 'logout']);

    // Inscription
    $routes->get('register', 'RegisterController::registerForm', ['as' => 'register.form']);
    $routes->post('register', 'RegisterController::register', ['as' => 'register.submit']);
});
