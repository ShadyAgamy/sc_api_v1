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
            $table->id();
            $table->string('username');
            $table->string('full_name');
            $table->string('store_name');
            $table->string('store_logo');
            $table->string('email')->unique();
            $table->string('background_color')->nullable();
            $table->string('text_color')->nullable();
            $table->string('instagram_username')->nullable();
            $table->string('instagram_image')->nullable();
            $table->string('snapchat_username')->nullable();
            $table->string('snapchat_image')->nullable();
            $table->string('pinterest_username')->nullable();
            $table->string('pinterest_image')->nullable();
            $table->string('tiktok_username')->nullable();
            $table->string('tiktok_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
