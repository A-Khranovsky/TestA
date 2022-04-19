<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('name');
            $table->foreignId('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->cascadeOnDelete();
            $table->foreignId('pluscode_id')->nullable();
            $table->foreign('pluscode_id')->references('id')->on('pluscodes')->cascadeOnDelete();
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
        Schema::dropIfExists('geodatas');
    }
};
