<?php

namespace App\Http\Controllers;

// JUANCAMILO
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Util\ImageUtil;


use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class AdminEventController extends Controller
{
    public function __construct()
    {
        // Assign to ALL methods in this Controller
        $this->middleware('auth');
    }

    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('About us - Online Store');
        $viewData['subtitle'] = __('About us - Online Store');
        $viewData['author'] = __('Developed By');
        $viewData['events'] = Event::all();
        return view('admin.event')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('Events - Ganaderapp');
        $viewData['subtitle'] = __('Create Event');

        return view('admin.createEvent')->with('viewData', $viewData);
    }

    public function update(string $id): View
    {
        $viewData = [];
        if ($id > 0) {
            $event = Event::findOrFail($id);
            $viewData['title'] = $event->getTitle().' - Ganaderapp';
            $viewData['subtitle'] = $event->getTitle().' - '.__('Event');
            $viewData['event'] = $event;
        return view('admin.updateEvent')->with('viewData',$viewData);
        }else{
            return view('admin.index')->with('viewData', $viewData);
        }
    }

    public function updateEvent(Request $request): RedirectResponse
    {

        Event::updateEvent($request);
        return redirect()->route('admin.index');
    }

    public function save(Request $request): RedirectResponse
    {
        Event::validate($request);
        $request->image = ImageUtil::img2htmlbase64($request, 'image');
        Event::createEvent($request);

        return redirect()->route('admin.index');
    }

    public function delete(string $id): RedirectResponse
    {
        Event::destroy($id);
        return redirect()->route('admin.index');
    }

}
