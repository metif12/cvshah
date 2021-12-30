<?php

namespace App\Http\Livewire\Auth;

use App\Classes\Kavenegar;
use App\Events\Auth\UserVerified;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Verify extends Component
{
    public $code;

    public function mount()
    {
        $this->resend();
    }

    public function getRules()
    {
        return ['code' => ['required', 'size:6']];
    }

    public function resend()
    {

        $user = Auth::user();

        if ($user->mobile_verified_at) {
            redirect(route('home'));
        }

        $last_authorization_date_time = $user->last_authorization_date_time;

        if ($last_authorization_date_time) {
            session()->flash('too_soon_resend');
            $this->emit('too_soon_resend');
        }

        try {
            Kavenegar::verifyLookup($user->mobile, 'authorization-code', ['token' => $user->authorization_code]);
        }
        catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());

            session()->flash('internal_error');
            $this->emit('internal_error');

            return;
        }

        $this->emit('resent');
        session()->flash('resent');
    }

    public function verify()
    {
        $this->validate();

        $user = Auth::user();

        if ($user->authorization_code != $this->code) {

            $this->emit('wrong');
            session()->flash('wrong');

            return;
        }

        $user->update(['mobile_verified_at' => now()]);

        event(new UserVerified($user));

        return redirect()->intended(route('panel.dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.verify')->extends('layouts.auth');
    }
}
