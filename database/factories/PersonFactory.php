<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_names' => $faker->firstName,
        'last_name' => $faker->lastName,
        'name' => $faker->name,
        'date_of_birth' => $faker->date,
    ];
});