<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 144);
            $table->string('img_src', 144);
            $table->longText('description');
            $table->uuid('product_type_id');
            $table->uuid('brand_id');
            $table->timestamps();

            $table->foreign('product_type_id')
            ->references('id')->on('product_types')
            ->onDelete('cascade');

            $table->foreign('brand_id')
            ->references('id')->on('brands')
            ->onDelete('cascade');
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
}
