<?php



/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'api_token'=>str_random(60),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Hour::class, function (Faker\Generator $facker) {
    return [
    'company_id'=> function () {
        return  factory(App\Company::class)->create()->id;
    },
    'day_of_week'=> 'Monday',
    'open_time' => ('9:00 am'),
    'close_time'=> ('5:00 pm'),
    'is_open' => true
  ];
});

