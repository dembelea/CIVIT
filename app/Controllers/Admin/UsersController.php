<?php

namespace App\Controllers\Admin;
use App\Controllers\Base\ProtectedController;
use App\Libraries\Inertia;

class UsersController extends ProtectedController
{
    public function index()
    {
        $users = [
            ['id' => 1, 'name' => 'Adama Dembele', 'email' => 'alice@example.com'],
            ['id' => 2, 'name' => 'Rose Marie Coulibaly', 'email' => 'bob@example.com'],
        ];
        return Inertia::render('Admin/Users', ['users' => $users]);
    }
}
