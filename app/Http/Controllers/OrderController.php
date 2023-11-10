<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(string $order = null): View
    {
      $viewData = [];
      $viewData['title'] = 'Ordenes';

      $viewData['orders'] = Order::all();

      return view('order.index')->with('viewData', $viewData);
    }
}
