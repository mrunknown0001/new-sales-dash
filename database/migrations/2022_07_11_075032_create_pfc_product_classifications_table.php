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
        Schema::create('pfc_product_classifications', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('product_classification_name')->nullable();
            $table->string('product_classification_code')->nullable();
            $table->text('product_classification_description')->nullable();
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
        Schema::dropIfExists('pfc_product_classifications');
    }
};
