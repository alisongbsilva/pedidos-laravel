<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('pedidos.index');
});

Route::get('/pedidos', function () {
    return view('pedidos.index');
})->name('pedidos.index');