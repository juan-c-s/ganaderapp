<?php

namespace App\Http\Controllers;

// JUANCAMILO
// SIMON
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    public function __construct()
    {
        // Assign to ALL methods in this Controller
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->session()->get('cart_product_data'))
        {
            $cartProducts = [];
            $cartProductData = $request->session()->get('cart_product_data');
            $cartProducts = Product::whereIn('id',$cartProductData)->get();
            $total = 0;
            
            foreach ($cartProducts as $product) {
                $quantity = $product->getQuantity();
                $total += $product->getPrice()*$quantity;
            }

            $viewData = [];
            $viewData['title'] = __('Cart');
            $viewData['subtitle'] = __('Cart');

            $viewData['cartProducts'] = $cartProducts;
            $viewData['totalCart'] = $total;

            return view('cart.index')->with('viewData', $viewData);
        }
        else
        {
            return back()->with('alert_msg',__('There is nothing in the cart, go to Marketplace'));
        }
    }

    public function sum(Request $request, string $id)
    {
        $cartProducts = [];
        $cartProducts = Product::findOrFail($id);
            $quantity = $cartProducts->getQuantity();
            $quantity += 1;
            $cartProducts->setQuantity($quantity);
            $cartProducts->save();
        

        return back();
    }

    public function res(Request $request, string $id)
    {
        $cartProducts = [];
        $cartProducts = Product::findOrFail($id);
            $quantity = $cartProducts->getQuantity();
            if ($quantity <= 1){
                $quantity = 1;
                $cartProducts->setQuantity($quantity);
                $cartProducts->save();
                return back()->with('alert_msg', __('You can`t subtract more'));
            }
            else{
                $quantity -= 1;
                $cartProducts->setQuantity($quantity);
                $cartProducts->save();
            }

        return back();
    }

    public function remove(string $id, Request $request)
    {   
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data'); //we get the products stored in session
        $cartProducts = Product::findOrFail($id);
        $quantity = $cartProducts->getQuantity();

            if (isset($cartProductData[$id])) {

                unset($cartProductData[$id]);
                $request->session()->put('cart_product_data', $cartProductData);

                $quantity = 0;
                $cartProducts->setQuantity($quantity);
                $cartProducts->save();

                return back()->with('success_msg', __('Product deleted from cart.'));
            }
        

        return back()->with('error_msg', __('The product does not exit on the cart.'));
    }

    public function add(Request $request, string $id): RedirectResponse
    {  
        $cartProducts = [];
        $cartProducts = Product::findOrFail($id);
        $quantity = $cartProducts->getQuantity();
        $quantity += 1;
        $cartProducts->setQuantity($quantity);
        $cartProducts->save();

        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = $id;
        $request->session()->put('cart_product_data', $cartProductData);

        return back()->with('success_msg', __('Product added at the cart'));
    }

    public function clear(Request $request)
    {
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data'); //we get the products stored in session
        $cartProducts = Product::whereIn('id',$cartProductData)->get();
        foreach ($cartProducts as $product){
            $quantity = $product->getQuantity();

            if (isset($cartProductData[$product->getId()])) {

                unset($cartProductData[$product->getId()]);
                $request->session()->put('cart_product_data', $cartProductData);

                $quantity = 0;
                $product->setQuantity($quantity);
                $product->save();
            }
        }
        

        return redirect()->route('product.index');
    }

    public function checkout(Request $request){
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data'); //we get the products stored in session
        $cartProducts = Product::whereIn('id',$cartProductData)->get();
        $user = auth::user(); 
        $wallet = $user->getWallet();
        $total = 0;
        
        foreach ($cartProducts as $product) {
            $quantity = $product->getQuantity();
            $total += $product->getPrice()*$quantity;
        }

        if ($total == 0){
            return back()->with('alert_msg', __('You dont have any product in your cart'));
        }
        else if($wallet < $total)
        {
            return back()->with('alert_msg',__('You dont have enought cash to buy, please check your wallet'));
        }
        else
        {
            $Order = new Order();
            $Order->setTotal($total);
            $Order->setUserId($request->user_id);
            $wallet -= $wallet - $total;
            $user->setWallet($wallet);
            $Order->save();
        }

        return redirect()->route('cart.clear')->with('success_msg', __('Buy complete'));
    }
}