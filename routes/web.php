<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-submit', function () {
    return view('test-submit');
});

Route::post('/submit', function () {
    return "form has been submitted";
});

Route::put('/update', function () {
    return "Data has been updated";
});

Route::delete('/remove', function () {
    return "data was removed";
});

// 3 halaman
Route::prefix('admin')->group(function () {
    Route::get('/mahasiswa', function () {
        return view('admin.mahasiswa');
    });

    Route::get('/karyawan', function () {
        return view('admin.karyawan');
    });

    Route::get('/dosen', function () {
        return view('admin.dosen');
    });
});

Route::match(['get', 'post'], '/feedback', function (Request $request) {
    if ($request->isMethod('post')) {
        return 'Form submitted';
    }
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');
    return "Received name: $name";
});