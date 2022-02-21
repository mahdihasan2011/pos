<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_no');
            $table->dateTime('date')->nullable();
            $table->string('supplier')->nullable();
            $table->decimal('amount', 10,2)->nullable();
            $table->integer('total_qty')->nullable();
            $table->double('sub_total', 10,2)->nullable();
            $table->double('discount', 10,2)->nullable();
            $table->tinyInteger('disc_type')->nullable();
            $table->double('payable', 10,2)->nullable();
            $table->double('paid', 10,2)->nullable();
            $table->double('return', 10,2)->nullable();
            $table->double('due', 10,2)->nullable();
            $table->string('payment_type')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
