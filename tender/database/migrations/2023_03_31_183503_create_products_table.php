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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_title');
            $table->string('product_slug');
            $table->float('product_price');
            $table->char('inventory_stock')->nullable();
            $table->tinyInteger('product_status')->default(1);
            $table->string('product_thumbnail')->nullable();
            $table->longText('product_description')->nullable();
            $table->integer('created_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
