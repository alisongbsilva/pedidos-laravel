<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index() {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create() {
        return view('pedidos.form');
    }

    public function store(Request $request) {
        Pedido::create($request->all());
        return redirect()->route('pedidos.index');
    }

    public function edit($id) {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.form', compact('pedido'));
    }

    public function update(Request $request, $id) {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());
        return redirect()->route('pedidos.index');
    }

    public function destroy($id) {
        Pedido::destroy($id);
        return redirect()->route('pedidos.index');
    }
}