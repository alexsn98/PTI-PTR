<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SalaTableSeeder::class);
        $this->call(UtilizadorTableSeeder::class);
        $this->call(CursoTableSeeder::class);
    }
}
