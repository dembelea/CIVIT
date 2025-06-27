<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;
use Config\Services;

$routes = Services::routes();

// Configuration de base
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// Autochargement de tous les fichiers dans app/Routes/*.php
// $routeFiles = glob(APPPATH . 'Config/Routes/*.php');
// foreach ($routeFiles as $file) {
//     require $file;
// }

// Charger routes séparées

require APPPATH . 'Config/Routes/Web.php';
require APPPATH . 'Config/Routes/Candidate.php';
require APPPATH . 'Config/Routes/Recruiter.php';
require APPPATH . 'Config/Routes/Admin.php'; // platform
require APPPATH . 'Config/Routes/Api.php';

