<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Vérifie si l'utilisateur est connecté
        if (! $session->get('is_logged_in')) {
            // Redirige vers le formulaire de connexion
            return redirect()->to(route_to('login.form'));
        }

        return null; // Laisse passer si connecté
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Rien à faire après la requête
    }
}
