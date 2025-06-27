<?php

namespace App\Controllers\Recruiter;
use App\Controllers\Base\ProtectedController;
use App\Libraries\Inertia;

class DashboardController extends ProtectedController
{
    public function index()
    {
        return Inertia::render('Recruiter/Dashboard');
    }
}
