<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Memo;
use Faker\Generator as Faker;
use App\User;

$factory->define(Memo::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'book' => $faker->word(),
        'author' => $faker->name(),
        'title' => $faker->word(),
        'content' => $faker->text(),
    ];
});
