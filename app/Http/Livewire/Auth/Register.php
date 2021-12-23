<?php

namespace App\Http\Livewire\Auth;

use App\Classes\Mobile;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\GoogleRecaptchaRule;
use App\Rules\MobileRule;
use Hekmatinasser\Verta\Verta;
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
    public $day = 9;
    public $month = 9;
    public $year = 1378;
    public $gender = 2;
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
            'day' => $this->day,
            'month' => $this->month,
            'year' => $this->year,
            'password' => $this->password,
            'passwordConfirmation' => $this->passwordConfirmation,
        ], [
            'g_recaptcha_response' => ['bail', 'required', new GoogleRecaptchaRule],
            'mobile' => ['required', new  MobileRule, 'unique:users'],
            'day' => ['required', 'numeric', 'min:1', 'max:31'],
            'month' => ['required', 'numeric', 'min:1', 'max:12'],
            'year' => ['required', 'numeric', 'min:1300', 'max:1500'],
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
                'mobile' => Mobile::refactor($this->mobile),
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'birthday' => Verta::createJalali($this->year, $this->month, $this->day)->getTimestamp(),
                'password' => Hash::make($this->password),
            ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function updated()
    {
        $this->validate([
            'mobile' => ['required', new  MobileRule],
            'day' => ['required', 'numeric', 'min:1', 'max:31'],
            'month' => ['required', 'numeric', 'min:1', 'max:12'],
            'year' => ['required', 'numeric', 'min:1300', 'max:1500'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
            'first_name' => ['required'],
            'last_name' => ['required'],
        ]);
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
