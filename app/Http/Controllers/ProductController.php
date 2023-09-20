<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

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
            'product' => $product,
        ];

        return view('product.show')->with('viewData', $viewData);
    }

    public function getProductsOrderedAsc(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products Ordered by Quantity';
        $viewData['products'] = Product::orderBy('quantity', 'asc')->get();

        return view('product.ordered-asc')->with('viewData', $viewData);
    }

    public function getProductsOrderedDsc(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products Ordered by Quantity';
        $viewData['products'] = Product::orderBy('quantity', 'desc')->get();

        return view('product.ordered-dsc')->with('viewData', $viewData);
    }

    public function getProductsOrderedNameAsc(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products Ordered by Quantity';
        $viewData['products'] = Product::orderBy('name', 'asc')->get();

        return view('product.ordered-name-asc')->with('viewData', $viewData);
    }

    public function getProductsOrderedNameDsc(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products Ordered by Quantity';
        $viewData['products'] = Product::orderBy('name', 'desc')->get();

        return view('product.ordered-name-dsc')->with('viewData', $viewData);
    }
}
