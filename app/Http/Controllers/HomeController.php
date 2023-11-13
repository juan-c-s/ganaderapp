<?php

namespace App\Http\Controllers;

// JUANCAMILO
use Illuminate\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        $viewData = [];
        $viewData['title'] = __('About us - Online Store');
        $viewData['subtitle'] = __('About us - Online Store');
        $viewData['description'] = __('This is an about page ...');
        $viewData['author'] = __('Developed By');
        
        return view('home.about')->with('viewData', $viewData);
    }
    
    public function toggleLang(Request $request): RedirectResponse
    {
        if(App::getLocale() == 'en'){
            App::setLocale('es');
            session()->put('locale', 'es');
        }else{
            App::setLocale('en');
            session()->put('locale', 'en');
        }
        return back();

    }
}
