<?php

if (!function_exists('get_base_url')) {
    function get_base_url(): string
    {
        // Ne pas l'utiliser dans le CLI
        if (is_cli()) {
            return 'http://localhost/';
        }

        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $script = $_SERVER['SCRIPT_NAME'] ?? '';

        $base = preg_replace('/index\.php.*/', '', $host . $script);
        $base = rtrim($base, '/');

        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https';

        $protocol = $isHttps ? 'https://' : 'http://';

        return $protocol . $base . '/';
    }
}
