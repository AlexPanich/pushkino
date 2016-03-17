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
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'user_id' =>factory(App\User::class)->create()->id,
        'name' => $faker->sentence(),
        'type' => $faker->randomElement(['sale', 'buy', 'service']),
        'price' => $faker->numberBetween(1000, 50000),
        'description' =>$faker->paragraphs(3, true),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->paragraphs(5, true),
        'published_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => factory(App\User::class)->create()->id,
    ];
});

