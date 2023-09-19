<?php

namespace App\Http\Controllers\Admin; 

use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStatisticsController extends Controller {
    public function index() {
        $viewData = [];
        $viewData['title'] = 'Admin Statistics';
        $viewData['rockets'] = Product::sum('quantity'); 
        $viewData['countries'] = Product::sum('price');
        $viewData['rocketsAvg'] = round(Product::avg('quantity'),2);
        
        return view('admin.statistics.index')->with('viewData', $viewData);
    }
}