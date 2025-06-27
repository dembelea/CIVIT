<?php 

namespace App\Controllers\Base;

use CodeIgniter\Exceptions\PageForbiddenException;
use CodeIgniter\Exceptions\RedirectException;

abstract class ProtectedController extends BaseController
{
    public function initController(...$args): void
    {
        parent::initController(...$args);

        if (! $this->session->has('user_id')) {
            // Recommandé : déclencher une redirection via exception
            throw RedirectException::forRedirect(route_to('login.form'));
        }

        // Tu peux forcer un rôle ici si nécessaire
        // $this->checkRole('admin');
    }

    protected function checkRole(string $requiredRole): void
    {
        $currentRole = $this->session->get('user_role') ?? '';

        if ($currentRole !== $requiredRole) {
            throw PageForbiddenException::forPageForbidden();
        }
    }
}
