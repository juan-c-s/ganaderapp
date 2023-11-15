<?php

namespace App\Http\Controllers;

// JUANCAMILO
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function profile()
    { 
        $user = auth::user();
        $viewData = [];
        $viewData['title'] = 'Profile';
        $viewData['subtitle'] = 'User Profile';
        $viewData['user'] = $user;
        
        return view('user.profile')->with('viewData',$viewData);
    }

    public function delete(Request $request): RedirectResponse
    {
        User::deleteById($request);

        return redirect()->route('home.index');
    }

    public function addCash(Request $request){
        $user = auth::user();
        $wallet = $user->getWallet() + $request->wallet;
        $user->setWallet($wallet);
        $user->save();

        return back();
    }
}
