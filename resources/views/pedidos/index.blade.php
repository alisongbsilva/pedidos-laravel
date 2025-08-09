@extends('layouts.app')

@section('content')
<h1>Pedidos</h1>
<a href="{{ route('pedidos.create') }}">Novo Pedido</a>
<table>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Data Pedido</th>
        <th>Data Entrega</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    @foreach($pedidos as $pedido)
    <tr>
        <td>{{ $pedido->id }}</td>
        <td>{{ $pedido->nome_cliente }}</td>
        <td>{{ $pedido->data_pedido }}</td>
        <td>{{ $pedido->data_entrega }}</td>
        <td>{{ $pedido->status }}</td>
        <td>
            <a href="{{ route('pedidos.edit', $pedido->id) }}">Editar</a>
            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection