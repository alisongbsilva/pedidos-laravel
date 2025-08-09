<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'nome_cliente',
        'data_pedido',
        'data_entrega',
        'status'
    ];
}