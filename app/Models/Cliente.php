<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class, 'cliente_id');
    }
}
