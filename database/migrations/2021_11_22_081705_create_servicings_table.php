<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('remarks', 50)->nullable();
            $table->date('next_servicing')->nullable();
            $table->enum('status', ['completed', 'pending','servicing'])->default('pending');

            $table->bigInteger('booking_id')->unsigned();
            $table->foreign('booking_id')
                    ->references('id')
                    ->on('bookings')->onDelete('cascade');
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('servicings');
    }
}
