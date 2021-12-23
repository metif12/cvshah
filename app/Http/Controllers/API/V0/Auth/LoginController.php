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
        //todo mobile google recaptcha

        $request->validate([
            'mobile' => ['required', new MobileRule()],
            'password' => ['required','min:8'],
        ]);

        $mobile = Mobile::refactor($request->mobile);

        $user = User::query()->where('mobile', $mobile)->first();

        if (!$user) return response()->json([
            'message' => 'error',
            'reason' => 'authentication failed',
        ]);

        $check = Hash::check($request->password, $user->password);

        if (!$check) return response()->json([
            'message' => 'error',
            'reason' => 'authentication failed',
        ]);

        if (!$user->mobile_verified_at) return response()->json([
            'message' => 'error',
            'reason' => 'mobile is not verified',
        ]);

        $tokenName = $request->userAgent();

        $token = $user->createToken($tokenName);

        return ['token' => $token->plainTextToken];
    }
}
