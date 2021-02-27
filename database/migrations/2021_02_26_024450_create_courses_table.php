<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->integer('price');
            $table->string('duration');
            $table->string('instructor');
            $table->string('about-instructor');
            $table->string('how');
            $table->integer('lectures')->nullable();
            $table->string('language')->nullable();
            $table->string('intro_video')->nullable();
            $table->string('intro_image')->default('course.jpg');
            $table->string('intro_text');
            $table->text('content');
            $table->text('for_who');
            $table->string('requirements');




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
        Schema::dropIfExists('courses');
    }
}
