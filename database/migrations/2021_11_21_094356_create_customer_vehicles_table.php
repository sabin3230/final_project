<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('vehicle_no', 100);
            $table->year('model_year');
            $table->date('purchase_date');
            $table->String('chassis_no');
            $table->String('engine_no');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('customer_vehicles');
    }
}
