<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('attributes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('content');
          $table->integer('profile_id')->unsigned();
          $table->foreign('profile_id')->references('id')->on('profiles');
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
        Schema::drop('attributes');
    }
}
