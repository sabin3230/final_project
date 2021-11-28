<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_name', 50);
            $table->String('address',50);
            $table->String('email', 50 );
            $table->String('contact_no'. 50);
            $table->date('open_date');
            $table->boolean('status')->default(0);
            $table->String('slug', 50);
            $table->bigInteger('org_id')->unsigned();
            $table->foreign('org_id')
                  ->references('id')
                  ->on('organizations')->onDelete('cascade');
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
        Schema::dropIfExists('branches');
    }
}
