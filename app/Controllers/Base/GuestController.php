<?php

namespace App\Controllers\Base;

use CodeIgniter\Exceptions\RedirectException;

abstract class GuestController extends BaseController
{
    public $LoginModel;
    // public $SettingsModel;

    public function __construct() {

        //load helpers
        helper(array('general'));

        //models
        $models_array = $this->get_Models_array();
        foreach ($models_array as $model) {
            $this->$model = model("App\Models\Public\\" . $model);
        }
    }
    public function initController(...$args): void
    {
        parent::initController(...$args);

        if ($this->session->has('user_id')) {
            $role = $this->session->get('user_role');
            $map = [
                'platform'     => '/admin/dashboard',
                'recruiter' => '/workspace/dashboard',
                'candidate' => '/candidate',
            ];

            throw RedirectException::forRedirect($map[$role] ?? '/');
        }
    }
    private function get_Models_array() {
        return array(
            'LoginModel',
            // 'SettingsModel',
        );
    }
}
