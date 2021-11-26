<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('logo', 50);
            $table->string('address', 100);
            $table->string('contact', 50 );
            $table->string('alt_contact', 50)->nullable();
            $table->string('email',50);
            $table->string('alt_email',50)->nullable();
            $table->string('facebook_link', 50);
            $table->string('instagram_link', 50);
            $table->longText('description');
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
        Schema::dropIfExists('organizations');
    }
}
