<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pfc_locations', function (Blueprint $table) {
            $table->id();
            $table->string('region_id')->nullable();
            $table->string('location_name')->nullable();
            $table->string('location_code')->nullable();
            $table->text('location_description')->nullable();
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
        Schema::dropIfExists('pfc_locations');
    }
};
