<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;

class CustomizationController extends Controller
{
    public function index(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'title' => 'Customize',
            'product' => $product,
        ];

        return view('customization.index')->with('viewData', $viewData);
    }
}
