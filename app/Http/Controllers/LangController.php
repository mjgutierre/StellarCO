<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function change($locale)
    {
        $supportedLocales = ['es', 'en'];

        if (! in_array($locale, $supportedLocales)) {
            return redirect()->back()->withErrors('Locale not supported.');
        }

        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back()->with('success', trans('messages.langChanged'));
    }
}
