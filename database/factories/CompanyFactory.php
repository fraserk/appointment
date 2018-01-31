<?php

use Faker\Generator as Faker;

$factory->define('App\Company', function (Faker $faker) {
    return [
            'name' => $faker->name,
            'user_id' => function () {
                return factory(\App\User::class)->create()->id;
            },
            'bio' => $faker->paragraph,
            'street_address' => $faker->streetAddress,
            'city' => $faker->city,
            'state' => $faker->state,
            'zip_code' => $faker->postcode,

        
    ];
});
