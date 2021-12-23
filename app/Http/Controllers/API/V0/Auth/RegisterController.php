<?php

namespace App\Http\Controllers\API\V0\Auth;

use App\Classes\Mobile;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MobileRule;
use Hekmatinasser\Verta\Verta;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        //todo mobile google recaptcha

        $rules = [
            'mobile' => ['required', new  MobileRule, 'unique:users'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'password' => ['required', 'min:8'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
        ];

        $request->validate($rules);

        $user = User::query()
            ->create([
                'mobile' => Mobile::refactor($request->mobile),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'password' => Hash::make($request->password),
            ]);

        event(new Registered($user));

        return response()->json([
            'message' => 'ok',
            'user' => $user,
        ]);
    }
}
