<?php

namespace App\Libraries;

class Inertia
{
    private static array $shared = [];

    public static function share(array $data): void
    {
        self::$shared = array_merge(self::$shared, $data);
    }

    public static function render(string $component, array $props = [])
    {
        return view('index', [
            'page' => [
                'component' => $component,
                'props' => array_merge(self::$shared, $props),
                'url' => current_url(),
                'version' => '1'
            ]
        ]);
    }

}



