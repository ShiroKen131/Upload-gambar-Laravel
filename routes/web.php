<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GambarController;

Route::redirect('/', '/gambar');
Route::get('/', function () {
    return redirect()->route('gambar.index');
});

Route::resource('gambar', GambarController::class);
