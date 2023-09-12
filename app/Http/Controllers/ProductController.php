<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
  public function index(): View
  {
    $viewData = [];
    $viewData['title'] = 'Products';
    $viewData['products'] = Product::all();
    return view('product.index')->with('viewData', $viewData);
  }

  public function show(int $id): View
  {
    $product = Product::findOrFail($id);
    $viewData = [
      'title' => $product['name'],
      'product' => $product
    ];

    return view('product.show')->with('viewData', $viewData);
  }
}
