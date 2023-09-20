<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OrderItemController extends Controller
{
    public function index(): View
    {
        return view('product.cart');
    }
}