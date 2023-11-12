<?php

/** Donovan Castrillon */

// DONOVAN

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function getAllProducts(Request $request): JsonResponse
    {
        $products = Product::all();
        $withImage = $request->input('image');
        if ($withImage == 'true') {
            return response()->json($products);
        }
        else if ($withImage == 'false' || $withImage == null){
            for ($i=0; $i < count($products); $i++) {
                unset($products[$i]['image']);
            }
            return response()->json($products);
        }
    }

    public function supplierFilter(Request $request): JsonResponse
    {
        $allProducts = $request->input('products');
        $filterSupplier = $request->input('supplier');
        if ($filterSupplier == '') {
            return response()->json($allProducts);
        } elseif ($allEvents == null) {
            return response()->json();
        } else {
            $filtered = array_filter($allProducts, function ($object) use ($filterSupplier) {
                return $object['supplier'] == $filterSupplier;
            });

            return response()->json($filtered);
        }
    }
}
