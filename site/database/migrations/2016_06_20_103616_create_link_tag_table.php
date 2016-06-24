<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('link_tag', function (Blueprint $table) {
        $table->integer('link_id')->unsigned()->references('id')->on('links');
        $table->integer('tag_id')->unsigned()->references('id')->on('tags');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('link_tag');
    }
}
