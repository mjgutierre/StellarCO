<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'link' => url("/products/{$product->id}"),
            ];
        });
    
        return response()->json($products, 200);
    }
}
