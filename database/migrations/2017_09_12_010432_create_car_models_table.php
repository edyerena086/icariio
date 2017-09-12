<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('car_brand_id')->unsigned();
            $table->integer('car_type_id')->unsigned();
            $table->timestamps();

            /**
             * Foreign Keys
             */
            $table->foreign('car_brand_id')
                ->references('id')
                ->on('car_brands');

            $table->foreign('car_type_id')
                ->references('id')
                ->on('car_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_models');
    }
}
