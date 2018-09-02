<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {
    return [
      'staff_id' => function() {
        return factory(App\User::class)->create()->id;
      },
      'opening_hours_mon' => ['08:00','12:00'],
      'opening_hours_tue' => ['08:00','12:00'],
      'opening_hours_wed' => ['08:00','12:00'],
      'opening_hours_thu' => ['00:00','23:00'],
      'opening_hours_fri' => ['08:00','24:00'],
      'opening_hours_sat' => ['08:00','12:00'],
      'opening_hours_sun' => ['08:00','12:00'],
    ];
});
