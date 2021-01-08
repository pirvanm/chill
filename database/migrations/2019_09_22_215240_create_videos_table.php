<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('videoId')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail');
            $table->dateTime('publishedAt');
            $table->time('duration', 0)->nullable();
            $table->unsignedBigInteger('channel_id')->nullable();
            $table->foreign('channel_id')->on('channels')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('views');
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
        Schema::dropIfExists('videos');
    }
}
