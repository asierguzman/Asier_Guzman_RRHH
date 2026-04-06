<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Terminacion;
use App\Models\Contrato;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TerminacionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_terminacion()
    {
        $contrato = Contrato::factory()->create();

        $terminacion = Terminacion::create([
            'contrato_id' => $contrato->id,
            'fecha_terminacion' => now(),
            'motivo' => 'Renuncia voluntaria',
        ]);

        $this->assertInstanceOf(Terminacion::class, $terminacion);
        $this->assertDatabaseHas('terminaciones', ['motivo' => 'Renuncia voluntaria']);
    }

    /** @test */
    public function puede_listar_terminaciones()
    {
        Terminacion::factory()->count(3)->create();

        $terminaciones = Terminacion::all();

        $this->assertCount(3, $terminaciones);
    }

    /** @test */
    public function un_contrato_no_puede_tener_dos_terminaciones()
    {
        $contrato = Contrato::factory()->create();

        Terminacion::create([
            'contrato_id' => $contrato->id,
            'fecha_terminacion' => now(),
            'motivo' => 'Primera terminación',
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Terminacion::create([
            'contrato_id' => $contrato->id,
            'fecha_terminacion' => now(),
            'motivo' => 'Segunda terminación',
        ]);
    }
}