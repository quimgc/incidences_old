<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowAllIncidences()
    {
        //els testos sempre han de tenir 3 parts:
        //1. Preparar el test
        //2. Executar el codi que vull provar.
        // 3. Comprovo: assert

        $response = $this->get('/incidences');

        $response->assertStatus(200);
    }
}
