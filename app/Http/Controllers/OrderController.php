<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('product.order');
    }
}