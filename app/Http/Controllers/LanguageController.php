<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller

{
    /**
 * @param $lang
 *
 * @return RedirectResponse
 */
    public function swap($lang)
    {
        // Almacenar el lenguaje ENG la session
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
