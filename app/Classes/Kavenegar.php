<?php

namespace App\Classes;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Kavenegar
{
    const BASE_URL = 'https://api.kavenegar.com/v1';

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
        $url = self::generateURL('verify', 'lookup');

        $tokens['receptor'] = $receptor;
        $tokens['template'] = $template;
        $tokens['type'] = $type;

        $result = Http::post($url, $tokens);

        self::checkResponse($result);
    }

    /**
     * @throws Exception
     */
    public static function smsSend(string $receptor, string $message)
    {
        $url = self::generateURL('sms', 'send');

        $data = [
            'receptor' => $receptor,
            'message' => $message,
        ];

        $result = Http::post($url, $data);

        self::checkResponse($result);
    }

    /**
     * @param Response $result
     * @throws Exception
     */
    private static function checkResponse(Response $result): void
    {
        if (!$result->ok()) {
            $data = $result->json();
            $code = $data['return']['status'];
            $message = $data['return']['message'];

            throw new Exception("kavenegar($code): $message");
        }
    }
}
