<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Router\Exceptions\RedirectException;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $userRole = $session->get('user_role');

        if (! $userRole) {
            // Si l'utilisateur n'est pas connecté, rediriger vers login
            return redirect()->to(route_to('login.form'));
        }

        if ($arguments && is_array($arguments)) {
            $expectedRole = $arguments[0];

            if ($userRole !== $expectedRole) {
                // Si le rôle ne correspond pas, rediriger selon le rôle actuel
                return match ($userRole) {
                    'platform'  => redirect()->to('/admin'),
                    'recruiter' => redirect()->to('/workspace'),
                    'candidate' => redirect()->to('/candidate'),
                    default     => redirect()->to('/'),
                };
            }
        }

        // Si tout est ok, continuer normalement
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Rien à faire ici
    }
}
