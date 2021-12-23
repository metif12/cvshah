<?php

namespace App\Http\Controllers\API\V0\Auth;

use App\Classes\Mobile;
use App\Events\Auth\UserVerified;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MobileRule;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mobile' => ['required', new MobileRule],
            'code' => ['required', 'size:6']
        ]);

        $mobile = Mobile::refactor($request->mobile);

        $user = User::query()->where('mobile', $mobile)->first();

        if (!$user) return response()->json([
            'message' => 'error',
            'reason' => 'verification failed',
        ]);

        if ($user->authorization_code != $request->code)
            return response()->json([
                'message' => 'error',
                'reason' => 'verification failed',
            ]);

        $user->update(['mobile_verified_at' => now()]);

        event(new UserVerified($user));

        return response()->json([
            'message' => 'ok',
            'user' => $user,
        ]);
    }
}
