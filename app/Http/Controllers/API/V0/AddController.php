<?php

namespace App\Http\Controllers\API\V0;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function __invoke()
    {
        $demand = Demand::query()
            ->create([
                'user_id' => 1,
                'is_accepted' => 1,
                'is_processed' => 0,
            ]);

        return response()->json([
            'status' => 'ok',
            'object' => $demand,
        ]);
    }
}
