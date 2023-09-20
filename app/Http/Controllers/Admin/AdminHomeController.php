<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Home';

        return view('admin.index')->with('viewData', $viewData);
    }
}
