<?php

use Faker\Generator as Faker;

/**
 * Remember to put the class path in the define function
 * otherwise the test wont work.
 * also remember that the factory function creates an instance of the model factory
 * class
 */


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => implode($faker->paragraphs(3)),
        'author' => $faker->firstName,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
