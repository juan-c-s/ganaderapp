<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Util\ImageUtil;
use Illuminate\Http\RedirectResponse;
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
    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Add Cow";

        return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        Product::validate($request);
        $data = $request->only(["title","price","description","rating","category","supplier"]);
        $data['image'] = ImageUtil::img2htmlbase64($request, 'image');
        Product::create($data);
        return back();
    }
    
    public function delete(Request $request):RedirectResponse
    {
        Product::deleteById($request);
        return redirect()->route('product.index');
    }
}


