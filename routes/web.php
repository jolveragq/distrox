<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/{any?}', function ($any = null) {
    $fileExtensions = ['js', 'css', 'ico', 'png', 'jpg', 'jpeg', 'svg', 'webp', 'woff2', 'woff', 'ttf', 'eot', 'json', 'map'];

    $any = ltrim($any ?? '', '/');

    if (Str::length($any) === 0) {
        $indexPath = storage_path('app/public/index.html');
        if (File::exists($indexPath)) {
            return response(File::get($indexPath))->header('Content-Type', 'text/html');
        }
        abort(404);
    }

    $storagePath = storage_path('app/public/' . $any);
    $extension = pathinfo($storagePath, PATHINFO_EXTENSION);

    if (in_array($extension, $fileExtensions)) {
        if (File::exists($storagePath)) {
            $mimeTypes = [
                'js' => 'application/javascript',
                'css' => 'text/css',
                'json' => 'application/json',
                'png' => 'image/png',
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'svg' => 'image/svg+xml',
                'ico' => 'image/x-icon',
                'webp' => 'image/webp',
                'woff2' => 'font/woff2',
                'woff' => 'font/woff',
                'ttf' => 'font/ttf',
                'eot' => 'application/vnd.ms-fontobject',
                'map' => 'application/json',
            ];

            $mimeType = $mimeTypes[$extension] ?? File::mimeType($storagePath);

            return response()->file($storagePath, ['Content-Type' => $mimeType]);
        } else {
            abort(404);
        }
    }

    // Para rutas normales
    $indexPath = storage_path('app/public/index.html');
    if (File::exists($indexPath)) {
        return response(File::get($indexPath))->header('Content-Type', 'text/html');
    }

    abort(404);
})->where('any', '.*')->name('angular');
