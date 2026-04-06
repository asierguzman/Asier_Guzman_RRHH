<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prorroga extends Model
{
    use HasFactory;

    protected $table = 'prorrogas';
    
    protected $fillable = [
        'contrato_id',
        'tipo',
        'nueva_fecha_fin',
        'valor_adicional',
        'descripcion'
    ];

    protected $casts = [
        'nueva_fecha_fin' => 'date',
        'valor_adicional' => 'decimal:2'
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}