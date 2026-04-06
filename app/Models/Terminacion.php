<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Terminacion extends Model
{
    use HasFactory;

    protected $table = 'terminaciones';
    
    protected $fillable = [
        'contrato_id',
        'fecha_terminacion',
        'motivo'
    ];

    protected $casts = [
        'fecha_terminacion' => 'date'
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}