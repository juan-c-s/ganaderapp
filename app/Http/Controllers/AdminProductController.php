<?php

namespace App\Http\Controllers;

// JUANCAMILO
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;


use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;


class AdminProductController extends Controller
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
        $viewData['products'] = Product::all();
        
        return view('admin.product')->with('viewData', $viewData);
    }

    public function update(string $id): View
    {
        $viewData = [];
        if ($id > 0) {
            $product = Product::findOrFail($id);
            $viewData['title'] = $product->getTitle().' - Ganaderapp';
            $viewData['subtitle'] = $product->getTitle().' - '.__('Cow information');
            $viewData['product'] = $product;
        return view('admin.updateProduct')->with('viewData',$viewData);
        }else{
            return view('admin.index')->with('viewData', $viewData);
        }
    }

    public function updateProduct(Request $request): RedirectResponse
    {
        Product::updateProduct($request);

        return redirect()->route('product.index');
    }


    public function delete(string $id): RedirectResponse
    {
        Product::destroy($id);
        return redirect()->route('admin.index');
    }
}
