<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {
    return [
      "schedule" =>  [
        [
          'day_of_week'=> 'Monday',
          'start' => ('9:00 am'),
          'end'=> ('5:00 pm'),
          'is_open' => true
        ],
        [
          'day_of_week'=> 'Tuesday',
          'start' => ('9:00 am'),
          'end'=> ('5:00 pm'),
          'is_open' => true
        ],
        [
          'day_of_week'=> 'Wednesday',
          'start' => ('9:00 am'),
          'end'=> ('5:00 pm'),
          'is_open' => true
        ],
        [
          'day_of_week'=> 'Thursday',
          'start' => ('9:00 am'),
          'end'=> ('5:00 pm'),
          'is_open' => true
        ],
        [
          'day_of_week'=> 'Friday',
          'start' => ('9:00 am'),
          'end'=> ('5:00 pm'),
          'is_open' => true
        ],
        [
          'day_of_week'=> 'Saturday',
          'start' => ('9:00 am'),
          'end'=> ('5:00 pm'),
          'is_open' => true
        ],
        [
          'day_of_week'=> 'Sunday',
          'start' => ('9:00 am'),
          'end'=> ('5:00 pm'),
          'is_open' => true
        ],
    ]
    ];
});
