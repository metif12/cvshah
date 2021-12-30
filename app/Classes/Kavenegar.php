<?php

namespace App\Classes;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Kavenegar\KavenegarApi;

class Kavenegar
{

    const VERIFY_LOOKUP_SMS_TYPE = 'sms';
    const VERIFY_LOOKUP_CALL_TYPE = 'call';

    public static function generateURL($scope, $method): string
    {
        return self::BASE_URL. "/". config('services.kavenegar.key') ."/$scope/$method.json";
    }

    /**
     * @throws Exception
     */
    public static function verifyLookup(string $receptor, string $template, array $tokens, string $type= 'sms')
    {
        $api = new KavenegarApi(config('services.kavenegar.key'));

        $api->VerifyLookup($receptor, $tokens['token'], $tokens['token2'] ?? null, $tokens['token3'] ?? null, $template, $type);
    }

    /**
     * @throws Exception
     */
    public static function smsSend(string $receptor, string $message)
    {
        $api = new KavenegarApi(config('services.kavenegar.key'));

        $api->Send(null, $receptor, $message);
    }
}
