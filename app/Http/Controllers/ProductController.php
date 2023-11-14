<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(string $order = null): View
    {
        $viewData = [];
        $viewData['title'] = trans('messages.Products');

        switch ($order) {
            case 'quantasc':
                $viewData['products'] = Product::orderBy('quantity', 'asc')->get();
                $orderingDescription = trans('messages.QuantityAscending');
                break;
            case 'quantdesc':
                $viewData['products'] = Product::orderBy('quantity', 'desc')->get();
                $orderingDescription = trans('messages.QuantityDescending');
                break;
            case 'nameasc':
                $viewData['products'] = Product::orderBy('name', 'asc')->get();
                $orderingDescription = trans('messages.NameAscending');
                break;
            case 'namedesc':
                $viewData['products'] = Product::orderBy('name', 'desc')->get();
                $orderingDescription = trans('messages.NameDescending');
                break;
            default:
                $viewData['products'] = Product::all();
                $orderingDescription = '';
        }

        if ($orderingDescription) {
            $viewData['title'] .= ' - '.trans('messages.OrderedBy').' '.$orderingDescription;
        }

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'title' => trans('messages.Show'),
            'product' => $product,
        ];

        return view('product.show')->with('viewData', $viewData);
    }
}
