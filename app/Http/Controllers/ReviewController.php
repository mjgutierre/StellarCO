<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function save(Request $request, $productId): RedirectResponse
    {
        $product = Product::findOrFail($productId);

        Review::validate($request);

        Review::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'product_id' => $product->getId(),
        ]);

        return redirect()->back()->with('success', trans('messages.reviewSaved'));
    }
}
