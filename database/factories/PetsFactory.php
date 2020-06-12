<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Pets::class, function (Faker $faker) {
    return [
       'nome' => $faker->firstName,
       'id_especie' => $faker->numberBetween(1, 2)
    ];
});
