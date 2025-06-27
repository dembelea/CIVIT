<?php

namespace App\Controllers\Base;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $request;
    protected $session;
    protected $helpers = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger): void
    {
        parent::initController($request, $response, $logger);

        $this->session = service('session');

        // Désactiver la DebugBar sur AJAX / Inertia / Vite
        if (
            $request->isAJAX() ||
            $request->hasHeader('X-Inertia') ||
            str_contains((string) $request->getUserAgent(), 'vite')
        ) {
            $GLOBALS['CI_DEBUGBAR_ENABLED'] = false;
        }
    }
}

