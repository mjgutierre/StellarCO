<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::latest()->take(4)->get();

        return view('home.index')->with('viewData', $viewData);
    }
}
