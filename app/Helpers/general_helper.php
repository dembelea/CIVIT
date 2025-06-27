<?php

// use App\Controllers\SecurityController;
// use App\Controllers\Notification_processor;
// use App\Controllers\AppController;
// use App\Libraries\Pdf;
// use App\Libraries\Clean_data;
// use App\Libraries\Outlook_smtp;
// use App\Libraries\Ciqrcode;

/**
 * check the array key and return the value 
 * 
 * @param array $array
 * @return extract array value safely
 */

if (!function_exists('get_array_value')) {
    function get_array_value($array, $key, $default = null) {
        if (is_array($array) && array_key_exists($key, $array)) {
            return $array[$key];
        }
        return $default;
    }
}