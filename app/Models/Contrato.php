<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrato extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contratos';
    
    protected $fillable = [
        'colaborador_id',
        'tipo_contrato',
        'fecha_inicio',
        'fecha_fin',
        'cargo',
        'salario',
        'estado'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'salario' => 'decimal:2'
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }
}