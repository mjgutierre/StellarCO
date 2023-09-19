<?php

namespace App\Http\Controllers\Admin; 

use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminStatisticsController extends Controller {
    public function index() {
        $viewData = [];
        $viewData['title'] = 'Admin Statistics';
        $viewData['rockets'] = Product::sum('quantity'); 
        $viewData['countries'] = Product::sum('price');
        $viewData['rocketsAvg'] = round(Product::avg('quantity'),2);
        $viewData['usersCount'] = User::where('role', 'Customer')->count();

        return view('admin.statistics.index')->with('viewData', $viewData);
    }
    
    public function users(): View
    {
        $viewData = [];
        $viewData['title'] = 'Customer Users List';
        $viewData['users'] = User::all();

        return view('admin.statistics.user')->with('viewData', $viewData);
    }
}
