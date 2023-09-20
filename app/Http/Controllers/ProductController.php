<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function __construct()
    {
        // Assign to ALL methods in this Controller
        $this->middleware('auth');
    }

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Cows - Ganaderapp";
        $viewData["subtitle"] =  "List of Cows";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View
    {
        $viewData = [];
        if($id > 0){
            $product = Product::findOrFail($id);
            $viewData["title"] = $product->getTitle()." - Ganaderapp";
            $viewData["subtitle"] =  $product->getTitle()." - Cow information";
            $viewData["products"] = $product;
            $viewData["reviews"] = $product->getReviews();

            return view('product.show')->with("viewData", $viewData);
        }else{
            return view('home.index')->with("viewData", $viewData);
        }

    }

    public function update(string $id):View
    {
        $viewData = [];
        if($id > 0){
            $product = Product::findOrFail($id);
            $viewData["title"] = $product->getTitle()." - Ganaderapp";
            $viewData["subtitle"] =  $product->getTitle()." - Cow information";
            $viewData["product"] = $product;
            return view('product.update')->with("viewData", $viewData);
        }else{
            return view('home.index')->with("viewData", $viewData);
        }
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Add Cow";

        return view('product.create')->with("viewData",$viewData);
    }

    public function updateProduct(Request $request): RedirectResponse
    {
        Product::updateProduct($request);
        return redirect()->route('product.index');
    }

    public function save(Request $request): RedirectResponse
    {
        Product::validate($request);
        //here will be the code to call the model and save it to the database
        Product::createProduct($request);
        return redirect()->route('product.index');
    }

    public function delete(Request $request):RedirectResponse
    {
        Product::deleteById($request);
        return redirect()->route('product.index');
    }
}


