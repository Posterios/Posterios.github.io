<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinclassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joinclass', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('class_id');
            $table->string('class_code')->references('class_code')->on('class');
            $table->string('user_status')->nullable();
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
        Schema::dropIfExists('joinclass');
    }
}
