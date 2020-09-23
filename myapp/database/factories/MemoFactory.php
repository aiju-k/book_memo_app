<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Memo;
use Faker\Generator as Faker;

$factory->define(Memo::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'book' => $faker->word(),
        'author' => $faker->name(),
        'title' => $faker->word(),
        'content' => $faker->text(),
    ];
});
