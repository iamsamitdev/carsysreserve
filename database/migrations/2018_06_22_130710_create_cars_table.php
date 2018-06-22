<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('license',16);
            $table->string('cartype',32);
            $table->integer('carseat');
            $table->integer('carlevel');
            $table->string('carimg_1',64);
            $table->string('carimg_2',64);
            $table->string('carimg_3',64);
            $table->string('owner',16);
            $table->string('responsibility',16);
            $table->integer('status');
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
        Schema::dropIfExists('cars');
    }
}
