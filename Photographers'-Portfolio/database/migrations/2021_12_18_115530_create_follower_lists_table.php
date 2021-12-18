<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follower_list', function (Blueprint $table) {
            $table->id('follow_id');
            $table->unsignedBigInteger('follower_uid');
            $table->foreign('follower_uid')->references('u_id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('following_uid');
            $table->foreign('following_uid')->references('u_id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('follower_lists');
    }
}
