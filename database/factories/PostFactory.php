<?php

use Faker\Generator as Faker;

/**
 * Remember to put the class path in the define function
 * otherwise the test wont work.
 * also remember that the factory function creates an instance of the model factory
 * class
 */


$factory->define(App\Post::class, function (Faker $faker) {
    $user = factory(App\User::class)->create();
    return [
        'title' => $faker->sentence,
        'body' => implode($faker->paragraphs(3)),
        'author' => $user->name,
        'user_id' => $user->id
    ];
});
