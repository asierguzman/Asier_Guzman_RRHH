<?php

namespace Database\Factories;

use App\Models\Contrato;
use App\Models\Colaborador;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratoFactory extends Factory
{
    protected $model = Contrato::class;

    public function definition(): array
    {
        return [
            'colaborador_id' => Colaborador::factory(),
            'tipo_contrato' => $this->faker->randomElement(['Fijo', 'Indefinido', 'Prestación de Servicios']),
            'fecha_inicio' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'fecha_fin' => $this->faker->optional()->dateTimeBetween('now', '+2 years'),
            'cargo' => $this->faker->jobTitle(),
            'salario' => $this->faker->randomFloat(2, 1500000, 8000000),
            'estado' => 'Activo',
        ];
    }
}