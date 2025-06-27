<?php

namespace App\Models\Public;

use App\Models\CrudModel;

class LoginModel extends CrudModel
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function login(array $options = []): false|object
    {
        $usersTable = $this->db->prefixTable('users');
        $rolesTable = $this->db->prefixTable('roles');
        $assignedRolesTable = $this->db->prefixTable('assigned_roles');

        $email = $this->_get_clean_value($options, 'email');
        $password = $this->_get_clean_value($options, 'password');

        if (!$email || !$password) {
            return false;
        }

        // Requête SQL avec jointures pour récupérer rôle + utilisateur
        $sql = "
            SELECT u.id, u.password, ar.scope AS role
            FROM $usersTable u
            JOIN $assignedRolesTable ar ON u.id = ar.user_id
            JOIN $rolesTable r ON ar.role_id = r.id AND r.status = 'active'
            WHERE u.email = ? AND u.deleted = 0 AND u.disable_login = 0
            LIMIT 1
        ";

        $result = $this->db->query($sql, [$email]);
        $user = $result->getRow();

        // Sécurité : appel dummy à password_verify même si utilisateur non trouvé
        if (!$user) {
            password_verify($password, '$2y$10$usesomesillystringforexample');
            return false;
        }

        // Vérification du mot de passe
        if ($this->verify_password($user, $password)) {
            return $user; // Succès
        }

        return false; // Échec
    }

    private function verify_password(object $user, string $password): bool
    {
        if (!empty($user->password)) {
            
            $isBcrypt = strlen($user->password) === 60;
            $isValid = ($isBcrypt && password_verify($password, $user->password));

            if ($isValid) {
                return true;
            }
        }

        // Vérifier dans l'historique des mots de passe
        foreach ($this->getPasswordHistory($user->id) as $old) {
            if (password_verify($password, $old['password_hash'])) {
                return false; // Mot de passe déjà utilisé
            }
        }

        return false;
    }

    private function getPasswordHistory(int $userId): array
    {
        return $this->db->table('user_password_history')
            ->select('password_hash, changed_at')
            ->where('user_id', $userId)
            ->get()
            ->getResultArray();
    }

    public function isPasswordUsed(int $userId, string $newPassword): bool
    {
        $passwords = $this->getPasswordHistory($userId);

        $currentPassword = $this->db
            ->table($this->table)
            ->select('password')
            ->where('id', $userId)
            ->get()
            ->getRow('password');

        if ($currentPassword) {
            $passwords[] = ['password_hash' => $currentPassword];
        }

        foreach ($passwords as $item) {
            if (password_verify($newPassword, $item['password_hash'])) {
                return true; // déjà utilisé
            }
        }

        // Insérer l'ancien mot de passe dans l'historique
        if ($currentPassword) {
            $this->db->table('user_password_history')->insert([
                'user_id'       => $userId,
                'password_hash' => $currentPassword,
                'changed_at'    => get_current_utc_time()
            ]);
        }

        return false; // Mot de passe inédit
    }
}
