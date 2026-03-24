<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Contrato;
use App\Models\Colaborador;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContratoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_contrato()
    {
        $colaborador = Colaborador::factory()->create();

        $contrato = Contrato::create([
            'colaborador_id' => $colaborador->id,
            'tipo_contrato' => 'Fijo',
            'fecha_inicio' => '2024-01-01',
            'fecha_fin' => '2024-12-31',
            'cargo' => 'Desarrollador',
            'salario' => 3000000,
        ]);

        $this->assertInstanceOf(Contrato::class, $contrato);
        $this->assertEquals('Desarrollador', $contrato->cargo);
        $this->assertDatabaseHas('contratos', ['cargo' => 'Desarrollador']);
    }

    /** @test */
    public function puede_listar_contratos()
    {
        Contrato::factory()->count(3)->create();

        $contratos = Contrato::all();

        $this->assertCount(3, $contratos);
    }

    /** @test */
    public function puede_actualizar_contrato()
    {
        $contrato = Contrato::factory()->create();

        $contrato->update(['cargo' => 'Senior Developer']);

        $this->assertDatabaseHas('contratos', [
            'id' => $contrato->id,
            'cargo' => 'Senior Developer'
        ]);
    }

    /** @test */
    public function puede_eliminar_contrato_con_soft_delete()
    {
        $contrato = Contrato::factory()->create();

        $contrato->delete();

        $this->assertSoftDeleted('contratos', [
            'id' => $contrato->id
        ]);
    }
}