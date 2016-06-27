<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Faker\Factory as Faker;

class LinkTest extends TestCase
{
    /**
     * Create a new link
     *
     * @return void
     */
    public function testLinkPost()
    {
      $faker = Faker::create();
      // create a new user
      $user = factory(App\User::class)->create();

      // generate blog title and content
      $title = $faker->sentence(4, true);
      $url = "https://www.igvita.com/2014/05/05/minimum-viable-block-chain/";
      $tags = "blockchain cryptocurrency";

      $this->actingAs($user)
        ->visit('/links/create')
        ->type($title, 'title')
        ->type($url, 'url')
        ->press('Create')
        ->seePageIs('/links')
        ->see($title);
    }

    /**
     * Test the deletion of a newly created link
     * @return void
     */
    public function testLinkDelete()
    {
      // create a new link
      $link = factory(App\Link::class)->create();
      $user = App\User::find($link->user_id);
      $this->be($user);

      $response = $this->call('DELETE', sprintf("/links/%d", $link->id), ['_token' => csrf_token()]);
      $this->assertEquals(302, $response->getStatusCode());
      $this->notSeeInDatabase('links', ['id' => $link->id]);
    }
}
