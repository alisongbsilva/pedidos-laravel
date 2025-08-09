<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoApiController extends Controller
{
    public function index() {
        return Pedido::all();
    }

    public function store(Request $request) {
        return Pedido::create($request->all());
    }

    public function show($id) {
        return Pedido::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());
        return $pedido;
    }

    public function destroy($id) {
        Pedido::destroy($id);
        return response()->json(['message' => 'Pedido deletado']);
    }
}