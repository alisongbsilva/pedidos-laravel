<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return redirect()->route('pedidos.index');
});

Route::resource('pedidos', PedidoController::class);