<?php

use Illuminate\Support\Facades\Route;

Route::get('/pedidos', function () {
    return view('pedidos.index');
})->name('pedidos.index');