<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->comment('ユーザ名');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('screen_name')->comment('表示名');
            $table->text('profile')->nullable()->comment('プロフィール文');
            $table->string('icon_image')->nullable()->comment('アイコン画像');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
