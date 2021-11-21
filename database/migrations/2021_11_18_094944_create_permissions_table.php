<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permission');
            $table->bigInteger('p_component_id')->unsigned();
            $table->foreign('p_component_id')
                  ->references('id')
                  ->on('permission_components')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
         
        });

        Schema::create('role_permissions', function (Blueprint $table){
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('permission_id')->unsigned();

            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')
                  ->references('id')
                  ->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');

        schema::dropIfExists('role_permissions');
    }
}
