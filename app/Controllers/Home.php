<?php

namespace App\Controllers;

use App\Libraries\Inertia;

class Home extends BaseController
{
    public function index() // ✅ ne pas typer en string
    {
        return Inertia::render('Home', [
            'message' => 'Bienvenue dans CI4 + Vue 3 + Inertia 2 + Tailwind 4!'
        ]);
    }
}