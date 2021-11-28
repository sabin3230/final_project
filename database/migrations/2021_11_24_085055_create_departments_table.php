<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('department_name', 100);
            $table->String('contact_no', 50);
            $table->String('email', 50);
            $table->String('slug', 50);
            $table->bigInteger('manager_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('branch_department', function (Blueprint $table){
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('branch_id')->unsigned();

            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments')->onDelete('cascade');
            $table->foreign('branch_id')
                  ->references('id')
                  ->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
