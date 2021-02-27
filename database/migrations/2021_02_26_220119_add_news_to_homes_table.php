<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewsToHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homes', function (Blueprint $table) {
            //
            $table->string('new1')->default('هذا هو الخبر الأول');
            $table->string('link1')->default('#');
            $table->string('new2')->default('هذا هو الخبر الثاني');
            $table->string('link2')->default('#');
            $table->string('new3')->default('هذا هو الخبر الثالث');
            $table->string('link3')->default('#');
            $table->string('new4')->default('هذا هو الخبر الرابع');
            $table->string('link4')->default('#');
            $table->string('new5')->default('هذا هو الخبر الخامس');
            $table->string('link5')->default('#');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            //
        });
    }
}
