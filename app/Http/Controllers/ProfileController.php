<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(): View
    {
      $viewData = [];
      $viewData['title'] = trans('messages.profile');
      $viewData['user'] =  Auth::user();

      return view('profile.index')->with('viewData', $viewData);
    }
}
