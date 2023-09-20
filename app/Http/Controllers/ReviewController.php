<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{

  public function save(Request $request, $productId) : RedirectResponse
  {
    $product = Product::findOrFail($productId);

    Review::validate($request);
    
    Review::create([
        'title' => $request['title'],
        'description' => $request['description'],
        'product_id' => $productId
    ]);

    return redirect()->back();
  }
}
