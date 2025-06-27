<?php

namespace App\Controllers\Public;

use App\Controllers\Base\BaseController;
use App\Libraries\Inertia;

class HomeController extends BaseController
{
    public function index()
    {
        return Inertia::render('Public/Home', [
            'message' => 'Bienvenue dans CI4 + Vue 3 + Inertia 2 + Tailwind 4!'
        ]);
    }
}