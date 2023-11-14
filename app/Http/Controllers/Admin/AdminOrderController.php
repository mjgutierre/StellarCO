<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('messages.orders');
        $viewData['orders'] = Order::all();

        return view('admin.orders.index')->with('viewData', $viewData);
    }
}
