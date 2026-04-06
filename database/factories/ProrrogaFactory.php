<?php

namespace Database\Factories;

use App\Models\Prorroga;
use App\Models\Contrato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProrrogaFactory extends Factory
{
    protected $model = Prorroga::class;

    public function definition(): array
    {
        $tipo = $this->faker->randomElement(['Tiempo', 'Valor']);
        
        return [
            'contrato_id' => Contrato::factory(),
            'tipo' => $tipo,
            'nueva_fecha_fin' => $tipo === 'Tiempo' ? $this->faker->dateTimeBetween('now', '+1 year') : null,
            'valor_adicional' => $tipo === 'Valor' ? $this->faker->randomFloat(2, 100000, 1000000) : null,
            'descripcion' => $this->faker->sentence(),
        ];
    }
}