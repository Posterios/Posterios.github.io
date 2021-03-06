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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->date('dob');
            $table->string('role');
            $table->text('image')->nullable();
            $table->string('aboutme', 10000)->nullable();
            $table->string('jurusan')->nullable();
            $table->string('grade');
            $table->string('sekolah')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('image_selfie');
            $table->text('image_card');
            $table->string('status')->nullable();
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
