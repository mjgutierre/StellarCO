<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class AdminStatisticsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = trans('messages.adminStatistics');
        $viewData['totalInventory'] = Product::sum('quantity');
        $viewData['totalValueOfInventory'] = Product::sum('price');
        $viewData['averageQuantity'] = round(Product::avg('quantity'), 2);
        $viewData['usersCount'] = User::where('role', 'customer')->count();

        $viewData['usersPreview'] = User::where('role', 'customer')->take(3)->get();

        return view('admin.statistics.index')->with('viewData', $viewData);
    }
}
