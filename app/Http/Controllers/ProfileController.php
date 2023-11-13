<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(string $order = null): View
    {
      $product = Product::findOrFail($id);
      $viewData = [
          'title' => trans('messages.Show'),
          'product' => $product,
      ];

      return view('product.show')->with('viewData', $viewData);
    }
}
