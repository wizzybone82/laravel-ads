<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id('ad_id');
            $table->string('title');
            $table->string('description');
            $table->string('ad_image');
            $table->double('price')->default(0);
            $table->integer('ad_status')->default(1);
            $table->integer('owner_id');
            $table->enum('owner_type',['admin','user']);
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
        Schema::dropIfExists('ads');
    }
}
