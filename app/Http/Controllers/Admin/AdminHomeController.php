<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller {
    public function index() {
        $viewData = [];
        $viewData['title'] = 'Admin Home';
        return view('test.admin.index')->with('viewData', $viewData);
    }
}