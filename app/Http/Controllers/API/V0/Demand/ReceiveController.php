<?php

namespace App\Http\Controllers\API\V0\Demand;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReceiveController extends Controller
{
    public function __invoke(Demand $demand)
    {
        return response()->json([
            'status' => 'ok',
            'object' => $demand,
        ]);
    }
}
