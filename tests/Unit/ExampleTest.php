<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase; // this is a trait that we are using on our class

    /**
     * A basic test example.
     * Here we are testing our archive component functionality.
     * To create the test first we must create a test database
     * then we must alter our phpunit.xml file to access this db
     * by adding: 
     *  <env name="DB_DATABASE" value="blog_testing"/>
     * You also need to change the database that
     * your .env file is pointing to from your actual db
     * to the testing db and re-run your migrations before testing w phpunit
     * @return void
     */

    public function testBasicTest()
    {
        // Given I have to records in the database that are posts
        // and each one is posted a month a part
        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        //When I fetch the archives
        $posts = Post::fetchArchives();

        // this makes sure the format returned by your test
        // matches exactly what you would expect
        // in our case Post::fetchArchives() returns an array
        // containing two arrays with post information in this format
        $this->assertEquals([
            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1
            ],
            [
                "year" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1
            ],
        ], $posts);




        //Then what should the reponse be ?
        // $this->assertCount(2, $posts); assert count is what you expect the number of records to be
    }
}
