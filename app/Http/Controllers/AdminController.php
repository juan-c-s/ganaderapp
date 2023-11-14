<?php

namespace App\Http\Controllers;

// JUANCAMILO
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;


use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
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
        $viewData['description'] = __('This is an about page ...');
        $viewData['author'] = __('Developed By');
        
        return view('admin.index')->with('viewData', $viewData);
    }
    
    public function analytics(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('About us - Online Store');
        $viewData['subtitle'] = __('About us - Online Store');
        $viewData['description'] = __('This is an about page ...');
        $viewData['author'] = __('Developed By');
        return view('admin.analytics')->with('viewData', $viewData);
    }

    public function event(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('About us - Online Store');
        $viewData['subtitle'] = __('About us - Online Store');
        $viewData['description'] = __('This is an about page ...');
        $viewData['author'] = __('Developed By');
        $viewData['events'] = Event::all();
        return view('admin.event')->with('viewData', $viewData);
    }


    public function deleteEvent(Request $request): Response
    {
        Event::where('title', 'LIKE', $request->event)->delete();

        return redirect()->route('admin.index');
    }

    public function deleteProduct(Request $request): Response
    {
        Product::where('title', 'LIKE', $request->product)->delete();

        return redirect()->route('admin.index');
    }
}
