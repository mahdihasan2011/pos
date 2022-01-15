<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->integer('category')->nullable();
            $table->integer('brand')->nullable();
            $table->integer('color')->nullable();
            $table->integer('size')->nullable();
            $table->double('purchase_price', 10,2)->nullable();
            $table->double('cost', 10,2)->nullable();
            $table->decimal('profit', 6,2)->nullable();
            $table->double('sale_price', 10,2)->nullable();
            $table->string('image')->nullable();
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
}
