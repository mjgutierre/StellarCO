<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('messages.usersList');
        $viewData['users'] = User::all();

        return view('admin.users.index')->with('viewData', $viewData);
    }
}