<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Atendimento::class, function (Faker $faker) {
    return [
        'descricao' => $faker->paragraph,
        'data_atendimento' => now(),
        'id_pet' => factory(\App\Models\Pets::class)
    ];
});
