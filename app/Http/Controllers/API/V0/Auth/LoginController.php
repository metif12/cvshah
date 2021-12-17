<?php

namespace App\Http\Controllers\API\V0\Auth;

use App\Classes\Mobile;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MobileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mobile' => ['required', new MobileRule()],
            'password' => ['required'],
        ]);

        $mobile = Mobile::refactor($request->mobile);

        $user = User::query()->where('mobile', $mobile)->first();

        if (!$user) abort(Response::HTTP_NOT_ACCEPTABLE);

        //todo
        //if (!$user->mobile_verified_at) abort(Response::HTTP_NOT_ACCEPTABLE);

        $check = Hash::check($request->password, $user->password);

        if (!$check) abort(Response::HTTP_NOT_ACCEPTABLE);

        $tokenName = $request->userAgent();

        $token = $user->createToken($tokenName);

        return ['token' => $token->plainTextToken];
    }
}
