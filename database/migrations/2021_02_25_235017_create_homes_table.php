<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->integer('trusted_student')->default(0);
            $table->integer('courses_student')->default(0);
            $table->integer('total_teachers')->default(0);
            $table->integer('total_requests')->default(0);
            $table->string('support_whatsapp')->default('0000');
            $table->string('facebook')->default('www.facebook.com');
            $table->string('youtube')->default('www.youtube.com');
            $table->string('twitter')->default('www.twitter.com');
            $table->string('instagram')->default('www.instagram.com');
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
        Schema::dropIfExists('homes');
    }
}
