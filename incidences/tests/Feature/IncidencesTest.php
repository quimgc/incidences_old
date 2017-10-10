<?php

namespace Tests\Feature;

use App\Incidence;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncidencesTest extends TestCase
{
    //s'ha de començar els tests amb la Bd buida.

    use RefreshDatabase;

    public function testShowAllIncidences()
    {
        //els testos sempre han de tenir 3 parts:
        //1. Preparar el test
        //2. Executar el codi que vull provar.
        //3. Comprovo: assert

        $incidences = factory(Incidence::class, 50) -> create();


        $response = $this->get('/incidences');
        $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertViewIs('list_events');


        //TODO faltaria contar que hi ha 50 al resultat

        foreach ( $incidences as $incidence) {
            $response->assertSeeText($incidence->title);
            $response->assertSeeText($incidence->description);
        }
    }

    /**
     * @group todo
     */
    public function testShowAnIncidence()
    {
        //1. Preparar.
        $incidence = factory(Incidence::class) -> create();


        //2. Executar.
        $response = $this->get("/incidences/$incidence->id" );
        //$response->dump();

        //3. Comprovo.
//        $response->assertSee($incidence->title);
//        $response->assertSee($incidence->description);
        $response->assertStatus(200);
        $response->assertSuccessful();

        $response->assertViewIs('show_incident');
        $response->assertViewHas('incidence');

        $response->assertSeeText($incidence->title);
        $response->assertSeeText($incidence->description);
        $response->assertSeeText('Incidence');

    }

    /**
     * @group todo
     */
    public function testNoShowAnIncidence()
    {


        //2. Executar.
        $response = $this->get('/incidences/9999');


        //3. Comprovo.
        $response->assertStatus(404);

    }
}
