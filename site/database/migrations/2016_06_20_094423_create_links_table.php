<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('links', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned()->references('id')->on('users');
        $table->string('title');
        $table->text('url');
        $table->text('image');
        $table->text('description');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('links');
    }
}
