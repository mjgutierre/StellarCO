<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;

class LangController extends Controller{
    public function change($locale){
        App::setLocale($locale);
        session()->put('locale', $locale);
        return Redirect::back();
    }
}

