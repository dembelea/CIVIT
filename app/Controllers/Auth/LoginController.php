<?php

namespace App\Controllers\Auth;
use App\Controllers\Base\GuestController;
use CodeIgniter\HTTP\RequestInterface;
use App\Libraries\Inertia;

class LoginController extends GuestController
{
    public function loginForm()
{
    return Inertia::render('Auth/Login');
}

public function login()
{
    $data = $this->request->getJSON(true); // Récupère les données JSON en tableau associatif

    $validation = \Config\Services::validation();

    $rules = [
        'email'    => 'required|valid_email',
        'password' => 'required|min_length[6]'
    ];

    if (! $validation->setRules($rules)->run($data)) {
        return Inertia::render('Auth/Login', [
            'errors' => $validation->getErrors(),
            'old'    => $data
        ]);
    }

    $email = $data['email'];
    $password = $data['password'];

    $login_result = $this->LoginModel->login([
        'email'    => $email,
        'password' => $password
    ]);

    if (! $login_result) {
        return Inertia::render('Auth/Login', [
            'errors' => ['label' => 'auth.failed'], // message à gérer côté front
            'old'    => $data
        ]);
    }

    // Si le mot de passe a été utilisé récemment (login_result renvoie un tableau)
    if (is_array($login_result) && isset($login_result['used'])) {
        return Inertia::render('Auth/Login', [
            'errors' => ['label' => 'Ce mot de passe a déjà été utilisé récemment.'],
            'old'    => $data
        ]);
    }

    // Connexion réussie : stocker dans la session
    $this->session->set([
        'user_id'     => $login_result->id,
        'user_email'  => $email,
        'user_role'   => $login_result->role,
        'is_logged_in'=> true
    ]);

    // Redirection par rôle
    switch ($login_result->role) {
        case 'platform':
            return redirect()->to('/admin/dashboard');
        case 'recruiter':
            return redirect()->to('/workspace/dashboard');
        case 'candidate':
            return redirect()->to('/profile/dashboard');
        default:
            return redirect()->to('/');
    }
}


    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(route_to('login.form'));
    }

}
