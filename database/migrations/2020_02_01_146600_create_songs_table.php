<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('songs')){
          Schema::create('songs', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->string('title');
              $table->string('artist');
              $table->string('fileName');
              //foreign key artist name
            // $table->unsignedBigInteger('artist_id')->unsigned();
              //$table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
              //foreign key user uploader
            //  $table->unsignedBigInteger('user_id')->unsigned();
              //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
              $table->timestamps();
          });

          Schema::table('songs', function($table){
              //$table->foreign('user_id')->references('id')->on('users');
              //$table->foreign('artist_id')->references('id')->on('artists');
          });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
