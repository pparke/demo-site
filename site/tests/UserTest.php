<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Faker\Factory as Faker;

class UserTest extends TestCase
{
    /**
     * Test user registration
     *
     * @return void
     */
    public function testUserRegistration()
    {
      $faker = Faker::create();
      $name = $faker->userName();
      $email = $faker->safeEmail();
      $password = '123456';

      $this->visit('/register')
        ->type($name, 'username')
        ->type($email, 'email')
        ->type($password, 'password')
        ->type($password, 'password_confirmation')
        ->press('Register')
        ->seePageIs('/welcome');
    }
}
