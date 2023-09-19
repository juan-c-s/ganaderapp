<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EventApiController extends Controller
{
    public function dateFilter(Request $request): JsonResponse
    {
        $allEvents = $request->input('events');
        $filterDate = $request->input('date');
        if ($filterDate == '') {
            return response()->json($allEvents);
        }
        else {
            $filtered = array_filter($allEvents, function($objeto) use ($filterDate) {
                return $objeto['date'] == $filterDate;
            });
            return response()->json($filtered);
        }
    }
}