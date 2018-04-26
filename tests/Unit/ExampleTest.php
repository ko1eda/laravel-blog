<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     * Here we are testing our archive component functionality
     * @return void
     */
    public function testBasicTest()
    {
        // $this->assertTrue(true);
        // given when then test for units

        // Given I have to records in the database that are posts
        // and each one is posted a month a part
        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMount()
        ]);

        //When I fetch the archives
        $archives = Post::getArchives();

        //Then (what)? -> The response should be in the proper format



    }
}
