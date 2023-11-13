<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(): View
    {
      $viewData = [];
      $viewData['title'] = 'Ordenes';
      $viewData['orders'] =  Auth::user()->orders;

      return view('order.index')->with('viewData', $viewData);
    }
}
