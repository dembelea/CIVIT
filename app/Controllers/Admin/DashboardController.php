<?php

namespace App\Controllers\Admin;
use App\Controllers\Base\ProtectedController;
use App\Libraries\Inertia;

class DashboardController extends ProtectedController
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }
}
