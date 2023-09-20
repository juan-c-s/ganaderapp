<?php

namespace App\Http\Controllers;
// JUANCAMILO
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Review;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function __construct()
    {
        // Assign to ALL methods in this Controller
        $this->middleware('auth');
    }
    public function index(): View
    {
        $viewData = [];
        $viewData["reviews"] = Review::all();
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
        Review::validate($request);
        // //here will be the code to call the model and save it to the database
        Review::createReview($request);
        return back();
    }

    public function delete(Request $request):View{
        Product::destroy($request->id);
        return $this->index();
    }
}