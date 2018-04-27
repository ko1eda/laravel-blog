<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i < 50 ; $i++) {
            Post::create([
                'title' => Faker->sentence(),
                'body' => implode(Faker->paragraphs(3)),
                'author' => Faker->
            ]);
        }
    }
}
