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
        $this->call([
            EspeciesSeeder::class,
            PetsSeeder::class,
            AtendimentoSeeder::class,
        ]);
    }
}
