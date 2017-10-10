<?php

use App\Incidence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    factory(Incidence::class, 50) ->create();

    }
}
