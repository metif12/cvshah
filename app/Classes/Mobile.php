<?php

namespace App\Classes;

use Exception;

class Mobile
{
    /**
     * @throws Exception
     */
    public static function refactor($mobile): string
    {
        $mobile = preg_replace("/^(\+98|0098|98|0)?(9[0-9]{9})$/", "0098$2", en_num($mobile ?? ""));

        if(!is_string($mobile)) throw new Exception('mobile number is not valid');

        return $mobile;
    }

    public static function check($mobile): bool
    {
        return preg_match("/^(\+98|0098|98|0)?(9[0-9]{9})$/", en_num($mobile)) === 1;
    }
}
