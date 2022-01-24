<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frete extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['produto', 'endereco_entrega', 
            'id_loja_vendedora', 'dia_frete', 'horario_frete', 'status_frete',
            'levar_maquina','valor_frete', 'observacao', 'estoque_saida', 'done'];

    public function loja()
    {
       return $this->belongsTo(Loja::class, 'id_loja_vendedora', 'id');
    }
}
