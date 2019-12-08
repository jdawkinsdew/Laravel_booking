<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avail_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avail_services');
    }
}
