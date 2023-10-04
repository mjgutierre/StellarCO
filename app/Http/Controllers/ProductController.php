<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(string $order = null): View
    {
        $viewData = [];
        $viewData['title'] = 'Products';
    
        switch ($order) {
            case 'quantasc':
                $viewData['products'] = Product::orderBy('quantity', 'asc')->get();
                $orderingDescription = 'Quantity Ascending';
                break;
            case 'quantdesc':
                $viewData['products'] = Product::orderBy('quantity', 'desc')->get();
                $orderingDescription = 'Quantity Descending';
                break;
            case 'nameasc':
                $viewData['products'] = Product::orderBy('name', 'asc')->get();
                $orderingDescription = 'Name Ascending';
                break;
            case 'namedesc':
                $viewData['products'] = Product::orderBy('name', 'desc')->get();
                $orderingDescription = 'Name Descending';
                break;
            default:
                $viewData['products'] = Product::all();
                $orderingDescription = '';
        }
    
        if ($orderingDescription) {
            $viewData['title'] .= ' - Ordered by ' . $orderingDescription;
        }
    
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
}
