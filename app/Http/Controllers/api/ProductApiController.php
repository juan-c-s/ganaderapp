<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public function supplierFilter(Request $request): JsonResponse
    {
        $allProducts = $request->input('products');
        $filterSupplier = $request->input('supplier');
        if ($filterSupplier == '') {
            return response()->json($allProducts);
        }
        else {
            $filtered = array_filter($allProducts, function($object) use ($filterSupplier) {
                return $object['supplier'] == $filterSupplier;
            });
            return response()->json($filtered);
        }
    }
}