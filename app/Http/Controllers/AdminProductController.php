<?php

namespace App\Http\Controllers;

// JUANCAMILO
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Util\ImageUtil;


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

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = __('Add Cow');
        $viewData['subtitle'] = __('Add Cow');

        return view('admin.createProduct')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Product::validate($request);
        $request->image = ImageUtil::img2htmlbase64($request, 'image');
        Product::createProduct($request);

        return redirect()->route('admin.index');
    }

    public function updateProduct(Request $request): RedirectResponse
    {
        Product::updateProduct($request);

        return redirect()->route('admin.index');
    }


    public function delete(string $id): RedirectResponse
    {
        Product::destroy($id);
        return redirect()->route('admin.index');
    }
}
