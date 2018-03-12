<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'name' => 'Hair Cut',
        'duration' => ('30'),
        'price' => ('20'),
        'detail' => 'this is the best service'
    ];
});

