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
            $table->foreignId('portfolio_id')->constrained();
            $table->string('name');
            $table->longText('description');
            $table->timestamps();
        });

        Schema::create('project_skills', function(Blueprint $table)
        {
            $table->increments('id');
            $table->foreignId('project_id')->constrained();
            $table->foreignId('skill_id')->constrained();
        });

        Schema::create('project_photos', function(Blueprint $table) {
            $table->increments('id');
            $table->foreignId('project_id')->constrained();
            $table->foreignId('image_id')->constrained();
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
        Schema::dropIfExists('project_skills');
        Schema::dropIfExists('project_photos');
    }
}
