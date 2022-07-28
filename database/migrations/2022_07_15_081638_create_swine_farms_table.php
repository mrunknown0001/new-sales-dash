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
        Schema::create('swine_farms', function (Blueprint $table) {
            $table->id();
            $table->string('farm_name')->nullable();
            $table->string('farm_address')->nullable();
            $table->string('farm_code')->nullable();
            $table->string('farm_description')->nullable();
            $table->string('farm_contact')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_deleted')->default(0);
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
        Schema::dropIfExists('swine_farms');
    }
};
