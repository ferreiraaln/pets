<?php

use Illuminate\Database\Seeder;

class PetsSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        factory(\App\Models\Pets::class,30)->create();
    }
}
