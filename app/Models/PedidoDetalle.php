<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    protected $table = 'pedidoDetalle';
    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public function pedido() {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    public function producto() {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
