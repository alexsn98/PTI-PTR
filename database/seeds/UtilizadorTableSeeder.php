<?php

use Illuminate\Database\Seeder;

class UtilizadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Utilizador::class, 20)->create()->each(function ($utilizador) {
            $utilizador->admistrador()->save(factory(App\Admistrador::class)->make());
        });

        factory(App\Utilizador::class, 60)->create()->each(function ($utilizador) {
            $utilizador->docente()->save(factory(App\Docente::class)->make());
        });

        // factory(App\Utilizador::class, 40)->create()->each(function ($utilizador) {
        //     $utilizador->docente()->save(factory(App\Admistrador::class)->make());
        // });
    }
}
