<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class GoogleRecaptchaRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response =
            Http::asForm()
                ->post("https://www.google.com/recaptcha/api/siteverify", [
                    'secret' => config('services.google.recaptcha.secret'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ])
                ->json();

        return $response['success'];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'شما به عنوان ربات تشخیص داده شده اید.';
    }
}