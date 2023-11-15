<?php

namespace App\Http\Controllers;

// JUANCAMILO
use App\Models\User;
use App\Models\Product;
use App\Models\Event;
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
        $viewData['author'] = __('Developed By');
        $viewData['users'] = User::all();
        $viewData['userCount'] = User::count();
        $viewData['eventCount'] = Event::count();
        $viewData['productCount'] = Product::count();
        return view('admin.index')->with('viewData', $viewData);
    }


}
