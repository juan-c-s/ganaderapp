<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Event;

use App\Util\ImageUtil;
//require('./util/ImageConverter')
class EventController extends Controller
{

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Events - Ganaderapp";
        $viewData["subtitle"] =  "List of events";
        $viewData["events"] = Event::all();
        return view('event.index')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Add Event";
        return view('event.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        Event::validate($request);
        $data = $request->only(['title', 'category', 'maxCapacity', 'date', 'description', 'location']);
        $data['image'] = ImageUtil::img2htmlbase64($request, 'image');
        Event::create($data);
        return back();
    }

    public function delete(Request $request): View
    {
        Product::destroy($request->id);
        return $this->index();
    }

    public function dateFilter(Request $request)
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


