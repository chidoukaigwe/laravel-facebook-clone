<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostToTimelineTest extends TestCase
{
    //  Use inapp DB for testing
    use RefreshDatabase;

    /** @test */
    public function a_user_can_post_a_text_post()
    {
        //  disable exception handling to get the right error messages coming through
        $this->withoutExceptionHandling();
        //  user must be logged in (Step 1)
        $this->actingAs($user = factory(User::class)->create(), 'api');

        //  Make A Post Request To Api - Pass In Data (Step 2)
        $response = $this->post('/api/posts', [
            'data' => [
                'type' => 'posts',
                'attributes' => [
                    'body' => 'Testing Body',
                ]
            ]
        ]);

        //  We have created A Post So There Should be a post in the database (Step 3)
        $post = \App\Post::first();

        //  Status Code For Resource Created (Step 4)
        $response->assertStatus(201);

    }


}
