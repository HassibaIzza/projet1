<?php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; 
use Illuminate\Http\Request;


Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back()->with('message', 'Language changed to ' . $locale);
})->name('lang.switch');

Route::get('/test-lang', function () {
    return session('locale', 'non défini');
});

app()->setlocale('en');