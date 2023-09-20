<?php
/** Donovan Castrillon */

// DONOVAN

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;

use App\Util\ImageUtil;
class EventController extends Controller
{

    public function __construct()
    {
        // Assign to ALL methods in this Controller
        $this->middleware('auth');
    }
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

    public function save(Request $request):RedirectReponse
    {
        Event::validate($request);
        $request->image = ImageUtil::img2htmlbase64($request, 'image');
        Event::createEvent($request);
        return redirect()->route('event.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        Product::destroy($request->id);
        return  redirect()->route('event.index');
    }

}


