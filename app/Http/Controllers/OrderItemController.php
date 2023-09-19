<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class OrderItemController extends Controller
{
    public function index()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart.index')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request){
        \Cart::add(array(
            'name' => $request->title,
            'id' => $request->id,
            'price' => $request->price,
            'image' => $request->image,
            'description' => $request->description,
            'rating' => $request->rating,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'supplier' => $request->supplier
        ));
        return back()->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

}