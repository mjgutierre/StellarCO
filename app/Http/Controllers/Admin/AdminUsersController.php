<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

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
