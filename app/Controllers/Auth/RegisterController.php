<?php

namespace App\Controllers\Auth;
use App\Controllers\Base\GuestController;
use CodeIgniter\HTTP\RequestInterface;
use App\Libraries\Inertia;

class RegisterController extends GuestController
{
    public function registerForm()
    {
        return Inertia::render('Auth/Register');
    }

    public function register()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name'     => 'required|min_length[2]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required|in_list[platform,recruiter,candidate]' // si choix du rôle visible
        ];

        if (!$this->validate($rules)) {
            return Inertia::render('Auth/Register', [
                'errors' => $this->validator->getErrors(),
                'old' => $this->request->getPost()
            ]);
        }

        $userModel = new \App\Models\UserModel();

        $userData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
        ];

        $userModel->insert($userData);

        // Récupère l'utilisateur nouvellement créé
        $user = $userModel->where('email', $userData['email'])->first();

        // Connecte l'utilisateur immédiatement
        $this->session->set([
            'user_id' => $user['id'],
            'user_email' => $user['email'],
            'user_role' => $user['role'],
            'is_logged_in' => true
        ]);

        // Redirection selon le rôle
        switch ($user['role']) {
            case 'platform':
                return redirect()->to('/admin/dashboard');
            case 'recruiter':
                return redirect()->to('/workspace');
            case 'candidate':
                return redirect()->to('/candidate');
            default:
                return redirect()->to('/');
        }
    }

}
