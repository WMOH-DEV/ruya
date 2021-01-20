<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('profile_img')->default('default.png');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('experience',['1-3', '3-5','5-10','10+'])->default('1-3');
            $table->enum('qualification',['دبلوم','بكالوريوس','ليسانس','ماجستير','دكتوراه'])->default('دبلوم');
            $table->foreignId('subject_id')->nullable()->constrained()->onDelete('set null');
            $table->string('attachment');
            $table->string('attachment2')->nullable();
            $table->integer('pphour');
            $table->text('brief');
            $table->softDeletes();
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
        Schema::dropIfExists('teachers');
    }
}
