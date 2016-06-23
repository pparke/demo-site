<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    /**
     * Test if the page loads
     *
     * @return void
     */
    public function testPageLoads()
    {
      $this->visit('/')
         ->see('Philip Parke');
    }

    /**
     * Test if clicking on links remains on the same page
     * @return void
     */
    public function testScrollLinks()
    {
      $this->visit('/')
        ->click('About Me')
        ->seePageIs('/')
        ->click('contact me.')
        ->seePageIs('/');
    }

    /**
     * Test if clicking on the blogs link takes us to the /blogs route
     * @return void
     */
    public function testBlogLink()
    {
      $this->visit('/')
        ->click('Blog')
        ->seePageIs('/blogs');
    }

    /**
     * Test if clicking on the links link takes us to the /links route
     * @return void
     */
    public function testLinksLink()
    {
      $this->visit('/')
        ->click('Links')
        ->seePageIs('/links');
    }
}
