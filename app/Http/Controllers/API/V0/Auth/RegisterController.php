<?php

namespace App\Http\Controllers\API\V0\Auth;

use App\Classes\Mobile;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MobileRule;
use Hekmatinasser\Verta\Verta;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mobile' => ['required', new  MobileRule, 'unique:users'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'password' => ['required', 'min:8'],
            'first_name' => ['required'],
            'last_name' => ['required'],
        ]);

        $user = User::query()
            ->create([
                'mobile' => Mobile::refactor($request->mobile),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birthday' => $request->birthday,
                'password' => Hash::make($request->password),
            ]);

        event(new Registered($user));

        $tokenName = $request->userAgent();

        $token = $user->createToken($tokenName);

        return ['token' => $token->plainTextToken];
    }
}
