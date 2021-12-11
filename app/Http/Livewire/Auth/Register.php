<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\GoogleRecaptchaRule;
use App\Rules\MobileRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Register extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $mobile = '';
    public $password = '';
    public $passwordConfirmation = '';
    public $g_recaptcha_response = '';

    public function register()
    {
        $validator = Validator::make([
            'g_recaptcha_response' => $this->g_recaptcha_response,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'mobile' => $this->mobile,
            'password' => $this->password,
            'passwordConfirmation' => $this->passwordConfirmation,
        ],[
            'g_recaptcha_response' => ['bail', 'required', new GoogleRecaptchaRule],
            'mobile' => ['required', new  MobileRule, 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
            'first_name' => ['required'],
            'last_name' => ['required'],
        ]);

        if ($validator->fails()) {
            $this->setErrorBag($validator->errors());
            $this->emit('resetReCaptcha');

            return null;
        }

        $user = User::query()
            ->create([
                'mobile' => $this->mobile,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'password' => Hash::make($this->password),
            ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
