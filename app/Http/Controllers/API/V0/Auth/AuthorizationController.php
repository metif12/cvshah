<?php

namespace App\Http\Controllers\API\V0\Auth;

use App\Classes\Kavenegar;
use App\Classes\Mobile;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MobileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthorizationController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mobile' => ['required', new MobileRule],
        ]);

        $mobile = Mobile::refactor($request->mobile);

        $user = User::query()->where('mobile', $mobile)->first();

        if (!$user) return response()->json([
            'message' => 'error',
            'reason' => 'authorization failed',
        ]);

        $last_authorization_date_time = $user->last_authorization_date_time;

        if($last_authorization_date_time) return response()->json([
            'message' => 'too soon',
            'last_authorization_date_time' => $user->last_authorization_date_time,
        ]);

        try {
            Kavenegar::verifyLookup($user->mobile, 'authorization-code', ['token' => $user->authorization_code]);
        }
        catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());

            return response()->json([
                'message' => 'error',
                'reason' => 'internal error in sending authorization code'
            ]);
        }

        return response()->json([
            'message' => 'ok',
        ]);
    }
}
