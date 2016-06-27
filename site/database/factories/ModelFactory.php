<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
 * User Factory
 */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

/**
 * Blog Factory
 */
$factory->define(App\Blog::class, function (Faker\Generator $faker) {
  $title = $faker->sentence(4, true);
  $content = $faker->text(1000);
    return [
      'user_id' => function () {
          return factory(App\User::class)->create()->id;
        },
      'title' => $title,
      'content' => $content,
      'slug' => str_slug($title),
      'sample' => App\Blog::text_sample($content),
    ];
});

/**
 * Link Factory
 */
$factory->define(App\Link::class, function (Faker\Generator $faker) {
  $title = $faker->sentence(4, true);
  $description = $faker->paragraph();
  $image = $faker->url;
  $url = $faker->url;
    return [
      'user_id' => function () {
          return factory(App\User::class)->create()->id;
        },
      'title' => $title,
      'description' => $description,
      'image' => $image,
      'url' => $url,
    ];
});
