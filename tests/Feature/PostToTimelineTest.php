<?php

namespace Tests\Feature;

use App\Post;
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
        //  User must be logged in (Step 1) (User Is Now Logged In)
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
        $post = Post::first();

        //  We create another assertion to check how many posts are in the DB
        $this->assertCount(1, Post::all());

        //  What we have done here is try to test whether we are getting data back from our creation of both user & post
        $this->assertEquals($user->id, $post->user_id);
        $this->assertEquals('Testing Body', $post->body);

        //  Status Code For Resource Created & The Response Structure We Are Looking For (Step 4)
        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'posts',
                    'post_id' => $post->id,
                    'attributes' => [
                        'posted_by' => [
                            'data' => [
                                'attributes' => [
                                    'name' => $user->name
                                ],
                            ],
                        ],
                        'body' => 'Testing Body',
                    ]
                ],

                'links' => [
                    'self' => url('/posts/'.$post->id),
                ]
            ]);

    }


}
