<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table('especies')->insert([
            'id_especie' => 1,
            'nome' => "Cão",
            'tipo' => "C",
        ]);

        DB::table('especies')->insert([
            'id_especie' => 2,
            'nome' => "Gato",
            'tipo' => "G",
        ]);
    }
}
