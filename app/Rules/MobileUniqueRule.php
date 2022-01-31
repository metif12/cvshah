<?php

namespace App\Rules;

use App\Classes\Mobile;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class MobileUniqueRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !User::query()->where('mobile', Mobile::refactor($value))->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'موبایل وارد شده قبلا ثبت نام شده است.';
    }
}
