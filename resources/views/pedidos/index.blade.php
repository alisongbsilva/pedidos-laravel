@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Pedidos</h1>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pedidoModal" onclick="openModal()">Novo Pedido</button>
</div>

<table class="table table-striped" id="pedidosTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Data Pedido</th>
            <th>Data Entrega</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dados serão inseridos aqui via JS -->
    </tbody>
</table>

<!-- Modal para Criar/Editar Pedido -->
<div class="modal fade" id="pedidoModal" tabindex="-1" aria-labelledby="pedidoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="pedidoForm" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pedidoModalLabel">Novo Pedido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="pedidoId" name="pedidoId" />
        <div class="mb-3">
          <label for="nome_cliente" class="form-label">Nome do Cliente</label>
          <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required />
        </div>
        <div class="mb-3">
          <label for="data_pedido" class="form-label">Data do Pedido</label>
          <input type="date" class="form-control" id="data_pedido" name="data_pedido" required />
        </div>
        <div class="mb-3">
          <label for="data_entrega" class="form-label">Data da Entrega</label>
          <input type="date" class="form-control" id="data_entrega" name="data_entrega" />
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" id="status" name="status" required>
            <option value="pendente">Pendente</option>
            <option value="entregue">Entregue</option>
            <option value="cancelado">Cancelado</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="btnSave">Salvar</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
const apiBaseUrl = '/api/pedidos';

const pedidoModal = new bootstrap.Modal(document.getElementById('pedidoModal'));
const pedidoForm = document.getElementById('pedidoForm');
const pedidosTableBody = document.querySelector('#pedidosTable tbody');

let editId = null;

function openModal(pedido = null) {
    editId = null;
    pedidoForm.reset();
    document.getElementById('pedidoModalLabel').textContent = 'Novo Pedido';

    if (pedido) {
        editId = pedido.id;
        document.getElementById('pedidoModalLabel').textContent = 'Editar Pedido #' + editId;
        document.getElementById('nome_cliente').value = pedido.nome_cliente;
        document.getElementById('data_pedido').value = pedido.data_pedido;
        document.getElementById('data_entrega').value = pedido.data_entrega || '';
        document.getElementById('status').value = pedido.status;
    }

    pedidoModal.show();
}

async function fetchPedidos() {
    const res = await fetch(apiBaseUrl);
    const pedidos = await res.json();
    pedidosTableBody.innerHTML = '';
    pedidos.forEach(p => {
        pedidosTableBody.innerHTML += `
            <tr>
                <td>${p.id}</td>
                <td>${p.nome_cliente}</td>
                <td>${p.data_pedido}</td>
                <td>${p.data_entrega ?? ''}</td>
                <td>${p.status}</td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick='openModal(${JSON.stringify(p)})'>Editar</button>
                    <button class="btn btn-sm btn-danger" onclick="deletePedido(${p.id})">Excluir</button>
                </td>
            </tr>
        `;
    });
}

async function deletePedido(id) {
    if (!confirm('Tem certeza que deseja deletar o pedido #' + id + '?')) return;
    await fetch(`${apiBaseUrl}/${id}`, { method: 'DELETE' });
    fetchPedidos();
}

pedidoForm.addEventListener('submit', async e => {
    e.preventDefault();
    const formData = new FormData(pedidoForm);
    const data = Object.fromEntries(formData.entries());

    const method = editId ? 'PUT' : 'POST';
    const url = editId ? `${apiBaseUrl}/${editId}` : apiBaseUrl;

    const res = await fetch(url, {
        method,
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    });

    if (!res.ok) {
        alert('Erro ao salvar pedido!');
        return;
    }

    pedidoModal.hide();
    fetchPedidos();
});

document.addEventListener('DOMContentLoaded', fetchPedidos);
</script>
@endpush
