<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_no');
            $table->dateTime('date')->nullable();
            $table->string('customer')->nullable();
            $table->decimal('amount', 10,2)->nullable();
            $table->integer('total_qty')->nullable();
            $table->double('sub_total', 10,2)->nullable();
            $table->double('discount', 10,2)->nullable();
            $table->tinyInteger('disc_type')->nullable();
            $table->double('vat', 10,2)->nullable();
            $table->double('payable', 10,2)->nullable();
            $table->double('paid', 10,2)->nullable();
            $table->double('return', 10,2)->nullable();
            $table->double('due', 10,2)->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_number')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
