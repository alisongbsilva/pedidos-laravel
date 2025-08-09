@extends('layouts.app')

@section('content')
<h1>{{ isset($pedido) ? 'Editar Pedido' : 'Novo Pedido' }}</h1>

<form action="{{ isset($pedido) ? route('pedidos.update', $pedido->id) : route('pedidos.store') }}" method="POST">
    @csrf
    @if(isset($pedido)) @method('PUT') @endif

    <label>Nome do Cliente</label>
    <input type="text" name="nome_cliente" value="{{ $pedido->nome_cliente ?? '' }}">

    <label>Data Pedido</label>
    <input type="date" name="data_pedido" value="{{ $pedido->data_pedido ?? '' }}">

    <label>Data Entrega</label>
    <input type="date" name="data_entrega" value="{{ $pedido->data_entrega ?? '' }}">

    <label>Status</label>
    <select name="status">
        <option value="pendente" {{ (isset($pedido) && $pedido->status == 'pendente') ? 'selected' : '' }}>Pendente</option>
        <option value="entregue" {{ (isset($pedido) && $pedido->status == 'entregue') ? 'selected' : '' }}>Entregue</option>
        <option value="cancelado" {{ (isset($pedido) && $pedido->status == 'cancelado') ? 'selected' : '' }}>Cancelado</option>
    </select>

    <button type="submit">Salvar</button>
</form>
@endsection