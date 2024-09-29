<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('input-age', function () {
    return 'halaman input umur';
});

Route::post('input-age', function (Request $request) {
    $request->validate([
        'age' => ['required', 'numeric', 'integer', 'between:20,50']
    ]);

    return response()->json([
        'message' => 'Age successfully submitted!',
        'data'    => [
                'age' => $request->age
            ]
        ]);
});
