<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');          
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('address', 100);
            $table->string('contact', 100);
            $table->string('alt_contact', 100);
            $table->string('email', 100);
            $table->string('model_name', 100);
            $table->string('enigne_capacity', 50);
            $table->string('color', 50);
            $table->bigInteger('vehicle_model_id')->unsigned();
            $table->foreign('vehicle_model_id')
                  ->references('id')
                  ->on('vehicle_models')->onDelete('cascade');
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
        Schema::dropIfExists('vehicle_bookings');
    }
}
