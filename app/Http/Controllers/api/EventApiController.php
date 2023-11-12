<?php

/** Donovan Castrillon */

// DONOVAN

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Event;

class EventApiController extends Controller
{
    public function getAllEvents(Request $request)
    {
        $events = Event::all();
        $withImage = $request->input('image');
        if ($withImage == 'true') {
            return response()->json($events);
        }
        else if ($withImage == 'false' || $withImage == null) {
            for ($i=0; $i < count($events); $i++) {
                unset($events[$i]['image']);
            }
            return response()->json($events);
        }
    }

    public function dateFilter(Request $request): JsonResponse
    {
        $allEvents = $request->input('events');
        $filterDate = $request->input('date');
        if ($filterDate == '') {
            return response()->json($allEvents);
        } elseif ($allEvents == null) {
            return response()->json();
        } else {
            $filtered = array_filter($allEvents, function ($object) use ($filterDate) {
                return $object['date'] == $filterDate;
            });

            return response()->json($filtered);
        }
    }
}
