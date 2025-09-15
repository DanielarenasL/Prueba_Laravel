<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
    ];

    public function detalles() {
        return $this->hasMany(PedidoDetalle::class, 'producto_id');
    }
}
