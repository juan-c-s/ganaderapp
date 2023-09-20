<?php

namespace App\Http\Controllers;

// JUANCAMILO
// SIMON
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderItemController extends Controller
{
    public function __construct()
    {
        // Assign to ALL methods in this Controller
        $this->middleware('auth');
    }

    public function index(Request $request): view
    {

        $products = Product::all();
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data'); //we get the products stored in session
        if ($cartProductData) {
            foreach ($products as $key => $product) {
                if (in_array($key, array_keys($cartProductData))) {
                    $cartProducts[$key] = $product;
                }
            }
        }
        $total = 0;
        foreach ($cartProducts as $key => $product) {
            $total += $product->getPrice();
        }

        $viewData = [];
        $viewData['products'] = $products;
        $viewData['cartProducts'] = $cartProducts;
        $viewData['totalCart'] = $total;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function remove(string $id, Request $request)
    {
        $cartProductData = $request->session()->get('cart_product_data');

        if (isset($cartProductData[$id])) {

            unset($cartProductData[$id]);
            $request->session()->put('cart_product_data', $cartProductData);

            return back()->with('success_msg', 'Product deleted from cart.');
        }

        return back()->with('error_msg', 'The product does not exit on the cart.');
    }

    public function add(Request $request, string $id): RedirectResponse
    {

        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = $id;
        $request->session()->put('cart_product_data', $cartProductData);

        return back()->with('success_msg', 'Product added at the cart');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart_product_data');

        return back();
    }
}
