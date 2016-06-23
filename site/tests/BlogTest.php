<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Faker\Factory as Faker;

class BlogTest extends TestCase
{
    /**
     * Create a new blog
     *
     * @return void
     */
    public function testBlogPost()
    {
      $faker = Faker::create();
      // create a new user
      $user = factory(App\User::class)->create();

      // generate blog title and content
      $title = $faker->sentence(4, true);
      $content = $faker->text(1000);

      $this->actingAs($user)
        ->visit('/blogs/create')
        ->type($title, 'title')
        ->type($content, 'content')
        ->press('Create')
        ->seePageIs('/blogs')
        ->see($title);
    }

    /**
     * Test the deletion of a newly created blog post
     * @return void
     */
    public function testBlogDelete()
    {
      // create a new blog entry
      $blog = factory(App\Blog::class)->create();
      $user = App\User::find($blog->user_id);
      $this->be($user);

      $response = $this->call('DELETE', sprintf("/blogs/%d", $blog->id), ['_token' => csrf_token()]);
      $this->assertEquals(302, $response->getStatusCode());
      $this->notSeeInDatabase('blogs', ['id' => $blog->id]);
    }
}
