<?php

namespace App\Libraries;

use Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class Inertia
{
    private static array $shared = [];

    public static function share(array $data): void
    {
        self::$shared = array_merge(self::$shared, $data);
    }

    public static function render(string $component, array $props = []): ResponseInterface|string
    {
        $data = [
            'component' => $component,
            'props'     => array_merge(self::$shared, $props),
            'url'       => current_url(),
            'version'   => '1'
        ];

        $request = Services::request();

        // Si c'est une requête Inertia (header X-Inertia), on renvoie du JSON
        if ($request->hasHeader('X-Inertia')) {
            return Services::response()
                ->setJSON($data)
                ->setHeader('X-Inertia', 'true');
        }

        // Sinon on renvoie le HTML avec page JSON-encodée
        return view('app', ['page' => json_encode($data)]);
    }
}

