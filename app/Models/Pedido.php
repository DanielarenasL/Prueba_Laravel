<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'cliente_id',
        'fecha',
        'total'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function detalles() {
        return $this->hasMany(PedidoDetalle::class, 'pedido_id'); 
    }
}
