<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('contact', 10);
            $table->string('alt_contact', 10)->nullable();
            $table->string('address', 10)->nullable();

            // $table->bigInteger('role_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->bigInteger('role_id')->unsigned();

            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
