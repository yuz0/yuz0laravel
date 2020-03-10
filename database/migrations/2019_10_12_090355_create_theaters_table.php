<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theaters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('theaterName', 200);
            $table->string('name_eng', 200);
            $table->integer('spec_id');
            $table->string('spec', 200);
            $table->integer('corp_id');
            $table->integer('region_id');
            $table->string('area', 200);
            $table->string('img', 200);
            $table->string('size');
            $table->string('seats');
            $table->text('explain');
            $table->string('link');
            $table->string('map');

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
        Schema::dropIfExists('theaters');
    }
}
