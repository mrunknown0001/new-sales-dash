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
        Schema::create('pfc_product_quality_types', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('product_quality_type_name')->nullable();
            $table->string('product_quality_type_description')->nullable();
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
        Schema::dropIfExists('pfc_product_quality_types');
    }
};
