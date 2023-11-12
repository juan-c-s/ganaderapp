<?php

/** Donovan Castrillon */

// DONOVAN

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function consumeTeam5Api(Request $request): JsonResponse
    {
        return response()->json('{"debug":"debug"}');
    }
}
