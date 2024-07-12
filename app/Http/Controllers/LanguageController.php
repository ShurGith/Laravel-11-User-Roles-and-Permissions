<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($lang)
    {
        Session::put([
            'applocale' => $lang,
            'locale' => $lang,
        ]);
        return Redirect::back();
    }
}
