<?php

namespace App\Http\Controllers\Api\Serivce;

class Check
{
    private static $apiToken = "fdfdsfsd";

    public static function getApiToken()
    {
        return self::$apiToken;
    }

    public static function setApiToken($token)
    {
        self::$apiToken = $token;
    }
}