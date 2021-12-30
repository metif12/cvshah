<?php

namespace App\Http\Controllers\API\V0\Demand;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use App\Traits\FileUpload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddController extends Controller
{
    use FileUpload;

    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $fileAddress = $this->upload('image', 'demands');

        $demand = Demand::query()
            ->create([
                'user_id' => Auth::id(),
                'is_accepted' => 1,
                'is_processed' => 0,
                'image' => $fileAddress,
                'vector' => $request->vector,
            ]);

        return response()->json([
            'status' => 'ok',
            'object' => $demand,
        ]);
    }
}
