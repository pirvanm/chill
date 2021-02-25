<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            /// i wanna store user id fk  here
            $table->foreign('sub_category_=id')->references('id')->on('sub_categories')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('detail_id');
            $table->foreign('video_id')->references('id')
            ->on('videos')->onUpdate('cascade')->onDelete('cascade');
           
            $table->string('comments')->unique();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
