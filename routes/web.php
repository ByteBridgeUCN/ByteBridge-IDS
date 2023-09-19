<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login.php');

Route::get('storage/images/{filename}', function ($filename) {
    $path = storage_path('app/public/images/' . $filename);

    if (!Storage::exists('public/images/' . $filename) || !file_exists($path)) {
        abort(404);
    }

    $file = Storage::get('public/images/' . $filename);
    $type = Storage::mimeType('public/images/' . $filename);

    $response = response($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->where('filename', '.*');
