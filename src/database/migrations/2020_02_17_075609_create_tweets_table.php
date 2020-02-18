<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::create('tweets', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedInteger('user_id')->comment('ユーザーID');
        $table->text('messages')->comment('発言');
        $table->timestamps();

        $table->softDeletes();

        $table->index('id');
        $table->index('user_id');
        $table->index('messages');

        $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade')
        ->onUpdate('cascade');
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
