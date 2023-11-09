<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function locale($locale)
    {
        App::setLocale($locale);
    }
}