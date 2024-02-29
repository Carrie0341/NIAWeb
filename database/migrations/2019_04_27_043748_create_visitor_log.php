<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->rememberToken()->unique();
            $table->string('name');
            $table->string('method', 6);
            $table->string('route');
            $table->dateTime('visit_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_log');
    }
}
