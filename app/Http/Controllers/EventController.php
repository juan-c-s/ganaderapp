<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Event;
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
        $viewData["title"] = "Add Cow";
        return view('event.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        Event::validate($request);
        //here will be the code to call the model and save it to the database
        Event::create($request->only(['title', 'category', 'maxCapacity', 'date', 'description', 'image', 'location']));
        return back();
    }

    public function delete(Request $request): View
    {
        Product::destroy($request->id);
        return $this->index();
    }

    public function dateFilter(Request $request)
    {
        if ($request->input('date') == '') {
            return response()->json(Event::all());
        }
        else {
            $filtro = $request->input('date');
            $resultados = Event::where('date', $filtro)->get();
            return response()->json($resultados);
        }
    }
}


