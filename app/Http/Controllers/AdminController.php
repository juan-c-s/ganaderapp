<?php

namespace App\Http\Controllers;
// JUANCAMILO
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Event;

class AdminController extends Controller
{
    public function __construct()
    {
        // Assign to ALL methods in this Controller
        $this->middleware('auth');
    }
    public function index(Request $request): View
    {
        $viewData =[];
        $viewData["title"] = "About us - Online Store";
        $viewData["subtitle"] = "About us - Online Store";
        $viewData["description"] = "This is an about page ...";
        $viewData["author"] = "Developed by: Your Name";
        return view('admin.index')->with('viewData', $viewData);
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
