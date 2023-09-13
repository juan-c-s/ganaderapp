<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
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
        // dd($request);
        return redirect()->route('admin.index');
    }
    public function deleteProduct(Request $request): Response
    {
        
        return redirect()->route('admin.index');
    }

}
