<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Pet::class, function (Faker $faker) {
    return [
         'name' => $faker->name,
        'longittude'=>$faker->longitude,
        'latitude'=>$faker->latitude,
        'describtion'=>$faker->text(),
    ];
});
