<?php

namespace App\Http\Controllers\API\V0\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'message' => 'ok',
            'demands' => auth()->user()->demands,
        ]);
    }
}
