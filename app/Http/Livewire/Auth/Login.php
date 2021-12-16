<?php

namespace App\Http\Livewire\Auth;

use App\Classes\Mobile;
use App\Providers\RouteServiceProvider;
use App\Rules\GoogleRecaptchaRule;
use App\Rules\MobileRule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $mobile = '';
    public $password = '';
    public $remember = false;
    public $g_recaptcha_response = '';

    public function getRules()
    {
        return [
            'g_recaptcha_response' => ['bail', 'required', new GoogleRecaptchaRule],
            'mobile' => ['required', new MobileRule()],
            'password' => ['required'],
        ];
    }

    public function authenticate()
    {
        $this->validate();

        $mobile = Mobile::refactor($this->mobile);

        if (!Auth::attempt(['mobile' => $mobile, 'password' => $this->password], $this->remember)) {
            $this->addError('mobile', trans('auth.failed'));

            return;
        }

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
