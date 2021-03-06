<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('class_id')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->string('project_title');
            $table->string('project_category');
            $table->string('project_subcategory');
            $table->text('project_image');
            $table->string('project_description', 10000)->nullable();
            $table->string('project_link')->nullable();
            $table->text('project_video')->nullable();
            $table->text('project_video_link')->nullable();
            $table->text('project_status')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
