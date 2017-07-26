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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Footprint::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName($gender = null|'male'|'female'),
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'guess' => $faker->numberBetween($min = 10000, $max = 100000),
        'calculated' => $faker->numberBetween($min = 10000, $max = 100000)
    ];
});

$factory->define(App\Presenter::class, function (Faker\Generator $faker) {
     
    // following line retrieve all the user_ids from DB
    $footprints = [1,2,3];

    return [
        'footprint_id' => $faker->randomElement($footprints),
        'guess' => $faker->numberBetween($min = 10000, $max = 100000)
    ];
});