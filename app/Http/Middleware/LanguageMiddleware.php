<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware{
    public function handle($request, Closure $next){
        if(session::get('locale') != null){
            App::setLocale(session::get('locale'));
        }
        else{
            Session::put('locale','en');
            App::setLocale(session::get('locale'));
        }
        return $next($request);
    }
}