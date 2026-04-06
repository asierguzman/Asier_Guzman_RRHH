<?php

namespace Database\Factories;

use App\Models\Terminacion;
use App\Models\Contrato;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerminacionFactory extends Factory
{
    protected $model = Terminacion::class;

    public function definition(): array
    {
        return [
            'contrato_id' => Contrato::factory(),
            'fecha_terminacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'motivo' => $this->faker->sentence(),
        ];
    }
}