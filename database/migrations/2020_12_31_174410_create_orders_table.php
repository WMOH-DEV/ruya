<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');;
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');;
            $table->foreignId('stage_id')->nullable()->constrained()->onDelete('set null');
            $table->string('subject_name');
            $table->integer('hours')->unsigned();
            $table->date('start_date');
            $table->enum('contact_way',['whatsapp','email','phone'])->default('email');
            $table->text('notes');
            $table->enum('admin_status',[
                'قيد الانتظار',
                'مرفوض',
                'مقبول',
                'جاري',
                'مكتمل'
            ])->default('قيد الانتظار');
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
        Schema::dropIfExists('orders');
    }
}
