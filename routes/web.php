<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

Route::get('/{any}', function () {
    $path = public_path('frontend/browser/index.html');
    if (!File::exists($path)) {
        abort(404, 'Angular app not built.');
    }

    return File::get($path);
})->where('any', '^(?!api).*$')->name('angular');
